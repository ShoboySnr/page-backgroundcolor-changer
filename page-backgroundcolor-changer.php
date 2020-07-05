<?php 
/**
 * Plugin Name: Custom Page BackgroundColor
 * Plugin URI: http://studio14online.co.uk
 * Description: This plugin gives the user the ability to change the background color of posts, Custom Pages and categories
 * Version: 1.0.2
 * Author:  Studio14 Online Nigeria
 * Author URI: http://studio14online.co.uk
 * License: GPL2
 */

if ( !defined( 'WP_CONTENT_URL' ) ) {
	define( 'WP_CONTENT_URL', get_option( 'siteurl' ) . '/wp-content' );
}
if ( !defined( 'WP_CONTENT_DIR' ) ) {
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
}
if ( !defined( 'WP_PLUGIN_URL' ) ) {
	define( 'WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins' );
}
if ( !defined( 'WP_PLUGIN_DIR' ) ) {
	define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
}
if ( !defined( 'PBC_NAME' ) ) {
	define( 'PBC_NAME', 'page-backgroundcolor-changer' );
}
if ( !defined( 'PBC_PLUGIN_DIR' ) ) {
	define( 'PBC_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PBC_NAME );
}
if ( !defined( 'PBC_PLUGIN_URL' ) ) {
	define( 'PBC_PLUGIN_URL', WP_PLUGIN_URL . '/' . PBC_NAME );
}
if ( !defined( 'PBC_MAIN_FILE_PATH' ) ) {
	define( 'PBC_MAIN_FILE_PATH', __FILE__ );
}
if ( !defined( 'PBC_DATABASE_TABLE' ) ) {
	define( 'PBC_DATABASE_TABLE', 'page_backgroundcolor' );
}

require_once(ABSPATH.'/wp-load.php');
include_once(PBC_PLUGIN_DIR . '/actions/selects.php');
include_once(PBC_PLUGIN_DIR . '/actions/stylesheets.php');
include_once(PBC_PLUGIN_DIR . '/actions/admin_menu.php');

global $page_background_db_version;
$page_background_db_version = '1.0';

function page_backgroundcolor_install() {
	global $wpdb;
	global $page_background_db_version;

	$table_name = $wpdb->prefix . PBC_DATABASE_TABLE;
	
  $charset_collate = $wpdb->get_charset_collate();
  
  if ( $wpdb->get_var('SHOW TABLES LIKE '.$table_name) != $table_name) {
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
      type_value text NULL,
      which_type int(11) NULL,
      main_color text NULL,
      name text NULL,
      text text NULL,
      PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    add_option( 'page_background_db_version', $page_background_db_version );
  }
}

function page_backgroundcolor_install_data() {
	global $wpdb;
	
	$welcome_name = 'Hey';
	$welcome_text = 'Congratulations, you just completed the installation!';
	
	$table_name = $wpdb->prefix . PBC_DATABASE_TABLE;
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);
}

register_activation_hook( __FILE__, 'page_backgroundcolor_install' );
register_activation_hook( __FILE__, 'page_backgroundcolor_install_data' );
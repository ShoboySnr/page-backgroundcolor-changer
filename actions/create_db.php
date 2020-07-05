<?php

global $page_background_db_version;
$page_background_db_version = '1.0';

function page_backgroundcolor_install() {
	global $wpdb;
	global $page_background_db_version;

	$table_name = $wpdb->prefix . 'page_backgroundcolor_changer';
	
  $charset_collate = $wpdb->get_charset_collate();
  
  if ( $wpdb->get_var('SHOW TABLES LIKE '.$table_name) != $table_name) {
    $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      type_value text NULL,
      which_type int(11) NULL,
      main_color text NULL,
      hover_color text NULL,
      name text NOT NULL,
      text text NOT NULL,
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
	
	$table_name = $wpdb->prefix . 'page_backgroundcolor_changer';
	
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
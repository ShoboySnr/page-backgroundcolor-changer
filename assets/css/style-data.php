<?php
require_once('../../../../../wp-load.php');

$my_background_variable = '#ffffff';

global $wpdb;
  $prefix = $wpdb->prefix;

$getData = $wpdb->get_results( 
  "SELECT id, type_value, which_type, main_color 
  FROM ".$prefix.PBC_DATABASE_TABLE." WHERE which_type != ''"
);
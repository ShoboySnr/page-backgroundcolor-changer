<?php


function getData() {
  global $wpdb;
  $prefix = $wpdb->prefix;

  $getData = $wpdb->get_results( 
    "SELECT id, type_value, which_type, main_color 
    FROM ".$prefix.PBC_DATABASE_TABLE." WHERE which_type != ''"
  );

  return $getData;
}

function getPostTitle($post_id) {
  global $wpdb;
  $prefix = $wpdb->prefix;

  $getPostTitle = $wpdb->get_row( 
    "SELECT post_title FROM ".$wpdb->posts." WHERE ID = $post_id LIMIT 1"
  );

  return $getPostTitle;
}
?>
<?php

require_once('../../../../wp-load.php');

if(isset($_GET['action']) && $_GET['action'] == 'save_data') saveData();

if(isset($_GET['action']) && $_GET['action'] == 'edit_data') editData();

function saveData() {
  $which_type = $_GET['which_type'];
  $type = $_GET['type'];
  $main_color = $_GET['main_color'];

  global $wpdb;

  $prefix = $wpdb->prefix;
  //check if the post, pages or categories has been added before
  $getData = $wpdb->get_row( 
    "SELECT which_type FROM ".$prefix.PBC_DATABASE_TABLE." WHERE which_type = $which_type LIMIT 1"
  );

  if ($getData) {
    if($wpdb->update(
      $prefix.PBC_DATABASE_TABLE, 
      array( 
        'which_type' => $which_type, 
        'type_value' => $type,
        'main_color' =>  $main_color,
      ),
      array(
        'which_type' => $which_type
      )) === FALSE) {
        $response_code = 400;
        $response = [
          'message' => 'There was an error updating this information',
          'status' => false
        ]; 
      }
      else {
        $response_code = 200;
        $response = [
          'message' => 'This data is successfully updated',
          'status' => true
        ];
      }
  }
  else {
    $wpdb->insert( 
      $prefix.PBC_DATABASE_TABLE, 
      array( 
        'which_type' => $which_type, 
        'type_value' => $type,
        'main_color' =>  $main_color,
      )
    );
  
    if ($wpdb->insert_id > 0) {
      $response_code = 200;
      $response = [
        'message' => 'This data is successfully saved',
        'status' => true
      ];
    }
    else {
      $response_code = 400;
      $response = [
        'message' => 'There was an error saving this information',
        'status' => false
      ]; 
    }
  }

  http_response_code($response_code);
  echo json_encode($response);
}

function editData() {
  $id = $_GET['id'];

  global $wpdb;

  $prefix = $wpdb->prefix;

  $delete = $wpdb->delete(
    $prefix.PBC_DATABASE_TABLE, 
    array( 'id' => $id ), 
    array( '%d' ) 
  );

  if ($delete > 0) {
    $response_code = 200;
    $response = [
      'message' => 'This data was successfully deleted',
      'status' => true
    ];
  }
  else {
    $response_code = 401;
    $response = [
      'message' => 'There was an error deleting this information',
      'status' => false
    ]; 
  }

  http_response_code($response_code);
  echo json_encode($response);
}
?>
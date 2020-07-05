<?php

require_once('../../../../wp-load.php');

if(isset($_GET['action']) && $_GET['action'] == 'post') getPosts();

if(isset($_GET['action']) && $_GET['action'] == 'page') getPages();

if(isset($_GET['action']) && $_GET['action'] == 'category') getCategories();

function getPosts() {
  $args = array(
    'numberposts'   => -1,
    'post_type' => 'post',
  );
  $returnData = array();

  $posts = get_posts($args);

  foreach($posts as $key => $post) {
    $returnData[] = (object) array (
      'id' => $post->ID,
      'title' => $post->post_title
    );
  }

  echo json_encode($returnData);
}

function getPages() {
  $args = array(
    'numberposts' => -1,
    'post_type' => 'page',
  );
  $returnData = array();

  $posts = get_posts($args);

  foreach($posts as $key => $post) {
    $returnData[$key]['id'] = $post->ID;
    $returnData[$key]['title'] = $post->post_title;
  }

  echo json_encode($returnData);
}

function getCategories() {
  $returnData = array();

  $categories = get_categories();

  foreach($categories as $key => $category) {
    $returnData[$key]['id'] = $category->term_id;
    $returnData[$key]['title'] = $category->name;
  }

  echo json_encode($returnData);
}

//end of the action.php file
?>
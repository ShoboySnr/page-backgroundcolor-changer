<?php

function page_background_admin_styles() 
{
  wp_enqueue_style( 'spectrum-css', plugins_url('page-backgroundcolor-changer/assets/css/spectrum.css'));
  wp_enqueue_style( 'custom-css', plugins_url('page-backgroundcolor-changer/assets/css/custom.css'));
  wp_enqueue_style( 'pbc-bootstrap-stylesheets', plugins_url('page-backgroundcolor-changer/assets/bootstrap/css/bootstrap.min.css'));
  wp_enqueue_script( 'jquery-scripts', plugins_url('page-backgroundcolor-changer/assets/js/jquery.min.js'));
  wp_enqueue_script( 'jquery-datatables', plugins_url('page-backgroundcolor-changer/assets/js/jquery.dataTables.min.js'));
  wp_enqueue_script( 'bootstrap-datatables', plugins_url('page-backgroundcolor-changer/assets/js/dataTables.bootstrap.min.js'));
  wp_enqueue_script( 'spectrum-scripts', plugins_url('page-backgroundcolor-changer/assets/js/spectrum.min.js'));
  wp_enqueue_script( 'pbc-bootstrap-scripts', plugins_url('page-backgroundcolor-changer/assets/bootstrap/js/bootstrap.min.js'));
  wp_enqueue_script( 'vue', plugins_url('page-backgroundcolor-changer/assets/js/vue.js'));
  wp_enqueue_script( 'axios', plugins_url('page-backgroundcolor-changer/assets/js/axios.min.js'));
  wp_enqueue_script( 'scripts', plugins_url('page-backgroundcolor-changer/assets/js/custom.js'));
}

function my_frontend_wp_scripts() {
  wp_enqueue_style( 'pbc-stylesheets', plugins_url('page-backgroundcolor-changer/assets/css/styles.php'));
}

add_action( 'wp_enqueue_scripts', 'my_frontend_wp_scripts' );


if (isset($_GET['page']) && ($_GET['page'] == 'page-backgroundcolor-changer/actions/admin_menu.php')) 
{ 
	add_action('admin_enqueue_scripts', 'page_background_admin_styles');
}
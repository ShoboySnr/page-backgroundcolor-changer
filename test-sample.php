<?php

// Register Custom Custom Page Background Color
function custom_page_backgroundcolor_changer() {

	$labels = array(
		'name'                  => _x( 'Custom Page Background Color', 'Custom Page Background Color General Name', 'page-backgroundcolor-changer' ),
		'singular_name'         => _x( 'Custom Page Background Color', 'Custom Page Background Color Singular Name', 'page-backgroundcolor-changer' ),
		'menu_name'             => __( 'Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'name_admin_bar'        => __( 'Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'archives'              => __( 'Custom Page Background Color Archives', 'page-backgroundcolor-changer' ),
		'attributes'            => __( 'Custom Page Background Color Attributes', 'page-backgroundcolor-changer' ),
		'parent_item_colon'     => __( 'Parent Custom Page Background Color:', 'page-backgroundcolor-changer' ),
		'all_items'             => __( 'All Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'add_new_item'          => __( 'Add New Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'add_new'               => __( 'Add New Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'new_item'              => __( 'New Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'edit_item'             => __( 'Edit Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'update_item'           => __( 'Update Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'view_item'             => __( 'View Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'view_items'            => __( 'View Custom Page Background Colors', 'page-backgroundcolor-changer' ),
		'search_items'          => __( 'Search Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'not_found'             => __( 'Not found', 'page-backgroundcolor-changer' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'page-backgroundcolor-changer' ),
		'featured_image'        => __( 'Featured Image', 'page-backgroundcolor-changer' ),
		'set_featured_image'    => __( 'Set featured image', 'page-backgroundcolor-changer' ),
		'remove_featured_image' => __( 'Remove featured image', 'page-backgroundcolor-changer' ),
		'use_featured_image'    => __( 'Use as featured image', 'page-backgroundcolor-changer' ),
		'insert_into_item'      => __( 'Insert into item', 'page-backgroundcolor-changer' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'page-backgroundcolor-changer' ),
		'items_list'            => __( 'Custom Page Background Colors list', 'page-backgroundcolor-changer' ),
		'items_list_navigation' => __( 'Custom Page Background Colors list navigation', 'page-backgroundcolor-changer' ),
		'filter_items_list'     => __( 'Filter items list', 'page-backgroundcolor-changer' ),
	);
	$args = array(
		'label'                 => __( 'Custom Page Background Color', 'page-backgroundcolor-changer' ),
		'description'           => __( 'Changing Background Color for Custom Pages, Posts and Categories', 'page-backgroundcolor-changer' ),
		'labels'                => $labels,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-art',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
    'supports'              => array('custom-fields'),
	);
	register_post_type( 'post_type', $args );

}
add_action( 'init', 'custom_page_backgroundcolor_changer', 0 );

function add_backgroundcolor_to_query() {

}

add_action('pre-get-posts', 'add_backgroundcolor_to_query');

add_action('init', 'init_remove_support',100);
function init_remove_support(){
    $post_type = 'custom_page_backgroundcolor_changer';
    remove_post_type_support( $post_type, 'editor');
}
<?php
/**
 * Post types functionality.
 */

add_action( 'init', 'fof_reporter_register_post_types' );
/**
 * Register custom post types.
 */
function fof_reporter_register_post_types() {

	$labels = array(
		'name'                  => _x( '404\'s', 'Post Type General Name', '404-reporter' ),
		'singular_name'         => _x( '404', 'Post Type Singular Name', '404-reporter' ),
		'menu_name'             => __( '404', '404-reporter' ),
		'name_admin_bar'        => __( '404', '404-reporter' ),
		'archives'              => __( 'Item Archives', '404-reporter' ),
		'parent_item_colon'     => __( 'Parent Item:', '404-reporter' ),
		'all_items'             => __( 'All Items', '404-reporter' ),
		'add_new_item'          => __( 'Add New Item', '404-reporter' ),
		'add_new'               => __( 'Add New', '404-reporter' ),
		'new_item'              => __( 'New Item', '404-reporter' ),
		'edit_item'             => __( 'Edit Item', '404-reporter' ),
		'update_item'           => __( 'Update Item', '404-reporter' ),
		'view_item'             => __( 'View Item', '404-reporter' ),
		'search_items'          => __( 'Search Item', '404-reporter' ),
		'not_found'             => __( 'Not found', '404-reporter' ),
		'not_found_in_trash'    => __( 'Not found in Trash', '404-reporter' ),
		'featured_image'        => __( 'Featured Image', '404-reporter' ),
		'set_featured_image'    => __( 'Set featured image', '404-reporter' ),
		'remove_featured_image' => __( 'Remove featured image', '404-reporter' ),
		'use_featured_image'    => __( 'Use as featured image', '404-reporter' ),
		'insert_into_item'      => __( 'Insert into item', '404-reporter' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', '404-reporter' ),
		'items_list'            => __( 'Items list', '404-reporter' ),
		'items_list_navigation' => __( 'Items list navigation', '404-reporter' ),
		'filter_items_list'     => __( 'Filter items list', '404-reporter' ),
	);
	$args = array(
		'label'                 => __( '404', '404-reporter' ),
		'description'           => __( '404 instances', '404-reporter' ),
		'labels'                => $labels,
		'menu_icon'             => 'dashicons-welcome-comments',
		'supports'              => array( ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'supports'              => array( 'title' ),
		'hierarchical'          => true,
		'capability_type'            => 'page',
		'capabilities' => array(
			'create_posts' => false,
		)
	);

	// Register 404 instances post type.
	register_post_type( '404_reporter_404', $args );

}

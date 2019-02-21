<?php
/**
* Custom Taxonomy and Post Type
**/
add_action( 'init', 'projects_post_type', 0 );
function projects_post_type() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'eruma-roku' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'eruma-roku' ),
		'menu_name'             => __( 'Projects', 'eruma-roku' ),
		'name_admin_bar'        => __( 'Project', 'eruma-roku' ),
		'archives'              => __( 'Item Archives', 'eruma-roku' ),
		'attributes'            => __( 'Item Attributes', 'eruma-roku' ),
		'parent_item_colon'     => __( 'Parent Item:', 'eruma-roku' ),
		'all_items'             => __( 'All Items', 'eruma-roku' ),
		'add_new_item'          => __( 'Add New Item', 'eruma-roku' ),
		'add_new'               => __( 'Add New', 'eruma-roku' ),
		'new_item'              => __( 'New Item', 'eruma-roku' ),
		'edit_item'             => __( 'Edit Item', 'eruma-roku' ),
		'update_item'           => __( 'Update Item', 'eruma-roku' ),
		'view_item'             => __( 'View Item', 'eruma-roku' ),
		'view_items'            => __( 'View Items', 'eruma-roku' ),
		'search_items'          => __( 'Search Item', 'eruma-roku' ),
		'not_found'             => __( 'Not found', 'eruma-roku' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'eruma-roku' ),
		'featured_image'        => __( 'Featured Image', 'eruma-roku' ),
		'set_featured_image'    => __( 'Set featured image', 'eruma-roku' ),
		'remove_featured_image' => __( 'Remove featured image', 'eruma-roku' ),
		'use_featured_image'    => __( 'Use as featured image', 'eruma-roku' ),
		'insert_into_item'      => __( 'Insert into item', 'eruma-roku' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'eruma-roku' ),
		'items_list'            => __( 'Items list', 'eruma-roku' ),
		'items_list_navigation' => __( 'Items list navigation', 'eruma-roku' ),
		'filter_items_list'     => __( 'Filter items list', 'eruma-roku' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'eruma-roku' ),
		'description'           => __( 'Web dev projects', 'eruma-roku' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'technology', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'projects', $args );
}
// Register Custom Taxonomy
add_action( 'init', 'technologies', 0 );
function technologies() {
	$labels = array(
		'name'                       => _x( 'Technologies', 'Taxonomy General Name', 'eruma-roku' ),
		'singular_name'              => _x( 'Technology', 'Taxonomy Singular Name', 'eruma-roku' ),
		'menu_name'                  => __( 'Technology', 'eruma-roku' ),
		'all_items'                  => __( 'All Items', 'eruma-roku' ),
		'parent_item'                => __( 'Parent Item', 'eruma-roku' ),
		'parent_item_colon'          => __( 'Parent Item:', 'eruma-roku' ),
		'new_item_name'              => __( 'New Item Name', 'eruma-roku' ),
		'add_new_item'               => __( 'Add New Item', 'eruma-roku' ),
		'edit_item'                  => __( 'Edit Item', 'eruma-roku' ),
		'update_item'                => __( 'Update Item', 'eruma-roku' ),
		'view_item'                  => __( 'View Item', 'eruma-roku' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'eruma-roku' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'eruma-roku' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'eruma-roku' ),
		'popular_items'              => __( 'Popular Items', 'eruma-roku' ),
		'search_items'               => __( 'Search Items', 'eruma-roku' ),
		'not_found'                  => __( 'Not Found', 'eruma-roku' ),
		'no_terms'                   => __( 'No items', 'eruma-roku' ),
		'items_list'                 => __( 'Items list', 'eruma-roku' ),
		'items_list_navigation'      => __( 'Items list navigation', 'eruma-roku' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'technology', array( 'projects' ), $args );
}
<?php
/**
 * TNI Custom Post Types.
 *
 * @package TNI_Review
 */

/**
 * Custom Post Type: Jobs
 */
function tni_custom_post_type_jobs() {

	$labels = array(
		'name'                => _x( 'Jobs', 'Post Type General Name', 'tnireview' ),
		'singular_name'       => _x( 'Jobs', 'Post Type Singular Name', 'tnireview' ),
		'menu_name'           => __( 'Jobs', 'tnireview' ),
		'parent_item_colon'   => __( 'Parent Job', 'tnireview' ),
		'all_items'           => __( 'All Jobs', 'tnireview' ),
		'view_item'           => __( 'View Job', 'tnireview' ),
		'add_new_item'        => __( 'Add New Job', 'tnireview' ),
		'add_new'             => __( 'Add New', 'tnireview' ),
		'edit_item'           => __( 'Edit Job', 'tnireview' ),
		'update_item'         => __( 'Update Job', 'tnireview' ),
		'search_items'        => __( 'Search Job', 'tnireview' ),
		'not_found'           => __( 'Not Found', 'tnireview' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'tnireview' ),
	);
	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Client Work Review', 'tnireview' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'taxonomies'          => array( 'category' ),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'post-formats', 'revisions' )
	);

	register_post_type( 'job', $args );
}
add_action( 'init', 'tni_custom_post_type_jobs');

/**
 * Custom Post Type: Portfolios
 */
function tni_custom_post_type_profiles() {
	$labels = array();
	$args = array();

	register_post_type( 'portfilio', $args );
}
//add_action( 'init', 'tni_custom_post_type_profiles', 0 );
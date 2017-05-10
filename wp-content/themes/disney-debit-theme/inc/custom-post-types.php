<?php
/**
 * Disney Debit Theme Custom Post Types
 *
 * @package Disney_Debit
 */

function register_card_post_type() {
	$labels = array(
		'name'               => 'Cards',
		'singular_name'      => 'Card',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Card',
		'edit_item'          => 'Edit Card',
		'new_item'           => 'New Card',
		'view_item'          => 'View Card',
		'search_items'       => 'Search Cards',
		'not_found'          =>  'No Cards found',
		'not_found_in_trash' => 'No Cards found in trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Cards'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-id',
		'show_in_rest'       => true,
		'supports'           => array('title','thumbnail')
	);

	register_post_type( 'card', $args );
}
add_action( 'init', 'register_card_post_type' );

/**
 * Create Offer post type
 *
 */
function register_offer_post_type() {
	$labels = array(
		'name'               => 'Offers',
		'singular_name'      => 'Offer',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Offer',
		'edit_item'          => 'Edit Offer',
		'new_item'           => 'New Offer',
		'view_item'          => 'View Offer',
		'search_items'       => 'Search Offers',
		'not_found'          => 'No Offers found',
		'not_found_in_trash' => 'No Offers found in trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Offers'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'offers'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-tickets',
		'supports'           => array('title','editor','thumbnail', 'excerpt')
	);

	register_post_type( 'offer', $args );
}
add_action( 'init', 'register_offer_post_type' );
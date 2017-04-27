<?php
/**
 * TNI Custom Groups for Clients.
 * @link https://wordpress.org/plugins/wp-user-groups/
 *
 * @package TNI_Review
 */

// Remove "Type" from groups plugin
remove_action( 'init', 'wp_register_default_user_type_taxonomy' );
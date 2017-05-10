<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Disney_Debit
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function disney_debit_theme_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Devices
	$is_ipad = strpos($_SERVER['HTTP_USER_AGENT'], 'iPad');
	$is_iphone = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone');

	// Browsers
	$is_firefox = strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox');
	$is_IE = strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT');

	if( wp_is_mobile() && false === $is_ipad ) {
		$classes[] = 'is-mobile';
	}

	// Devices
	if( $is_ipad ) {
		$classes[] = 'is-ipad';
	}

	if( $is_iphone ) {
		$classes[] = 'is-iphone';
	}

	if( $is_firefox ) {
		$classes[] = 'is-firefox';
	}

	if( $is_IE ) {
		$classes[] = 'is-ie';
	}

	return $classes;
}
add_filter( 'body_class', 'disney_debit_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function disney_debit_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'disney_debit_theme_pingback_header' );

<?php
/**
 * TNI Review functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TNI_Review
 */

if ( ! function_exists( 'tni_review_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tni_review_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TNI Review, use a find and replace
	 * to change 'tni-review' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tni-review', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tni-review' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tni_review_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'tni_review_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tni_review_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tni_review_content_width', 640 );
}
add_action( 'after_setup_theme', 'tni_review_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tni_review_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tni-review' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tni-review' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tni_review_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tni_review_scripts() {
	wp_enqueue_style( 'tni-review-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'tni-review-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// Add Material scripts and styles
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_enqueue_script( 'material-jquery', 'https://code.jquery.com/jquery-3.1.1.min.js', array(), '1.0', false );
	}
	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.css' );
	wp_enqueue_script( 'material-script', get_template_directory_uri() . '/js/materialize.js', array(), '1.0', false );
	wp_enqueue_script( 'material-custom', get_template_directory_uri() . '/js/material-custom-scripts.js', array(), '1.0', false );


	wp_enqueue_script( 'tni-review-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tni_review_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Custom Post Types.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load Custom Post Types.
 */
require get_template_directory() . '/inc/custom-roles.php';

/**
 * Load Groups.
 */
require get_template_directory() . '/inc/custom-groups-management.php';

/**
 * Load Custom Metaboxes.
 */
require get_template_directory() . '/inc/cmb2.php';

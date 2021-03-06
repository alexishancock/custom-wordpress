<?php
/**
 * Disney Debit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Disney_Debit
 */

if ( ! function_exists( 'disney_debit_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function disney_debit_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Disney Debit, use a find and replace
	 * to change 'disney-debit-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'disney-debit-theme', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'disney-debit-theme' ),
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
	add_theme_support( 'custom-background', apply_filters( 'disney_debit_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'disney_debit_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function disney_debit_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'disney_debit_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'disney_debit_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function disney_debit_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'disney-debit-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'disney-debit-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'disney_debit_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function disney_debit_theme_scripts() {
	wp_enqueue_style( 'disney-debit-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'disney-debit-theme-navigation', get_template_directory_uri() . '/js/libs/navigation.js', array(), 'v1', true );

	wp_enqueue_script( 'disney-debit-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/libs/skip-link-focus-fix.js', array(), 'v1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'disney-debit-theme-js', get_template_directory_uri() . '/js/debit-scripts.min.js', array( 'jquery' ), '1.0.0', true );
}

function disney_debit_library_scripts() {
	#Bootstrap
	wp_enqueue_script( 'disney-debit-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '', true);

	#Accessibility
	wp_enqueue_script( 'disney-debit-ally', 'https://cdnjs.cloudflare.com/ajax/libs/ally.js/1.4.1/ally.min.js', array(), '', true);

	#Animations
	wp_enqueue_style( 'disney-debit-animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css');
}

add_action( 'wp_enqueue_scripts', 'disney_debit_theme_scripts' );
add_action( 'wp_enqueue_scripts', 'disney_debit_library_scripts' );

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
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Custom SetUp
 */
require get_template_directory() . '/inc/class-disney-debit-setup.php';


require get_template_directory() . '/inc/custom-post-types.php';


require get_template_directory() . '/inc/custom-meta-boxes-init.php';

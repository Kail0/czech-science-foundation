<?php
/**
 * gacr functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gacr
 */

if ( ! function_exists( 'gacr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gacr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gacr, use a find and replace
	 * to change 'gacr' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gacr', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'gacr' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gacr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'gacr_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gacr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gacr_content_width', 640 );
}
add_action( 'after_setup_theme', 'gacr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gacr_widgets_init() {

	$args = array(
		'id'            => 'blog',
		'name'          => esc_html__( 'Blog', 'text_sidebar' ),
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'page',
		'name'          => esc_html__( 'Page', 'text_sidebar' ),
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'homepage',
		'name'          => esc_html__( 'Homepage', 'text_sidebar' ),
		'description'   => esc_html__( 'Widgets on the homepage', 'text_sidebar' ),
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		'before_widget' => '<div class="card"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
	);
	register_sidebar( $args );

	$args = array(
		'id'            => 'Homepage Button',
		'name'          => esc_html__( 'homepage-button', 'text_sidebar' ),
		'description'   => esc_html__( 'Buttons for specific items', 'text_sidebar' ),
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		'before_widget' => '<a class="waves-effect waves-light btn-large gacr-blue">',
		'after_widget'  => '</a>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'gacr_widgets_init' );


/*********************************************************************************************

Enqueue scripts and styles

*********************************************************************************************/
function gacr_scripts() {
// Add Material scripts and styles
	if( !is_admin()){
		
		wp_deregister_script('jquery');
		wp_register_script( 'material-jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), '2.2', 'in_footer' );
		wp_enqueue_script( 'material-jquery' );
	
	}
	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.css' );
	wp_enqueue_style( 'gacr-style', get_stylesheet_uri() );
	wp_enqueue_script('material-script', get_template_directory_uri().'/js/materialize.js', array(), '1.0', 'in_footer' );
	wp_enqueue_script('imhere', get_template_directory_uri().'/js/imhere.js', array(), '1.0', 'in_footer' );
	wp_enqueue_script('kailo_ticker', get_template_directory_uri().'/js/kailo_ticker.js', array(), '1.0', 'in_footer' );
	wp_enqueue_style('material-icons', '//fonts.googleapis.com/icon?family=Material+Icons' );
	// wp_enqueue_style('font-awesome', get_template_directory_uri().'/font/font-awesome/css/font-awesome.min.css' );

	wp_enqueue_script( 'gacr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gacr_scripts' );


/*********************************************************************************************

Post & Page Thumbnails Support

*********************************************************************************************/
add_theme_support( 'post-thumbnails' );
  // add_image_size( 'page-width', 800, 500, true );
  add_image_size( 'square', 500, 500, true );
  add_image_size( 'card-header', 892, 250, true ); // Page Header


/*********************************************************************************************

Hook Image size option into Media Library

*********************************************************************************************/
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'card-header' => __( 'Card Header' ),
        'square' => __( 'Square dimension' ),
    ) );
}

/*********************************************************************************************

DELETE PARAGRAPH TAGS on PAGE

*********************************************************************************************/
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

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

/*********************************************************************************************
Register Custom Navigation Walker
*********************************************************************************************/
require_once('inc/wp_md_pagination.php');
    ?>
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

/*-----------------------------------------------------------------------------------*/
/* Register main menu and drawer
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
    array(
        'Primary'   =>  __( 'Primary Menu', 'gacr' ),
        'Drawer'   =>  __( 'Side Menu', 'gacr' ),
        // Register the Primary menu and Drawer menu
        // Theme uses wp_nav_menu() in TWO locations.
        // Copy and paste the line above right here if you want to make another menu,
        // just change the 'primary' to another name
    )
);


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
	$GLOBALS['content_width'] = apply_filters( 'gacr_content_width', 900 );
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
		'before_title'  => '<h3 class="widget-title gacr-blue white-text">',
		'after_title'   => '</h3>',
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

/*-----------------------------------------------------------------------------------*/
/* Enqueue scripts and styles
/*-----------------------------------------------------------------------------------*/
function gacr_scripts() {
	if( !is_admin()){

        //register new jQuery
		wp_deregister_script('jquery');
		wp_register_script( 'material-jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2', 'in_footer' );
		wp_enqueue_script( 'material-jquery' );

	}
    // default material library
	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.css', array(),  '0.97.7' );

    // our own style
	wp_enqueue_style( 'gacr-style', get_stylesheet_uri() , array(), '0.2' );

    //MD loading transition
    wp_enqueue_style( 'MD-anime', get_template_directory_uri() . '/css/md-transition.min.css', array(), '0.2' );
    wp_enqueue_style( 'MD-anime-css', get_template_directory_uri() . '/css/animate.min.css', array(), '0.2' );

    // material icons
	wp_enqueue_style('material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), '0.2' );

    //load Roboto via Google's servers because Roboto is dickbutt which has glitches on different browsers
	wp_enqueue_style('roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,latin-ext', array(), '0.1' );

    //material JS library
	wp_enqueue_script('material-script', get_template_directory_uri().'/js/materialize.js', array(), '0.97.7', 'in_footer' );

    //our own JS library
	wp_enqueue_script('imhere', get_template_directory_uri().'/js/imhere.js', array(), '1.0', 'in_footer' );

    //standlone library for my ticker
	wp_enqueue_script('kailo_ticker', get_template_directory_uri().'/js/kailo.jquery.ticker.js', array(), '1.0', 'in_footer' );

    //MD loding transition
    wp_enqueue_script('MD-anime-js', get_template_directory_uri().'/js/jquery.md-transition.min.js', array(), '1.0', 'in_footer' );
    wp_enqueue_script('MD-oncreen-anime', get_template_directory_uri().'/js/jquery.onscreen.min.js', array(), '1.0', 'in_footer' );

	wp_enqueue_script( 'gacr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gacr_scripts' );

/*-----------------------------------------------------------------------------------
    Post & Page Thumbnails Support
-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );
  // add_image_size( 'page-width', 800, 500, true );
  add_image_size( 'square', 500, 500, true );
  add_image_size( 'card-header', 892, 250, true ); // Page Header


/*-----------------------------------------------------------------------------------
    Hook Image size option into Media Library
-----------------------------------------------------------------------------------*/
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'card-header' => __( 'Card Header' ),
        'square' => __( 'Square dimension' ),
    ) );
}


/*-----------------------------------------------------------------------------------
    Delete paragraphs on WP page and keep it in WP post page
-----------------------------------------------------------------------------------*/
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

/*-----------------------------------------------------------------------------------
    MD query for Recent Posts on Homepage
-----------------------------------------------------------------------------------*/
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

  function widget($args, $instance) {

    extract( $args );

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

    if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                                                        'posts_per_page' => 5,      //how many posts per page
                                                        'no_found_rows' => true,
                                                        'cat' => '3',               //what categories you want to show;'-' for exlude cat
                                                         'post_status' => 'publish',
                                                        'ignore_sticky_posts' => true
                                                        ) ) );
    if( $r->have_posts() ) :

      echo $before_widget;
      if( $title ) echo $before_title . $title . $after_title; ?>
      <ul class="collection rpwidget">
        <?php while( $r->have_posts() ) : $r->the_post(); ?>
        <li class="collection-item avatar">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/GACR-CZ_square_50x50x.png' ); ?>" class="alignleft circle" alt="GACR-CZ_RGB">
          <span class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
          <p><?php the_time('j. n. Y'); ?></p>
        </li>
        <?php endwhile; ?>
      </ul>

      <?php
      echo $after_widget;

    wp_reset_postdata();

    endif;
  }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

/*-----------------------------------------------------------------------------------
    Register MD pagination - WIP
-----------------------------------------------------------------------------------*/
// require get_template_directory() . '/inc/wp_md_pagination.php';

/*-----------------------------------------------------------------------------------
    Register Material menu
-----------------------------------------------------------------------------------*/
 require_once get_template_directory() . '/inc/wp_materialize_navwalker.php';

/*-----------------------------------------------------------------------------------
    INCLUDE ACF plugin (free) into theme
-----------------------------------------------------------------------------------*/
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/inc/acf/';

    // return
    return $path;

}
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';

    // return
    return $dir;
}
// 3. Hide ACF field group menu item
// add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

/*-----------------------------------------------------------------------------------
    Implement the Custom Header feature.
----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/custom-header.php';

/*-----------------------------------------------------------------------------------
    Custom template tags for this theme.
----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/template-tags.php';

/*-----------------------------------------------------------------------------------
    Custom functions that act independently of the theme templates.
 ----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/extras.php';

/*-----------------------------------------------------------------------------------
    Customizer additions.
 ----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/customizer.php';

/*-----------------------------------------------------------------------------------
    Load Jetpack compatibility file.
 ----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/jetpack.php';

/*-----------------------------------------------------------------------------------
    Disable style for TablePress (we are doing our own styling)
 ----------------------------------------------------------------------------------- */
add_filter( 'tablepress_use_default_css', '__return_false' );








?>
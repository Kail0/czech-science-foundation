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
	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.css', array(), '0.2' );
	wp_enqueue_style( 'gacr-style', get_stylesheet_uri() , array(), '0.2' );
	wp_enqueue_style('material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), '0.2' );
	wp_enqueue_style('roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,latin-ext', array(), '0.1' );
	wp_enqueue_script('material-script', get_template_directory_uri().'/js/materialize.js', array(), '1.0', 'in_footer' );
	wp_enqueue_script('imhere', get_template_directory_uri().'/js/imhere.js', array(), '1.0', 'in_footer' );
	wp_enqueue_script('kailo_ticker', get_template_directory_uri().'/js/kailo_ticker.js', array(), '1.0', 'in_footer' );

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

/**********************************************
DELETE PARAGRAPH TAGS on PAGE
**********************************************/
function remove_p_on_pages() {
    if ( is_page() ) {
        remove_filter( 'the_content', 'wpautop' );
        remove_filter( 'the_excerpt', 'wpautop' );
    }
}
add_action( 'wp_head', 'remove_p_on_pages' );

/**********************************************
RECENT POST STYLE
**********************************************/
Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

  function widget($args, $instance) {

    extract( $args );

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

    if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                                                        'posts_per_page' => 5,
                                                        'no_found_rows' => true,
                                                        'cat' => '3',
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

class Hello_World_Dashboard_Widget {

    public function __construct() {
        
        add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );

    }

    public function add_dashboard_widget() {

        wp_add_dashboard_widget(
            'hello_world_widget',
            __( 'Hello World', 'text_domain' ),
            array( $this, 'render_dashboard_widget' )
        );

    }

    public function render_dashboard_widget() {
        echo "Hello World...";
    }

}

new Hello_World_Dashboard_Widget;



/* WIDGET*/
class Events_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'events_widget',
            __( 'Latest Events Widget', 'text_domain' ),
            array(
                'description' => __( 'Show the latest events.', 'text_domain' ),
                'classname'   => 'widget_events',
            )
        );

    }

    public function widget( $args, $instance ) {

        $title  = ( ! empty( $instance['events_title']  ) ) ? $instance['events_title'] : __( 'Recent Events' );
        $number = ( ! empty( $instance['events_number'] ) ) ? absint( $instance['events_number'] ) : 5;

        if ( ! $number )
            $number = 5;

        // Before widget tag
        echo $args['before_widget'];

        // Title
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Recent Posts
        $query = new WP_Query( array (
            'post_type'           => 'events',
            'posts_per_page'      => $number,
            'ignore_sticky_posts' => true
        ) );
        if ( $query->have_posts() ) :

            echo '<ul>';
            while ( $query->have_posts() ) : $query->the_post();
                $post_title = ( get_the_title() ? get_the_title() : get_the_ID() );
                echo '<li>';
                echo '<strong><a href="' . get_permalink() . '">' . $post_title . '</a></strong><br>' . get_the_date() . '</span>';
                echo '</li>';
            endwhile;
            echo '</ul>';

        endif;
        wp_reset_postdata();

        // After widget tag
        echo $args['after_widget'];

    }

    public function form( $instance ) {

        // Set default values
        $instance = wp_parse_args( (array) $instance, array( 
            'events_title' => '',
            'events_number' => '',
        ) );

        // Retrieve an existing value from the database
        $events_title = !empty( $instance['events_title'] ) ? $instance['events_title'] : '';
        $events_number = !empty( $instance['events_number'] ) ? $instance['events_number'] : '';

        // Form fields
        echo '<p>';
        echo '  <label for="' . $this->get_field_id( 'events_title' ) . '" class="events_title_label">' . __( 'Title', 'text_domain' ) . '</label>';
        echo '  <input type="text" id="' . $this->get_field_id( 'events_title' ) . '" name="' . $this->get_field_name( 'events_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $events_title ) . '">';
        echo '  <span class="description">' . __( 'The widget title.', 'text_domain' ) . '</span>';
        echo '</p>';

        echo '<p>';
        echo '  <label for="' . $this->get_field_id( 'events_number' ) . '" class="events_number_label">' . __( 'Events to show', 'text_domain' ) . '</label>';
        echo '  <input type="number" id="' . $this->get_field_id( 'events_number' ) . '" name="' . $this->get_field_name( 'events_number' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $events_number ) . '">';
        echo '  <span class="description">' . __( 'The number of events to show.', 'text_domain' ) . '</span>';
        echo '</p>';

    }

    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['events_title'] = !empty( $new_instance['events_title'] ) ? strip_tags( $new_instance['events_title'] ) : '';
        $instance['events_number'] = !empty( $new_instance['events_number'] ) ? strip_tags( $new_instance['events_number'] ) : '';

        return $instance;

    }

}

function events_register_widgets() {
    register_widget( 'Events_Widget' );
}
add_action( 'widgets_init', 'events_register_widgets' ); 

?>
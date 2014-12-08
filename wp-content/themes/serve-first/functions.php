<?php
/**
 * serve-first functions and definitions
 *
 * @package serve-first
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'serve_first_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function serve_first_setup() {
    
    
    // This theme styles the visual editor to resemble the theme style.
        $font_url = 'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900,900italic|PT+Serif:400,700,400italic,700italic';
        add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
                

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on serve-first, use a find and replace
	 * to change 'serve-first' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'serve-first', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
        add_image_size('large-thumb', 1060, 650, true);
        add_image_size('index-thumb', 780, 250, true);
        //front page testimonial pictures
        add_image_size('testimonial-mug', 253, 253, true);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'serve-first' ),
                'social' => __('Social Menu', 'serve-first'),
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
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array( 'aside' ) );

	// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'serve_first_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // serve_first_setup
add_action( 'after_setup_theme', 'serve_first_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function serve_first_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'serve-first' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
        register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'serve-first' ),
		'id'            => 'sidebar-2',
		'description'   => __('Footer widgets area appears in the footer of the site.', 'serve-first'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'serve_first_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function serve_first_scripts() {
	wp_enqueue_style( 'serve-first-style', get_stylesheet_uri() );
        
       if (is_front_page()){
           wp_enqueue_style('serve-first-front-page-style',  get_stylesheet_directory_uri() . '/layouts/front-page.css');
           wp_enqueue_script('serve-first-front-page-script',get_stylesheet_directory_uri() . '/js/frontpagescript.js', array('jquery'), "20141202");
       }
        //this if block is for page templates style sheets 
       if (is_page_template('page-templates/page-nosidebar.php')) {
            wp_enqueue_style( 'serve-first-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
        } else {
            wp_enqueue_style( 'serve-first-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
        }
        
        wp_enqueue_style('serve-first-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic');
        
        wp_enqueue_style('serve-first-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
         
        wp_enqueue_script( 'serve-first-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20141118', true );
        
        wp_enqueue_script( 'serve-first-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('serve-first-superfish'), '20141118', true );
        
        wp_enqueue_script( 'serve-first-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20141118', true );
               
	wp_enqueue_script( 'serve-first-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        
	wp_enqueue_script( 'serve-first-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        
        wp_enqueue_script( 'serve-first-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140401', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'serve_first_scripts' );

/*excluding testimonials from news page*/
function exclude_testimonials( $query ) {
    if ( !$query->is_category('testimonial') && $query->is_main_query() ) {
        $query->set( 'cat', '-191' );
    }
}
add_action( 'pre_get_posts', 'exclude_testimonials' );

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

<?php
/**
 * Professional functions and definitions
 *
 * @package Professional
 */

/**
 * Redux Framework
 */
require get_template_directory() . '/assets/frameworks/redux/admin/admin-init.php';
require get_template_directory() . '/options.php';



if ( ! function_exists( 'professional_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function professional_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'professional', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'professional' ),
		'footer' => __( 'Footer Menu', 'professional' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'professional_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	//Register custom thumbnail sizes
	add_image_size('grid',350,350,true); //For the Grid layout
	add_image_size('grid2',430,292,true); //For the Grid2 layout
	
}
endif; // professional_setup
add_action( 'after_setup_theme', 'professional_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function professional_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'professional' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'sidebar-primary',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'professional' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'professional' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'professional' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );	
}
add_action( 'widgets_init', 'professional_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function professional_scripts() {

	//Load Default Stylesheet
	wp_enqueue_style( 'professional-style', get_stylesheet_uri() );
	
	//Load Font Awesome CSS
	wp_enqueue_style('font-awesome', get_template_directory_uri()."/assets/frameworks/font-awesome/css/font-awesome.min.css");
	
	//Load Bootstrap CSS
	wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/frameworks/bootstrap/css/bootstrap.min.css");
	
	//Load BxSlider CSS
	wp_enqueue_style('bxslider-style',get_template_directory_uri()."/assets/css/bxslider.css");
	
	//Load Theme Structure File. Contains Orientation of the Theme.
	wp_enqueue_style('professional-theme-structure', get_template_directory_uri()."/assets/css/main.css");

	//Load the File Containing Color/Font Information
	wp_enqueue_style('professional-theme-style', get_template_directory_uri()."/assets/css/theme.css");
	
	//Load Tooltipster Plugin Style
	wp_enqueue_style('tooltipster-style', get_template_directory_uri()."/assets/css/tooltipster.css");
	
	//Load Bootstrap JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/frameworks/bootstrap/js/bootstrap.min.js", array('jquery'));

	//Load Bx Slider Js 
	wp_enqueue_script('bxslider-js', get_template_directory_uri()."/assets/js/bxslider.min.js", array('jquery'));

	//Tooltipster JS
	wp_enqueue_script('tooltipster-js', get_template_directory_uri()."/assets/js/tooltipster.js", array('jquery'));
	
	//Tooltipster JS
	wp_enqueue_script('waypoint-js', get_template_directory_uri()."/assets/js/waypoints.js", array('jquery'));

	//Load Theme Specific JS
	wp_enqueue_script('custom-js', get_template_directory_uri()."/assets/js/custom.js", array('jquery','hoverIntent'));


	//Load Navigation js. This is Responsible for Converting the Main Menu into Responsive, when the browser width is switched.
	wp_enqueue_script( 'professional-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	//Comes with _s Framework.
	wp_enqueue_script( 'professional-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	//For the Default WordPress Comment's Reply System
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'professional_scripts' );

/*
 *	This function Contains All The scripts that Will be Loaded in the Theme Header including Slider, Custom CSS, etc.
 */
function professional_initialize_header() {
	
	global $option_setting; //Global theme options variable
	
	//Place all Javascript Here
	echo "<script>"; ?>
			jQuery(document).ready(function(){
					jQuery('.bxslider').bxSlider( {
					mode: 'fade',
					speed: 1000,
					captions: true,
					minSlides: 1,
					maxSlides: 1,
					adaptiveHeight: true,
					auto: true,
					preloadImages: 'all',
					pause: 5000,
					autoHover: true } );
					});	
	
	<?php
	
	
	echo "</script>";
	//Java Script Ends
	
	//CSS Begins
	echo "<style>";
	
	// Echo the Custom CSS Entered via Theme Options
	echo $option_setting['custom-css'];	
	
	echo "</style>";
	//CSS Ends
	
	
}
add_action('wp_head', 'professional_initialize_header');

/*
 * Pagination Function. Implements core paginate_links function.
 */
function professional_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}
/*
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
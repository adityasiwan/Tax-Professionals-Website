<?php /** * Theme's Functions and Definitions
 * @file           functions.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appointment/functions.php
 */
		define('WEBRITI_TEMPLATE_DIR',get_template_directory());
		define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');		
		require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/comments.php');		
		require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/menu/appointment_nav_walker.php');
		require_once( WEBRITI_THEME_FUNCTIONS_PATH. '/menu/default_menu_walker.php');
		require_once ( WEBRITI_THEME_FUNCTIONS_PATH .'/Excerpt/excerpt_length.php' );// code for limit the length of excerpt
		require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/sidebar/reg_sidebar.php');
		require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/webriti/webriti_theme.php'); //admin page subscriber from		
	if ( ! isset( $content_width ) ) $content_width = 700;
	add_action('add_meta_boxes','appointment_slider_meta');
	function appointment_slider_meta() {	 
		add_action('admin_enqueue_scripts', 'appointment_admin_enqueue_script'); 
		function appointment_admin_enqueue_script(){
		wp_enqueue_script('my-upload-admin',get_template_directory_uri() .'/js/media-upload-script.js');
		} 
		$screens = array( 'post' );
		foreach ($screens as $screen) {
			add_meta_box(
				'slider_section',
				__( 'HomePage Slider', 'appointment' ),
				'appointment_slider_custom_box',
				$screen
			);
			}
		}	
	function appointment_slider_custom_box( $post ) {
	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'webriti_noncename' );
	// The actual fields for data entry
	// Use get_post_meta to retrieve an existing value from the database and use the value for the form
	$value = get_post_meta( $post->ID, '_meta_value_key', true );?>  
	<div class="wp-media-buttons" id="wp-content-media-buttons">
		<?php $src= get_post_meta( get_the_ID(), '_meta_image', true );$cp= get_post_meta( get_the_ID(), '_meta_caption', true );
			echo '<label for="appointment_img_caption">';
			   _e("Image Caption", 'appointment' );
		  echo '</label> ';?>
	<input type="textarea" id="appointment_img_caption" name="appointment_img_caption" value="<?php if (!empty($cp)) echo $cp ?>" size="25" />
	<br />
	<?php _e('Upload Image','appointment');?>: <input  class="upload" type="text" size="36" name="upload_image" value="<?php if(!empty($src)) echo $src?>" />
	<input class="upload_image_button" type="button" value="<?php _e('Add File','appointment');?>" /><br />
	</div>
	<?php } 
		add_action( 'save_post', 'appointment_save_slider_data' );
		function appointment_save_slider_data( $post_id ) {
		 if ( ! current_user_can( 'edit_page', $post_id ) ){
				return ;
		  } 
		  if ( ! isset( $_POST['webriti_noncename'] ) || ! wp_verify_nonce( $_POST['webriti_noncename'], plugin_basename( __FILE__ ) ) )
		  return ;
		  $post_ID = $_POST['post_ID'];
		  echo $post_ID;

		  $caption = sanitize_text_field( $_POST['appointment_img_caption'] );
		  $meta_image = sanitize_text_field( $_POST['upload_image'] );
		add_post_meta($post_ID, '_meta_caption', $caption, true) or
		update_post_meta($post_ID, '_meta_caption', $caption);		
		add_post_meta($post_ID, '_meta_image', $meta_image, true) or
		update_post_meta($post_ID, '_meta_image', $meta_image);				 
		}		
		//enqueue scripts
		  add_action('wp_enqueue_scripts','appointment_enqueue_script');
			function appointment_enqueue_script() {
		   wp_enqueue_style('appointment_style', get_template_directory_uri().'/style.css');
		   wp_enqueue_style('appointment_bootstrap', get_template_directory_uri().'/css/bootstrap.css');
		   wp_enqueue_style('appointment_bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css');
		   wp_enqueue_style('appointment_docs', get_template_directory_uri().'/css/docs.css');
		   wp_enqueue_style('font',get_template_directory_uri().'/css/font/font.css');		  
		   if ( is_singular() ) wp_enqueue_script( "comment-reply" );
			if(!is_admin())
			{	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js',array('jquery'));
				wp_enqueue_script('bootstrap-transition', get_template_directory_uri().'/js/bootstrap-transition.js');
			}
			//menu js
			  wp_enqueue_script('menu', get_template_directory_uri().'/js/menu/menu.js');
			  wp_enqueue_script('menus_1',get_template_directory_uri().'/js/menu/bootstrap.min.js'); 
			}	
			add_action('after_setup_theme', 'appointment_setup_theme');
			function appointment_setup_theme(){
			load_theme_textdomain('appointment', get_template_directory() . '/languages');
				if ( function_exists( 'add_theme_support' ) ) 
				{	add_theme_support( 'post-thumbnails' );
					add_theme_support( 'automatic-feed-links' );					
					$header_args = array(
					'flex-width'    => true,
					'width'         => 200,
					'flex-height'    => true,
					'height'        => 40,
					'default-image' => get_template_directory_uri() . '/images/logo.png',
					);
					add_theme_support( 'custom-header', $header_args );
					// Add support for a variety of post formats
					add_theme_support( 'post-formats', array(   'aside','link', 'gallery', 'status', 'quote', 'image','chat','audio','video' ) );
			}
			register_nav_menus(	array( 'header-menu' => __('Header Menu','appointment') ));
			add_editor_style( get_template_directory_uri() . '/custom-editor-style.css' );
			}
			add_filter( 'the_password_form', 'appointment_custom_password_form' );
			function appointment_custom_password_form()
			{	global $post;
				$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
				$output = '<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-pass.php" method="post">
				' . __( "This post is password protected. To view it please enter your password below:",'appointment' ) . '
				<label for="' . $label . '">' . __( "Password:",'appointment' ) . ' </label><input name="search_form" id="' . $label . '" type="password" size="20" />
				<input type="submit" class="btn appo_btn"	name="Submit" value="' . esc_attr__( "Submit",'appointment' ) . '" /></form>';
				return $output;
			}
add_theme_support( 'woocommerce' );
?>
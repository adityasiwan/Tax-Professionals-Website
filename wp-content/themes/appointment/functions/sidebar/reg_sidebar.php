<?php
//code for register sidebar
add_action( 'widgets_init', 'appointment_widgets_init');
function appointment_widgets_init() {
/*sidebar*/
register_sidebar( array(
		'name' => __( ' Sidebar', 'appointment' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'appointment' ),
		'before_widget' => '<div class="widget widget_archive">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
/*footer sidebar*/
register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'appointment' ),
		'id' => 'footer-widget-area',
		'description' => __( 'The first footer widget area', 'appointment' ),
		'before_widget' => '<div class="span3">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="app-widget-title">',
		'after_title' => '</h2>',
	) );
}
?>
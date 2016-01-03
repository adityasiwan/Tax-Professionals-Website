<?php 
/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/footer.php
*/
?>
<!-- Footer_Widget_area -->
<div class="hero-unit-footer">
	<div class="container">
		<div class="row-fluid">
			<?php if ( is_active_sidebar( 'footer-widget-area' ))
				{  	dynamic_sidebar('footer-widget-area' );   } else { ?>
				<div class="span3"> <?php the_widget('WP_Widget_Archives'); ?>	</div>
				<div class="span3">  <?php the_widget('WP_Widget_Categories'); ?>	</div>	 
				<div class="span3"> <?php the_widget('WP_Widget_Meta'); ?></div>               	 
				<div class="span3">	 <?php  the_widget('WP_Widget_Pages'); ?></div>
			<?php }  ?>					
		</div>
	</div>
</div>
<!-- /Footer_Widget_area -->
<!-- Footer -->
<div class="container">
	<div class="row-fluid">
		<div class="span12 footer_space">
			<div class="span8">
				<p><?php _e(' Powered by ', 'appointment'); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'appointment' ) ); ?>"><?php _e('WordPress', 'appointment'); ?></a>			
				<?php bloginfo(); ?> <?php echo date( 'Y' ); ?>. <?php _e( 'Designed by', 'appointment' ); ?> <a rel="nofollow" href="<?php echo esc_url( __( 'http://webriti.com/','appointment' ) ); ?>"><?php _e( 'Appointment &copy;', 'appointment' ); ?></a>
				<?php _e( 'All Rights Reserved.', 'appointment' ); ?>
				</p>
            </div>
		<div class="span4">
		</div>
		</div>
	</div>
<?php wp_footer(); ?> 
<!-- /Footer -->
</body>
</html>
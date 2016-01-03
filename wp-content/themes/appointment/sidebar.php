<?php
/**
 * Sidebar Template
 *
 @file            sidebar.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/sidebar.php
*/ 
?>
<div class="span4 appo_sidebar" id="sidebar">
  <?php if ( !dynamic_sidebar('sidebar-primary') ) : ?>  
		<?php the_widget('WP_Widget_Archives'); ?>
		<?php the_widget('WP_Widget_Categories'); ?>
		<?php the_widget('WP_Widget_Meta'); ?>
		<?php the_widget('WP_Widget_Pages'); ?>
	<?php endif;?>
</div>
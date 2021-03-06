<?php
/**
 * 404 Template
 * @file           404.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/404.php
 */
get_header();
get_template_part('orange','header');
?><div class="container">
	<div class="_blank"></div>
		<!--- Main ---> 
		<div class="row-fluid">
		<div class="span8"  >
				<h2 class="blog-detail-head"><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. ', 'sis_spa' ); ?></h2>
					 <div class="blog_content"><p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sis_spa' ); ?></p></div>
					<?php get_search_form(); ?>
				<!-- .entry-content -->
		</div>
		<?php get_sidebar (); ?>
		</div><!-- #content -->
	</div><!-- #primary -->
		<div class="_blank"></div>	<div class="_blank"></div>	<div class="_blank"></div>	<div class="_blank"></div>
<?php get_footer(); ?>
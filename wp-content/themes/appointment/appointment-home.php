<?php  //Template Name:Business Home Page
/**
 * appointment-home.php 
 * @file           appointment-home.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/appointment-home.php
 */
get_header();
get_template_part('index','slider'); ?>
<!-- Main_area -->
	<div class="container">
		<div class="row-fluid">
		<div class="span12 main_space">
			<!-- Main_content -->
			<div class="span8 appo_main_content">
			<?php $paged = $_GET['paged'] ? $_GET['paged'] : 1; 			
				$args = array( 'post_type' => 'post','paged'=>$paged);
				query_posts( $args );
				
			while(have_posts()): the_post();?>
			<div class="row-fluid appo_blog">
				<?php get_template_part('content',get_post_format());  ?>
			</div>
			<?php endwhile; ?>
			
			<div class="pagination">	
			<ul>
			<li><?php previous_posts_link(); ?></li>
			<li><?php next_posts_link(); ?></li>
			</ul>
			</div>		
			</div><!--appo_main_content-->			
			<!-- sidebar section -->
		<?php get_sidebar();?>	  
		</div>
		</div>
	</div>
<!-- /Main_area -->	  
<?php get_footer(); ?>
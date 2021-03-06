<?php 
/**
 * Content-Single  Template
 *
 *
 * @file           content-single .php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/content-single.php
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> </div>
			<h3 class="main_title"><?php the_title(); ?></h3>
			<?php if(has_post_thumbnail()):?>    
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?>
			</a>
            <?php endif;?>
            <?php if ( post_password_required() ) : ?>
			<div class="blog_con_mn">
			<?php the_content(__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'appointment' ) ); ?>
			</div>
			<div class="pagination">
				<ul><?php 
						 $args=array('before' => '<li>'.__('Pages:','appointment'),'after' => '</li>');
						 wp_link_pages($args); ?>
				</ul>
			</div>
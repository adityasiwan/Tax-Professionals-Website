<?php 
/**
 * Content-Image  Template
 *
 *
 * @file           content-image.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointpress
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/content-image.php
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h3 class="main_title">
	<a class="blog_title-anchor" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
	</h3>
	<ul class="the-icons clearfix">
	<li><i class="icon-calendar"></i> <?php the_time('M j,Y');?></li>	
	<li><i class="icon-comment"></i>  <?php  comments_popup_link( __( 'Leave a comment', 'appointment' ),__( '1 Comment', 'appointment' ), __( 'Comments', 'appointment' ),'name' ); ?></li>
	<li><i class="icon-edit"></i><?php edit_post_link( __( 'Edit', 'appointment' ), '<span class="meta-sep"></span> <span class="name">', '</span>' ); ?></li>
	 <li><i class="icon-ok-circle">  </i></li> <li><?php the_category(); ?><li>				 
	</ul>
	<?php if ( comments_open() && ! post_password_required() ) : ?>
	<div class="comments-link">
		<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'appointment' ) . '</span>', _x( '1', 'comments number', 'appointment' ), _x( '%', 'comments number', 'appointment' ) ); ?>
	</div>
	<?php endif; ?>
	 <div class="blog_con_mn">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'appointment' ) ); ?>
	 </div>
	<?php if(wp_link_pages(array('echo'=>0))):?>
	<div class="pagination"><ul><?php 
	 $args=array('before' => '<li>'._e('Pages:','appointment'),'after' => '</li>');
	 wp_link_pages($args); ?></ul>
	</div>
	 <?php endif;?>
	<div class="blog_bot_mn">
	<button class="btn appo_btn" type="button">
	<a href="<?php the_permalink(); ?>" class="blog_rdmore"> <?php _e('Read More','appointment'); ?> </a>
	</button>
	<p class="tag-element"> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </p>
	</div><!--blog_bot_mn-->
</article>
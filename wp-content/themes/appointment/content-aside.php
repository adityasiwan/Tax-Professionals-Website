<?php 
/**
 * Content-Aside  Template
 *
 *
 * @file           content-aside.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/content-aside.php
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h3 class="main-title">
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
		<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
		<?php if ( post_password_required() ) : ?>	
		<p><?php  the_content(); ?></p>
		<div class="blog_bot_mn">
			<span> <?php the_tags('<b>Tags:</b>','appointment');?> </span>
		</div>
		<?php else:?>
		<p><?php  the_excerpt(); ?></p>
		<?php endif; ?>
		<?php if(wp_link_pages(array('echo'=>0))):?>
		<div class="pagination"><ul><?php 
		$args=array('before' => '<li>','after' => '</li>');
		wp_link_pages($args); ?></ul>
		</div>
		<?php endif; ?>
<?php  endif;?>		
</article>
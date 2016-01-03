<?php 
/**
 * Content-Gallery  Template
 *
 *
 * @file           content-gallery.php
 * @package        Appointment
 * @author         webriti
 * @copyright      2014 Appointment
 * @license        license.txt
 * @filesource     wp-content/themes/appoinment/content-gallery.php
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
	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
		<p><?php the_excerpt(); ?></p><!-- .entry-summary -->
		<?php else : ?>
        <div class="blog_con_mn">
			<?php if ( post_password_required() ) : ?>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'appointment' ) ); ?>
			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
				<div class="img_gallery">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'appointment' ),
						'href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'appointment' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark"',
						number_format_i18n( $total_images )
					); ?></em>
				</p>
				<?php endif; ?>
				<?php the_excerpt(); ?>
				<?php endif; ?>
		</div><!-- .entry-content -->
		<?php if(wp_link_pages(array('echo'=>0))):?>
		<div class="pagination"><ul><?php 
		$args=array('before' => '<li>','after' => '</li>');
		wp_link_pages($args); ?></ul></div>
		<?php endif;?>
		<?php endif?>
		<div class="blog_bot_mn">
		<p class="tag-element"> <?php the_tags('<b>'.__('Tags:','appointment').'</b>','');?> </p>
		</div><!--blog_bot_mn-->
</article>
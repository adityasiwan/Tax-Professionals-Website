<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'professional' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'professional' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->

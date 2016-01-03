<?php
/**
 * @package Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php professional_posted_on(); ?>
		</div><!-- .entry-meta -->
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

	<footer class="entry-footer footer-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'professional' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'professional' ) );

			if ( ! professional_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( '<i class="fa fa-tags"></i> %2$s <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Permalink</a>', 'professional' );
				} else {
					$meta_text = __( '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Permalink</a>', 'professional' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( '<i class="fa fa-folder-open"></i> %1$s <i class="fa fa-tags"></i> %2$s <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Permalink</a>', 'professional' );
				} else {
					$meta_text = __( '<i class="fa fa-folder-open"></i> %1$s <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">Permalink</a>', 'professional' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'professional' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

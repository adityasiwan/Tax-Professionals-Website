<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Professional
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<span>
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'professional' ), get_the_author() );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'professional' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'professional' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'professional' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'professional' ), get_the_date( _x( 'Y', 'yearly archives date format', 'professional' ) ) );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'professional');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'professional');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'professional' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'professional' );

						else :
							_e( 'Archives', 'professional' );

						endif;
					?>
					</span>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->
			<?php $count = 0; ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if($count == 0)
						echo "<div class='row'>" ;
					elseif($count%2 == 0)
						echo "</div><!--.row--><div class='row'>";
					 
					get_template_part( 'content', 'grid2' );
					
					$count++;
				?>

			<?php endwhile; ?>
			<?php echo "</div><!--.row-->"; ?>
			
			<?php professional_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

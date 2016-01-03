<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Professional
 */

get_header(); ?>

	<section id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'professional' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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

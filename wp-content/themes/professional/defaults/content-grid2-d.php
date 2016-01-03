<?php
/**
 * @package Professional
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 grid2'); ?>>

		<div class="featured-thumb col-md-6">
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/defaults/images/dimg".mt_rand(1,7).".jpg"; ?>"></a>
		</div><!--.featured-thumb-->
			
		<div class="out-thumb col-md-6">
			<header class="entry-header">
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				<div class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,200)."..."; ?></div>
				<div class="readmore"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e('Read More...','professional') ?></a></div>
			</header><!-- .entry-header -->
		</div><!--.out-thumb-->
			
		
		
</article><!-- #post-## -->
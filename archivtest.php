	<?php 
	/*+ 
	Template Name: Archivtest 
	*/
	get_header(); ?>
		<div id="articles" class="columns"><div class="columns-wrapper">

				<?php
				/* Shows up to 8 posts, excluding the first 5 */
					if ( have_posts() ) : query_posts('showposts=8&offset=6'); while ( have_posts() ) : the_post();
					endwhile; endif; 
				?>

			</div></div><!-- articles -->

		</div><!-- content -->
		
		<?php get_sidebar(); ?>

	</div><!-- website -->

	<?php get_footer(); ?>
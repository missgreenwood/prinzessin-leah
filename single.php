		<?php get_header(); ?>



			<article>

				<h1><?php the_title(); ?></h1>

				<?php
					if (has_post_thumbnail()) {
						// check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					}
				?>

				<?php

					// Was zum Teufel: the_content();
					// $content = get_post_field('post_content', $post->ID);

					$content = apply_filters('the_content', $post->post_content);
					$content = str_replace(']]>', ']]&gt;', $content);

					echo $content;
				?>

			</article>


		</div><!-- content -->

		<?php get_sidebar(); ?>

	</div><!-- website -->

	<!-- include footer.php -->
	<?php get_footer(); ?>
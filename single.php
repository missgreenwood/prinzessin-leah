		<?php get_header(); ?>

			<!--

			SINGLE PAGE

			-->

			<article>

				<?php

					$medium = "Artikel";
					$tag = "";

					// get medium type
					$terms = get_the_terms( $post->ID , 'medium' );
					if (is_array($terms) AND count($terms) > 0) {
						$medium = array_shift($terms)->name;
					}

					// Build tag list
					$tags = wp_get_post_tags( $post->ID );
					for ($i = 0; $i < count($tags); $i++) {
						$tag .= '<span>' . $tags[$i]->name . '</span> ';
					}

					// medium-taxonomy + tag(s)
					echo '<strong class="title-meta">' . $medium . " &bull; " . $tag . '</strong>' . PHP_EOL;

				?>

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
		<?php get_header(); ?>
		<!-- div#content -->

			<!-- 
				Baustelle
				Layout kommt
			-->
			
			<div id="articles" class="columns"><div class="columns-wrapper">
			
				<h1><?php the_title(); ?></h1>

				<?php
					
					// Was zum Teufel: the_content();
					// $content = get_post_field('post_content', $post->ID);

					$content = apply_filters('the_content', $post->post_content);
					$content = str_replace(']]>', ']]&gt;', $content);

					echo $content;
				?>

			</div></div>


		</div><!-- content -->
	
		<?php get_sidebar(); ?>

	</div><!-- website -->

	<!-- include footer.php -->
	<?php get_footer(); ?>
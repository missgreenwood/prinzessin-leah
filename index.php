	<!-- include header.php -->
	<?php get_header(); ?>

	<?

		$COLUMNS_START = '<div class="columns row"><div class="columns-wrapper">'.PHP_EOL;
		$COLUMNS_END = '</div></div>'.PHP_EOL;

		$COLUMN_LEFT = '<div class="left column">'.PHP_EOL;
		$COLUMN_RIGHT = '<div class="right column">'.PHP_EOL;
		$COLUMN_END = '</div>'.PHP_EOL;

		/*

		- benötigte Anzahl an Posts laden (~"post count")
			-> Anzahl = 1(Hauptartikel) + 2 * <rowcount>(Mitte) + <rowcount> + 1(Seitenspalte, neben Haupt)
			=> Anzahl = 2 + 3*<rowcount>

		A. Alle posts laden, dann einige in Hauptspalte, einige in Seitenspalte ausgeben
			- while loop macht das nicht mit => for - loop?


			get_posts() parameters:
			array(
				'posts_per_page'   => 5,
				'offset'           => 0,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true ); ?>
		*/

		// In Settings: 8 posts
		// $posts = get_posts(array(
		// 	'posts_per_page'   => 5,
		// ));
		// $count = count($posts);
		// $current_post_index = 0;

		$count = $wp_query->post_count;

		echo "<!--";
		var_dump();
		echo "-->";
	?>


	<div id="articles" class="columns"><div class="columns-wrapper">

			<!-- HAUPTSPALTE -->
			<div id="column-main" class="left column">

				<!-- ERSTER ARTIKEL -->
				<div id="latest">

					<?php
						// Lade den nächsten Post als globales Objekt
						the_post();
						// Update current post count
						$current_post_index += 1;
						// print post
						print_post_teaser($post);
					?>

				</div>
				<!-- ENDE ERSTER ARTIKEL -->

				<?php

					/*
						CENTER
					 */

					echo $COLUMNS_START;

						echo $COLUMN_LEFT;

							the_post();
							$current_post_index += 1;
							print_post_teaser($post);

						echo $COLUMN_END;


						echo $COLUMN_RIGHT;

							the_post();
							$current_post_index += 1;
							print_post_teaser($post);

						echo $COLUMN_END;

					echo $COLUMNS_END;

				?>

			</div>
			<!-- ENDE HAUPTSPALTE -->


			<!-- SEITENSPALTE -->
			<div id="column-side" class="right column">

				<?php

					/*

						SIDE

					*/

					echo $COLUMNS_START;

						echo $COLUMN_LEFT;

							the_post();
							$current_post_index += 1;
							print_post_teaser($post);

						echo $COLUMN_END;


						echo $COLUMN_RIGHT;

							the_post();
							$current_post_index += 1;
							print_post_teaser($post);

						echo $COLUMN_END;

					echo $COLUMNS_END;

				?>

			</div>
			<!-- ENDE SEITENSPALTE -->


	</div></div><!-- articles -->

	</div><!-- content -->

<?php get_sidebar(); ?>

</div><!-- website -->

<?php get_footer(); ?>



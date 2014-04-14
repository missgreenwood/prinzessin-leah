	<?php
	/*
	Template Name: Archives
	*/
	get_header(); ?>

		<div id="articles" class="columns"><div class="columns-wrapper">

				<?php
					/*
					- benötigte Anzahl an Posts laden (~"post count")
						-> Anzahl = 1(Hauptartikel) + 2 * <rowcount>(Mitte) + <rowcount> + 1(Seitenspalte, neben Haupt)
						=> Anzahl = 2 + 3*<rowcount> 
					
					A. Alle posts laden, dann einige in Hauptspalte, einige in Seitenspalte ausgeben
						
						get_archives() parameters:
						array(
							'type'   		   => monthly,
							'limit'            => '',
							'format'           => 'html',
							'before'           => '',
							'after'            => '',
							'show_post_count'  => false,
							'echo'         	   => 1,
							'meta_value'       => '',
							'order'            => 'DESC'); ?>
					*/

					// In Settings: 8 posts
					// $posts = get_archives( array( 'type'   => 'postbypost', 'format' => 'custom' ) );
					// $count = count($posts);
					// $current_post_index = 0;

					/* 
					B. Blaetterfunktion
						-> Direkt for loop einfuegen:
						global $query_string;
						query_posts( $query_string . '&posts_per_page=5' );

						-> nach den ersten 5 Posts: 
						next_posts_link()
 					*/ 

				?>

				<h1><?php echo $count; ?></h1>

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
						
						// PHP SCHLEIFE FÜR RESTLICHE POSTS
					?>

					<!-- MITTE -->
					<div class="columns row"><div class="columns-wrapper">

						<!-- RECHTE SPALTE -->
						<div class="left column">
							
							<?php
								the_post();
								$current_post_index += 1;
								print_post_teaser($post);
							?>

						</div>


						<!-- RECHTE SPALTE -->
						<div class="right column">
							
							<?php
								the_post();
								$current_post_index += 1;
								print_post_teaser($post);
							?>

						</div>


					</div></div>
					<!-- ENDE MITTE -->

					<?php
						
						// ENDE PHP SCHLEIFE
					?>
		

				</div>
				<!-- ENDE HAUPTSPALTE -->


				<!-- SEITENSPALTE -->
				<div id="column-side" class="right column">

					<?php
						
						// PHP SCHLEIFE FÜR RESTLICHE POSTS
					?>

					
					<!-- REIHE -->
					<div class="columns"><div class="columns-wrapper">
						

						<!-- LINKE SPALTE -->
						<div class="left column">
							
							<?php
								the_post();
								$current_post_index += 1;
								print_post_teaser($post);
							?>

						</div>
						

						<!-- RECHTE SPALTE -->
						<div class="right column">
							
							<?php
								the_post();
								$current_post_index += 1;
								print_post_teaser($post);
							?>

						</div>

					</div></div>

					<?php
						
						// PHP SCHLEIFE ENDE
					?>

				</div>
				<!-- ENDE SEITENSPALTE -->


		</div></div><!-- articles -->

		</div><!-- content -->
		
	<?php get_sidebar(); ?>

	</div><!-- website -->

	<?php get_footer(); ?>





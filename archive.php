	<?php 
	
	get_header(); ?>

		
	

				<?php
					
					// 1. load all posts 

					//$args = array( 'offset' => 5, 'numberposts' => -1, 'posts_per_page' => 9);
					//$myposts = get_posts( $args );
					

					// echo "<h1>archive ".$cat."</h1>";
					
					
					// show as teaser
					$more = 0;
					// current page
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					// options: posts per page
					$posts_per_page = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'posts_per_page'");
					// build posts query
					$wp_query = new WP_Query(array(

						"offset" => $posts_per_page * $paged,
						"cat" => $cat,
						"posts_per_page" => $posts_per_page
					));

					include("post_wall.php");
					
				?>
					
					<div id="page-navigation">
						<div id="prev"><?php previous_posts_link("neuere Beiträge"); ?></div>
						<div id="pagenumber">Seite <?php echo $paged; ?></div>
						<div id="next"><?php if ($wp_query->post_count == $posts_per_page) next_posts_link("frühere Beiträge"); ?></div>
					</div>

				<?php

					
					// 2. 5 Posts ausgeben, starte mit Post no 6

					// global $query_string;				
					// query_posts( $query_string . '&posts_per_page=9' );

					/* 3. Blaetterfunktion
						-> Direkt for loop einfuegen:
						
						global $query_string;				
						query_posts( $query_string . '&posts_per_page=9' );

						-> nach den ersten 5 Posts: 
						next_posts_link();
						
 				*/
				?>

				<?php
				/* Shows up to 8 posts, excluding the first 5 
				if ( have_posts() ) : query_posts('showposts=8&offset=6'); while ( have_posts() ) : the_post();
				endwhile; endif; 
				*/
				?>
				
		

		</div><!-- content -->
		
	<?php get_sidebar(); ?>

	</div><!-- website -->

	<?php get_footer(); ?>










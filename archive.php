	<?php

	get_header(); ?>

			<?php
				// show as teaser
				$more = 0;
				// current page
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				// options: posts per page
				$posts_per_page = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'posts_per_page'");

				// posts of current category
				$posts_with_category = $all_posts;

				// If no category is selected, strip start-page number of items from overview
				$page_offset = $posts_per_page * $paged;


				// else determine posts of current category listed on start page
				if ($cat !== 28) {

					$page_offset = 0;
					$posts_array = get_posts(array(
						"posts_per_page" => $posts_per_page
					));

					// scan all categories for each post on start page, if it matches
					// selected category. if yes, increase $page_offset, skipping this post
					for ($i = 0; $i < count($posts_array); $i++) {

						// categories of current post
						$categories = get_the_category($posts_array[$i]->ID);

						for ($c = 0; $c < count($categories); $c++) {

							if ($categories[$c]->term_id === $cat) {
								$page_offset += 1;
								break;
							}
						}
					}

					// Updated total number of posts
					$category = get_category($cat);
					$categories_posts = $category->category_count;

				} else {

					// number of all posts in archive
					$archived_posts = wp_count_posts()->publish;
					$categories_posts = $archived_posts;
				}

				// pages to show
				$pages_count = ceil(($categories_posts - $page_offset)/$posts_per_page);

				// finally, build posts query
				$wp_query = new WP_Query(array(

					"offset" => $page_offset + $posts_per_page * ($paged - 1),
					"cat" => $cat,
					"posts_per_page" => $posts_per_page
				));

				// echo "<h1>cat: ". $cat. ' offset: ' . $page_offset . " all posts " . $all_posts . " loaded posts:" . $wp_query->post_count . "</h1>";
				// echo "<h2>Seite" . $paged . '/' . $pages_count . "</h2>";


				include("post_wall.php");

			?>

			<div class="content">

				<div id="page-navigation">
					<div id="prev" class="button"><?php previous_posts_link("&laquo; neuere Beiträge"); ?></div>
					<div id="pagenumber"><?php echo $paged . '|' . $pages_count; ?></div>
					<div id="next" class="button"><?php if ($pages_count !== $paged) next_posts_link("frühere Beiträge &raquo;"); ?></div>
				</div>

			</div>

		</div><!-- content -->

	<?php get_sidebar(); ?>

	</div><!-- website -->

	<?php get_footer(); ?>










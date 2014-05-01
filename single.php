		<?php get_header(); ?>

			<!--

			SINGLE PAGE

			-->

			<article>
 

				<?php 

					// setup category display for post 
					$args = array('orderby' => 'ID', 'style' => 'list', 'hide_empty' => 0, 'child_of' => 26, 'title_li' => '', 'current_category' => 1);
				
					// default values

					// 'show_option_all' 	 => '', 
					// 	'order'              => 'ASC',
					// 	'style'              => 'list',
					// 	'show_count'         => 0,
					// 	'use_desc_for_title' => 1,
					// 	'child_of'           => ,
					// 	'feed'               => '',
					// 	'feed_type'          => '',
					// 	'feed_image'         => '',
					// 	'exclude'            => '',
					// 	'exclude_tree'       => '',
					// 	'include'            => '',
					// 	'hierarchical'       => 1,						
					// 	'show_option_none'   => __( 'No categories' ),
					// 	'number'             => null,
					// 	'echo'               => 1,
					// 	'depth'              => 0,
					// 	'pad_counts'         => 0,
					// 	'taxonomy'           => 'category',
					// 	'walker'             => null 

				?>

				<!-- uncomment to display article categories --> 

				<!-- <ul class='article-cats'><?php wp_list_categories( $args ); ?></ul> -->
				
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
					/* if (has_post_thumbnail()) {
						// check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail();
					} */
				?>

				<?php

					// Was zum Teufel: the_content();
					// $content = get_post_field('post_content', $post->ID);

					$content = apply_filters('the_content', $post->post_content);
					$content = str_replace(']]>', ']]&gt;', $content);
					echo $content;
				?>

				<?php
 
					// check if post has video attachment   
					$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );
					$attachments = get_posts($args);
					if ($attachments) {
						foreach ( $attachments as $attachment ) {
							// customize wp video shortcode
							$attlink = wp_get_attachment_url( $attachment->ID, false ); 
							$attr = array('src' => $attlink, 'loop'=> '', 'autoplay' => true, 'preload' => 'none');
							$mediatype = $attachment->post_mime_type;
							switch($mediatype) {
								case 'video/mpeg':
								case 'video/mp4':
								case 'video/quicktime':
									// display customized video player
									echo wp_video_shortcode( $attr ); break; 
								// default: 
									// echo 'No video attachment! '; break; 
							}
						}	
					}

					// check if post has audio attachment
					$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );
					$attachments = get_posts($args);
					if ($attachments) {
						foreach ( $attachments as $attachment ) {
							// costumize wp audio shortocde 
							$attlink = wp_get_attachment_url( $attachment->ID, false );
							$attr = array('src' => $attlink, 'loop'=> '', 'autoplay' => true, 'preload' => 'none');
							switch($mediatype) { 
								case 'audio/mpeg':
								case 'audio/mp4':
								case 'audio/ogg':
								case 'audio/vnd.wav':
									// display costumized audio player 
									echo wp_audio_shortcode( $attr ); break; 
								// default: 
									// echo 'No audio attachment! '; break; 
							}
						}	
					}
					
				?>

			</article>


		</div><!-- content -->

		<?php get_sidebar(); ?>

	</div><!-- website -->

	<!-- include footer.php -->
	<?php get_footer(); ?>
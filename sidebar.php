	<div id="sidebar">

		<div id="about">

			<?php print_title(""); ?>  
			<p>

				<?php
					$id = 72; // id der "über mich" seite
					$post = get_post($id); 
					$content = apply_filters('the_content', $post->post_content); 
					echo $content;
				?>

			</p>

	</div>
		
	<!-- <div id="archiv">

		<h2>Archiv</h2>

			<?php // wp_nav_menu(array("theme_location" => "example")); ?>

		</div> --> 


		<!-- <div id="bookmarks" class="list">

			<?php wp_list_bookmarks(); ?>

		</div> -->

		<!-- Suche --> 

	</div> 
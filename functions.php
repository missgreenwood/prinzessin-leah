<?php
	
	/*
		WP CONFIGURATION
	*/

	// add main thumbnail support for posts
	add_theme_support( 'post-thumbnails' );

	// add menue
	// http://codex.wordpress.org/Function_Reference/register_nav_menu
	register_nav_menu( 'primary', 'Hauptnavigation' );
	register_nav_menu( 'footer', 'Footernavigation' );
	// => http://localhost/kunden/frauhampel/website/wp-admin/nav-menus.php?action=locations

	register_sidebar();
	

	/*
		WP INIT HOOKS
	*/

	// register custom type medium
	add_action( 'init', 'medium_init' );


	/*
		MARKUP GENERATION
	 */

	function print_post_teaser($post) {

		$markup = '<a href="' . get_permalink( $post->ID ) . '">';
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

		// image
		// check if the post has a Post Thumbnail assigned to it.
		if ( has_post_thumbnail() ) {
			$markup .= get_the_post_thumbnail();
		} 

		// medium-taxonomy + tag(s)
		$markup .= '<strong>' . $medium . " &bull; " . $tag . '</strong>' . PHP_EOL;
		// title
		$markup .= '<em>' . get_the_title() . '</em>' . PHP_EOL;
		// content
		// $markup .= get_the_content("MÄHR", true);
		// more-link
		// -> auto
	
		echo $markup;

		the_content();

		echo '</a>';
	}


	/*
		CUSTOM FUNCTIONS
	*/

	function print_title($title) {
		echo '<h2 class="title">'.$title.'</h2>';
	}

	// Enable Theme Features such as Sidebars, Navigation Menus, Post Thumbnails, Post Formats, Custom Headers, Custom Backgrounds and others	
	// Define functions used in several template files of your theme
	// Set up an options menu, giving site owners options for colors, styles, and other aspects of your theme

	/*
		Add custom type (taxonomy) for medium
		
		## reference
		- tutorial http://code.tutsplus.com/tutorials/introducing-wordpress-3-custom-taxonomies--net-11658
		- api http://codex.wordpress.org/Function_Reference/register_taxonomy
		- register default tax: http://wordpress.mfields.org/2010/set-default-terms-for-your-custom-taxonomies-in-wordpress-3-0/
	*/
	function medium_init() {

		// create a new taxonomy
		register_taxonomy('medium', 'post', array(

				'show_admin_column' => true,
				'show_ui' => true,
				'hierarchical' => true,
				
				
				'labels' => array(

					'name' => 'Medien',
					'menu_name' => "Medien",
					'add_new_item' => "Neues Medium erstellen"
				),

				'capabilities' => array(

					'assign_terms' => 'manage_categories',
					'edit_terms' => 'manage_categories',
					'manage_terms' - 'manage_categories',
					'delete_terms' - 'manage_categories'
				)
			)
		);
	}
?>
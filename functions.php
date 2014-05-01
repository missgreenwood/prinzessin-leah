<?php

	/*
		WP CONFIGURATION
	*/

	// restrict post_wall (overview) images to 610px width.
	// Height scales in ratio, images are not cropped.
	set_post_thumbnail_size(610, 0, false);

	// add main thumbnail support for posts
	add_theme_support( 'post-thumbnails' );

	// add menu
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
		// global $wp_query;

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
		if (has_post_thumbnail()) {
			$markup .= get_the_post_thumbnail();
		}

		// medium-taxonomy + tag(s)
		$markup .= '<strong class="title-meta">' . $medium . " &bull; " . $tag . '</strong>' . PHP_EOL;
		// title
		$markup .= '<em>' . get_the_title() . '</em>' . PHP_EOL;
		// content
		// $markup .= get_the_content("MÄHR", true);
		// more-link
		// -> auto

		echo $markup;

		// customize more tag
		// overridden if personalized more quicktag is set manually in wp-admin backend

		// 1. get post medium type

		$terms = get_the_terms( $post->ID, 'medium' );

		foreach ( $terms as $term ) {
			global $mediatype;
			ob_start();
			echo $term->slug;
			$mediatype = ob_get_contents();
			ob_get_clean();
			unset($term);
		}

		// 2. set more tag accordingly

		if ( $mediatype == 'audio') {
			the_content('anhören');
		}
		elseif ( $mediatype == 'video') {
			the_content('ansehen');
		}
		else {
			the_content('lesen');
		}

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


	// Avoid links for featured images
	function wpb_imagelink_setup() {
		$image_set = get_option( 'image_default_link_type' );

		if ($image_set !== 'none') {
			update_option('image_default_link_type', 'none');
		}
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);

	// Avoid links for post images
	add_filter( 'the_content', 'attachment_image_link_remove_filter' );

	function attachment_image_link_remove_filter( $content ) {
	    $content =
	        preg_replace(
	            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
	                '{ wp-image-[0-9]*" /></a>}'),
	            array('<img','" />'),
	            $content
	        );
	    return $content;
	}

?>
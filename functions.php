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
	register_nav_menu( 'example', 'Beispielnavigation' );
	// => http://localhost/kunden/frauhampel/website/wp-admin/nav-menus.php?action=locations


	/*
		WP INIT HOOKS
	*/


	/*
		CUSTOM FUNCTIONS
	*/

	function print_title($title) {
		echo '<h2 class="title">'.$title.'</h2>';
	}

?>


<!-- Enable Theme Features such as Sidebars, Navigation Menus, Post Thumbnails, Post Formats, Custom Headers, Custom Backgrounds and others -->

<!-- Define functions used in several template files of your theme --> 

<!-- Set up an options menu, giving site owners options for colors, styles, and other aspects of your theme -->
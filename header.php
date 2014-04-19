<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">

	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset=<?php bloginfo('charset'); ?>" />

		<meta name="author" content="Lea Hampel" />

		<meta name="description" content="Lea Hampel, Journalistin, Redakteurin, Autorin, Moderatorin" />

		<meta name="keywords" content="Lea Hampel, Journalistin, Autorin, Recherche, Moderation, Affe im Kopf" />

		<title><?php wp_title(' - ' , true, 'right'); ?> <?php bloginfo('name'); ?></title>

		<!-- use this to trigger media queries on apply devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- link to styles -->
		<!-- <link rel="stylesheet" href=<?php bloginfo('stylesheet_url'); ?> type="text/css" media="screen" /> -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
		<link href="<?php echo get_template_directory_uri(); ?>/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo get_template_directory_uri(); ?>/css/styling.css" rel="stylesheet" type="text/css" />

		<!-- set pingback link for sites quoting this site -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<!-- set header template hook -->
		<?php wp_head(); ?>

	</head>

	<body>

		<div id="website" class="page">

			<div id="content" class="content">

				<div id="header">
			
					<?php /* wp_nav_menu( array("theme_location" => "primary") ); */ ?> 
					<?php wp_nav_menu( array("theme_location" => "primary", "depth" => 1) ); ?> 
					<?php 
						echo new Subnav('primary');
						/* echo "<ul>\n";
						if ($page_parent!=0) wp_list_pages('title_li=&child_of='.$page_parent.'');
						else wp_list_pages('title_li=&child_of='.$post_id.'');
						echo "</ul>\n";
						*/
						?>

				</div><!-- header -->
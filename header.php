<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//DE" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="de">

	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?> charset=<?php bloginfo('charset'); ?>" /> 

		<meta name="author" content="Lea Hampel" />

		<meta name="description" content="Lea Hampel, Journalistin, Redakteurin, Autorin, Moderatorin" />

		<meta name="keywords" content="Lea Hampel, Journalistin, Autorin, Recherche, Moderation, Affe im Kopf" /> 

		<title><?php wp_title(' - ' , true, 'right'); ?> <?php bloginfo('name'); ?></title>

		<!-- link to style.css -->
		<link rel="stylesheet" href=<?php bloginfo('stylesheet_url'); ?> type="text/css" media="screen" />

		<!-- set pingback link for sites quoting this site -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 

		<!-- set header template hook --> 
		<?php wp_head(); ?>

	</head>

	<body>

		<div id="wrapper">

			<div id="header">
			
				<?php wp_nav_menu( array("theme_location" => "primary") ); ?> 

			</div><!-- header -->
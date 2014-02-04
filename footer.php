	<!-- include header.php -->

	<?php get_header(); ?>

	<div id="footer">

		<!-- place to put less important functions such as tag cloud, most read posts etc. -->

		 <?php wp_nav_menu( array("theme_location" => "footer") ); ?> 

	</div><!-- footer -->

	</div><!-- wrapper --> 

	<!-- footer template hook --> 

	<?php wp_footer(); ?>

	</body>

</html>


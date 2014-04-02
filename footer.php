		<?php get_header(); ?>
		<?php get_sidebar(); ?>

			<div id="footer">
		 		<?php wp_nav_menu( array("theme_location" => "footer") ); ?> 
			</div><!-- footer -->

		</div><!-- wrapper --> 

		<!-- footer template hook --> 
		<?php wp_footer(); ?>

	</body>
</html>
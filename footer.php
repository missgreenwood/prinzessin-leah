
				<div id="footer">

					<div class="page">
						<div class="content">

							<ul class="followme">
								<b>Folge mir:</b>
								<a class="facebook" href="facebook.com/lea.hampel"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/facebook.gif"/>FACEBOOK</a>
								<a class="twitter" href="twitter.com/leahampel"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/twitter.gif"/>TWITTER</a>
								<a></a>
							</ul>

							<a class="imprint"><?php wp_nav_menu( array("theme_location" => "footer") ); ?></a>

						</div>
					</div>

				</div>

		<!-- footer template hook -->
		<?php wp_footer(); ?>

	</body>
</html>
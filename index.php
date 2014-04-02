	<!-- include header.php -->
	<?php get_header(); ?>

	<div id="main">

		<!-- enter the loop --> 

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 

			<!-- link article title to article -->
			
			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			<div class="entry">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  		the_post_thumbnail();
					} 
				?>
				<?php the_content(); ?>
			</div>

		<?php endwhile; ?> 

	<?php endif; ?>

	</div><!-- main -->
	
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
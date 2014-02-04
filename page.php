<?php get_header(); ?>

   <div id="main">
 
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <h3><?php the_title(); ?></a></h3>
         <div class="entry">
            <?php the_content(); ?>
         </div>
      <?php endwhile; endif; ?>
 
   </div><!-- main -->
 
<?php get_footer(); ?>  



<?php get_header(); ?>

         <article>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
               <h3><?php the_title(); ?></a></h3>
               <div class="entry">
               	<?php
               	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
               		the_post_thumbnail();
               		}
               	?>
                  <?php the_content(); ?>
               </div>
            <?php endwhile; endif; ?>

         </article>

      </div><!-- content -->

      <?php get_sidebar(); ?>

   </div><!-- website -->

   <!-- include footer.php -->
   <?php get_footer(); ?>
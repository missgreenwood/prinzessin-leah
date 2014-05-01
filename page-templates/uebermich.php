<?php
/**
 * Template Name: Über mich-Page
 */
?>
   <?php get_header(); ?>
        

        <article>
            
            <?php 
                the_post();
            ?>

            
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/uebermich.jpg"/>
            
            <div class="portrait"> <?php the_content(); ?> </div>
            
        </article>  


    </div><!-- content -->

  <?php get_sidebar(); ?>

</div><!-- website -->

<!-- include footer.php -->
<?php get_footer(); ?>
<?php
/**
 * The template for displaying pages
 *
 */
get_header();
?>

<div class="text-block">
    
    <div class="container">
        <div class="main-content-wrap">
            <div class="sidebar">
                <?php dynamic_sidebar('Left Sidebar'); ?>
            </div>
            <div class="main-content-part">
                <?php
                if ( have_posts() ) :
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                
                        the_content();
                        
                    endwhile;
                endif;
        
                do_action('pixlab_after_page_content');
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
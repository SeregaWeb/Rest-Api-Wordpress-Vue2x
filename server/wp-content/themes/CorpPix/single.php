<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();

    $post_ID = get_the_ID();


?>

<div class="container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        
            the_content();
    
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>
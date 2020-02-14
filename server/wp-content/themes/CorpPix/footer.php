        </main><!-- end of <main> -->

        <?php do_action('pixlab_before_site_footer'); ?>

        <footer id="site-footer" class="site-footer">
            
        </footer>
        
        <?php do_action('pixlab_after_site_footer'); ?>
    
    </div><!-- .wrapper -->
    
    
    <?php
    do_action('pixlab_after_site_page_tag');
    
    // popup windows added in admin area in "Text blocks" section
    echo do_shortcode('[text-blocks id="popup-windows"]');
    
    wp_footer();

    do_action('pixlab_before_body_closing_tag');
    ?>
</body>
</html>
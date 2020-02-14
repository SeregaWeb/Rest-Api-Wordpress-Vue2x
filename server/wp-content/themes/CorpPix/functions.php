<?php

// include main Theme Class
require get_template_directory() . '/inc/Pixlab.php';
require get_template_directory() . '/inc/Rest_Api_Points.php';

$Pixlab = new Pixlab();

// main theme init
add_action( 'after_setup_theme', array($Pixlab,'px_site_setup') );

add_filter( 'sanitize_file_name', array($Pixlab, 'custom_sanitize_file_name'), 10, 1 );

// Set custom upload size limit
$Pixlab->px_custom_upload_size_limit(50);



// Enqueue scripts and styles.
function px_site_scripts() {
    
    // Load our main stylesheet.
    wp_enqueue_style( 'corppix_site-style', get_stylesheet_uri() );
    
    
    // FOR PRODUCTION STAGE
    wp_enqueue_style('corppix_site_style', get_template_directory_uri().'/build/styles/screen.css');
    
    
    // FOR DEVELOPMENT STAGE
    //wp_enqueue_style('corppix_site_style', get_template_directory_uri().'/public/stylesheets/screen.css');
    
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_localize_script( 'corppix_site-script', 'screenReaderText', array(
        'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'corppix_site' ) . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'corppix_site' ) . '</span>',
    ) );
    
    wp_enqueue_script( 'libs_js', get_template_directory_uri() . '/build/js/libs.js', array('jquery'), null, true );
    
    wp_enqueue_script( 'customization_js', get_template_directory_uri() . '/build/js/customization.js', array('jquery', 'libs_js'), null, true );
    
    $vars = array(
        'ajax_url'   => admin_url( 'admin-ajax.php' ),
        'theme_path' => get_stylesheet_directory_uri(),
        'site_url'   => get_site_url()
    );
    
    wp_localize_script( 'corppix_site_js', 'var_from_php', $vars );
    
    
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
    
}
add_action( 'wp_enqueue_scripts', 'px_site_scripts' );



// ===========================
// ===========================
// Add type="module" to script file with our customization
/*function add_data_attribute($tag, $handle) {
    if ( 'corppix_site_js' !== $handle )
        return $tag;
    
    return str_replace( ' src', ' type="module" src', $tag );
}
add_filter('script_loader_tag', 'add_data_attribute', 10, 2);
*/


/*********************************************************/
/*********************************************************/


/**
 * Add Dropcap option but keep the defaults.
 */
add_filter( 'tiny_mce_before_init', 'my_wpeditor_formats_options' );
function my_wpeditor_formats_options( $settings ){
    
    /* Default Style Formats */
    $default_style_formats = array(
        array(
            'title'   => 'Headings',
            'items' => array(
                array(
                    'title'   => 'Heading 1',
                    'format'  => 'h1',
                ),
                array(
                    'title'   => 'Heading 2',
                    'format'  => 'h2',
                ),
                array(
                    'title'   => 'Heading 3',
                    'format'  => 'h3',
                ),
                array(
                    'title'   => 'Heading 4',
                    'format'  => 'h4',
                ),
                array(
                    'title'   => 'Heading 5',
                    'format'  => 'h5',
                ),
                array(
                    'title'   => 'Heading 6',
                    'format'  => 'h6',
                ),
            ),
        ),
        array(
            'title'   => 'Inline',
            'items' => array(
                array(
                    'title'   => 'Bold',
                    'format'  => 'bold',
                    'icon'    => 'bold',
                ),
                array(
                    'title'   => 'Italic',
                    'format'  => 'italic',
                    'icon'    => 'italic',
                ),
                array(
                    'title'   => 'Underline',
                    'format'  => 'underline',
                    'icon'    => 'underline',
                ),
                array(
                    'title'   => 'Strikethrough',
                    'format'  => 'strikethrough',
                    'icon'    => 'strikethrough',
                ),
                array(
                    'title'   => 'Superscript',
                    'format'  => 'superscript',
                    'icon'    => 'superscript',
                ),
                array(
                    'title'   => 'Subscript',
                    'format'  => 'subscript',
                    'icon'    => 'subscript',
                ),
                array(
                    'title'   => 'Code',
                    'format'  => 'code',
                    'icon'    => 'code',
                ),
            ),
        ),
        array(
            'title'   => 'Blocks',
            'items' => array(
                array(
                    'title'   => 'Paragraph',
                    'format'  => 'p',
                ),
                array(
                    'title'   => 'Blockquote',
                    'format'  => 'blockquote',
                ),
                array(
                    'title'   => 'Div',
                    'format'  => 'div',
                ),
                array(
                    'title'   => 'Pre',
                    'format'  => 'pre',
                ),
            ),
        ),
        array(
            'title'   => 'Alignment',
            'items' => array(
                array(
                    'title'   => 'Left',
                    'format'  => 'alignleft',
                    'icon'    => 'alignleft',
                ),
                array(
                    'title'   => 'Center',
                    'format'  => 'aligncenter',
                    'icon'    => 'aligncenter',
                ),
                array(
                    'title'   => 'Right',
                    'format'  => 'alignright',
                    'icon'    => 'alignright',
                ),
                array(
                    'title'   => 'Justify',
                    'format'  => 'alignjustify',
                    'icon'    => 'alignjustify',
                ),
            ),
        ),
    );
    
    /* Our Own Custom Options */
    $custom_style_formats = array(
        array(
            'title'   => 'Special',
            'items' => array(
                array(
                    'title' => 'Caption 1',
                    'block' => 'p',
                    'classes' => 'caption1',
                    //'styles' => array('color' => '#fff')
                ),
                array(
                    'title' => 'Caption 2',
                    'block' => 'p',
                    'classes' => 'caption2',
                    //'styles' => array('color' => '#fff')
                ),
                array(
                    'title' => 'Form Caption',
                    'block' => 'p',
                    'classes' => 'form-caption',
                    //'styles' => array('color' => '#fff')
                ),
                
                /*array(
                    'title'   => 'Justify',
                    'format'  => 'alignjustify',
                    'icon'    => 'alignjustify',
                ),*/
            ),
        ),
    );
    
    /* Merge It */
    $new_style_formats = array_merge( $default_style_formats, $custom_style_formats );
    
    /* Add it in tinymce config as json data */
    $settings['style_formats'] = json_encode( $new_style_formats );
    return $settings;
}



// Adding custom theme option page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
}


add_action('pixlab_before_close_head_tag', 'custom_analytics_1',100);
function custom_analytics_1() {
    echo get_field('analytics_content_before_closing_head_tag', 'option');
}

add_action('pixlab_after_open_body_tag', 'custom_analytics_2',100);
function custom_analytics_2() {
    echo get_field('analytics_content_after_open_body_tag', 'option');
}


add_action('pixlab_after_open_body_tag', 'mobile_menu_layouts',100);
function mobile_menu_layouts() {
    echo do_shortcode('[text-blocks id="mobile-menu-box"]');
}


function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




// Google map key for ACF Pro plugin
/*function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCSuPzkdxojA8FHh9H_-sLJCAyZFUB8B8E');
}

add_action('acf/init', 'my_acf_init');*/





// define the bcn_breadcrumb_title callback
function filter_bcn_breadcrumb_title( $title, $this_type, $this_id ) {
    // make filter magic happen here...
    if ( get_locale() === 'en_US' ) {
        $title = ($title == 'AgroStoreM') ? __("Home"): $title;
    } else {
        $title = ($title == 'AgroStoreM') ? __("Главная"): $title;
    }
    
    return $title;
};

// add the filter
add_filter( 'bcn_breadcrumb_title', 'filter_bcn_breadcrumb_title', 10, 3 );



/**
 * Remove tag <p> и <br> in plugin contact form.
 */
add_filter('wpcf7_autop_or_not', '__return_false');

$points = new Rest_Api_Points();

$points->registration_endpoint(
    'get_posts',
    'spa/v1',
    '/post/',
    'GET',
    'get_posts');

$points->registration_endpoint(
    'init_site_info',
    'spa/v1',
    '/start/',
    'GET',
    'init_site_info');

$points->registration_endpoint(
    'get_slider',
    'spa/v1',
    '/slider/',
    'POST',
    'get_slider');
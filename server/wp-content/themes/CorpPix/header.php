<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="author" content="https://www.pix-lab.net" />
    <link rel="author"  href="https://www.pix-lab.net" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="SKYPE_TOOLBAR" content ="SKYPE_TOOLBAR_PARSER_COMPATIBLE"/>
    <?php if ( is_404() ) { ?>
        <meta name="robots" content="noindex, nofollow"/>
    <?php } ?>
    <?php wp_head(); ?>
    <?php do_action('pixlab_before_close_head_tag'); ?>
</head>

<?php
$post_id = get_queried_object_id();
$page_class = get_field('body_class', $post_id); ?>
<body <?php body_class($page_class); ?>>

<?php do_action('pixlab_after_open_body_tag'); ?>


<div id="wrapper" class="wrapper">
    
    <?php do_action('pixlab_before_site_header'); ?>
   
    <header id="site-header" class="header">
        
    </header>

    <?php if ( !is_front_page() ) { ?>
        <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 bcn_wrap">
                        <a class="back" href="javascript:history.go(-1)">Назад</a>
                        <?php
                        if(function_exists('bcn_display'))  {
                            bcn_display();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php do_action('pixlab_after_site_header'); ?>
    
    <main id="main-wrapper">
        <?php do_action('pixlab_after_primary_wrapper_beginning_tag'); ?>
<?php
/**
 * Created by PhpStorm.
 * User: pavel_duman
 * Date: 2/13/20
 * Time: 4:36 PM
 */
class Rest_Api_Points {

    public function init_site_info() {
        $data = get_field('site_setting_group', 'option');
        return  $data;
    }
    
    public function get_slider() {
        $page = json_decode(file_get_contents('php://input'), true);
        $page_name = get_page_by_title($page['page']);
        $id_page = $page_name->ID;
        $data = get_field('slider_main',$id_page);
        return $data;
    }
    public function get_post() {
        $page = json_decode(file_get_contents('php://input'), true);
        $query = new WP_Query('p=7');
        foreach ( $query as $key => $post ) {
            $query[ $key ]->acf = get_fields( $post->ID );
        }
    
        return $query;
    }
    public function get_posts() {
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'numberposts'    => - 1
        );
    
        $posts = get_posts( $args );
        foreach ( $posts as $key => $post ) {
            $posts[ $key ]->acf = get_fields( $post->ID );
        }
    
        return $posts;
    }
    //registration_endpoint('get_posts','spa/v1','/post/','GET','get_posts')
    public function registration_endpoint($action,$namespace,$endpoint,$method,$callback){
        add_action($action,
            register_rest_route( $namespace,$endpoint, array(
                'methods' => $method,
                'callback' => array($this ,$callback)
                )
            )
        );
    }
}
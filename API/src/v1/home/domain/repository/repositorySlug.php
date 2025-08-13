<?php

  class RepositoryHome
  {

    public function get_page_data_by_slug($param) {
      
      $lang = isset($param['lang']) ? $param['lang'] : 'es';
      $group_name = $lang == 'es' ? 'contents_spanish' : 'contents_english';

      $args =  array(
        'post_type' =>'page',
        'name' => 'home',
        'posts_per_page' => -1
      );
      
      $loop = new WP_Query($args);
  	  $page = array();
      
      if ($loop->have_posts()) {
          while ($loop->have_posts()) {
              $loop->the_post();

                $page = array(
                  'id'    => get_the_ID(),
                  'slug'  => get_post_field('post_name'),
                  'date'  => get_the_date(),
                  'title' => get_the_title(),
                );
              
              if(isset(get_fields()[$group_name])){
                $page['contents'] = get_fields()[$group_name];
              }
              if(isset(get_fields()['faq_contents_spanish'])){
                $page['contents']['faq'] = get_fields()['faq_contents_spanish'];
              }
              if(isset(get_fields()['testimonials_contents_spanish'])){
                $page['contents']['testimonials'] = get_fields()['testimonials_contents_spanish'];
              }

          }
          wp_reset_postdata();
      }
  
      return $page;
    }
}


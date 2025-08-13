<?php

  class RepositoryPages
  {
    private $groupName = 'es';

    public function get_page_data_by_slug($param) {
      
      $slug_page = $param['slug'];
      $lang = isset($param['lang']) ? $param['lang'] : 'es';
      $this->groupName = $lang == 'es' ? 'contents_spanish' : 'contents_english';

      $args =  array(
        'post_type' =>'page',
        'name' => $slug_page,
        'posts_per_page' => -1
      );
      
      $loop = new WP_Query($args);
      
      $all_pages_data = array();
  	  $page = array();
      
      if ($loop->have_posts()) {
          while ($loop->have_posts()) {
              $loop->the_post();

                $page = array(
                  'id'          => get_the_ID(),
                  'slug'        => get_post_field('post_name'),
                  'date'        => get_the_date(),
                  'title'       => get_the_title(),
                  'content'          => $this->get_data_page(),
                );
              
              $all_pages_data[] = $page;
          }
          wp_reset_postdata();
      }
  
      return $all_pages_data;
    }


    function get_data_page() {

      return get_fields();
    }

}


<?php

  class RepositoryAllSlugs
{
    public function get_page_data_by_slug($param) {
      
      $cpt = isset($param['cpt']) ? $param['cpt'] : 'post';

      $args =  array(
        'post_type' => $cpt,
        'posts_per_page' => -1,
        'post_status' => 'publish',
      );

      $loop = new WP_Query($args);
      
      $all_post = array();
  	  $post = array();
      
      if ($loop->have_posts()) {
          while ($loop->have_posts()) {
              $loop->the_post();

                $post = array(
                  'id'          => get_the_ID(),
                  'slug'        => get_post_field('post_name'),
                );
              
              $all_post[] = $post;
          }
          wp_reset_postdata();
      }
  
      return $all_post;
    }


}


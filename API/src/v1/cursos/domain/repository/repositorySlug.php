<?php

class RepositoryCursos
{

  public function get_page_data_by_slug($param) {

    $slug_page = $param['slug'];
    $lang = isset($param['lang']) ? $param['lang'] : 'es';
    $taxonomy = isset($param['taxonomy']) ? $param['taxonomy'] : null;
    $taxonomy_slug = isset($param['term']) ? $param['term'] : null;
    $this->groupName = $lang == 'es' ? 'contents_spanish' : 'contents_english';

    $args =  array(
      'post_type' =>'clases',
      'name' => $slug_page,
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'ASC',
      'post_status' => 'publish'
    );

    if ($taxonomy && $taxonomy_slug) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => $taxonomy,
          'field'    => 'slug',
          'terms'    => $taxonomy_slug,
        ),
      );
    }

    $loop = new WP_Query($args);

    $all_post = array();

    if ($loop->have_posts()) {
      while ($loop->have_posts()) {
        $loop->the_post();

				global $post;
				$prev_post = $taxonomy ? get_previous_post(true, '', $taxonomy) : get_previous_post(false);
				$next_post = $taxonomy ? get_next_post(true, '', $taxonomy) : get_next_post(false);

        $post = array(
          'id'          => get_the_ID(),
          'slug'        => get_post_field('post_name'),
					'completed'   => $this->is_completed(get_the_ID(), $param),
          'date'        => get_the_date(),
          'title'       => get_the_title(),
          'content'     => get_the_content(),
          'excerpt'     => $this->new_excerpt(get_the_excerpt()),
          'terms'       => $this->get_post_term(),
          'featured_image' => get_the_post_thumbnail_url(),
          'fields'         => get_fields(),
          'next_post' => $prev_post ? array(
            'id'    => $prev_post->ID,
            'slug'  => $prev_post->post_name,
            'title' => get_the_title($prev_post->ID),
          ) : null,
          'previous_post' => $next_post ? array(
            'id'    => $next_post->ID,
            'slug'  => $next_post->post_name,
            'title' => get_the_title($next_post->ID),
          ) : null,
        );

        $all_post[] = $post;
      }
      wp_reset_postdata();
    }

    return $all_post;
  }

  private function get_post_term(){
    return get_the_terms(get_the_ID(), 'category');
  }

  private function new_excerpt($excerpt){
    $excerpt = wp_strip_all_tags($excerpt);
    if(strlen($excerpt) > 80){
      $excerpt = substr($excerpt, 0, 80) . '...';
    }
    return $excerpt;
  }

		private function is_completed($id_post, $request){

		$statusRepository = new RepositoryClassStatus();
		$authorization = $request->get_headers()['authorization'];
		$user_id = $statusRepository->decode_jwt($authorization);

		$param = array('user_id' => $user_id, 'post_id' => $id_post);
		$status_id = $statusRepository->get_class_status_data($param);

		 return $status_id ? true : false;
		}

}

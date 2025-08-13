<?php

class ControllerPages
{

  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getPage($param);
    }
  }

  public function getPage($param) {
    $get_page_info = new RepositoryPages();
    $page_info = $get_page_info->get_page_data_by_slug($param);

    return rest_ensure_response( $page_info, 200 );
  }

}

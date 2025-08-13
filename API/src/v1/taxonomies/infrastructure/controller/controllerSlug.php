<?php

class ControllerTax
{

  public function apiSlug($param) {
    $method = $param->get_method();

    if( $method === 'GET' ) {
      return $this->getPage($param);
    }
  }

  public function getPage($param) {
    $get_page_info = new RepositoryTax();
    $page_info = $get_page_info->get_taxonomy($param);

		return rest_ensure_response( $page_info, 200 );
  }

}

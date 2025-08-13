<?php

class ControllerMenu
{

  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getPage($param);
    }
  }

  public function getPage($param) {
    $get_page_info = new RepositoryMenu();
    $page_info = $get_page_info->get_menu_data($param);

    return rest_ensure_response( $page_info, 200 );
  }

  public function schemaMenu() {
    return array(
      '$schema' => 'http://json-schema.org/draft-07/schema#',
      'title' => 'Menu',
      'type' => 'array',
      'items' => array(
        'type' => 'object',
        'properties' => array(
          'id' => array(
            'type' => 'integer',
            'description' => 'The unique identifier for the menu item.',
          ),
          'title' => array(
            'type' => 'string',
            'description' => 'The title of the menu item.',
          ),
          'route' => array(
            'type' => 'string',
            'description' => 'The route of the menu item.',
          ),
        ),
      ),
    );
  }

}

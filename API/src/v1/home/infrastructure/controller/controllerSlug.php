<?php

class ControllerHome
{

  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getPage($param);
    }
  }

  public function getPage($param) {
    $get_page_info = new RepositoryHome();
    $page_info = $get_page_info->get_page_data_by_slug($param);

    return rest_ensure_response( $page_info, 200 );
  }

  public function schemaHome( ) {
    return array(
      '$schema' => 'http://json-schema.org/draft-07/schema#',
      'title'   => 'Home',
      'type'    => 'array',
      'items'   => array(
        'type'       => 'object',
        'properties' => array(
          'id'       => array(
            'type'        => 'integer',
            'description' => 'The unique identifier for the home page.',
          ),
          'slug'     => array(
            'type'        => 'string',
            'description' => 'The slug of the home page.',
          ),
          'date'     => array(
            'type'        => 'string',
            'description' => 'The date of the home page content.',
            'format'      => 'date-time',
          ),
          'title'    => array(
            'type'        => 'string',
            'description' => 'The title of the home page.',
          ),
          'contents' => array(
            'type'        => 'array',
            'description' => 'Acf content elements asign to home page',
            'items'       => array('type' => 'string'),
          ),
        ),
      ),
    );
  }

}

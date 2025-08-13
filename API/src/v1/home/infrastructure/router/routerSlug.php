<?php
class RouterHome {
  
  public function REST_API_SLUG() {
    add_action('rest_api_init', function() {
      register_rest_route(
        API_ROUTE,
        '/home',
        array(
          array(
            'methods'             => WP_REST_Server::READABLE,
            'callback'            => array(new ControllerHome(), 'apiSlug'),
            'permission_callback' => '__return_true',
            'args'                => $this->getEndpointArgs(),
            'show_in_index'       => true
          ),
          'schema'=> array(new ControllerHome(), 'schemaHome'),
        )
      );
    });
  }

  private function getEndpointArgs() {
    return array(
      'lang' => array(
        'description' => 'Options language es | en',
        'type'        => 'select',
        'enum'        => array('es', 'en'),
      )
    );
  }
  
}

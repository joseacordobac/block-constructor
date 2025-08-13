<?php
class RouterLogin {

  public function REST_API_LOGIN() {
    add_action('rest_api_init', function() {
      register_rest_route(
        API_ROUTE,
        '/login',
        array(
          array(
            'methods'             => array('POST'),
            'callback'            => array(new ControllerLogin(), 'apiLogin'),
            'permission_callback' => '__return_true',
            'args'                => $this->getEndpointArgs(),
            'show_in_index'       => true
          ),
          'schema'=> array(new ControllerLogin(), 'schemaHome'),
        )
      );
    });
  }

  private function getEndpointArgs() {
    return array(
      'lang' => array(
        'description' => 'Options language es | en',
        'type'        => 'select',
        'enum'        => array('social', 'Whatsapp'),
      )
    );
  }

}

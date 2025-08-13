<?php
  
  class RouterMenu {

    public function REST_API_SLUG() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/menu',
          array(
            array(
              'methods' => array('GET'),
              'callback' => array(new ControllerMenu(), 'apiSlug'),
              'permission_callback' => '__return_true',
              'args' => $this->getEndpointArgs(),
              'show_in_index' => true
            ),
            'schema' => array(new ControllerMenu(), 'schemaMenu')
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


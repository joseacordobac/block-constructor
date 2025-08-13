<?php

  class RouterClassStatus {

    public function REST_API_CLASS() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/classStatus',
          array(
            'methods' => array('GET', 'POST', 'PUT', 'DELETE'),
            'callback' => array(new ControllerClassStatus(), 'apiClass'),
            'permission_callback' => '__return_true'
          )
        );
      });

    }

  }


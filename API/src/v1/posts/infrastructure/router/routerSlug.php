<?php
  
  class RouterPosts {

    public function REST_API_SLUG() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/posts',
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerPosts(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );
      });
     
    }

  }


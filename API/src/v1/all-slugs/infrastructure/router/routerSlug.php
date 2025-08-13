<?php
  
  class RouterAllSlugs {

    public function REST_API_SLUG() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/all-slugs',
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerAllSlugs(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );
      });
     
    }

  }


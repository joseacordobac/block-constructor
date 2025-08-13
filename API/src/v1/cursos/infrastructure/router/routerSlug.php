<?php
  
  class RouterCursos {

    public function REST_API_SLUG() {

      add_action('rest_api_init',
      function(){
        register_rest_route(
          API_ROUTE,
          '/cursos',
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerCursos(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );
      });
     
    }

  }


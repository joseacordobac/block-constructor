<?php
   class ApiCursos {
      public function API_slug() {
         $api_slug = new RouterCursos();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


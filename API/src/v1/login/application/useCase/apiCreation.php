<?php
   class ApiLogin {
      public function API_slug() {
         $api_slug = new RouterLogin();
         $api_slug->REST_API_LOGIN();
         return $api_slug;
      }
   }


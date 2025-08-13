<?php
   class ApiOptionPage {
      public function API_slug() {
         $api_slug = new RouterOptionPage();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


<?php
   class ApiMenu{
      public function API_slug() {
         $api_slug = new RouterMenu();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


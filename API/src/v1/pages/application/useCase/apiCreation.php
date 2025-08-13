<?php
   class ApiPages{
      public function API_slug() {
         $api_slug = new RouterPages();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


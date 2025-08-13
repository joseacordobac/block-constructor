<?php
   class ApiAllSlugs {
      public function API_slug() {
         $api_slug = new RouterAllSlugs();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


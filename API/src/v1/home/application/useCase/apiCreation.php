<?php
   class ApiHome{
      public function API_slug() {
         $api_slug = new RouterHome();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


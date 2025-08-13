<?php
   class ApiPosts {
      public function API_slug() {
         $api_slug = new RouterPosts();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


<?php
   class APIClassStatus {
      public function API_class_status() {
         $api_slug = new RouterClassStatus ();
         $api_slug->REST_API_CLASS();
         return $api_slug;
      }
   }


<?php
   class ApiTax {
      public function API_slug() {
         $api_slug = new RouterTax();
         $api_slug->REST_API_SLUG();
         return $api_slug;
      }
   }


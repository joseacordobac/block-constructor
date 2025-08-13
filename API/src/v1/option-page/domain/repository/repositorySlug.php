<?php

  class RepositoryOptionPage
  {

    public function optionPage($params) {
      $slug_option_page = isset($params['slug']) ? $params['slug'] : 'social';

      return get_field($slug_option_page, 'option');

    }
  }



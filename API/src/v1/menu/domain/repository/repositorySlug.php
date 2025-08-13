<?php

  class RepositoryMenu
  {

    public function get_menu_data($param) {
      $menu_slug = isset($param['id_menu']) ? $param['id_menu'] : 2;
      $menu = wp_get_nav_menu_items($menu_slug);
      
      $menu_map = array_map(function ($item) {
        return array(
          'id' => $item->ID,
          'title' => $item->title,
          'route' => $item->url,
        );
      }, $menu);

      return $menu_map;
    }

}


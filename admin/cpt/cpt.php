<?php

// Registrar Custom Post Type "Clases"
function registrar_cpt_clases() {
  $labels = array(
      'name' => 'Clases',
      'singular_name' => 'Clase',
      'menu_name' => 'Clases',
      'name_admin_bar' => 'Clase',
      'add_new' => 'Añadir Nueva',
      'add_new_item' => 'Añadir Nueva Clase',
      'new_item' => 'Nueva Clase',
      'edit_item' => 'Editar Clase',
      'view_item' => 'Ver Clase',
      'all_items' => 'Todas las Clases',
      'search_items' => 'Buscar Clases',
      'not_found' => 'No se encontraron clases.',
      'not_found_in_trash' => 'No se encontraron clases en la papelera.',
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'clases'),
      'supports' => array('title', 'editor', 'thumbnail'),
      'show_in_rest' => true,
      'rest_base' => 'clases',
      'rest_controller_class' => 'WP_REST_Posts_Controller',
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-book',
      'menu_position' => 5,
      'hierarchical' => false,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'can_export' => true,
      'show_in_menu' => true,
      'show_in_admin_bar' => true,
      'show_in_nav_menus' => true,
      'show_in_rest' => true
  );

  register_post_type('clases', $args);
}
add_action('init', 'registrar_cpt_clases');

function registrar_taxonomia_cursos() {
  $labels = array(
      'name'              => 'Cursos',
      'singular_name'     => 'Curso',
      'search_items'      => 'Buscar Cursos',
      'all_items'         => 'Todos los Cursos',
      'parent_item'       => 'Curso Padre',
      'parent_item_colon' => 'Curso Padre:',
      'edit_item'         => 'Editar Curso',
      'update_item'       => 'Actualizar Curso',
      'add_new_item'      => 'Añadir Nuevo Curso',
      'new_item_name'     => 'Nuevo Nombre de Curso',
      'menu_name'         => 'Cursos',
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_in_rest'      => true,
      'show_admin_column' => true,
      'rewrite'           => array('slug' => 'cursos'),
  );

  register_taxonomy('cursos', array('clases'), $args);
}
add_action('init', 'registrar_taxonomia_cursos');

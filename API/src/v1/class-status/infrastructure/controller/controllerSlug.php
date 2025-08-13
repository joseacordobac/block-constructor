<?php
class ControllerClassStatus
{
  public function apiClass($param) {
    $method = $param->get_method();

    $actions = [
      'GET'  => 'get_class_status_data',
      'PUT' => 'put_class_status_data',
    ];

    if (isset($actions[$method])) {
      $repo = new RepositoryClassStatus();
      $data = $repo->{$actions[$method]}($param);
      return rest_ensure_response($data, 200);
    }

    return rest_ensure_response(['error' => 'Método no permitido'], 405);
  }
}

<?php
class RepositoryClassStatus
{

	private $table_name;
	private $wpdb;

	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'completedTable';
		$this->wpdb = $wpdb;
	}


	public function get_class_status_data($params) {

		$user_id = isset($params['user_id']) ? $params['user_id'] : '';
		$post_id = isset($params['post_id']) ? $params['post_id'] : '';

		if(empty($user_id)){
			$authorization = $params->get_headers()['authorization'];
			$user_id = $this->decode_jwt($authorization);
		}

			return $this->wpdb->get_results(
					$this->wpdb->prepare(
							"SELECT * FROM {$this->table_name} WHERE user_id = %d AND status = 1 AND class_id = $post_id",
							$user_id
					)
			);
	}

	public function get_class_by_term_id($params) {

		$term_id = isset($params['term_id']) ? $params['term_id'] : '';
		$user_id = isset($params['user_id']) ? $params['user_id'] : '';

		if(empty($user_id)){
			$authorization = $params->get_headers()['authorization'];
			$user_id = $this->decode_jwt($authorization);
		}

		return $this->wpdb->get_results(
			$this->wpdb->prepare(
				"SELECT * FROM {$this->table_name} WHERE user_id = %d AND tax_id = %s AND status = 1",
				$user_id,
				$term_id
			)
		);

	}

public function put_class_status_data($params) {
    // Extraer parámetros
    $class_id = isset($params['class_id']) ? $params['class_id'] : '';
    $status = isset($params['status']) ? $params['status'] : 1;

    // Verificar encabezado de autorización
		$authorization = $params->get_headers()['authorization'];
		$user_id = $this->decode_jwt($authorization);

    // Validación básica
    if (empty($user_id) || empty($class_id)) {
        return array('error' => array($user_id, $class_id, 'user_id and class_id are required'));
    }

    if (!is_numeric($user_id) || !is_numeric($class_id)) {
        return array('error' => 'user_id and class_id must be numeric');
    }

    if (!in_array($status, [0, 1])) {
        return array('error' => 'Invalid status value');
    }

    // Obtener término relacionado
    $terms_id = cursos_get_term_id($class_id, 'cursos');

    // Verificar si ya existe registro
    $id_data = $this->val_exist($user_id, $class_id);

    if ($id_data) {
        $inserted = $this->wpdb->update(
            $this->table_name,
            array(
                'status' => $status,
                'tax_id' => $terms_id
            ),
            array('id' => $id_data)
        );
        $action = 'updated';
    } else {
        $inserted = $this->wpdb->insert(
            $this->table_name,
            array(
                'user_id' => $user_id,
                'class_id' => $class_id,
                'status' => $status,
                'tax_id' => $terms_id
            )
        );
        $action = 'inserted';
    }

    if ($inserted === false) {
        return array('error' => 'Database operation failed');
    }

    return array(
        'status' => 'success',
        'action' => $action,
        'data_saved' => array(
            'user_id' => $user_id,
            'class_id' => $class_id,
            'affected_rows' => $inserted
        )
    );
}


	public function decode_jwt($token) {

		$data = explode('.', $token[0]);
		if (count($data) < 2) {
				return null;
		}

		$payload = $data[1];

		$remainder = strlen($payload) % 4;
		if ($remainder > 0) {
				$payload .= str_repeat('=', 4 - $remainder);
		}

		$decoded = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
		return isset($decoded['user_id']) ? $decoded['user_id'] : null;
	}

	private function val_exist($user_id, $class_id) {
    return $this->wpdb->get_var(
        $this->wpdb->prepare(
            "SELECT id FROM {$this->table_name} WHERE user_id = %d AND class_id = %d",
            $user_id,
            $class_id
        )
    );
	}

}


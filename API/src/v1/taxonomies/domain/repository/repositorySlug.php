<?php
class RepositoryTax
{

	private $user_id;

    public function get_taxonomy($param) {
        $taxonomy = isset($param['tax']) ? $param['tax'] : 'cursos';
		$slugTax = isset($param['slug-tax']) ? $param['slug-tax'] : null;

		$authorization = $param->get_headers()['authorization'];
		$this->user_id = $this->decode_jwt($authorization);


        $terms = get_terms([
			'taxonomy'   => $taxonomy,
            'hide_empty' => true,
        ]);

		if($slugTax) {
			$term = get_term_by('slug', $slugTax, $taxonomy);
			$terms = [$term];
		}

        $result = [];

        if (!is_wp_error($terms)) {
            foreach ($terms as $term) {

                $count_query = new WP_Query([
                    'post_type'      => 'clases',
                    'posts_per_page' => -1,
                    'tax_query'      => [
                        [
                            'taxonomy' => $taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $term->term_id,
                        ],
                    ],
                    'fields' => 'ids',
                ]);
                $clases_count = $count_query->found_posts;

                $result[] = [
					'id'          => $term->term_id,
                    'name'        => $term->name,
                    'slug'        => $term->slug,
                    'clases_count' => $clases_count,
					'description'  => $term->description,
					'completed'    => $this->get_total_completed_class($term->term_id),
                    'curso_img'   => get_field('curso_img', $taxonomy . '_' . $term->term_id),
					'teacher'     => get_field('teacher', $taxonomy . '_' . $term->term_id),
                ];
            }
        }

        return $result;
    }

	private function get_total_completed_class($id_term){
		$params = array(
			'user_id' =>$this->user_id,
			'term_id' => $id_term
		);

		$statusRepository = new RepositoryClassStatus();
		$taxonomy_list = $statusRepository->get_class_by_term_id($params);
		return count($taxonomy_list);
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
}


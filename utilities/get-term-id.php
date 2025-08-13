<?php

function cursos_get_term_id($id_post, $taxonomy) {
	$terms = wp_get_post_terms($id_post, $taxonomy);
	$terms_id = [];

	if(!is_wp_error($terms) && !empty($terms)) {
		foreach ($terms as $value) {
			$terms_id[] = $value->term_id;
		}
		return implode(',', $terms_id);
	}

}

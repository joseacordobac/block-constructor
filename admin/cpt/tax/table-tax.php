<?php

add_action('cursos_edit_form_fields', 'cursos_edit_form_fields', 10, 2);

function cursos_edit_form_fields($term, $taxonomy) {
	if ($taxonomy != 'cursos') {
		return;
	}

	$args = array(
		'post_type' => 'clases',
		'tax_query' => array(
				array(
						'taxonomy' => $term->taxonomy,
						'field'    => 'term_id',
						'terms'    => $term->term_id,
				),
		),
		'posts_per_page' => -1,
	);

	$tax_post = new WP_Query($args);

	echo '<style>
		.submit-list {
			margin-top: 20px !important;
		}
	</style>';

	echo '<tr class="form-field">';
	echo '<th scope="row"><label>Clases del curso</label></th>';
	echo '<td>';

	if ($tax_post->have_posts()) {
			echo '<table class="wp-list-table widefat fixed striped">';
			echo '<thead>
							<tr>
									<th scope="col">Imagen</th>
									<th scope="col">Fecha</th>
									<th scope="col">Título</th>
									<th scope="col">Orden</th>
							</tr>
						</thead>';
			echo '<tbody>';
			while ($tax_post->have_posts()) {
					$tax_post->the_post();
					echo '<tr>';
					echo '<td>';
						echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
					echo '</td>';
					echo '<td>' . get_the_date() . '</td>';
					echo '<td><a href="' . get_edit_post_link() . '">' . get_the_title() . '</a></td>';
					echo '<td>';
						echo '<input type="number" name="order-'.$term->term_id.'" value="'.get_post_meta(get_the_ID(), 'order-'.$term->term_id, true).'">';
						echo '</td>';
					echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
	} else {
			echo '<p>No hay posts relacionados.</p>';
	}

	echo '</td>';
	echo '</tr>';

	wp_reset_postdata();

}

add_action('edited_cursos', 'guardar_orden_clases_para_posts', 10, 2);
function guardar_orden_clases_para_posts($term_id, $tt_id) {
	if (
		!isset($_POST['orden_clases_nonce']) ||
		!wp_verify_nonce($_POST['orden_clases_nonce'], 'guardar_orden_clases')
	) {
		return;
	}

	if (isset($_POST['order']) && is_array($_POST['order'])) {
		foreach ($_POST['order'] as $post_id => $orden) {
			$orden_sanitizado = intval($orden);
			update_post_meta($post_id, 'order-' . $term_id, $orden_sanitizado);
		}
	}
}


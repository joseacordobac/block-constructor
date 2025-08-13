<?php

include_once 'render.php';

function create_block_clases() {
	register_block_type(
		BUILD_PATH . '/clases',
		array(
			'render_callback' => 'render_slider_clases'
		)
	);
}

add_action( 'init', 'create_block_clases' );




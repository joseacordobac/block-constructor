<?php

include_once 'render.php';

function create_block_cards() {
	register_block_type(
		BUILD_PATH . '/card',
		array(
			'render_callback' => 'render_card'
		)
	);
}

add_action( 'init', 'create_block_cards' );




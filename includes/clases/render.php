<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_slider_clases() {

	wp_enqueue_style(
		'view',
		BUILD_URL . '/clases/view.css',
		array(),
		'1.1',
		'all'
	);

	wp_enqueue_script(
		'view-react',
		BUILD_URL . '/clases/view.js',
		array(),
		'1.2',
		true
	);

	return '<div id="root" class="block_callback"></div>';

}

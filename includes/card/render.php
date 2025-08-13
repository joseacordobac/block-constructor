<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function render_card() {

	wp_enqueue_style(
		'view',
		BUILD_URL . '/card/view.css',
		array(),
		'1.1',
		'all'
	);

	wp_enqueue_script(
		'view-react',
		BUILD_URL . '/card/view.js',
		array(),
		'1.2',
		true
	);

	$has_suscripton = user_has_subscription() ? 'has-suscription' : 'no-suscription';
	return '<div id="cards" class="card-callback '.$has_suscripton.'"></div>';

}

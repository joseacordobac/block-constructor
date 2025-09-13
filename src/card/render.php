<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! function_exists( 'cards_render' ) ) {

	function cards_render( $attributes, $content, $block) {

		$html = '<div class="card-list-head">';
			$html .= '<h4 class="card-list-head__total"><span class="card-list-head__total-count">0</span> productos en tu búsqueda</h4>';
			$html .= '<div class="card-list-head__sort">';
				$html .= '<h4 class="card-list-head__sort-title">Ordenar por: ';
				$html .= '<span class="card-list-head__sort-order card-list-head__sort-order--asc">Precio de menor a mayor</span>';
				$html .= '</h4>';
			$html .= '</div>';
		$html .= '</div>';

		return $html;

	}
}

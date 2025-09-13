<?php
/**
 * Renderiza el bloque de paginación.
 *
 * @param array    $attributes Atributos del bloque.
 * @param string   $content    Contenido del bloque.
 * @param WP_Block $block      El objeto de bloque.
 */

$align = isset( $attributes['align'] ) ? $attributes['align'] : 'left';
$className = isset( $attributes['className'] ) ? $attributes['className'] : '';
$classes_personalizadas = 'content-pagination ' . $className;

$wrapper_attributes = get_block_wrapper_attributes( array(
    'id' => 'pagination-block-root',
    'class' => $classes_personalizadas,
    'style' => 'text-align: ' . $align . ';'
) );

?>

<div <?php echo $wrapper_attributes; ?>></div>
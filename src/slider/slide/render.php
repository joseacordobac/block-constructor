
<?php
/**
 * Renderiza el bloque Swiper Slide.
 *
 * @param array    $attributes Atributos del bloque.
 * @param string   $content    Contenido del bloque.
 * @param WP_Block $block      El objeto de bloque.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$wrapper_attributes = get_block_wrapper_attributes( array(
    'class' => 'swiper-slide swiper-slide--block',
) );

?>
<div <?php echo $wrapper_attributes; ?>>
    <?php echo $content; ?>
</div>
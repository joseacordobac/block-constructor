<?php
/**
 * Renderiza el bloque de lista de tarjetas.
 *
 * @param array    $attributes Atributos del bloque.
 * @param string   $content    Contenido del bloque.
 * @param WP_Block $block      El objeto de bloque.
 */

$whatsappText = isset( $attributes['whatsappText'] ) ? $attributes['whatsappText'] : '';
$whatsappNumber = isset( $attributes['whatsappNumber'] ) ? $attributes['whatsappNumber'] : '';
$whatsappMessage = isset( $attributes['whatsappMessage'] ) ? $attributes['whatsappMessage'] : '';
$position = isset( $attributes['position'] ) ? $attributes['position'] : '';
$type = isset( $position['type'] ) ? $position['type'] : '';

$is_fixed = $type == 'fixed' ? 'fixed_whatsapp' : 'clasic_whatsapp';
$class = $is_fixed . ' ctom-block-whatsapp';

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => $class ) );

?>


<div <?php echo $wrapper_attributes; ?>>
    <a href="https://wa.me/<?php echo "$whatsappNumber/?text=$whatsappMessage"; ?>" target="_blank" class="ctom-block-whatsapp__anchor">
        <?php echo $whatsappText; ?>
    </a>
</div>
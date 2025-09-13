<?php
/**
 * Renderiza el bloque de lista de tarjetas.
 *
 * @param array    $attributes Atributos del bloque.
 * @param string   $content    Contenido del bloque.
 * @param WP_Block $block      El objeto de bloque.
 */

$count = isset( $attributes['count'] ) ? $attributes['count'] : 0;
$order_title = isset( $attributes['orderTitle'] ) ? $attributes['orderTitle'] : 'Ordenar por: ';
$order_asc_label = isset( $attributes['orderAscLabel'] ) ? $attributes['orderAscLabel'] : 'Precio de menor a mayor';

$wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'card-list-head' ) );

?>
<div <?php echo $wrapper_attributes; ?>>
    <h4 class="card-list-head__total">
        <span class="card-list-head__total-count"><?php echo esc_html( $count ); ?></span> productos en tu búsqueda
    </h4>
    <div class="card-list-head__sort">
        <h4 class="card-list-head__sort-title">
            <?php echo esc_html( $order_title ); ?>
            <span class="card-list-head__sort-order card-list-head__sort-order--asc">
                <?php echo esc_html( $order_asc_label ); ?>
            </span>
        </h4>
    </div>
</div>
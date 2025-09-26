<?php
/**
 * Renderiza el bloque de lista de tarjetas de productos.
 *
 * @param array    $attributes Atributos del bloque.
 * @param string   $content    Contenido del bloque.
 * @param WP_Block $block      El objeto de bloque.
 */

if ( ! function_exists( 'args_global' ) ) {
    error_log( 'Error: La función args_global no está definida.' );
    return;
}

$post_type = isset( $attributes['postType'] ) ? $attributes['postType'] : 'post';

$search     = isset( $_GET['search'] )   ? sanitize_text_field( $_GET['search'] )   : '';
$limit      = isset( $_GET['per_page'] ) ? intval( $_GET['per_page'] )             : 12;
$meta_key   = isset( $_GET['meta_key'] ) ? sanitize_text_field( $_GET['meta_key'] ) : 'precio';	
$orderby    = isset( $_GET['orderby'] )  ? sanitize_text_field( $_GET['orderby'] )  : '';
$order      = isset( $_GET['order'] )    ? strtoupper( sanitize_text_field( $_GET['order'] ) ) : 'ASC';
$page       = isset( $_GET['page'] )     ? intval( $_GET['page'] )                : 1;
$taxonomies = null;
$meta_query = null;

$args = args_global(
    $post_type,
    $search,
    $limit,
    $taxonomies,
    $meta_key,
    $orderby,
    $order,
    $page
);

$cards_list = new WP_Query( $args );
$wrapper_attributes = get_block_wrapper_attributes( array(
    'id'    => 'app',
    'class' => 'card-list',
) );

?>

<div <?php echo $wrapper_attributes; ?> data-pages="<?php echo esc_attr( $cards_list->max_num_pages ); ?>">
    <?php
    if ( $cards_list->have_posts() ) {
        while ( $cards_list->have_posts() ) {
            $cards_list->the_post();

            $tipo_producto = get_the_terms( get_the_ID(), 'tipo-producto' );
            $marca         = get_the_terms( get_the_ID(), 'marcas' );            
            $tipo_producto_name = ! empty( $tipo_producto ) ? esc_html( $tipo_producto[0]->name ) : '';
            $marca_name         = ! empty( $marca ) ? esc_html( $marca[0]->name ) : '';

            $url_imagen = esc_url( get_field( 'url_de_la_imagen' ) );
            $precio = esc_html( get_field( 'precio' ) );
            $nota_precio = esc_html( get_field( 'nota_de_precio' ) );
            $whatsapp_number = esc_attr( get_field( 'whatsapp-number', 'options' ) );
            $post_content = esc_html( get_the_content() );

            $whatsapp_link = 'https://wa.me/' . $whatsapp_number . '?text=' . urlencode( 'Estoy interesado en: ' . get_the_title() );
            ?>
            <div class="card-list-content">
                <div class="card-list__img">
                    <?php if ( $url_imagen ) : ?>
                        <img class="card-list__img-src" src="<?php echo $url_imagen; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    <?php endif; ?>
                </div>
                <div class="card-list__body">
                    <span class="card-list__tag-cat"><?php echo $tipo_producto_name; ?></span>
                    <h3 class="card-list__title"><?php echo $post_content; ?></h3>
                    <h4 class="card-list__price">
                        <?php echo $precio; ?>
                        <span class="card-list__price-description"><?php echo $nota_precio; ?></span>
                    </h4>
                    <p class="card-list__marca">Marca: <b class="card-list__marca-bold"><?php echo $marca_name; ?></b></p>
                    <a href="<?php echo $whatsapp_link; ?>" target="_blank" class="card-list__contact-us">Pedir</a>
                </div>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>No se encontraron productos.</p>';
    }
    ?>
</div>
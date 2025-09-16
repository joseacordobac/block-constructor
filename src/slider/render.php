<?php
/**
 * Renders the custom slider block.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block inner content.
 * @param WP_Block $block      The block instance.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Extract attributes for cleaner code.
$className     = isset( $attributes['className'] ) ? $attributes['className'] : '';
$slider_options = isset( $attributes['slideConfig'] ) ? $attributes['slideConfig'] : [];
$slider_icons  = isset( $attributes['arrowIcon'] ) ? $attributes['arrowIcon'] : [];
$slider_id     = isset( $attributes['sliderId'] ) ? 'slider-' . esc_attr( $attributes['sliderId'] ) : 'slider-' . uniqid();

// Encode slider options for the data attribute.
$jsonSlideConfig = json_encode( $slider_options );

// Check for pagination and arrows.
$slider_pagination = isset( $slider_options['pagination'] ) && $slider_options['pagination'];
$slider_arrows     = isset( $slider_options['navigation'] ) && isset( $slider_options['navigation']['nextEl'] );


// Use get_block_wrapper_attributes() for proper block integration.
$wrapper_attributes = get_block_wrapper_attributes( [
    'class' => 'element-slider-contains ' . esc_attr( $className ),
] );
?>

<div <?php echo $wrapper_attributes; ?>>
    <div class="swiper-container slider-block" id="<?php echo esc_attr( $slider_id ); ?>" data-swiper="<?php echo esc_attr( $jsonSlideConfig ); ?>">
        <div class="swiper-wrapper content-slider">
            <?php echo $content; ?>
        </div>
        
        <?php if ( $slider_pagination ) : ?>
            <div class="swiper-pagination"></div>
        <?php endif; ?>
    </div>

    <?php if ( $slider_arrows ) :
        $nextSlider = substr( $slider_options['navigation']['nextEl'], 1 );
        $prevSlider = substr( $slider_options['navigation']['prevEl'], 1 );
    ?>
        <div class="arrow-btn arrow-btn-right <?php echo esc_attr( $nextSlider ); ?>">
            <img src="<?php echo esc_url( $slider_icons['next'] ); ?>" alt="arrow-right">
        </div>
        <div class="arrow-btn arrow-btn-left <?php echo esc_attr( $prevSlider ); ?>">
            <img src="<?php echo esc_url( $slider_icons['prev'] ); ?>" alt="arrow-left">
        </div>
    <?php endif; ?>
</div>
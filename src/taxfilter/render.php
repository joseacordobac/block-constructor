<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$taxonomy_slug = $attributes['taxonomySlug'] ?? '';
$type = $attributes['type'] ?? 'checkbox';
$name = $attributes['name'] ?? '';
$style = $attributes['style'] ?? '';
$className = $attributes['className'] ?? '';

$terms = get_terms([
    'taxonomy'   => $taxonomy_slug,
    'hide_empty' => false,
]);

?>

<div class="<?php echo esc_attr( $className ); ?> block-taxfilter block-taxfilter--<?php echo esc_attr( $style ); ?> block-taxfilter--<?php echo esc_attr( $type ); ?>">
    <?php if ( ! empty( $name ) ) : ?>
        <h2 class="block-taxfilter__title"><?php echo esc_html( $name ); ?></h2>
    <?php endif; ?>

    <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
        <?php foreach ( $terms as $term ) : ?>
            <div class="block-taxfilter__item">
                <label class="block-taxfilter__label">
                    <input class="block-taxfilter__input"
                           type="<?php echo esc_attr( $type ); ?>"
                           value="<?php echo esc_attr( $term->slug ); ?>"
                           name="<?php echo esc_attr( $taxonomy_slug ); ?>"
                           id="<?php echo esc_attr( $term->slug ); ?>">
                    <span class="block-taxfilter__text"><?php echo esc_html( $term->name ); ?></span>
                </label>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
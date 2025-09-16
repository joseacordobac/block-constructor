<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// These variables are automatically available
$placeholder = $attributes['placeholder'] ?? 'Search';
$buttonText = $attributes['buttonText'] ?? 'Buscar';
$searchPage = $attributes['searchPage'] ? 'new-direct' : 'direct';
$className = $attributes['className'] ?? '';
$icon = $attributes['icon'] ?? '';

?>

<div class="block-my-search <?php echo esc_attr($className); ?>" data-search="<?php echo esc_attr($searchPage); ?>">
    <span class="block-my-search__icon"><?php echo $icon; ?></span>
    <input class="block-my-search__input" type="text" placeholder="<?php echo esc_attr($placeholder); ?>" name="main-search"/>
    <button class="block-my-search__button"><?php echo esc_html($buttonText); ?></button>
</div>

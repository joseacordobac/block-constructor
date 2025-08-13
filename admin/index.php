<?php

include_once plugin_dir_path(__FILE__) . 'cpt/cpt.php';
include_once 'cpt/tax/table-tax.php';
include_once 'jwt/login-jwt.php';


add_theme_support('post-thumbnails');
add_image_size('featured-image', 800, 600, true);


<?php

function theme_support() {
    // Support for title-tag
    add_theme_support('title-tag');

    // Support for custom logo
    add_theme_support('custom-logo');

    // Support for post thumbnails
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(500, 500, array('center', 'center'));
}
add_action('after_setup_theme', 'theme_support');

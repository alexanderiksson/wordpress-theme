<?php

// Load CSS
function register_theme_styles() {
    wp_enqueue_style('theme-main-css', get_stylesheet_uri());
    wp_enqueue_style('theme-global-css', get_template_directory_uri() . '/assets/css/global.css');
}
add_action('wp_enqueue_scripts', 'register_theme_styles');


// Load JS
function register_theme_scripts() {
    wp_enqueue_script('theme-js', get_template_directory_uri() . '/assets/js/index.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'register_theme_scripts');

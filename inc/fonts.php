<?php

function load_custom_fonts() {
    wp_enqueue_style(
        'custom-google-fonts',
        'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'load_custom_fonts');

<?php

// Custom excerpt length
function theme_excerpt_length($length) {
    return 10;
}
add_filter('excerpt_length', 'theme_excerpt_length');

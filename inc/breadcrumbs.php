<?php

add_filter('aioseo_breadcrumbs_output', 'theme_hide_home_breadcrumb');
function theme_hide_home_breadcrumb($shouldShowTrail) {

    // Hide breadcrumbs on front-page
    if (is_front_page()) {
        return false;
    }
    return $shouldShowTrail;
}

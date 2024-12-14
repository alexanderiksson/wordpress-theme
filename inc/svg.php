<?php
// Tillåt SVG uppladdning
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

// Sanera SVG-filer vid uppladdning
function sanitize_svg_upload($file) {
    $filetype = wp_check_filetype($file['name']);
    if ($filetype['ext'] === 'svg') {
        $file_contents = file_get_contents($file['tmp_name']);
        if (strpos($file_contents, '<script') !== false) {
            $file['error'] = 'SVG-filen innehåller skript och tillåts inte.';
        }
    }
    return $file;
}
add_filter('wp_handle_upload_prefilter', 'sanitize_svg_upload');

// Lägg till stöd för SVG i mediebiblioteket
function add_svg_to_media_library($response, $attachment, $meta) {
    if ($response['type'] === 'image' && $response['subtype'] === 'svg+xml') {
        $response['sizes'] = [];
        $response['icon'] = $response['url'];
    }
    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'add_svg_to_media_library', 10, 3);

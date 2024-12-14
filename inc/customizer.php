<?php

function theme_customize_register( $wp_customize ) {
    /* === Front page panel === */
    $wp_customize->add_panel( 'theme_front_page', array(
        'title'    => 'Front Page',
        'priority' => 10,
    ));

    /* === Hero section === */
    $wp_customize->add_section( 'theme_hero_section', array(
        'panel'    => 'theme_front_page',
        'title'    => 'Hero',
        'priority' => 30,
    ));

    // Hero image
    theme_add_image_setting( $wp_customize, 'theme_hero_img', 'theme_hero_section', 'Bakgrundsbild' );
    // Hero title
    theme_add_text_setting( $wp_customize, 'theme_hero_title', 'theme_hero_section', 'Rubrik' );
    // Hero text
    theme_add_textarea_setting( $wp_customize, 'theme_hero_text', 'theme_hero_section', 'Text' );
    // Hero button href
    theme_add_page_setting( $wp_customize, 'theme_hero_button_href', 'theme_hero_section', 'Välj knapp länk' );
    // Hero button label
    theme_add_text_setting( $wp_customize, 'theme_hero_button_label', 'theme_hero_section', 'Knapp etikett' );

    /* === CTA section === */
    $wp_customize->add_section( 'theme_cta_section', array(
        'panel'    => 'theme_front_page',
        'title'    => 'Call to action',
        'priority' => 30,
    ));

    // CTA title
    theme_add_text_setting( $wp_customize, 'theme_cta_title', 'theme_cta_section', 'Rubrik' );
    // CTA text
    theme_add_textarea_setting( $wp_customize, 'theme_cta_text', 'theme_cta_section', 'Text' );
    // CTA button href
    theme_add_page_setting( $wp_customize, 'theme_cta_button_href', 'theme_cta_section', 'Välj knapp länk' );
    // CTA button label
    theme_add_text_setting( $wp_customize, 'theme_cta_button_label', 'theme_cta_section', 'Knapp etikett' );



    /* === Footer panel === */
    $wp_customize->add_panel( 'theme_footer_panel', array(
        'title'    => __( 'Footer', 'theme' ),
        'priority' => 20,
    ));

    /* === Contact section === */
    $wp_customize->add_section( 'theme_contact_section', array(
        'panel'    => 'theme_footer_panel',
        'title'    => __( 'Contact', 'theme' ),
        'priority' => 30,
    ));

    // Email
    theme_add_text_setting( $wp_customize, 'theme_contact_mail', 'theme_contact_section', 'Mail Address' );
    // Phone
    theme_add_text_setting( $wp_customize, 'theme_contact_phone', 'theme_contact_section', 'Telefon' );
    // Instagram
    theme_add_text_setting( $wp_customize, 'theme_contact_instagram', 'theme_contact_section', 'Instagram länk' );
    // Facebook
    theme_add_text_setting( $wp_customize, 'theme_contact_facebook', 'theme_contact_section', 'Facebook' );

}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * Helper function to add a text setting and control
 */
function theme_add_text_setting( $wp_customize, $id, $section, $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_text_field', // Ensure safe input
    ));

    $wp_customize->add_control( $id . '_input', array(
        'type'     => 'text',
        'label'    => $label,
        'section'  => $section,
        'settings' => $id,
    ));
}

/**
 * Helper function to add a textarea setting and control
 */
function theme_add_textarea_setting( $wp_customize, $id, $section, $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field', // Ensures safe input for multi-line text
    ));

    $wp_customize->add_control( $id . '_textarea', array(
        'type'     => 'textarea',
        'label'    => $label,
        'section'  => $section,
        'settings' => $id,
    ));
}


/**
 * Helper function to add an image setting and control
 */
function theme_add_image_setting( $wp_customize, $id, $section, $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw', // Ensure safe URLs
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id . '_control', array(
        'label'    => $label,
        'section'  => $section,
        'settings' => $id,
    )));
}


/**
 * Helper function to add an page setting and control
 */
function theme_add_page_setting( $wp_customize, $id, $section, $label ) {
    $wp_customize->add_setting( $id, array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    // Lägg till kontroll
    $wp_customize->add_control( $id . '_control', array(
        'label'       => $label,
        'section'     => $section,
        'settings'    => $id,
        'type'        => 'dropdown-pages',
    ));
}

?>

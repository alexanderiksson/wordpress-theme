<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo esc_url(get_site_icon_url()); ?>" type="image/png">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

    <!-- Header -->
    <header class="w-full py-4 fixed shadow-md base z-10">
        <div class="content flex flex-row justify-start items-center">
            <!-- Logo -->
            <div>
                <?php if (function_exists('the_custom_logo')) : ?>
                    <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if ($logo) : ?>
                            <img class="h-12" src="<?php echo esc_url($logo[0]); ?>" alt="<?php bloginfo('name') ?>">
                        <?php else : ?>
                            <span class="text-lg font-bold"><?php bloginfo('name') ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Navigation -->
            <nav class="ml-auto hidden md:block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <!-- Mobile Menu Toggle -->
            <div class="ml-auto block md:hidden">
                <img class="w-8 cursor-pointer" src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/menu.svg'); ?>"
                alt="Menu" onclick="openMenu()">
            </div>
        </div>
    </header>

    <!-- Mobile Dropdown -->
    <div id="dropdown">
        <div class="content">
            <div class="mb-8 flex justify-end">
                <img class="w-6 cursor-pointer" src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/close.svg'); ?>"
                alt="Close" onclick="closeMenu()" loading="lazy">
            </div>
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_id' => 'dropdown-nav',
                    'menu_id' => 'main-menu',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>
        </div>
    </div>

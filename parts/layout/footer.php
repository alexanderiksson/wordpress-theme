<footer class="pt-20 pb-4 base-4">
    <div class="content">

        <!-- Contact and Links Section -->
        <div class="w-full flex flex-col md:flex-row justify-evenly gap-16 md:gap-32 mb-16">

            <!-- Links Section -->
            <div class="flex flex-col gap-8">
                <h2 class="text-xl font-semibold">Länkar</h2>
                <nav aria-label="Footer navigation">
                    <?php
                    wp_nav_menu(array(
                        'menu'           => 'footer',
                        'theme_location' => 'footer',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>
            </div>


            <!-- Contact Section -->
            <div class="flex flex-col gap-8">
                <h2 class="text-xl font-semibold">Kontakta mig</h2>
                <ul>
                    <?php if ($email = get_theme_mod("theme_contact_mail")) : ?>
                        <li>
                            <a href="mailto:<?php echo esc_attr($email); ?>" aria-label="Skicka e-post till <?php echo esc_html($email); ?>">
                                <?php echo esc_html($email); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($phone = get_theme_mod("theme_contact_phone")) : ?>
                        <li>
                            <a href="tel:<?php echo esc_attr($phone); ?>" aria-label="Ring till <?php echo esc_html($phone); ?>">
                                <?php echo esc_html($phone); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>


            <!-- Socials Section -->
            <div class="flex flex-col gap-8">
                <h2 class="text-xl font-semibold">Följ mig</h2>
                <div class="flex gap-2">

                    <?php
                    $instagram_url = esc_url( get_theme_mod( "theme_contact_instagram" ) );
                    $facebook_url = esc_url( get_theme_mod( "theme_contact_facebook" ) );

                    // Visa länkar om URL finns
                    if ( $instagram_url ) : ?>
                        <a href="<?php echo $instagram_url; ?>"
                        target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/instagram.svg' ); ?>"
                            alt="Instagram" class="w-8" loading="lazy">
                        </a>
                    <?php endif; ?>

                    <?php if ( $facebook_url ) : ?>
                        <a href="<?php echo $facebook_url; ?>"
                        target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/facebook.svg' ); ?>"
                            alt="Facebook" class="w-8" loading="lazy">
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>

        <!-- Copyright Section -->
        <p class="text-xs text-center opacity-50">
            Copyright &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>
        </p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

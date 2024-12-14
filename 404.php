<?php
    get_template_part( 'parts/layout/header' );
?>

<main>
    <div class="content">

        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb();
            }
            ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-24">

            <div class="space-y-4" role="region" aria-labelledby="error-title">
                <h1 id="error-title" class="page-title">Oj, sidan kunde inte hittas!</h1>
                <p>Vi kunde inte hitta den sida du letade efter. Det kan bero på att länken är trasig eller att sidan har flyttats.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="button-1">Gå till startsidan</a>
            </div>

            <div class="flex justify-center">
                <img class="w-60"
                src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/404.svg') ?>"
                alt="Illustration av 404-fel">
            </div>

        </div>

    </div>
</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

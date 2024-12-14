<?php
    get_template_part( 'parts/layout/header' );
?>

<main class="mb-16">
    <div class="content">

        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb();
            }
            ?>
        </div>

        <?php get_template_part('parts/content/content', 'single') ?>

    </div>
</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

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

        <!-- Page Title -->
        <h1 class="page-title"><?php the_title() ?></h1>

        <?php the_content() ?>

    </div>
</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

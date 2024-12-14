<?php
    get_template_part( 'parts/layout/header' );
?>

<main>

    <!-- Hero -->
    <?php
    $hero_img = esc_url( get_theme_mod( 'theme_hero_img' ) );
    $hero_title = esc_html( get_theme_mod( 'theme_hero_title' ) );
    $hero_text = esc_html( get_theme_mod( 'theme_hero_text' ) );
    $hero_button_label = esc_html( get_theme_mod( 'theme_hero_button_label' ) );
    $hero_button_href = esc_url( get_permalink( get_theme_mod( 'theme_hero_button_href' ) ) );
    ?>

    <section class="py-28 md:py-40 bg-center bg-cover bg-black bg-opacity-70 bg-blend-multiply"
    style="background-image: url('<?php echo $hero_img; ?>');"
    aria-label="<?php echo esc_attr( $hero_title ); ?>">

        <div class="content flex flex-col gap-8">
            <h1 class="text-4xl md:text-5xl text-white font-semibold max-w-3xl"><?php echo $hero_title ?></h1>
            <p class="max-w-lg text-xl text-white"><?php echo $hero_text ?></p>
            <div class="flex gap-4 flex-wrap">
                <a class="button-1" href="<?php echo $hero_button_href ?>"
                aria-label="<?php echo $hero_button_label ?>">
                    <?php echo $hero_button_label ?>
                </a>
            </div>
        </div>

    </section>


    <!-- Services -->
    <section id="tjanster">
        <div class="content">

            <h2 class="section-title">Tjänster</h2>
            <div class="grid sm:grid-cols-2 xl:grid-cols-4 gap-4">

                <?php
                $args = array('post_type' => 'tjanst', 'post_status' => 'publish',);
                $query = new WP_Query($args);

                while ($query->have_posts()) : $query->the_post();

                    $description = get_post_meta(get_the_ID(), 'beskrivning', true);
                    $icon = wp_get_attachment_url(get_post_meta(get_the_ID(), 'ikon', true));

                ?>

                    <div class="p-8 shadow-lg rounded-md border">
                        <img class="w-12 mb-4" src="<?php echo esc_url($icon); ?>"
                        alt="Ikon för <?php the_title(); ?>" loading="lazy">
                        <h3 class="text-2xl font-semibold mb-4"><?php the_title(); ?></h3>
                        <p><?php echo esc_html($description) ?></p>
                    </div>

                <?php
                endwhile;
                ?>

            </div>
        </div>
    </section>


    <!-- Call to action -->
    <?php
    $cta_title = esc_html( get_theme_mod( 'theme_cta_title' ) );
    $cta_text = esc_html( get_theme_mod( 'theme_cta_text' ) );
    $cta_button_label = esc_html( get_theme_mod( 'theme_cta_button_label' ) );
    $cta_button_href = esc_url( get_permalink( get_theme_mod( 'theme_cta_button_href' ) ) );
    ?>

    <section class="text-center base-3">
        <div class="content">
            <h2 class="section-title"><?php echo $cta_title ?></h2>
            <div class="flex flex-col items-center gap-8">
                <p class="max-w-lg"><?php echo $cta_text ?></p>
                <a href="<?php echo $cta_button_href ?>"class="button-1"><?php echo $cta_button_label ?></a>
            </div>
        </div>
    </section>

</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

<a href="<?php echo esc_url(get_permalink()); ?>" aria-label="<?php echo esc_attr(get_the_title()); ?>">

    <div class="relative flex flex-col gap-8 border h-full rounded shadow-lg mb-12 group">

        <!-- Thumbnail -->
        <div class="overflow-hidden h-48 rounded-t relative">
            <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']);
            } else {
                $placeholder = get_template_directory_uri() . '/assets/img/placeholder.jpg';
                echo '<img src="' . esc_url($placeholder) . '" alt="Placeholder image" class="w-full h-full object-cover">';
            }
            ?>

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                <p class="text-white text-lg">Visa projektet</p>
            </div>
        </div>

        <div class="px-8 flex flex-col gap-4">
            <!-- Date -->
            <p class="text-sm text-gray-500"><?php echo esc_html(get_the_date()); ?></p>

            <!-- Post Title -->
            <h2 class="post-title">
                <?php echo esc_html(get_the_title()); ?>
            </h2>

            <!-- Excerpt -->
            <div>
                <p class="text-gray-700"><?php echo esc_html(get_the_excerpt()); ?></p>
            </div>
        </div>

    </div>
</a>

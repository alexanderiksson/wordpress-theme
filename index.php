<?php
    get_template_part( 'parts/layout/header' );
?>

<main>
    <div class="content">

        <!-- Breadcrumbs -->
        <div class="breadcrumbs">
            <?php
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
        </div>

        <!-- Page Title -->
        <h1 class="page-title"><?php echo esc_html(single_post_title('', false)); ?></h1>

        <!-- Filter -->
        <form method="get" class="my-8">

            <!-- Category filter -->
            <div class="relative w-72 max-w-full">

                <select name="category" id="category_filter" onchange="this.form.submit()"
                class="border border-gray-300 rounded shadow-sm px-4 py-2 text-gray-700 focus:outline-none transition h-10 w-full pr-8 appearance-none">

                    <option value="">Alla kategorier</option>

                    <?php
                    // Get categories
                    $categories = get_categories(array(
                        'hide_empty' => false,
                    ));
                    // Get current category
                    $current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
                    foreach ($categories as $category) :
                        $selected = ($current_category === $category->slug) ? 'selected' : '';
                    ?>
                        <option value="<?php echo esc_attr($category->slug); ?>" <?php echo $selected; ?>>
                            <?php echo esc_html($category->name); ?>
                        </option>
                    <?php endforeach; ?>

                </select>
                <!-- Arrow icon -->
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

            </div>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
            <?php
            // Get category from URL
            $category_slug = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            // New WP_Query
            $args = array('post_type' => 'post', 'category_name' => $category_slug, 'paged' => $paged,);
            $query = new WP_Query($args);

            // Get content-archive for each post
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    get_template_part('parts/content/content', 'archive');
                endwhile;
            else :
            ?>
                <p>Inga inlägg hittades...</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'mid_size' => 2,
                'prev_text' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <line x1="20" y1="8" x2="12" y2="16" stroke="black" stroke-width="2" stroke-linecap="round" />
                        <line x1="20" y1="24" x2="12" y2="16" stroke="black" stroke-width="2" stroke-linecap="round" />
                    </svg>',
                'next_text' => '
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <line x1="12" y1="8" x2="20" y2="16" stroke="black" stroke-width="2" stroke-linecap="round" />
                        <line x1="12" y1="24" x2="20" y2="16" stroke="black" stroke-width="2" stroke-linecap="round" />
                    </svg>',
            ));
            ?>
        </div>
    </div>
</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

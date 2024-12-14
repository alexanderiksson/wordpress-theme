<?php
    get_template_part( 'parts/layout/header' );
?>

<main role="main">
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
        <h1 class="page-title">
            <?php
            $category_title = single_cat_title('', false);
            if (empty($category_title)) {
                echo 'Kategorisida';
            } else {
                echo $category_title;
            }
            ?>
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mb-16">
            <?php
            if (is_category()) {
                $category_slug = get_queried_object()->slug; // Get category from URL
            } elseif (is_tag()) {
                $category_slug = get_queried_object()->slug; // Get tag from URL
            } elseif (is_author()) {
                $author_id = get_queried_object()->ID; // Get author from URL
            } else {
                $category_slug = '';
            }

            // Get page for pagination
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            // Define args for WP_Query
            $args = array(
                'post_type' => 'post', // Get posts
                'paged' => $paged, // Get pagination
            );

            if (!empty($category_slug)) {
                $args['category_name'] = $category_slug;
            } elseif (!empty($author_id)) {
                $args['author'] = $author_id;
            }

            // Create WP_Query to fetch posts
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
                'prev_text' => 'Föregående',
                'next_text' => 'Nästa',
            ));
            ?>
        </div>

    </div>
</main>

<?php
    get_template_part( 'parts/layout/footer' );
?>

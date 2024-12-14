<article id="post-<?php the_ID() ?>" <?php post_class() ?>>

    <h1 class="page-title"><?php the_title() ?></h1>
    <p class="post-date mb-8"><?php the_date() ?>

    <div class="post-content">
        <?php the_content() ?>
    </div>
</article>

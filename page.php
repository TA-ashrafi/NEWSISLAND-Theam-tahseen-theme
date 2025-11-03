<?php
/**
 * The template for displaying pages
 */

get_header();
?>

<div class="page-layout">
    <div class="page-content-area">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'tahseen-ashrafi'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
            </article>

            <?php
            // If comments are open or there is at least one comment, load the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();

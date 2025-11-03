<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<div class="error-404-layout">
    <div class="error-404-content">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'tahseen-ashrafi'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try searching for what you need?', 'tahseen-ashrafi'); ?></p>

            <?php get_search_form(); ?>

            <div class="recent-posts-404">
                <h2><?php esc_html_e('Recent Posts', 'tahseen-ashrafi'); ?></h2>
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));

                if ($recent_posts->have_posts()) :
                    echo '<div class="news-grid">';
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                    <article class="news-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>
                        <div class="news-card-content">
                            <span class="news-category"><?php echo tahseen_ashrafi_get_category(); ?></span>
                            <h3 class="news-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="news-author">By <?php the_author(); ?></p>
                        </div>
                    </article>
                <?php
                    endwhile;
                    echo '</div>';
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="categories-404">
                <h2><?php esc_html_e('Categories', 'tahseen-ashrafi'); ?></h2>
                <ul class="category-list">
                    <?php
                    wp_list_categories(array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => true,
                        'title_li'   => '',
                        'number'     => 10,
                    ));
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

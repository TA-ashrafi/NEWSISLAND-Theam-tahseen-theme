<?php
/**
 * The template for displaying search results
 */

get_header();
?>

<div class="search-layout">
    <div class="search-content-area">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    printf(
                        esc_html__('Search Results for: %s', 'tahseen-ashrafi'),
                        '<span>' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <div class="search-results-grid">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="news-card-content">
                            <span class="news-category"><?php echo tahseen_ashrafi_get_category(); ?></span>
                            
                            <h2 class="news-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="news-excerpt">
                                <?php the_excerpt(); ?>
                            </div>

                            <p class="news-author">
                                By <?php the_author(); ?> | <?php echo get_the_date(); ?>
                            </p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&larr; Previous', 'tahseen-ashrafi'),
                'next_text' => __('Next &rarr;', 'tahseen-ashrafi'),
            ));
            ?>

        <?php else : ?>
            <div class="no-posts">
                <h1><?php _e('Nothing Found', 'tahseen-ashrafi'); ?></h1>
                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'tahseen-ashrafi'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php
get_footer();

<?php
/**
 * The main template file
 */

get_header();
?>

<div class="site-content">
    <?php if (have_posts()) : ?>
        <div class="posts-container">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('news-card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </a>
                    <?php endif; ?>

                    <div class="news-card-content">
                        <?php
                        $category = tahseen_ashrafi_get_category();
                        if ($category) :
                        ?>
                            <span class="news-category"><?php echo esc_html($category); ?></span>
                        <?php endif; ?>

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
            <p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'tahseen-ashrafi'); ?></p>
        </div>
    <?php endif; ?>
</div>

<?php
get_sidebar();
get_footer();

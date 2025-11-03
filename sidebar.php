<?php
/**
 * The sidebar containing the main widget area
 */

if (!is_active_sidebar('sidebar-1')) {
    ?>
    <aside class="widget-area">
        <div class="widget latest-news-widget">
            <h2 class="widget-title">Latest News</h2>
            <?php
            $latest_posts = new WP_Query(array(
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($latest_posts->have_posts()) :
                echo '<ul class="sidebar-news-list">';
                while ($latest_posts->have_posts()) : $latest_posts->the_post();
            ?>
                <li class="sidebar-news-item">
                    <div class="sidebar-news-content">
                        <h4 class="sidebar-news-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <div class="sidebar-news-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                        <span class="sidebar-news-category"><?php echo tahseen_ashrafi_get_category(); ?></span>
                    </div>
                </li>
            <?php
                endwhile;
                echo '</ul>';
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </aside>
    <?php
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>

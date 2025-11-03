<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<div class="archive-container">
    <header class="archive-header">
        <?php
        if (is_category()) {
            $category = get_queried_object();
            echo '<h1 class="archive-title category-name-effect">' . esc_html($category->name) . '</h1>';
        } else {
            echo '<h1 class="archive-title">' . get_the_archive_title() . '</h1>';
        }
        ?>
        <div class="horizontal-line"></div>
    </header>

    <?php if (have_posts()) : ?>
        <div class="archive-posts-grid-new">
            <?php
            $post_count = 0;
            while (have_posts()) :
                the_post();
                $post_count++;
                
                // Start new row every 4 posts
                if (($post_count - 1) % 4 == 0) {
                    if ($post_count > 1) echo '</div>';
                    echo '<div class="archive-row-four">';
                }
            ?>
                <div class="archive-post-card-new">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="archive-post-image-new">
                            <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                        </a>
                    <?php endif; ?>
                    
                    <div class="archive-post-meta-new">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    
                    <h2 class="archive-post-title-new">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    
                    <div class="archive-post-excerpt-new">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </div>
                    
                    <div class="archive-post-footer-new">
                        <span class="archive-post-author-new">By <?php the_author(); ?></span>
                        <a href="<?php the_permalink(); ?>" class="read-more-btn-new">Read More</a>
                    </div>
                </div>
            <?php
            endwhile;
            echo '</div>'; // Close last row
            ?>
        </div>

        <?php
        the_posts_pagination(array(
            'prev_text' => __('Previous', 'tahseen-ashrafi'),
            'next_text' => __('Next', 'tahseen-ashrafi'),
        ));
        ?>

    <?php else : ?>
        <p><?php esc_html_e('No posts found.', 'tahseen-ashrafi'); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();

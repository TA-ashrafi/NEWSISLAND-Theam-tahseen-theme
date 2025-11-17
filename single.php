<?php
/**
 * The template for displaying single posts
 */

get_header();
?>

<div class="single-post-container single-post-70">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>
            <!-- Author Bar -->
            <div class="author-bar">
                <span class="author-name">By <?php the_author(); ?></span>
            </div>

            <!-- Heading -->
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <!-- Update Date -->
            <div class="update-meta">
                <span>Updated At: <?php echo get_the_modified_date('F j, Y'); ?> <?php echo get_the_modified_time('g:i A'); ?></span>
            </div>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="featured-image-single">
                    <?php the_post_thumbnail('large', array('class' => 'uniform-post-image')); ?>
                </div>
            <?php endif; ?>

            <!-- Sub Heading / Excerpt -->
            <?php if (has_excerpt()) : ?>
                <div class="post-subheading">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>

            <!-- Content -->
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

        <!-- READ MORE Section: 5 recent posts from each category -->
        <div class="read-more-section">
            <h3 class="read-more-title">READ MORE</h3>
            <ul class="read-more-list">
                <?php
                $all_cats = array('world', 'politics', 'business', 'technology', 'health');
                foreach ($all_cats as $cat_slug) :
                    $recent_posts = new WP_Query(array(
                        'category_name' => $cat_slug,
                        'posts_per_page' => 1,
                        'post__not_in' => array(get_the_ID()),
                    ));
                    
                    if ($recent_posts->have_posts()) :
                        while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                endforeach;
                ?>
            </ul>
        </div>

        <!-- Author Info Section -->
        <div class="author-info-section">
            <div class="author-avatar">
                <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
            </div>
            <div class="author-details">
                <h4 class="author-name"><?php echo get_the_author(); ?></h4>
                <?php if (get_the_author_meta('description')) : ?>
                    <p class="author-bio"><?php echo get_the_author_meta('description'); ?></p>
                <?php endif; ?>
                <?php if (get_the_author_meta('user_email')) : ?>
                    <p class="author-email">Email: <?php echo get_the_author_meta('user_email'); ?></p>
                <?php endif; ?>
                <div class="author-actions">
                    <button class="follow-button">Follow</button>
                    <button class="email-button">Email</button>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>

    <?php endwhile; ?>
</div>

<?php
get_footer();

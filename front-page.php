<?php
/**
 * The front page template
 */

get_header();
?>

<!-- Other Stories Section -->
<div class="other-stories-section">
    <h2 class="section-title">TOP STORIES</h2>
</div>

<!-- Main Section: 90% width, 3 columns -->
<div class="main-section-container">
    <div class="main-section-grid">
        <!-- 1st Column: 25% width - Politics & Business -->
        <div class="main-column-25">
            <!-- Politics -->
            <div class="category-block">
                <h3 class="category-heading">POLITICS</h3>
                <?php
                $politics_posts = new WP_Query(array(
                    'category_name' => 'political',
                    'posts_per_page' => 6,
                ));
                
                if ($politics_posts->have_posts()) :
                    $count = 0;
                    while ($politics_posts->have_posts()) : $politics_posts->the_post();
                        $count++;
                ?>
                    <div class="category-post-item">
                        <div class="post-meta-small">
                            <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                        </div>
                        <h4 class="post-title-small">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($count < $politics_posts->post_count) : ?>
                        <div class="separator-line"></div>
                    <?php endif; ?>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- Business -->
            <div class="category-block">
                <h3 class="category-heading">Science & Tech</h3>
                <?php
                $business_posts = new WP_Query(array(
                    'category_name' => 'Science and Tech',
                    'posts_per_page' => 6,
                ));
                
                if ($business_posts->have_posts()) :
                    $count = 0;
                    while ($business_posts->have_posts()) : $business_posts->the_post();
                        $count++;
                ?>
                    <div class="category-post-item">
                        <div class="post-meta-small">
                            <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                        </div>
                        <h4 class="post-title-small">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($count < $business_posts->post_count) : ?>
                        <div class="separator-line"></div>
                    <?php endif; ?>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

        <!-- 2nd Column: 40% width - World & Sports -->
        <div class="main-column-40">
            <!-- india -->
            <?php
            $world_posts = new WP_Query(array(
                'category_name' => 'india',
                'posts_per_page' => 2,
            ));
            
            if ($world_posts->have_posts()) :
                while ($world_posts->have_posts()) : $world_posts->the_post();
            ?>
                <div class="world-post-featured">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="featured-image-link">
                            <?php the_post_thumbnail('medium_large', array('class' => 'india-featured-image')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="post-meta-small">
                        India • <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h3 class="post-title-medium">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                </div>
                <div class="separator-line"></div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

            <!-- Sports (2 posts column-wise) -->
            <div class="sports-grid">
                <?php
                $sports_posts = new WP_Query(array(
                    'category_name' => 'sports',
                    'posts_per_page' => 2,
                ));
                
                if ($sports_posts->have_posts()) :
                    while ($sports_posts->have_posts()) : $sports_posts->the_post();
                ?>
                    <div class="sports-post-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium', array('class' => 'sports-image')); ?>
                            </a>
                        <?php endif; ?>
                        <div class="post-meta-small">
                            Sports • <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                        </div>
                        <h4 class="post-title-small">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

        <!-- 3rd Column: 25% width - Technology & Entertainment -->
        <div class="main-column-25">
            <!-- Technology -->
            <div class="category-block">
                <h3 class="category-heading">BUSINESS</h3>
                <?php
                $tech_posts = new WP_Query(array(
                    'category_name' => 'business',
                    'posts_per_page' => 6,
                ));
                
                if ($tech_posts->have_posts()) :
                    $count = 0;
                    while ($tech_posts->have_posts()) : $tech_posts->the_post();
                        $count++;
                ?>
                    <div class="category-post-item">
                        <div class="post-meta-small">
                            <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                        </div>
                        <h4 class="post-title-small">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($count < $tech_posts->post_count) : ?>
                        <div class="separator-line"></div>
                    <?php endif; ?>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <!-- Entertainment -->
            <div class="category-block">
                <h3 class="category-heading">Entertainment</h3>
                <?php
                $entertainment_posts = new WP_Query(array(
                    'category_name' => 'entertainment',
                    'posts_per_page' => 6,
                ));
                
                if ($entertainment_posts->have_posts()) :
                    $count = 0;
                    while ($entertainment_posts->have_posts()) : $entertainment_posts->the_post();
                        $count++;
                ?>
                    <div class="category-post-item">
                        <div class="post-meta-small">
                            <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                        </div>
                        <h4 class="post-title-small">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </div>
                    <?php if ($count < $entertainment_posts->post_count) : ?>
                        <div class="separator-line"></div>
                    <?php endif; ?>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Health, Lifestyle, Education Section -->
<div class="three-column-section">
    <!-- Health Column -->
    <div class="column-health">
        <h3 class="category-heading">HEALTH</h3>
        <?php
        $health_posts = new WP_Query(array(
            'category_name' => 'health',
            'posts_per_page' => 5,
        ));
        
        if ($health_posts->have_posts()) :
            while ($health_posts->have_posts()) : $health_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('Health')); ?>" class="more-button">More</a>
    </div>

    <!-- Lifestyle Column -->
    <div class="column-lifestyle">
        <h3 class="category-heading">LIFESTYLE</h3>
        <?php
        $lifestyle_posts = new WP_Query(array(
            'category_name' => 'lifestyle',
            'posts_per_page' => 5,
        ));
        
        if ($lifestyle_posts->have_posts()) :
            while ($lifestyle_posts->have_posts()) : $lifestyle_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('Lifestyle')); ?>" class="more-button">More</a>
    </div>

    <!-- Education Column -->
    <div class="column-national">
        <h3 class="category-heading">EDUCATION</h3>
        <?php
        $national_posts = new WP_Query(array(
            'category_name' => 'education',
            'posts_per_page' => 5,
        ));
        
        if ($national_posts->have_posts()) :
            while ($national_posts->have_posts()) : $national_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('Education')); ?>" class="more-button">More</a>
    </div>
</div>

<!-- Photo Gallery Section -->
<div class="photo-gallery-section">
    <h2 class="section-title">PHOTO GALLERY</h2>
    <div class="gallery-grid">
        <?php
        $all_categories = array('world', 'political', 'business', 'science and tech', 'health');
        foreach ($all_categories as $cat) :
            $gallery_posts = new WP_Query(array(
                'category_name' => $cat,
                'posts_per_page' => 1,
            ));
            
            if ($gallery_posts->have_posts()) :
                while ($gallery_posts->have_posts()) : $gallery_posts->the_post();
                $categories = get_the_category();
        ?>
                <div class="gallery-item">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="gallery-image-link">
                            <?php if (!empty($categories)) : ?>
                                <span class="gallery-category"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <h4 class="gallery-post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        endforeach;
        ?>
    </div>
</div>

<!-- World Section -->
<div class="world-section">
    <div class="section-header-line">
        <h2 class="section-title">WORLD</h2>
        <div class="horizontal-line"></div>
    </div>
    <div class="world-grid">
        <?php
        $world_section_posts = new WP_Query(array(
            'category_name' => 'world',
            'posts_per_page' => 6,
        ));
        
        if ($world_section_posts->have_posts()) :
            while ($world_section_posts->have_posts()) : $world_section_posts->the_post();
        ?>
            <div class="world-post-card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-meta-small">
                    <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                </div>
                <h3 class="post-title-medium">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-author">By <?php the_author(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>



<!-- Business, Religion, Sports Section -->
<div class="three-column-section">
    <!-- Health Column -->
    <div class="column-health">
        <h3 class="category-heading">BUSINESS</h3>
        <?php
        $health_posts = new WP_Query(array(
            'category_name' => 'business',
            'posts_per_page' => 5,
        ));
        
        if ($health_posts->have_posts()) :
            while ($health_posts->have_posts()) : $health_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('business')); ?>" class="more-button">More</a>
    </div>

    <!-- Religion Column -->
    <div class="column-lifestyle">
        <h3 class="category-heading">RELIGION</h3>
        <?php
        $lifestyle_posts = new WP_Query(array(
            'category_name' => 'religion',
            'posts_per_page' => 5,
        ));
        
        if ($lifestyle_posts->have_posts()) :
            while ($lifestyle_posts->have_posts()) : $lifestyle_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('Religion')); ?>" class="more-button">More</a>
    </div>

    <!-- Sports Column -->
    <div class="column-national">
        <h3 class="category-heading">Sports</h3>
        <?php
        $national_posts = new WP_Query(array(
            'category_name' => 'Sports',
            'posts_per_page' => 5,
        ));
        
        if ($national_posts->have_posts()) :
            while ($national_posts->have_posts()) : $national_posts->the_post();
        ?>
            <div class="image-text-post">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-left">
                        <?php the_post_thumbnail('thumbnail', array('class' => 'thumbnail-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-content-right">
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h4 class="post-title-small">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                </div>
            </div>
            <div class="separator-line"></div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
        <a href="<?php echo get_category_link(get_cat_ID('sports')); ?>" class="more-button">More</a>
    </div>
</div>


<!-- Politics Section -->
<div class="politics-section">
    <div class="section-header-line">
        <h2 class="section-title">POLITICS</h2>
        <div class="horizontal-line"></div>
    </div>
    <div class="politics-grid">
        <?php
        $politics_section_posts = new WP_Query(array(
            'category_name' => 'political',
            'posts_per_page' => 3,
        ));
        
        if ($politics_section_posts->have_posts()) :
            while ($politics_section_posts->have_posts()) : $politics_section_posts->the_post();
        ?>
            <div class="politics-post-card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-meta-small">
                    <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                </div>
                <h3 class="post-title-medium">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-author">By <?php the_author(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    
    <!-- Additional 2 Politics Posts at 90% width -->
    <div class="politics-additional-posts">
        <?php
        $politics_additional = new WP_Query(array(
            'category_name' => 'political',
            'posts_per_page' => 2,
            'offset' => 3,
        ));
        
        if ($politics_additional->have_posts()) :
            while ($politics_additional->have_posts()) : $politics_additional->the_post();
        ?>
            <div class="additional-post-card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-meta-small">
                    <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                </div>
                <h3 class="post-title-medium">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-author">By <?php the_author(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<!-- Technology Section -->
<div class="technology-section">
    <div class="section-header-line">
        <h2 class="section-title">TECHNOLOGY</h2>
        <div class="horizontal-line"></div>
    </div>
    <div class="technology-grid">
        <?php
        $tech_section_posts = new WP_Query(array(
            'category_name' => 'science and tech',
            'posts_per_page' => 3,
        ));
        
        if ($tech_section_posts->have_posts()) :
            while ($tech_section_posts->have_posts()) : $tech_section_posts->the_post();
        ?>
            <div class="tech-post-card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-meta-small">
                    <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                </div>
                <h3 class="post-title-medium">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-author">By <?php the_author(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    
    <!-- Additional 2 Technology Posts at 90% width -->
    <div class="technology-additional-posts">
        <?php
        $tech_additional = new WP_Query(array(
            'category_name' => 'science and tech',
            'posts_per_page' => 2,
            'offset' => 3,
        ));
        
        if ($tech_additional->have_posts()) :
            while ($tech_additional->have_posts()) : $tech_additional->the_post();
        ?>
            <div class="additional-post-card">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                    </a>
                <?php endif; ?>
                <div class="post-meta-small">
                    <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                </div>
                <h3 class="post-title-medium">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <p class="post-author">By <?php the_author(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<!-- You Missed Section -->
<div class="you-missed-section">
    <h2 class="section-title">YOU MISSED</h2>
    <div class="you-missed-grid">
        <?php
        $missed_categories = array('world', 'health', 'sports', 'science and tech', 'political');
        foreach ($missed_categories as $missed_cat) :
            $missed_posts = new WP_Query(array(
                'category_name' => $missed_cat,
                'posts_per_page' => 1,
            ));
            
            if ($missed_posts->have_posts()) :
                while ($missed_posts->have_posts()) : $missed_posts->the_post();
                $categories = get_the_category();
        ?>
                <div class="missed-post-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="missed-image-link">
                            <?php if (!empty($categories)) : ?>
                                <span class="missed-category-overlay"><?php echo esc_html($categories[0]->name); ?></span>
                            <?php endif; ?>
                            <?php the_post_thumbnail('medium', array('class' => 'uniform-post-image')); ?>
                        </a>
                    <?php endif; ?>
                    <div class="post-meta-small">
                        <?php echo get_the_date('F j, Y'); ?> <?php echo get_the_time('g:i A'); ?>
                    </div>
                    <h3 class="post-title-medium">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="post-author">By <?php the_author(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more-btn">Read More</a>
                </div>
        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        endforeach;
        ?>
    </div>
</div>

<?php
get_footer();

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="masthead">
    <div class="header-container">
        <div class="header-top">
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle Menu">
                ☰
            </button>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                <span class="logo-news">NEWS</span><span class="logo-island">ISLAND</span>
            </a>

            <button class="dark-mode-toggle" id="dark-mode-toggle" aria-label="Toggle Dark Mode">
                <i class="fas fa-sun"></i>
            </button>
        </div>

        <div class="header-separator"></div>

        <nav class="main-navigation" id="site-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => false,
            ));
            ?>
        </nav>
    </div>
</header>

<!-- Marquee Section (full width) -->
<div class="marquee-section">
    <div class="marquee-content">
        <?php
        // Get all categories
        $categories = get_categories(array(
            'hide_empty' => true,
        ));
        
        $marquee_items = array();
        
        // Get recent post from each category
        foreach ($categories as $category) {
            $cat_posts = new WP_Query(array(
                'posts_per_page' => 1,
                'cat' => $category->term_id,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($cat_posts->have_posts()) {
                while ($cat_posts->have_posts()) {
                    $cat_posts->the_post();
                    $marquee_items[] = get_the_title();
                }
            }
            wp_reset_postdata();
        }
        
        // Display marquee items twice for continuous scroll
        if (!empty($marquee_items)) {
            $marquee_text = implode(' • ', $marquee_items);
            echo '<span>' . esc_html($marquee_text) . ' • ' . esc_html($marquee_text) . ' • </span>';
        }
        ?>
    </div>
</div>

<main class="site-main" id="main">

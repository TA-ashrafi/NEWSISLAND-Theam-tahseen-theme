<?php
/**
 * Tahseen Ashrafi V3 Theme Functions
 */
if (!defined('ABSPATH')) {
    exit;
}

// FORCE CACHE BUST - HAR BAAR NAYA VERSION (NO MORE VERSION CHANGE!)
function tahseen_force_cache_bust($src) {
    if (strpos($src, get_template_directory_uri()) !== false) {
        return $src . '?v=' . time(); // HAR REFRESH PE NAYA TIME
    }
    return $src;
}
add_filter('style_loader_src', 'tahseen_force_cache_bust', 9999);
add_filter('script_loader_src', 'tahseen_force_cache_bust', 9999);

// Theme Setup
function tahseen_ashrafi_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 800, true);
    add_image_size('hero-large', 678, 678, true);
    add_image_size('hero-small', 324, 216, true);
    add_image_size('category-grid', 417, 417, true);
    add_image_size('trending-thumb', 150, 150, true);

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tahseen-ashrafi'),
        'footer'  => __('Footer Menu', 'tahseen-ashrafi'),
    ));

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'tahseen_ashrafi_setup');

// Register Widget Areas
function tahseen_ashrafi_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'tahseen-ashrafi'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'tahseen-ashrafi'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Post Sidebar', 'tahseen-ashrafi'),
        'id'            => 'sidebar-post',
        'description'   => __('Sidebar for single posts.', 'tahseen-ashrafi'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'tahseen_ashrafi_widgets_init');

// Enqueue Scripts and Styles
function tahseen_ashrafi_scripts() {
    // Google Fonts
    wp_enqueue_style('tahseen-ashrafi-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500;700&family=Dancing+Script:wght@400;700&display=swap', array(), null);
    
    // Main stylesheet - AUTO CACHE BUST
    wp_enqueue_style('tahseen-ashrafi-style', get_stylesheet_uri());

    // Theme JS - AUTO CACHE BUST
    wp_enqueue_script('tahseen-ashrafi-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), '', true);

    // Comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tahseen_ashrafi_scripts');

// Custom excerpt length
function tahseen_ashrafi_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'tahseen_ashrafi_excerpt_length');

// Custom excerpt more
function tahseen_ashrafi_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'tahseen_ashrafi_excerpt_more');

// Get post category
function tahseen_ashrafi_get_category() {
    $categories = get_the_category();
    return !empty($categories) ? $categories[0]->name : '';
}

// Get posts by category
function tahseen_ashrafi_get_category_posts($category_slug, $posts_per_page = 3) {
    return new WP_Query(array(
        'category_name'  => $category_slug,
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));
}

// Get trending posts (most viewed)
function tahseen_ashrafi_get_trending_posts($count = 3) {
    return new WP_Query(array(
        'posts_per_page' => $count,
        'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC',
    ));
}

// Track post views
function tahseen_ashrafi_set_post_views() {
    if (is_single()) {
        global $post;
        $post_id   = $post->ID;
        $count_key = 'post_views_count';
        $count     = get_post_meta($post_id, $count_key, true);
       
        if ($count === '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}
add_action('wp_head', 'tahseen_ashrafi_set_post_views');

// Get post views
function tahseen_ashrafi_get_post_views($post_id) {
    $count = get_post_meta($post_id, 'post_views_count', true);
    if ($count === '') {
        delete_post_meta($post_id, 'post_views_count');
        add_post_meta($post_id, 'post_views_count', '0');
        return "0 View";
    }
    return $count . ' Views';
}

// Add Font Awesome
function tahseen_ashrafi_add_fontawesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
}
add_action('wp_enqueue_scripts', 'tahseen_ashrafi_add_fontawesome');

// Customizer settings
function tahseen_ashrafi_customize_register($wp_customize) {
    $wp_customize->add_section('tahseen_ashrafi_social', array(
        'title'    => __('Social Media', 'tahseen-ashrafi'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('facebook_url', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('facebook_url', array('label' => __('Facebook URL', 'tahseen-ashrafi'), 'section' => 'tahseen_ashrafi_social', 'type' => 'url'));

    $wp_customize->add_setting('twitter_url', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('twitter_url', array('label' => __('Twitter URL', 'tahseen-ashrafi'), 'section' => 'tahseen_ashrafi_social', 'type' => 'url'));

    $wp_customize->add_setting('instagram_url', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('instagram_url', array('label' => __('Instagram URL', 'tahseen-ashrafi'), 'section' => 'tahseen_ashrafi_social', 'type' => 'url'));

    $wp_customize->add_setting('footer_quote', array('default' => 'Live passionately, love deeply', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('footer_quote', array('label' => __('Footer Quote', 'tahseen-ashrafi'), 'section' => 'tahseen_ashrafi_social', 'type' => 'text'));
}
add_action('customize_register', 'tahseen_ashrafi_customize_register');

// Add custom body classes
function tahseen_ashrafi_body_classes($classes) {
    if (is_singular()) {
        $classes[] = 'single-post-layout';
    }
    return $classes;
}
add_filter('body_class', 'tahseen_ashrafi_body_classes');
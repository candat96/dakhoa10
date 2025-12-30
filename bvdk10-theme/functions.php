<?php
/**
 * BVDK10 Theme Functions
 *
 * @package BVDK10
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('BVDK10_VERSION', '1.0.0');
define('BVDK10_DIR', get_template_directory());
define('BVDK10_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function bvdk10_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 64,
        'width'       => 64,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Primary Menu', 'bvdk10'),
        'footer'    => __('Footer Menu', 'bvdk10'),
    ));

    // Add image sizes
    add_image_size('doctor-thumbnail', 204, 204, true);
    add_image_size('service-thumbnail', 200, 200, true);
    add_image_size('partner-logo', 61, 61, true);
    add_image_size('story-card', 353, 240, true);
    add_image_size('hero-doctor', 515, 647, false);
    add_image_size('achievement-badge', 200, 200, true);
}
add_action('after_setup_theme', 'bvdk10_setup');

/**
 * Enqueue Styles and Scripts
 */
function bvdk10_enqueue_assets() {
    // Google Fonts - Be Vietnam Pro
    wp_enqueue_style(
        'bvdk10-google-fonts',
        'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Swiper CSS
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );

    // Main Styles
    wp_enqueue_style(
        'bvdk10-main',
        BVDK10_URI . '/assets/css/main.css',
        array('swiper'),
        BVDK10_VERSION
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.0.0',
        true
    );

    // Main JS
    wp_enqueue_script(
        'bvdk10-main',
        BVDK10_URI . '/assets/js/main.js',
        array('swiper'),
        BVDK10_VERSION,
        true
    );

    // Localize script
    wp_localize_script('bvdk10-main', 'bvdk10', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('bvdk10_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'bvdk10_enqueue_assets');

/**
 * Include additional files
 */
require_once BVDK10_DIR . '/inc/custom-post-types.php';
require_once BVDK10_DIR . '/inc/acf-fields.php';
require_once BVDK10_DIR . '/inc/theme-helpers.php';
require_once BVDK10_DIR . '/inc/class-nav-walker.php';

/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Cài đặt Theme',
        'menu_title'    => 'Cài đặt Theme',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'icon_url'      => 'dashicons-admin-customizer',
        'position'      => 2,
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Cài đặt Header',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Cài đặt Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Thông tin liên hệ',
        'menu_title'    => 'Liên hệ',
        'parent_slug'   => 'theme-settings',
    ));
}

/**
 * Allow SVG uploads
 */
function bvdk10_allow_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'bvdk10_allow_svg');

/**
 * Disable Gutenberg for front page
 */
function bvdk10_disable_gutenberg($use_block_editor, $post) {
    if ($post->post_type === 'page' && get_option('page_on_front') == $post->ID) {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'bvdk10_disable_gutenberg', 10, 2);

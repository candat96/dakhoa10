<?php
/**
 * Theme Helper Functions
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get SVG icon
 */
function bvdk10_get_svg($name) {
    $svg_path = BVDK10_DIR . '/assets/images/icons/' . $name . '.svg';
    if (file_exists($svg_path)) {
        return file_get_contents($svg_path);
    }
    return '';
}

/**
 * Echo SVG icon
 */
function bvdk10_svg($name) {
    echo bvdk10_get_svg($name);
}

/**
 * Get section badge HTML
 */
function bvdk10_section_badge($text) {
    return '<div class="section-badge">
        <span class="section-badge__dot"></span>
        <span class="section-badge__text">' . esc_html($text) . '</span>
    </div>';
}

/**
 * Get phone link
 */
function bvdk10_phone_link($phone) {
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    return 'tel:+84' . ltrim($clean_phone, '0');
}

/**
 * Truncate text
 */
function bvdk10_truncate($text, $length = 100, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . $suffix;
}

/**
 * Get ACF field with fallback
 */
function bvdk10_get_field($field, $post_id = false, $default = '') {
    if (function_exists('get_field')) {
        $value = get_field($field, $post_id);
        return $value ? $value : $default;
    }
    return $default;
}

/**
 * Get doctors query
 */
function bvdk10_get_doctors($args = array()) {
    $defaults = array(
        'post_type'      => 'bac-si',
        'posts_per_page' => 12,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get services query
 */
function bvdk10_get_services($args = array()) {
    $defaults = array(
        'post_type'      => 'dich-vu',
        'posts_per_page' => 7,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get partners query
 */
function bvdk10_get_partners($args = array()) {
    $defaults = array(
        'post_type'      => 'doi-tac',
        'posts_per_page' => 20,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get achievements query
 */
function bvdk10_get_achievements($args = array()) {
    $defaults = array(
        'post_type'      => 'thanh-tuu',
        'posts_per_page' => 3,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    );

    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Get news/stories query
 */
function bvdk10_get_stories($args = array()) {
    $defaults = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $args = wp_parse_args($args, $defaults);
    return new WP_Query($args);
}

/**
 * Custom excerpt
 */
function bvdk10_excerpt($length = 20) {
    $excerpt = get_the_excerpt();
    $words = explode(' ', $excerpt);

    if (count($words) > $length) {
        $words = array_slice($words, 0, $length);
        $excerpt = implode(' ', $words) . '...';
    }

    return $excerpt;
}

/**
 * Get reading time
 */
function bvdk10_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);

    return $reading_time . ' phút đọc';
}

/**
 * Breadcrumb
 */
function bvdk10_breadcrumb() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumb" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb__list">';
    echo '<li class="breadcrumb__item"><a href="' . home_url() . '">Trang chủ</a></li>';

    if (is_singular()) {
        $post_type = get_post_type();
        $post_type_obj = get_post_type_object($post_type);

        if ($post_type !== 'page' && $post_type_obj) {
            echo '<li class="breadcrumb__item"><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_obj->labels->name . '</a></li>';
        }

        echo '<li class="breadcrumb__item breadcrumb__item--active" aria-current="page">' . get_the_title() . '</li>';
    } elseif (is_archive()) {
        echo '<li class="breadcrumb__item breadcrumb__item--active" aria-current="page">' . get_the_archive_title() . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb__item breadcrumb__item--active" aria-current="page">Tìm kiếm: ' . get_search_query() . '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}

/**
 * Social share buttons
 */
function bvdk10_share_buttons() {
    $url = urlencode(get_permalink());
    $title = urlencode(get_the_title());

    echo '<div class="share-buttons">';
    echo '<span class="share-buttons__label">Chia sẻ:</span>';
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank" rel="noopener" class="share-buttons__link share-buttons__link--facebook" aria-label="Chia sẻ Facebook">';
    bvdk10_svg('facebook');
    echo '</a>';
    echo '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank" rel="noopener" class="share-buttons__link share-buttons__link--twitter" aria-label="Chia sẻ Twitter">';
    bvdk10_svg('twitter');
    echo '</a>';
    echo '</div>';
}

<?php
/**
 * Custom Nav Walker Class
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

class BVDK10_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Start Level
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"header__submenu\">\n";
    }

    /**
     * End Level
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start Element
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Check if has children
        $has_children = in_array('menu-item-has-children', $classes);

        if ($has_children) {
            $classes[] = 'has-dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id_attr = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id_attr = $id_attr ? ' id="' . esc_attr($id_attr) . '"' : '';

        $output .= $indent . '<li' . $id_attr . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;

        // Add dropdown icon if has children
        if ($has_children && $depth === 0) {
            $item_output .= '<svg class="dropdown-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Fallback Menu
 */
function bvdk10_fallback_menu() {
    $menu_items = array(
        'Trang chủ'   => home_url('/'),
        'Giới thiệu'  => home_url('/gioi-thieu'),
        'Dịch vụ'     => home_url('/dich-vu'),
        'Đối tác'     => home_url('/doi-tac'),
        'Tin tức'     => home_url('/tin-tuc'),
        'Tuyển dụng'  => home_url('/tuyen-dung'),
        'Liên hệ'     => home_url('/lien-he'),
        'Hướng dẫn'   => home_url('/huong-dan'),
    );

    echo '<ul class="header__menu">';
    foreach ($menu_items as $title => $url) {
        $active = (get_permalink() === $url || home_url($_SERVER['REQUEST_URI']) === $url) ? ' class="current-menu-item"' : '';
        echo '<li' . $active . '><a href="' . esc_url($url) . '">' . esc_html($title) . '</a></li>';
    }
    echo '</ul>';
}

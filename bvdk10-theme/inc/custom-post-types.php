<?php
/**
 * Custom Post Types Registration
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function bvdk10_register_post_types() {

    // Doctors (Bác sĩ)
    register_post_type('bac-si', array(
        'labels' => array(
            'name'                  => 'Bác sĩ',
            'singular_name'         => 'Bác sĩ',
            'menu_name'             => 'Bác sĩ',
            'add_new'               => 'Thêm mới',
            'add_new_item'          => 'Thêm bác sĩ mới',
            'edit_item'             => 'Sửa bác sĩ',
            'new_item'              => 'Bác sĩ mới',
            'view_item'             => 'Xem bác sĩ',
            'search_items'          => 'Tìm bác sĩ',
            'not_found'             => 'Không tìm thấy bác sĩ',
            'not_found_in_trash'    => 'Không có bác sĩ trong thùng rác',
        ),
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'bac-si'),
        'menu_icon'             => 'dashicons-businessman',
        'supports'              => array('title', 'thumbnail', 'editor'),
        'show_in_rest'          => true,
    ));

    // Services (Dịch vụ)
    register_post_type('dich-vu', array(
        'labels' => array(
            'name'                  => 'Dịch vụ',
            'singular_name'         => 'Dịch vụ',
            'menu_name'             => 'Dịch vụ',
            'add_new'               => 'Thêm mới',
            'add_new_item'          => 'Thêm dịch vụ mới',
            'edit_item'             => 'Sửa dịch vụ',
            'new_item'              => 'Dịch vụ mới',
            'view_item'             => 'Xem dịch vụ',
            'search_items'          => 'Tìm dịch vụ',
            'not_found'             => 'Không tìm thấy dịch vụ',
            'not_found_in_trash'    => 'Không có dịch vụ trong thùng rác',
        ),
        'public'                => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'dich-vu'),
        'menu_icon'             => 'dashicons-heart',
        'supports'              => array('title', 'thumbnail', 'editor'),
        'show_in_rest'          => true,
    ));

    // Partners (Đối tác)
    register_post_type('doi-tac', array(
        'labels' => array(
            'name'                  => 'Đối tác',
            'singular_name'         => 'Đối tác',
            'menu_name'             => 'Đối tác',
            'add_new'               => 'Thêm mới',
            'add_new_item'          => 'Thêm đối tác mới',
            'edit_item'             => 'Sửa đối tác',
            'new_item'              => 'Đối tác mới',
            'view_item'             => 'Xem đối tác',
            'search_items'          => 'Tìm đối tác',
            'not_found'             => 'Không tìm thấy đối tác',
            'not_found_in_trash'    => 'Không có đối tác trong thùng rác',
        ),
        'public'                => true,
        'has_archive'           => false,
        'rewrite'               => array('slug' => 'doi-tac'),
        'menu_icon'             => 'dashicons-groups',
        'supports'              => array('title', 'thumbnail'),
        'show_in_rest'          => true,
    ));

    // Achievements (Thành tựu)
    register_post_type('thanh-tuu', array(
        'labels' => array(
            'name'                  => 'Thành tựu',
            'singular_name'         => 'Thành tựu',
            'menu_name'             => 'Thành tựu',
            'add_new'               => 'Thêm mới',
            'add_new_item'          => 'Thêm thành tựu mới',
            'edit_item'             => 'Sửa thành tựu',
            'new_item'              => 'Thành tựu mới',
            'view_item'             => 'Xem thành tựu',
            'search_items'          => 'Tìm thành tựu',
            'not_found'             => 'Không tìm thấy thành tựu',
            'not_found_in_trash'    => 'Không có thành tựu trong thùng rác',
        ),
        'public'                => true,
        'has_archive'           => false,
        'rewrite'               => array('slug' => 'thanh-tuu'),
        'menu_icon'             => 'dashicons-awards',
        'supports'              => array('title', 'thumbnail', 'editor'),
        'show_in_rest'          => true,
    ));
}
add_action('init', 'bvdk10_register_post_types');

/**
 * Register Custom Taxonomies
 */
function bvdk10_register_taxonomies() {

    // Doctor Specialty (Chuyên khoa)
    register_taxonomy('chuyen-khoa', 'bac-si', array(
        'labels' => array(
            'name'              => 'Chuyên khoa',
            'singular_name'     => 'Chuyên khoa',
            'search_items'      => 'Tìm chuyên khoa',
            'all_items'         => 'Tất cả chuyên khoa',
            'edit_item'         => 'Sửa chuyên khoa',
            'update_item'       => 'Cập nhật chuyên khoa',
            'add_new_item'      => 'Thêm chuyên khoa mới',
            'new_item_name'     => 'Tên chuyên khoa mới',
            'menu_name'         => 'Chuyên khoa',
        ),
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => array('slug' => 'chuyen-khoa'),
        'show_in_rest'      => true,
    ));

    // Service Category (Danh mục dịch vụ)
    register_taxonomy('danh-muc-dich-vu', 'dich-vu', array(
        'labels' => array(
            'name'              => 'Danh mục dịch vụ',
            'singular_name'     => 'Danh mục',
            'search_items'      => 'Tìm danh mục',
            'all_items'         => 'Tất cả danh mục',
            'edit_item'         => 'Sửa danh mục',
            'update_item'       => 'Cập nhật danh mục',
            'add_new_item'      => 'Thêm danh mục mới',
            'new_item_name'     => 'Tên danh mục mới',
            'menu_name'         => 'Danh mục',
        ),
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => array('slug' => 'danh-muc-dich-vu'),
        'show_in_rest'      => true,
    ));

    // News Category (Danh mục tin tức)
    register_taxonomy('danh-muc-tin', 'post', array(
        'labels' => array(
            'name'              => 'Danh mục tin',
            'singular_name'     => 'Danh mục',
            'search_items'      => 'Tìm danh mục',
            'all_items'         => 'Tất cả danh mục',
            'edit_item'         => 'Sửa danh mục',
            'update_item'       => 'Cập nhật danh mục',
            'add_new_item'      => 'Thêm danh mục mới',
            'new_item_name'     => 'Tên danh mục mới',
            'menu_name'         => 'Danh mục tin',
        ),
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => array('slug' => 'danh-muc-tin'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'bvdk10_register_taxonomies');

/**
 * Flush rewrite rules on theme activation
 */
function bvdk10_rewrite_flush() {
    bvdk10_register_post_types();
    bvdk10_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'bvdk10_rewrite_flush');

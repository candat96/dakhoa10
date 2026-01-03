<?php
/**
 * ACF Field Groups Registration
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF Field Groups
 * These fields will be auto-registered if ACF Pro is active
 */
function bvdk10_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Header Settings
    acf_add_local_field_group(array(
        'key' => 'group_header_settings',
        'title' => 'Cài đặt Header',
        'fields' => array(
            array(
                'key' => 'field_header_phone',
                'label' => 'Số điện thoại',
                'name' => 'header_phone',
                'type' => 'text',
                'default_value' => '0293 3 959 115',
            ),
            array(
                'key' => 'field_header_cta_text',
                'label' => 'Nút CTA - Text',
                'name' => 'header_cta_text',
                'type' => 'text',
                'default_value' => 'Đặt lịch hẹn',
            ),
            array(
                'key' => 'field_header_cta_link',
                'label' => 'Nút CTA - Link',
                'name' => 'header_cta_link',
                'type' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-header',
                ),
            ),
        ),
    ));

    // Homepage - Hero Section
    acf_add_local_field_group(array(
        'key' => 'group_homepage_hero',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_background',
                'label' => 'Ảnh nền',
                'name' => 'hero_background',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_hero_headline_1',
                'label' => 'Tiêu đề dòng 1',
                'name' => 'hero_headline_1',
                'type' => 'text',
                'default_value' => 'Sức khỏe',
            ),
            array(
                'key' => 'field_hero_headline_2',
                'label' => 'Tiêu đề dòng 2',
                'name' => 'hero_headline_2',
                'type' => 'text',
                'default_value' => 'là hạnh phúc của mọi người',
            ),
            array(
                'key' => 'field_hero_doctor_image',
                'label' => 'Ảnh bác sĩ',
                'name' => 'hero_doctor_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'front-page.php',
                ),
            ),
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Homepage - Quick Actions
    acf_add_local_field_group(array(
        'key' => 'group_homepage_quick_actions',
        'title' => 'Quick Actions',
        'fields' => array(
            array(
                'key' => 'field_quick_actions',
                'label' => 'Hành động nhanh',
                'name' => 'quick_actions',
                'type' => 'repeater',
                'min' => 3,
                'max' => 3,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_qa_icon',
                        'label' => 'Icon (SVG)',
                        'name' => 'icon',
                        'type' => 'image',
                        'return_format' => 'url',
                    ),
                    array(
                        'key' => 'field_qa_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_qa_description',
                        'label' => 'Mô tả',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 2,
                    ),
                    array(
                        'key' => 'field_qa_link',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Homepage - About Section
    acf_add_local_field_group(array(
        'key' => 'group_homepage_about',
        'title' => 'About Section',
        'fields' => array(
            array(
                'key' => 'field_about_badge',
                'label' => 'Badge text',
                'name' => 'about_badge',
                'type' => 'text',
                'default_value' => 'Về chúng tôi',
            ),
            array(
                'key' => 'field_about_title',
                'label' => 'Tiêu đề',
                'name' => 'about_title',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Bệnh viện Đa khoa số 10 Nơi người bệnh được chăm sóc bằng sự thấu hiểu',
            ),
            array(
                'key' => 'field_about_content_1',
                'label' => 'Nội dung cột 1',
                'name' => 'about_content_1',
                'type' => 'textarea',
                'rows' => 4,
            ),
            array(
                'key' => 'field_about_content_2',
                'label' => 'Nội dung cột 2',
                'name' => 'about_content_2',
                'type' => 'textarea',
                'rows' => 4,
            ),
            array(
                'key' => 'field_about_image_small',
                'label' => 'Ảnh nhỏ',
                'name' => 'about_image_small',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_about_image_large',
                'label' => 'Ảnh lớn',
                'name' => 'about_image_large',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Homepage - Why Choose Us
    acf_add_local_field_group(array(
        'key' => 'group_homepage_why_choose',
        'title' => 'Why Choose Us Section',
        'fields' => array(
            array(
                'key' => 'field_why_badge',
                'label' => 'Badge text',
                'name' => 'why_badge',
                'type' => 'text',
                'default_value' => 'Các giá trị',
            ),
            array(
                'key' => 'field_why_title_1',
                'label' => 'Tiêu đề dòng 1',
                'name' => 'why_title_1',
                'type' => 'text',
                'default_value' => 'Tại sao nên chọn',
            ),
            array(
                'key' => 'field_why_title_2',
                'label' => 'Tiêu đề dòng 2',
                'name' => 'why_title_2',
                'type' => 'text',
                'default_value' => 'Bệnh viện Đa khoa số 10',
            ),
            array(
                'key' => 'field_why_doctor_image',
                'label' => 'Ảnh bác sĩ',
                'name' => 'why_doctor_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_why_values',
                'label' => 'Các giá trị',
                'name' => 'why_values',
                'type' => 'repeater',
                'min' => 3,
                'max' => 3,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_wv_number',
                        'label' => 'Số thứ tự',
                        'name' => 'number',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_wv_title',
                        'label' => 'Tiêu đề',
                        'name' => 'title',
                        'type' => 'text',
                    ),
                    array(
                        'key' => 'field_wv_description',
                        'label' => 'Mô tả',
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Homepage - Services Section
    acf_add_local_field_group(array(
        'key' => 'group_homepage_services',
        'title' => 'Services Section',
        'fields' => array(
            array(
                'key' => 'field_services_badge',
                'label' => 'Badge text',
                'name' => 'services_badge',
                'type' => 'text',
                'default_value' => 'Dịch vụ',
            ),
            array(
                'key' => 'field_services_title_1',
                'label' => 'Tiêu đề dòng 1',
                'name' => 'services_title_1',
                'type' => 'text',
                'default_value' => 'Chúng tôi cung cấp',
            ),
            array(
                'key' => 'field_services_title_2',
                'label' => 'Tiêu đề dòng 2',
                'name' => 'services_title_2',
                'type' => 'text',
                'default_value' => 'các dịch vụ và chuyên khoa lâm sàng toàn diện',
            ),
            array(
                'key' => 'field_services_description',
                'label' => 'Mô tả',
                'name' => 'services_description',
                'type' => 'textarea',
                'rows' => 4,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Homepage - Mobile App Section
    acf_add_local_field_group(array(
        'key' => 'group_homepage_app',
        'title' => 'Mobile App Section',
        'fields' => array(
            array(
                'key' => 'field_app_badge',
                'label' => 'Badge text',
                'name' => 'app_badge',
                'type' => 'text',
                'default_value' => 'Ứng dụng điện thoại',
            ),
            array(
                'key' => 'field_app_title_1',
                'label' => 'Tiêu đề dòng 1',
                'name' => 'app_title_1',
                'type' => 'text',
                'default_value' => 'Hướng dẫn tải ứng dụng',
            ),
            array(
                'key' => 'field_app_title_2',
                'label' => 'Tiêu đề dòng 2',
                'name' => 'app_title_2',
                'type' => 'text',
                'default_value' => 'Bệnh viện đa khoa số 10',
            ),
            array(
                'key' => 'field_app_description',
                'label' => 'Mô tả',
                'name' => 'app_description',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_app_qr_code',
                'label' => 'QR Code',
                'name' => 'app_qr_code',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_app_store_link',
                'label' => 'App Store Link',
                'name' => 'app_store_link',
                'type' => 'url',
            ),
            array(
                'key' => 'field_app_play_link',
                'label' => 'Google Play Link',
                'name' => 'app_play_link',
                'type' => 'url',
            ),
            array(
                'key' => 'field_app_phone_image',
                'label' => 'Ảnh điện thoại',
                'name' => 'app_phone_image',
                'type' => 'image',
                'return_format' => 'array',
            ),
            array(
                'key' => 'field_app_background',
                'label' => 'Ảnh nền',
                'name' => 'app_background',
                'type' => 'image',
                'return_format' => 'array',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
    ));

    // Footer Settings
    acf_add_local_field_group(array(
        'key' => 'group_footer_settings',
        'title' => 'Cài đặt Footer',
        'fields' => array(
            array(
                'key' => 'field_footer_about',
                'label' => 'Giới thiệu ngắn',
                'name' => 'footer_about',
                'type' => 'textarea',
                'rows' => 3,
            ),
            array(
                'key' => 'field_footer_address',
                'label' => 'Địa chỉ',
                'name' => 'footer_address',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_footer_phone',
                'label' => 'Số điện thoại',
                'name' => 'footer_phone',
                'type' => 'text',
            ),
            array(
                'key' => 'field_footer_email',
                'label' => 'Email',
                'name' => 'footer_email',
                'type' => 'email',
            ),
            array(
                'key' => 'field_footer_working_hours',
                'label' => 'Giờ làm việc',
                'name' => 'footer_working_hours',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_footer_social',
                'label' => 'Mạng xã hội',
                'name' => 'footer_social',
                'type' => 'repeater',
                'layout' => 'table',
                'sub_fields' => array(
                    array(
                        'key' => 'field_fs_platform',
                        'label' => 'Nền tảng',
                        'name' => 'platform',
                        'type' => 'select',
                        'choices' => array(
                            'facebook' => 'Facebook',
                            'youtube' => 'YouTube',
                            'instagram' => 'Instagram',
                            'tiktok' => 'TikTok',
                            'zalo' => 'Zalo',
                        ),
                    ),
                    array(
                        'key' => 'field_fs_url',
                        'label' => 'URL',
                        'name' => 'url',
                        'type' => 'url',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-footer',
                ),
            ),
        ),
    ));

    // Doctor Custom Fields
    acf_add_local_field_group(array(
        'key' => 'group_doctor_fields',
        'title' => 'Thông tin bác sĩ',
        'fields' => array(
            array(
                'key' => 'field_doctor_credentials',
                'label' => 'Học vị',
                'name' => 'doctor_credentials',
                'type' => 'text',
                'placeholder' => 'VD: Thạc sĩ bác sĩ',
            ),
            array(
                'key' => 'field_doctor_specialties',
                'label' => 'Chuyên môn',
                'name' => 'doctor_specialties',
                'type' => 'textarea',
                'rows' => 3,
                'placeholder' => 'VD: Loãng xương, thoái hóa khớp, gout...',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'bac-si',
                ),
            ),
        ),
    ));

    // Service Custom Fields
    acf_add_local_field_group(array(
        'key' => 'group_service_fields',
        'title' => 'Thông tin dịch vụ',
        'fields' => array(
            array(
                'key' => 'field_service_short_desc',
                'label' => 'Mô tả ngắn',
                'name' => 'service_short_desc',
                'type' => 'textarea',
                'rows' => 2,
            ),
            array(
                'key' => 'field_service_icon',
                'label' => 'Icon',
                'name' => 'service_icon',
                'type' => 'image',
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'dich-vu',
                ),
            ),
        ),
    ));

    // Achievement Custom Fields
    acf_add_local_field_group(array(
        'key' => 'group_achievement_fields',
        'title' => 'Thông tin thành tựu',
        'fields' => array(
            array(
                'key' => 'field_achievement_awarded_by',
                'label' => 'Được trao bởi',
                'name' => 'achievement_awarded_by',
                'type' => 'text',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'thanh-tuu',
                ),
            ),
        ),
    ));

    // Flexible Page Builder
    acf_add_local_field_group(array(
        'key' => 'group_flexible_page',
        'title' => 'Xây dựng trang',
        'fields' => array(
            array(
                'key' => 'field_page_sections',
                'label' => 'Các Section',
                'name' => 'page_sections',
                'type' => 'flexible_content',
                'instructions' => 'Thêm và sắp xếp các section cho trang',
                'button_label' => 'Thêm Section',
                'layouts' => array(
                    // Homepage Sections
                    array(
                        'key' => 'layout_hero',
                        'name' => 'hero_section',
                        'label' => 'Hero Banner',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_quick_actions',
                        'name' => 'quick_actions_section',
                        'label' => 'Hành động nhanh',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_about',
                        'name' => 'about_section',
                        'label' => 'Giới thiệu',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_why_choose',
                        'name' => 'why_choose_us_section',
                        'label' => 'Tại sao chọn chúng tôi',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_services',
                        'name' => 'services_section',
                        'label' => 'Dịch vụ',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_doctors',
                        'name' => 'doctors_section',
                        'label' => 'Đội ngũ bác sĩ',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_achievements',
                        'name' => 'achievements_section',
                        'label' => 'Thành tựu',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_partners',
                        'name' => 'partners_section',
                        'label' => 'Đối tác',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_stories',
                        'name' => 'customer_stories_section',
                        'label' => 'Câu chuyện khách hàng',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    array(
                        'key' => 'layout_mobile_app',
                        'name' => 'mobile_app_section',
                        'label' => 'Ứng dụng di động',
                        'display' => 'block',
                        'sub_fields' => array(),
                    ),
                    // About Page Sections
                    array(
                        'key' => 'layout_about_hero',
                        'name' => 'about_hero_section',
                        'label' => 'About - Hero Banner',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_about_hero_title_1',
                                'label' => 'Tiêu đề dòng 1',
                                'name' => 'title_line_1',
                                'type' => 'text',
                                'default_value' => 'GIỚI THIỆU',
                            ),
                            array(
                                'key' => 'field_about_hero_title_2',
                                'label' => 'Tiêu đề dòng 2',
                                'name' => 'title_line_2',
                                'type' => 'text',
                                'default_value' => 'VỀ CHÚNG TÔI',
                            ),
                            array(
                                'key' => 'field_about_hero_tagline',
                                'label' => 'Tagline',
                                'name' => 'tagline',
                                'type' => 'text',
                                'default_value' => 'Nơi người bệnh được chăm sóc bằng sự thấu hiểu',
                            ),
                            array(
                                'key' => 'field_about_hero_image',
                                'label' => 'Ảnh',
                                'name' => 'hero_image',
                                'type' => 'image',
                                'return_format' => 'array',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'layout_about_content',
                        'name' => 'about_content_section',
                        'label' => 'About - Nội dung',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_ac_title',
                                'label' => 'Tiêu đề',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Bệnh viện Đa khoa số 10',
                            ),
                            array(
                                'key' => 'field_ac_subtitle',
                                'label' => 'Subtitle',
                                'name' => 'subtitle',
                                'type' => 'text',
                                'default_value' => 'Nơi người bệnh được chăm sóc bằng sự thấu hiểu',
                            ),
                            array(
                                'key' => 'field_ac_content_1',
                                'label' => 'Nội dung cột 1',
                                'name' => 'content_col_1',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key' => 'field_ac_content_2',
                                'label' => 'Nội dung cột 2',
                                'name' => 'content_col_2',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key' => 'field_ac_image',
                                'label' => 'Ảnh chính',
                                'name' => 'main_image',
                                'type' => 'image',
                                'return_format' => 'array',
                            ),
                            array(
                                'key' => 'field_ac_badge_1',
                                'label' => 'Badge dòng 1',
                                'name' => 'badge_line_1',
                                'type' => 'text',
                                'default_value' => 'CHUYÊN NGHIỆP',
                            ),
                            array(
                                'key' => 'field_ac_badge_2',
                                'label' => 'Badge dòng 2',
                                'name' => 'badge_line_2',
                                'type' => 'text',
                                'default_value' => 'HIỆN ĐẠI',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'layout_vision_mission',
                        'name' => 'vision_mission_section',
                        'label' => 'About - Tầm nhìn & Sứ mệnh',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_vm_title',
                                'label' => 'Tiêu đề',
                                'name' => 'title',
                                'type' => 'text',
                                'default_value' => 'Tầm nhìn - Sứ mệnh',
                            ),
                            array(
                                'key' => 'field_vm_vision',
                                'label' => 'Tầm nhìn',
                                'name' => 'vision_content',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key' => 'field_vm_mission',
                                'label' => 'Sứ mệnh',
                                'name' => 'mission_content',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                        ),
                    ),
                    array(
                        'key' => 'layout_about_stats',
                        'name' => 'about_stats_section',
                        'label' => 'About - Thống kê',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_as_title',
                                'label' => 'Tiêu đề',
                                'name' => 'title',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key' => 'field_as_stats',
                                'label' => 'Thống kê',
                                'name' => 'statistics',
                                'type' => 'repeater',
                                'min' => 1,
                                'max' => 6,
                                'layout' => 'table',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_as_number',
                                        'label' => 'Số',
                                        'name' => 'number',
                                        'type' => 'text',
                                    ),
                                    array(
                                        'key' => 'field_as_label',
                                        'label' => 'Nhãn',
                                        'name' => 'label',
                                        'type' => 'text',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    array(
                        'key' => 'layout_core_values',
                        'name' => 'core_values_section',
                        'label' => 'About - Giá trị cốt lõi',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_cv_badge',
                                'label' => 'Badge',
                                'name' => 'badge',
                                'type' => 'text',
                                'default_value' => 'Giá trị cốt lõi',
                            ),
                            array(
                                'key' => 'field_cv_title',
                                'label' => 'Tiêu đề',
                                'name' => 'title',
                                'type' => 'wysiwyg',
                                'toolbar' => 'basic',
                                'media_upload' => 0,
                            ),
                            array(
                                'key' => 'field_cv_values',
                                'label' => 'Các giá trị',
                                'name' => 'values',
                                'type' => 'repeater',
                                'min' => 1,
                                'max' => 6,
                                'layout' => 'block',
                                'sub_fields' => array(
                                    array(
                                        'key' => 'field_cv_image',
                                        'label' => 'Ảnh',
                                        'name' => 'image',
                                        'type' => 'image',
                                        'return_format' => 'array',
                                    ),
                                    array(
                                        'key' => 'field_cv_name',
                                        'label' => 'Tên',
                                        'name' => 'name',
                                        'type' => 'text',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-flexible.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'seamless',
    ));
}
add_action('acf/init', 'bvdk10_register_acf_fields');

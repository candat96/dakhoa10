<?php
/**
 * Vision & Mission Section Template
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

// Lấy data từ flexible content hoặc fallback
$title = get_sub_field('title') ?: 'Tầm nhìn - Sứ mệnh';
$vision_content = get_sub_field('vision_content') ?: '<p>Bệnh viện Đa khoa số 10 ra đời với khát vọng trở thành bệnh viện tư nhân tiêu biểu, tin cậy trong lòng người dân Hậu Giang và khu vực lân cận, luôn tiên phong trong việc ứng dụng kỹ thuật y khoa tiên tiến, mang đến dịch vụ chăm sóc sức khỏe chất lượng cao với chi phí hợp lý.</p>';
$mission_content = get_sub_field('mission_content') ?: '<p>Sứ mệnh của chúng tôi là chăm sóc và bảo vệ sức khỏe cộng đồng bằng y đức và chuyên môn, mang đến cho người bệnh những dịch vụ y tế chất lượng cao, an toàn và hiệu quả, góp phần nâng cao chất lượng cuộc sống của người dân.</p>';
?>

<section class="vision-mission" id="vision-mission">
    <div class="container">
        <h2 class="vision-mission__title"><?php echo esc_html($title); ?></h2>

        <div class="vision-mission__tabs">
            <button class="vision-mission__tab is-active" data-tab="vision">
                <span class="vision-mission__tab-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                    </svg>
                </span>
                Tầm nhìn
            </button>
            <button class="vision-mission__tab" data-tab="mission">
                <span class="vision-mission__tab-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM17.99 9L16.58 7.58L9.99 14.17L7.41 11.6L5.99 13.01L9.99 17L17.99 9Z" fill="currentColor"/>
                    </svg>
                </span>
                Sứ mệnh
            </button>
        </div>

        <div class="vision-mission__content">
            <div class="vision-mission__panel is-active" id="panel-vision">
                <?php echo wp_kses_post($vision_content); ?>
            </div>
            <div class="vision-mission__panel" id="panel-mission">
                <?php echo wp_kses_post($mission_content); ?>
            </div>
        </div>
    </div>
</section>

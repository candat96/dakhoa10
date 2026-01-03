<?php
/**
 * About Content Section Template
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

// Lấy data từ flexible content hoặc fallback
$title = get_sub_field('title') ?: 'Bệnh viện Đa khoa số 10';
$subtitle = get_sub_field('subtitle') ?: 'Nơi người bệnh được chăm sóc bằng sự thấu hiểu';
$content_col_1 = get_sub_field('content_col_1') ?: '<p>Bệnh viện đa khoa số 10 đi vào hoạt động từ tháng 10 năm 2012 – đây là cơ sở y tế tư nhân đầu tiên được thành lập ở tỉnh Hậu Giang. Bệnh viện đa khoa số 10 tọa lạc trên khu đất có diện tích 5000m2 bao gồm một dãy lầu 3 tầng và 2 dãy lầu 2 tầng phân chia cho việc khám chữa bệnh cho người dân và nơi sinh hoạt thường lệ của nhân viên Bệnh viện.</p>';
$content_col_2 = get_sub_field('content_col_2') ?: '<p>Bệnh viện Đa khoa số 10 có quy mô hiện đại với 10 phòng khám khang trang, sạch sẻ bao gồm đầy đủ các chuyên khoa: nội, ngoại, sản, nhi, mắt, tai mũi họng, răng hàm mặt và da liễu. Bênh viện nhận điều trị nội trú các bệnh lý Nội Ngoại khoa. Ngoài ra còn có dịch vụ khám sức khỏe tổng quát và khám Bảo hiểm y tế.</p>';
$main_image = get_sub_field('main_image');
$badge_line_1 = get_sub_field('badge_line_1') ?: 'CHUYÊN NGHIỆP';
$badge_line_2 = get_sub_field('badge_line_2') ?: 'HIỆN ĐẠI';
?>

<section class="about-content" id="about-content">
    <div class="container">
        <div class="about-content__header">
            <h2 class="about-content__title"><?php echo esc_html($title); ?></h2>
            <p class="about-content__subtitle"><?php echo esc_html($subtitle); ?></p>
        </div>

        <div class="about-content__body">
            <div class="about-content__text">
                <div class="about-content__col">
                    <?php echo wp_kses_post($content_col_1); ?>
                </div>
                <div class="about-content__col">
                    <?php echo wp_kses_post($content_col_2); ?>
                </div>
            </div>

            <div class="about-content__images">
                <div class="about-content__image about-content__image--main">
                    <?php if ($main_image) : ?>
                        <img src="<?php echo esc_url($main_image['url']); ?>" 
                             alt="<?php echo esc_attr($main_image['alt'] ?: $title); ?>">
                    <?php else : ?>
                        <div class="about-content__image-placeholder"></div>
                    <?php endif; ?>

                    <!-- Floating badge -->
                    <div class="about-content__badge">
                        <span class="about-content__badge-text"><?php echo esc_html($badge_line_1); ?></span>
                        <span class="about-content__badge-sub"><?php echo esc_html($badge_line_2); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

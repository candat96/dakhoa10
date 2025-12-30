<?php
/**
 * About Section Template
 *
 * @package BVDK10
 */

$badge = bvdk10_get_field('about_badge', false, 'Về chúng tôi');
$title = bvdk10_get_field('about_title', false, 'Bệnh viện Đa khoa số 10 Nơi người bệnh được chăm sóc bằng sự thấu hiểu');
$content_1 = bvdk10_get_field('about_content_1', false, 'Bệnh viện đa khoa số 10 đi vào hoạt động từ tháng 10 năm 2012 – đây là cơ sở y tế tư nhân đầu tiên được thành lập ở tỉnh Hậu Giang. Bệnh viện đa khoa số 10 tọa lạc trên khu đất có diện tích 5000m2 bao gồm một dãy lầu 3 tầng và 2 dãy lầu 2 tầng phân chia cho việc khám chữa bệnh cho người dân và nơi sinh hoạt thường lệ của nhân viên Bệnh viện');
$content_2 = bvdk10_get_field('about_content_2', false, 'Bệnh viện Đa khoa số 10 có quy mô hiện đại với 10 phòng khám khang trang, sạch sẻ bao gồm đầy đủ các chuyên khoa: nội, ngoại, sản, nhi, mắt, tai mũi họng, răng hàm mặt và da liễu. Bênh viện nhận điều trị nội trú các bệnh lý Nội Ngoại khoa. Ngoài ra còn có dịch vụ khám sức khỏe tổng quát và khám Bảo hiểm y tế.');
$image_small = bvdk10_get_field('about_image_small');
$image_large = bvdk10_get_field('about_image_large');
?>

<section class="about" id="about">
    <div class="container">
        <!-- Header -->
        <div class="about__header">
            <?php echo bvdk10_section_badge($badge); ?>
            <h2 class="about__title"><?php echo esc_html($title); ?></h2>
        </div>

        <!-- Content -->
        <div class="about__content">
            <div class="about__text">
                <div class="about__col">
                    <p><?php echo esc_html($content_1); ?></p>
                </div>
                <div class="about__col">
                    <p><?php echo esc_html($content_2); ?></p>
                </div>
            </div>
        </div>

        <!-- Images -->
        <div class="about__images">
            <div class="about__image about__image--small">
                <?php if ($image_small) : ?>
                    <img src="<?php echo esc_url($image_small['url']); ?>"
                         alt="<?php echo esc_attr($image_small['alt'] ?: 'Bệnh viện'); ?>">
                <?php else : ?>
                    <div class="about__image-placeholder"></div>
                <?php endif; ?>
            </div>
            <div class="about__image about__image--large">
                <?php if ($image_large) : ?>
                    <img src="<?php echo esc_url($image_large['url']); ?>"
                         alt="<?php echo esc_attr($image_large['alt'] ?: 'Bệnh viện'); ?>">
                <?php else : ?>
                    <div class="about__image-placeholder"></div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Button -->
        <div class="about__action">
            <a href="<?php echo home_url('/gioi-thieu'); ?>" class="btn btn--outline">
                Xem thêm
            </a>
        </div>
    </div>
</section>

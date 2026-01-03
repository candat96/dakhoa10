<?php
/**
 * About Hero Section Template
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

// Lấy data từ flexible content hoặc fallback
$title_line_1 = get_sub_field('title_line_1') ?: 'GIỚI THIỆU';
$title_line_2 = get_sub_field('title_line_2') ?: 'VỀ CHÚNG TÔI';
$tagline = get_sub_field('tagline') ?: 'Nơi người bệnh được chăm sóc bằng sự thấu hiểu';
$hero_image = get_sub_field('hero_image');
?>

<section class="about-hero" id="about-hero">
    <div class="about-hero__background">
        <div class="about-hero__gradient"></div>
    </div>
    <div class="container">
        <div class="about-hero__content">
            <div class="about-hero__text">
                <h1 class="about-hero__title">
                    <span class="about-hero__title-line1"><?php echo esc_html($title_line_1); ?></span>
                    <span class="about-hero__title-line2"><?php echo esc_html($title_line_2); ?></span>
                </h1>
            </div>
            <div class="about-hero__info">
                <p class="about-hero__tagline"><?php echo esc_html($tagline); ?></p>
            </div>
        </div>
        <div class="about-hero__image">
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" 
                     alt="<?php echo esc_attr($hero_image['alt'] ?: $title_line_1); ?>">
            <?php else : ?>
                <div class="about-hero__image-placeholder"></div>
            <?php endif; ?>
        </div>
    </div>
</section>

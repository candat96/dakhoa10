<?php
/**
 * Hero Section Template
 *
 * @package BVDK10
 */

$hero_bg = bvdk10_get_field('hero_background');
$headline_1 = bvdk10_get_field('hero_headline_1', false, 'Sức khỏe');
$headline_2 = bvdk10_get_field('hero_headline_2', false, 'là hạnh phúc của mọi người');
$doctor_image = bvdk10_get_field('hero_doctor_image');
?>

<section class="hero" id="hero">
    <!-- Background -->
    <div class="hero__background">
        <?php if ($hero_bg) : ?>
            <img src="<?php echo esc_url($hero_bg['url']); ?>"
                 alt="<?php echo esc_attr($hero_bg['alt']); ?>"
                 class="hero__bg-image">
        <?php endif; ?>
        <div class="hero__overlay"></div>
    </div>

    <!-- Decorative Elements -->
    <div class="hero__decorations">
        <div class="hero__decoration hero__decoration--circle-1"></div>
        <div class="hero__decoration hero__decoration--circle-2"></div>
        <div class="hero__decoration hero__decoration--blob-1"></div>
        <div class="hero__decoration hero__decoration--blob-2"></div>
    </div>

    <div class="hero__container container">
        <div class="hero__content">
            <!-- Doctor Image -->
            <?php if ($doctor_image) : ?>
                <div class="hero__doctor">
                    <img src="<?php echo esc_url($doctor_image['url']); ?>"
                         alt="<?php echo esc_attr($doctor_image['alt'] ?: 'Bác sĩ'); ?>"
                         class="hero__doctor-image">
                </div>
            <?php endif; ?>

            <!-- Display/Phone mockup -->
            <div class="hero__display">
                <div class="hero__display-frame">
                    <div class="hero__display-screen"></div>
                </div>
            </div>

            <!-- Headline -->
            <div class="hero__text">
                <h1 class="hero__headline">
                    <span class="hero__headline-1"><?php echo esc_html($headline_1); ?></span>
                    <span class="hero__headline-2"><?php echo esc_html($headline_2); ?></span>
                </h1>
            </div>

            <!-- Floating Medical Image -->
            <div class="hero__floating-image">
                <div class="hero__floating-frame">
                    <img src="<?php echo BVDK10_URI; ?>/assets/images/stethoscope.jpg"
                         alt="Medical"
                         class="hero__floating-img">
                </div>
            </div>
        </div>
    </div>

    <!-- Medical Icons -->
    <div class="hero__icons">
        <div class="hero__icon hero__icon--1">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="24" fill="#E53935" fill-opacity="0.1"/>
                <path d="M24 14C18.48 14 14 18.48 14 24C14 29.52 18.48 34 24 34C29.52 34 34 29.52 34 24C34 18.48 29.52 14 24 14ZM29 25H25V29H23V25H19V23H23V19H25V23H29V25Z" fill="#E53935"/>
            </svg>
        </div>
        <div class="hero__icon hero__icon--2">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="24" fill="#1565C0" fill-opacity="0.1"/>
                <path d="M24 14L14 19V25C14 30.55 18.16 35.74 24 37C29.84 35.74 34 30.55 34 25V19L24 14ZM22 31L17 26L18.41 24.59L22 28.17L29.59 20.58L31 22L22 31Z" fill="#1565C0"/>
            </svg>
        </div>
        <div class="hero__icon hero__icon--3">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="24" fill="#2E7D32" fill-opacity="0.1"/>
                <path d="M30 22H26V18C26 16.9 25.1 16 24 16C22.9 16 22 16.9 22 18V22H18C16.9 22 16 22.9 16 24C16 25.1 16.9 26 18 26H22V30C22 31.1 22.9 32 24 32C25.1 32 26 31.1 26 30V26H30C31.1 26 32 25.1 32 24C32 22.9 31.1 22 30 22Z" fill="#2E7D32"/>
            </svg>
        </div>
    </div>
</section>

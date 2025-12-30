<?php
/**
 * Mobile App Section Template
 *
 * @package BVDK10
 */

$badge = bvdk10_get_field('app_badge', false, 'Ứng dụng điện thoại');
$title_1 = bvdk10_get_field('app_title_1', false, 'Hướng dẫn tải ứng dụng');
$title_2 = bvdk10_get_field('app_title_2', false, 'Bệnh viện đa khoa số 10');
$description = bvdk10_get_field('app_description', false, 'Oncare là ứng dụng sức khỏe đồng hành và kết nối người dùng với đội ngũ bác sĩ riêng, cung cấp các dịch vụ tư vấn, thăm khám, xét nghiệm, chăm sóc sức khỏe chủ động.');
$qr_code = bvdk10_get_field('app_qr_code');
$app_store_link = bvdk10_get_field('app_store_link', false, '#');
$play_store_link = bvdk10_get_field('app_play_link', false, '#');
$phone_image = bvdk10_get_field('app_phone_image');
$background = bvdk10_get_field('app_background');
?>

<section class="mobile-app" id="mobile-app">
    <div class="container">
        <!-- Header -->
        <div class="mobile-app__header">
            <?php echo bvdk10_section_badge($badge); ?>
            <h2 class="mobile-app__title">
                <span class="mobile-app__title-1"><?php echo esc_html($title_1); ?></span>
                <span class="mobile-app__title-2"><?php echo esc_html($title_2); ?></span>
            </h2>
        </div>

        <!-- Content -->
        <div class="mobile-app__content">
            <!-- Background Card -->
            <div class="mobile-app__card">
                <!-- Background Image -->
                <?php if ($background) : ?>
                    <img src="<?php echo esc_url($background['url']); ?>"
                         alt=""
                         class="mobile-app__bg-image">
                <?php endif; ?>

                <!-- Info Box -->
                <div class="mobile-app__info">
                    <p class="mobile-app__desc"><?php echo esc_html($description); ?></p>

                    <!-- App Store Buttons -->
                    <div class="mobile-app__stores">
                        <a href="<?php echo esc_url($app_store_link); ?>" class="mobile-app__store-btn" target="_blank" rel="noopener">
                            <svg viewBox="0 0 120 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="120" height="40" rx="5" fill="#000"/>
                                <path d="M24.769 20.3c-.023-2.568 2.095-3.794 2.188-3.851-1.19-1.742-3.045-1.981-3.706-2.01-1.578-.16-3.081.929-3.882.929-.801 0-2.039-.906-3.35-.882-1.723.025-3.313 1.003-4.2 2.548-1.791 3.106-.458 7.708 1.286 10.23.853 1.231 1.869 2.614 3.204 2.565 1.285-.051 1.771-.831 3.325-.831 1.554 0 1.99.831 3.348.805 1.383-.022 2.262-1.255 3.11-2.493.98-1.43 1.384-2.814 1.409-2.886-.031-.014-2.702-1.038-2.732-4.124z" fill="#fff"/>
                                <path d="M22.147 12.591c.709-.859 1.187-2.052 1.057-3.24-1.022.041-2.26.681-2.993 1.54-.657.761-1.233 1.977-1.078 3.142 1.14.089 2.304-.579 3.014-1.442z" fill="#fff"/>
                                <text x="40" y="15" fill="#fff" font-size="8" font-family="Arial">Download on the</text>
                                <text x="40" y="28" fill="#fff" font-size="12" font-weight="bold" font-family="Arial">App Store</text>
                            </svg>
                        </a>
                        <a href="<?php echo esc_url($play_store_link); ?>" class="mobile-app__store-btn" target="_blank" rel="noopener">
                            <svg viewBox="0 0 135 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="135" height="40" rx="5" fill="#000"/>
                                <path d="M47.418 10.242c0 .938-.278 1.683-.833 2.236-.635.682-1.463 1.023-2.483 1.023-.977 0-1.81-.346-2.5-1.04-.69-.693-1.035-1.544-1.035-2.553s.345-1.86 1.035-2.553c.69-.694 1.523-1.04 2.5-1.04.483 0 .944.095 1.384.285.44.19.792.445 1.057.762l-.593.593c-.44-.528-1.045-.792-1.815-.792-.714 0-1.33.253-1.849.76-.518.505-.778 1.162-.778 1.97 0 .808.26 1.465.778 1.97.519.507 1.135.76 1.849.76.755 0 1.384-.255 1.888-.766.327-.333.516-.795.566-1.387h-2.454v-.809h3.25c.032.176.048.345.048.508z" fill="#fff"/>
                                <text x="48" y="15" fill="#fff" font-size="8" font-family="Arial">GET IT ON</text>
                                <text x="48" y="28" fill="#fff" font-size="12" font-weight="bold" font-family="Arial">Google Play</text>
                                <path d="M10.438 7.537c-.258.28-.41.703-.41 1.24v22.447c0 .537.152.96.41 1.24l.065.062 12.576-12.576v-.297L10.503 7.077l-.065.06z" fill="url(#play-a)"/>
                                <path d="M27.27 24.143l-4.191-4.192v-.297l4.19-4.191.094.054 4.965 2.821c1.419.805 1.419 2.125 0 2.931l-4.965 2.82-.093.054z" fill="url(#play-b)"/>
                                <path d="M27.364 24.089l-4.285-4.285-12.64 12.641c.468.495 1.24.555 2.11.062l14.815-8.418" fill="url(#play-c)"/>
                                <path d="M27.364 15.516L12.549 7.098c-.87-.493-1.642-.433-2.11.062l12.64 12.644 4.285-4.288z" fill="url(#play-d)"/>
                                <defs>
                                    <linearGradient id="play-a" x1="22.158" y1="8.496" x2="5.987" y2="24.667" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#00A0FF"/>
                                        <stop offset="1" stop-color="#00A1FF"/>
                                    </linearGradient>
                                    <linearGradient id="play-b" x1="34.05" y1="19.802" x2="9.959" y2="19.802" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFE000"/>
                                        <stop offset="1" stop-color="#FFBD00"/>
                                    </linearGradient>
                                    <linearGradient id="play-c" x1="24.977" y1="22.296" x2="2.91" y2="44.363" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF3A44"/>
                                        <stop offset="1" stop-color="#C31162"/>
                                    </linearGradient>
                                    <linearGradient id="play-d" x1="7.564" y1=".956" x2="17.31" y2="10.702" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#32A071"/>
                                        <stop offset="1" stop-color="#2DA771"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </a>
                    </div>

                    <!-- QR Code -->
                    <?php if ($qr_code) : ?>
                        <div class="mobile-app__qr">
                            <img src="<?php echo esc_url($qr_code['url']); ?>"
                                 alt="<?php echo esc_attr($qr_code['alt'] ?: 'QR Code'); ?>">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Phone Mockup -->
                <?php if ($phone_image) : ?>
                    <div class="mobile-app__phone">
                        <img src="<?php echo esc_url($phone_image['url']); ?>"
                             alt="<?php echo esc_attr($phone_image['alt'] ?: 'App'); ?>"
                             class="mobile-app__phone-image">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header" id="header">
    <div class="header__container container">
        <!-- Logo -->
        <a href="<?php echo home_url(); ?>" class="header__logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <div class="header__logo-icon">
                    <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="32" cy="32" r="32" fill="#E53935"/>
                        <path d="M32 16C23.164 16 16 23.164 16 32C16 40.836 23.164 48 32 48C40.836 48 48 40.836 48 32C48 23.164 40.836 16 32 16ZM40 34H34V40H30V34H24V30H30V24H34V30H40V34Z" fill="white"/>
                    </svg>
                </div>
            <?php endif; ?>
            <div class="header__logo-text">
                <span class="header__logo-name"><?php bloginfo('name'); ?></span>
            </div>
        </a>

        <!-- Navigation -->
        <nav class="header__nav" id="primary-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'header__menu',
                'fallback_cb'    => 'bvdk10_fallback_menu',
                'walker'         => new BVDK10_Nav_Walker(),
            ));
            ?>
        </nav>

        <!-- Right Actions -->
        <div class="header__actions">
            <?php
            $phone = bvdk10_get_field('header_phone', 'option', '0293 3 959 115');
            $cta_text = bvdk10_get_field('header_cta_text', 'option', 'Đặt lịch hẹn');
            $cta_link = bvdk10_get_field('header_cta_link', 'option', '#dat-lich');
            ?>

            <!-- Phone -->
            <a href="<?php echo bvdk10_phone_link($phone); ?>" class="header__phone">
                <span class="header__phone-number"><?php echo esc_html($phone); ?></span>
                <span class="header__phone-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.95 21C17.8 21 15.7043 20.5207 13.663 19.562C11.621 18.604 9.81267 17.3373 8.238 15.762C6.66267 14.1873 5.396 12.379 4.438 10.337C3.47933 8.29567 3 6.2 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.075 8.725 3.225C8.90833 3.375 9.01667 3.56667 9.05 3.8L9.7 7.3C9.73333 7.53333 9.72933 7.74567 9.688 7.937C9.646 8.129 9.55 8.3 9.4 8.45L6.975 10.9C7.675 12.1 8.55433 13.225 9.613 14.275C10.671 15.325 11.8333 16.2333 13.1 17L15.45 14.65C15.6 14.5 15.796 14.3873 16.038 14.312C16.2793 14.2373 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15 20.625 15.1127 20.775 15.288C20.925 15.4627 21 15.6667 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21Z" fill="currentColor"/>
                    </svg>
                </span>
            </a>

            <!-- CTA Button -->
            <a href="<?php echo esc_url($cta_link); ?>" class="header__cta btn btn--primary">
                <?php echo esc_html($cta_text); ?>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="header__toggle" id="menu-toggle" aria-label="Menu" aria-expanded="false">
                <span class="header__toggle-bar"></span>
                <span class="header__toggle-bar"></span>
                <span class="header__toggle-bar"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation -->
<div class="mobile-nav" id="mobile-nav">
    <div class="mobile-nav__overlay" id="mobile-nav-overlay"></div>
    <div class="mobile-nav__content">
        <div class="mobile-nav__header">
            <a href="<?php echo home_url(); ?>" class="mobile-nav__logo">
                <?php bloginfo('name'); ?>
            </a>
            <button class="mobile-nav__close" id="mobile-nav-close" aria-label="Đóng menu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'mobile-nav__menu',
            'fallback_cb'    => 'bvdk10_fallback_menu',
        ));
        ?>
        <div class="mobile-nav__footer">
            <a href="<?php echo bvdk10_phone_link($phone); ?>" class="mobile-nav__phone">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.95 21C17.8 21 15.7043 20.5207 13.663 19.562C11.621 18.604 9.81267 17.3373 8.238 15.762C6.66267 14.1873 5.396 12.379 4.438 10.337C3.47933 8.29567 3 6.2 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.075 8.725 3.225C8.90833 3.375 9.01667 3.56667 9.05 3.8L9.7 7.3C9.73333 7.53333 9.72933 7.74567 9.688 7.937C9.646 8.129 9.55 8.3 9.4 8.45L6.975 10.9C7.675 12.1 8.55433 13.225 9.613 14.275C10.671 15.325 11.8333 16.2333 13.1 17L15.45 14.65C15.6 14.5 15.796 14.3873 16.038 14.312C16.2793 14.2373 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15 20.625 15.1127 20.775 15.288C20.925 15.4627 21 15.6667 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21Z" fill="currentColor"/>
                </svg>
                <?php echo esc_html($phone); ?>
            </a>
            <a href="<?php echo esc_url($cta_link); ?>" class="btn btn--primary btn--block">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</div>

<main class="main" id="main">

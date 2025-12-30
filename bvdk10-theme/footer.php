</main>

<footer class="footer">
    <?php
    $footer_about = bvdk10_get_field('footer_about', 'option', '');
    $footer_address = bvdk10_get_field('footer_address', 'option', '');
    $footer_phone = bvdk10_get_field('footer_phone', 'option', '0293 3 959 115');
    $footer_email = bvdk10_get_field('footer_email', 'option', '');
    $footer_hours = bvdk10_get_field('footer_working_hours', 'option', '');
    $footer_social = bvdk10_get_field('footer_social', 'option', array());
    ?>

    <div class="footer__main">
        <div class="container">
            <div class="footer__grid">
                <!-- Column 1: About -->
                <div class="footer__col footer__col--about">
                    <a href="<?php echo home_url(); ?>" class="footer__logo">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <div class="footer__logo-icon">
                                <svg width="48" height="48" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="32" cy="32" r="32" fill="#E53935"/>
                                    <path d="M32 16C23.164 16 16 23.164 16 32C16 40.836 23.164 48 32 48C40.836 48 48 40.836 48 32C48 23.164 40.836 16 32 16ZM40 34H34V40H30V34H24V30H30V24H34V30H40V34Z" fill="white"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                        <span class="footer__logo-text"><?php bloginfo('name'); ?></span>
                    </a>
                    <?php if ($footer_about) : ?>
                        <p class="footer__about"><?php echo esc_html($footer_about); ?></p>
                    <?php endif; ?>

                    <?php if ($footer_social && is_array($footer_social)) : ?>
                        <div class="footer__social">
                            <?php foreach ($footer_social as $social) : ?>
                                <a href="<?php echo esc_url($social['url']); ?>"
                                   class="footer__social-link footer__social-link--<?php echo esc_attr($social['platform']); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="<?php echo esc_attr(ucfirst($social['platform'])); ?>">
                                    <?php bvdk10_svg($social['platform']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="footer__col">
                    <h4 class="footer__title">Liên kết nhanh</h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer__menu',
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>

                <!-- Column 3: Services -->
                <div class="footer__col">
                    <h4 class="footer__title">Dịch vụ</h4>
                    <ul class="footer__menu">
                        <?php
                        $services = bvdk10_get_services(array('posts_per_page' => 6));
                        if ($services->have_posts()) :
                            while ($services->have_posts()) : $services->the_post();
                        ?>
                            <li class="footer__menu-item">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Column 4: Contact -->
                <div class="footer__col">
                    <h4 class="footer__title">Liên hệ</h4>
                    <ul class="footer__contact">
                        <?php if ($footer_address) : ?>
                            <li class="footer__contact-item">
                                <span class="footer__contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <span><?php echo nl2br(esc_html($footer_address)); ?></span>
                            </li>
                        <?php endif; ?>

                        <?php if ($footer_phone) : ?>
                            <li class="footer__contact-item">
                                <span class="footer__contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.95 21C17.8 21 15.7043 20.5207 13.663 19.562C11.621 18.604 9.81267 17.3373 8.238 15.762C6.66267 14.1873 5.396 12.379 4.438 10.337C3.47933 8.29567 3 6.2 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.075 8.725 3.225C8.90833 3.375 9.01667 3.56667 9.05 3.8L9.7 7.3C9.73333 7.53333 9.72933 7.74567 9.688 7.937C9.646 8.129 9.55 8.3 9.4 8.45L6.975 10.9C7.675 12.1 8.55433 13.225 9.613 14.275C10.671 15.325 11.8333 16.2333 13.1 17L15.45 14.65C15.6 14.5 15.796 14.3873 16.038 14.312C16.2793 14.2373 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15 20.625 15.1127 20.775 15.288C20.925 15.4627 21 15.6667 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <a href="<?php echo bvdk10_phone_link($footer_phone); ?>"><?php echo esc_html($footer_phone); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if ($footer_email) : ?>
                            <li class="footer__contact-item">
                                <span class="footer__contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <a href="mailto:<?php echo esc_attr($footer_email); ?>"><?php echo esc_html($footer_email); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if ($footer_hours) : ?>
                            <li class="footer__contact-item">
                                <span class="footer__contact-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.2 16.2L17 14.9L12.5 12.2V7Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <span><?php echo nl2br(esc_html($footer_hours)); ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom-content">
                <p class="footer__copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tất cả quyền được bảo lưu.
                </p>
                <p class="footer__credit">
                    Thiết kế bởi <a href="https://deepcare.vn" target="_blank" rel="noopener">DeepCare</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<button class="back-to-top" id="back-to-top" aria-label="Về đầu trang">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 4L4 12H8V20H16V12H20L12 4Z" fill="currentColor"/>
    </svg>
</button>

<?php wp_footer(); ?>
</body>
</html>

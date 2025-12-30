<?php
/**
 * Services Section Template
 *
 * @package BVDK10
 */

$badge = bvdk10_get_field('services_badge', false, 'Dịch vụ');
$title_1 = bvdk10_get_field('services_title_1', false, 'Chúng tôi cung cấp');
$title_2 = bvdk10_get_field('services_title_2', false, 'các dịch vụ và chuyên khoa lâm sàng toàn diện');
$description = bvdk10_get_field('services_description', false, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

$services = bvdk10_get_services(array('posts_per_page' => 7));
?>

<section class="services" id="services">
    <div class="container">
        <div class="services__layout">
            <!-- Left: Header & Description -->
            <div class="services__header">
                <?php echo bvdk10_section_badge($badge); ?>
                <h2 class="services__title">
                    <span class="services__title-1"><?php echo esc_html($title_1); ?></span>
                    <span class="services__title-2"><?php echo esc_html($title_2); ?></span>
                </h2>
                <a href="<?php echo home_url('/dich-vu'); ?>" class="btn btn--outline">
                    Xem chi tiết
                </a>
            </div>

            <!-- Decorative Medical Icon -->
            <div class="services__decoration">
                <div class="services__icon-circle">
                    <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="100" r="98" stroke="#E53935" stroke-width="2" stroke-dasharray="8 8"/>
                        <circle cx="100" cy="100" r="80" stroke="#1565C0" stroke-width="1" stroke-dasharray="4 4"/>
                        <path d="M100 50V150M50 100H150" stroke="#E53935" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="100" cy="100" r="30" fill="#E53935" fill-opacity="0.1"/>
                    </svg>
                </div>
            </div>

            <!-- Right: Description -->
            <div class="services__desc">
                <p><?php echo esc_html($description); ?></p>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="services__grid">
            <?php if ($services->have_posts()) : ?>
                <?php while ($services->have_posts()) : $services->the_post(); ?>
                    <?php get_template_part('template-parts/components/service-card'); ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default service cards if no services in database -->
                <?php
                $default_services = array(
                    array('title' => 'Bảo hiểm y tế', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Khám ngoại trú', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Chẩn đoán hình ảnh', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Xét nghiệm', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Điều trị nội trú', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Khám sức khỏe', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                    array('title' => 'Xe cấp cứu chuyên dụng', 'desc' => 'Reference site about Lorem Ipsum, giving information on'),
                );
                foreach ($default_services as $service) :
                ?>
                    <div class="service-card">
                        <div class="service-card__header">
                            <div class="service-card__info">
                                <h3 class="service-card__title"><?php echo esc_html($service['title']); ?></h3>
                                <p class="service-card__desc"><?php echo esc_html($service['desc']); ?></p>
                            </div>
                            <a href="#" class="service-card__link">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                        <div class="service-card__image">
                            <div class="service-card__placeholder"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
/**
 * Doctors Section Template
 *
 * @package BVDK10
 */

$doctors = bvdk10_get_doctors(array('posts_per_page' => 12));
$total_doctors = $doctors->found_posts;
?>

<section class="doctors" id="doctors">
    <div class="container">
        <!-- Header -->
        <div class="doctors__header">
            <?php echo bvdk10_section_badge('Đội ngũ bác sĩ'); ?>
            <h2 class="doctors__title">
                <span class="doctors__title-1">Đội ngũ bác sĩ</span>
                <span class="doctors__title-2">chất lượng chuyên môn cao</span>
            </h2>
        </div>
    </div>

    <!-- Doctors Carousel -->
    <div class="doctors__carousel-wrapper">
        <div class="swiper doctors__swiper">
            <div class="swiper-wrapper">
                <?php if ($doctors->have_posts()) : ?>
                    <?php while ($doctors->have_posts()) : $doctors->the_post(); ?>
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/components/doctor-card'); ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Default doctor cards if no doctors in database -->
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <div class="swiper-slide">
                            <div class="doctor-card">
                                <div class="doctor-card__image">
                                    <div class="doctor-card__placeholder"></div>
                                </div>
                                <div class="doctor-card__content">
                                    <div class="doctor-card__meta">
                                        <span class="doctor-card__credential">
                                            <span class="doctor-card__dot"></span>
                                            Thạc sĩ bác sĩ
                                        </span>
                                        <span class="doctor-card__specialty">
                                            <span class="doctor-card__dot"></span>
                                            Chuyên khoa: Xương khớp
                                        </span>
                                    </div>
                                    <h3 class="doctor-card__name">TSBS. Nguyễn Văn Thái</h3>
                                    <p class="doctor-card__desc">Loãng xương, thoái hóa khớp, gout, viêm khớp dạng thấp, đau cột sống lưng, đau cột sống cổ, viêm gân, truyền thuốc loãng xương, tiêm nội khớp</p>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="container">
        <div class="doctors__pagination">
            <span class="doctors__pagination-current">01</span>
            <div class="doctors__pagination-progress">
                <div class="doctors__pagination-bar">
                    <div class="doctors__pagination-fill" id="doctors-progress"></div>
                </div>
            </div>
            <span class="doctors__pagination-total"><?php echo str_pad($total_doctors ?: 12, 2, '0', STR_PAD_LEFT); ?></span>
            <a href="<?php echo home_url('/bac-si'); ?>" class="doctors__pagination-link">
                Xem tất cả
            </a>
        </div>
    </div>
</section>

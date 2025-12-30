<?php
/**
 * Achievements Section Template
 *
 * @package BVDK10
 */

$achievements = bvdk10_get_achievements();
?>

<section class="achievements" id="achievements">
    <!-- Background -->
    <div class="achievements__background">
        <div class="achievements__bg-overlay"></div>
    </div>

    <div class="container">
        <!-- Header -->
        <div class="achievements__header">
            <?php echo bvdk10_section_badge('Thành tựu'); ?>
            <h2 class="achievements__title">Chứng chỉ - Thành tựu</h2>
            <p class="achievements__subtitle">
                Ghi nhận từ các tổ chức y tế uy tín và trong nước là minh chứng cho hành trình phụng sự của Bệnh viện đa khoa số 10
            </p>
        </div>

        <!-- Achievement Cards -->
        <div class="achievements__grid">
            <?php if ($achievements->have_posts()) : ?>
                <?php while ($achievements->have_posts()) : $achievements->the_post(); ?>
                    <div class="achievement-card">
                        <div class="achievement-card__image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('achievement-badge'); ?>
                            <?php else : ?>
                                <div class="achievement-card__placeholder"></div>
                            <?php endif; ?>
                        </div>
                        <div class="achievement-card__content">
                            <h3 class="achievement-card__title"><?php the_title(); ?></h3>
                            <?php $awarded_by = bvdk10_get_field('achievement_awarded_by'); ?>
                            <?php if ($awarded_by) : ?>
                                <p class="achievement-card__by">Bởi <?php echo esc_html($awarded_by); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default achievements -->
                <?php
                $default_achievements = array(
                    array(
                        'title' => 'Tiêu chuẩn quốc tế ACHS',
                        'by' => 'tổ chức Tiêu chuẩn và Chứng nhận chất lượng dịch vụ Y tế toàn cầu - Úc',
                    ),
                    array(
                        'title' => 'Tiêu chuẩn Trung tâm đào tạo chuẩn toàn cầu về ngoại khoa',
                        'by' => 'Hiệp hội Phẫu thuật Hoàng Gia Anh',
                    ),
                    array(
                        'title' => 'Tiêu chuẩn "Bệnh viện thực hành nuôi con bằng sữa mẹ xuất sắc"',
                        'by' => 'Bộ Y tế và Tổ chức Y tế thế giới',
                    ),
                );
                foreach ($default_achievements as $achievement) :
                ?>
                    <div class="achievement-card">
                        <div class="achievement-card__image">
                            <div class="achievement-card__placeholder"></div>
                        </div>
                        <div class="achievement-card__content">
                            <h3 class="achievement-card__title"><?php echo esc_html($achievement['title']); ?></h3>
                            <p class="achievement-card__by">Bởi <?php echo esc_html($achievement['by']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

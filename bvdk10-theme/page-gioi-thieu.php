<?php
/**
 * Template Name: Giới thiệu
 * Description: Trang giới thiệu bệnh viện
 *
 * @package BVDK10
 */

get_header();
?>

<!-- Hero Banner -->
<section class="about-hero">
    <div class="about-hero__background">
        <div class="about-hero__gradient"></div>
    </div>
    <div class="container">
        <div class="about-hero__content">
            <div class="about-hero__text">
                <h1 class="about-hero__title">
                    <span class="about-hero__title-line1">GIỚI THIỆU</span>
                    <span class="about-hero__title-line2">VỀ CHÚNG TÔI</span>
                </h1>
            </div>
            <div class="about-hero__info">
                <p class="about-hero__tagline">Nơi người bệnh được chăm sóc bằng sự thấu hiểu</p>
            </div>
        </div>
        <div class="about-hero__image">
            <?php
            $hero_image = get_field('about_hero_image');
            if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
            <?php else : ?>
                <div class="about-hero__image-placeholder"></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="about-content">
    <div class="container">
        <div class="about-content__header">
            <h2 class="about-content__title">Bệnh viện Đa khoa số 10</h2>
            <p class="about-content__subtitle">Nơi người bệnh được chăm sóc bằng sự thấu hiểu</p>
        </div>

        <div class="about-content__body">
            <div class="about-content__text">
                <div class="about-content__col">
                    <?php
                    $content_1 = get_field('about_content_col1');
                    if ($content_1) :
                        echo wp_kses_post($content_1);
                    else : ?>
                        <p>Bệnh viện đa khoa số 10 đi vào hoạt động từ tháng 10 năm 2012 – đây là cơ sở y tế tư nhân đầu tiên được thành lập ở tỉnh Hậu Giang. Bệnh viện đa khoa số 10 tọa lạc trên khu đất có diện tích 5000m2 bao gồm một dãy lầu 3 tầng và 2 dãy lầu 2 tầng phân chia cho việc khám chữa bệnh cho người dân và nơi sinh hoạt thường lệ của nhân viên Bệnh viện.</p>
                    <?php endif; ?>
                </div>
                <div class="about-content__col">
                    <?php
                    $content_2 = get_field('about_content_col2');
                    if ($content_2) :
                        echo wp_kses_post($content_2);
                    else : ?>
                        <p>Bệnh viện Đa khoa số 10 có quy mô hiện đại với 10 phòng khám khang trang, sạch sẻ bao gồm đầy đủ các chuyên khoa: nội, ngoại, sản, nhi, mắt, tai mũi họng, răng hàm mặt và da liễu. Bênh viện nhận điều trị nội trú các bệnh lý Nội Ngoại khoa. Ngoài ra còn có dịch vụ khám sức khỏe tổng quát và khám Bảo hiểm y tế.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="about-content__images">
                <div class="about-content__image about-content__image--main">
                    <?php
                    $main_image = get_field('about_main_image');
                    if ($main_image) : ?>
                        <img src="<?php echo esc_url($main_image['url']); ?>" alt="<?php echo esc_attr($main_image['alt']); ?>">
                    <?php else : ?>
                        <div class="about-content__image-placeholder"></div>
                    <?php endif; ?>

                    <!-- Floating badge -->
                    <div class="about-content__badge">
                        <span class="about-content__badge-text">CHUYÊN NGHIỆP</span>
                        <span class="about-content__badge-sub">HIỆN ĐẠI</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section class="vision-mission">
    <div class="container">
        <h2 class="vision-mission__title">Tầm nhìn - Sứ mệnh</h2>

        <div class="vision-mission__tabs">
            <button class="vision-mission__tab is-active" data-tab="vision">
                <span class="vision-mission__tab-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                    </svg>
                </span>
                Tầm nhìn
            </button>
            <button class="vision-mission__tab" data-tab="mission">
                <span class="vision-mission__tab-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM17.99 9L16.58 7.58L9.99 14.17L7.41 11.6L5.99 13.01L9.99 17L17.99 9Z" fill="currentColor"/>
                    </svg>
                </span>
                Sứ mệnh
            </button>
        </div>

        <div class="vision-mission__content">
            <div class="vision-mission__panel is-active" id="panel-vision">
                <?php
                $vision = get_field('about_vision');
                if ($vision) :
                    echo wp_kses_post($vision);
                else : ?>
                    <p>Bệnh viện Đa khoa số 10 ra đời với khát vọng trở thành bệnh viện tư nhân tiêu biểu, tin cậy trong lòng người dân Hậu Giang và khu vực lân cận, luôn tiên phong trong việc ứng dụng kỹ thuật y khoa tiên tiến, mang đến dịch vụ chăm sóc sức khỏe chất lượng cao với chi phí hợp lý.</p>
                <?php endif; ?>
            </div>
            <div class="vision-mission__panel" id="panel-mission">
                <?php
                $mission = get_field('about_mission');
                if ($mission) :
                    echo wp_kses_post($mission);
                else : ?>
                    <p>Sứ mệnh của chúng tôi là chăm sóc và bảo vệ sức khỏe cộng đồng bằng y đức và chuyên môn, mang đến cho người bệnh những dịch vụ y tế chất lượng cao, an toàn và hiệu quả, góp phần nâng cao chất lượng cuộc sống của người dân.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="about-stats">
    <div class="container">
        <div class="about-stats__header">
            <h2 class="about-stats__title">
                Chăm sóc và phục vụ người bệnh một cách<br>
                <span class="about-stats__highlight">tốt nhất</span>, là tiêu chí được đặt lên hàng đầu tại<br>
                <span class="about-stats__brand">Bệnh viện đa khoa số 10.</span>
            </h2>
        </div>

        <div class="about-stats__grid">
            <?php
            $stats = get_field('about_statistics');
            if ($stats && is_array($stats)) :
                foreach ($stats as $stat) :
            ?>
                <div class="about-stats__item">
                    <span class="about-stats__number"><?php echo esc_html($stat['number']); ?></span>
                    <span class="about-stats__label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php
                endforeach;
            else :
            ?>
                <div class="about-stats__item">
                    <span class="about-stats__number">2900</span>
                    <span class="about-stats__label">Nhân viên y tế</span>
                </div>
                <div class="about-stats__item">
                    <span class="about-stats__number">4000</span>
                    <span class="about-stats__label">Bệnh nhân mỗi ngày</span>
                </div>
                <div class="about-stats__item">
                    <span class="about-stats__number">5M+</span>
                    <span class="about-stats__label">Lượt khám mỗi năm</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="core-values">
    <div class="container">
        <div class="core-values__header">
            <span class="core-values__badge">Giá trị cốt lõi</span>
            <h2 class="core-values__title">
                <span class="core-values__title-highlight">Sức khỏe</span><br>
                <span class="core-values__title-sub">là <em>hạnh phúc</em></span><br>
                <span class="core-values__title-sub">của mọi người</span>
            </h2>
        </div>

        <div class="core-values__grid">
            <?php
            $values = get_field('about_core_values');
            if ($values && is_array($values)) :
                foreach ($values as $value) :
            ?>
                <div class="core-values__item">
                    <div class="core-values__image">
                        <?php if ($value['image']) : ?>
                            <img src="<?php echo esc_url($value['image']['url']); ?>" alt="<?php echo esc_attr($value['title']); ?>">
                        <?php else : ?>
                            <div class="core-values__image-placeholder"></div>
                        <?php endif; ?>
                    </div>
                    <h3 class="core-values__name"><?php echo esc_html($value['title']); ?></h3>
                </div>
            <?php
                endforeach;
            else :
                $default_values = array(
                    array('title' => 'Trách nhiệm'),
                    array('title' => 'Tận tâm'),
                    array('title' => 'Sự bền vững'),
                    array('title' => 'Chuyên nghiệp'),
                );
                foreach ($default_values as $value) :
            ?>
                <div class="core-values__item">
                    <div class="core-values__image">
                        <div class="core-values__image-placeholder"></div>
                    </div>
                    <h3 class="core-values__name"><?php echo esc_html($value['title']); ?></h3>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Mobile App Section (reuse from homepage) -->
<?php get_template_part('template-parts/sections/mobile-app'); ?>

<?php get_footer(); ?>

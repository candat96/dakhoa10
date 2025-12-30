<?php
/**
 * Customer Stories Section Template
 *
 * @package BVDK10
 */

$stories = bvdk10_get_stories(array('posts_per_page' => 5));
$total_stories = $stories->found_posts;
?>

<section class="stories" id="stories">
    <div class="container">
        <!-- Header -->
        <div class="stories__header">
            <?php echo bvdk10_section_badge('Tin tức - Sự kiện'); ?>
            <h2 class="stories__title">Câu chuyện khách hàng</h2>
        </div>
    </div>

    <!-- Stories Carousel -->
    <div class="stories__carousel-wrapper">
        <div class="swiper stories__swiper">
            <div class="swiper-wrapper">
                <?php if ($stories->have_posts()) : ?>
                    <?php while ($stories->have_posts()) : $stories->the_post(); ?>
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/components/story-card'); ?>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <!-- Default story cards -->
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <div class="swiper-slide">
                            <article class="story-card">
                                <div class="story-card__image">
                                    <div class="story-card__placeholder"></div>
                                </div>
                                <div class="story-card__content">
                                    <div class="story-card__meta">
                                        <span class="story-card__category">Tin tức</span>
                                        <span class="story-card__date">01/01/2024</span>
                                    </div>
                                    <h3 class="story-card__title">
                                        <a href="#">Tiêu đề bài viết mẫu về câu chuyện khách hàng</a>
                                    </h3>
                                    <p class="story-card__excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                    <a href="#" class="story-card__link">
                                        Đọc thêm
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                            <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="container">
        <div class="stories__pagination">
            <span class="stories__pagination-current">01</span>
            <div class="stories__pagination-progress">
                <div class="stories__pagination-bar">
                    <div class="stories__pagination-fill" id="stories-progress"></div>
                </div>
            </div>
            <span class="stories__pagination-total"><?php echo str_pad($total_stories ?: 12, 2, '0', STR_PAD_LEFT); ?></span>
            <a href="<?php echo home_url('/tin-tuc'); ?>" class="stories__pagination-link">
                Xem tất cả
            </a>
        </div>
    </div>
</section>

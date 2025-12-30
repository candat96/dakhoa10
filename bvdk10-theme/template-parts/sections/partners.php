<?php
/**
 * Partners Section Template
 *
 * @package BVDK10
 */

$partners = bvdk10_get_partners(array('posts_per_page' => 20));
?>

<section class="partners" id="partners">
    <div class="container">
        <!-- Header -->
        <div class="partners__header">
            <?php echo bvdk10_section_badge('Đối tác, khách hàng'); ?>
            <h2 class="partners__title">
                <span class="partners__title-1">Đối tác - Khách hàng</span>
                <span class="partners__title-2">của chúng tôi</span>
            </h2>
        </div>

        <!-- Partners Grid -->
        <div class="partners__grid">
            <?php if ($partners->have_posts()) : ?>
                <?php while ($partners->have_posts()) : $partners->the_post(); ?>
                    <div class="partner-logo">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('partner-logo'); ?>
                        <?php else : ?>
                            <div class="partner-logo__placeholder"></div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Default partner placeholders -->
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <div class="partner-logo">
                        <div class="partner-logo__placeholder"></div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

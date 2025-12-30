<?php
/**
 * Service Card Component
 *
 * @package BVDK10
 */

$short_desc = bvdk10_get_field('service_short_desc');
?>

<div class="service-card">
    <div class="service-card__header">
        <div class="service-card__info">
            <h3 class="service-card__title"><?php the_title(); ?></h3>
            <?php if ($short_desc) : ?>
                <p class="service-card__desc"><?php echo esc_html($short_desc); ?></p>
            <?php else : ?>
                <p class="service-card__desc"><?php echo bvdk10_excerpt(10); ?></p>
            <?php endif; ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="service-card__link" aria-label="Xem <?php the_title(); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
            </svg>
        </a>
    </div>
    <div class="service-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('service-thumbnail'); ?>
        <?php else : ?>
            <div class="service-card__placeholder"></div>
        <?php endif; ?>
    </div>
</div>

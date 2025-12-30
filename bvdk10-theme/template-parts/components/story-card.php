<?php
/**
 * Story/News Card Component
 *
 * @package BVDK10
 */

$categories = get_the_category();
$category_name = $categories ? $categories[0]->name : 'Tin tức';
?>

<article class="story-card">
    <a href="<?php the_permalink(); ?>" class="story-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('story-card'); ?>
        <?php else : ?>
            <div class="story-card__placeholder"></div>
        <?php endif; ?>
    </a>
    <div class="story-card__content">
        <div class="story-card__meta">
            <span class="story-card__category"><?php echo esc_html($category_name); ?></span>
            <span class="story-card__date"><?php echo get_the_date('d/m/Y'); ?></span>
        </div>
        <h3 class="story-card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="story-card__excerpt"><?php echo bvdk10_excerpt(12); ?></p>
        <a href="<?php the_permalink(); ?>" class="story-card__link">
            Đọc thêm
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
            </svg>
        </a>
    </div>
</article>

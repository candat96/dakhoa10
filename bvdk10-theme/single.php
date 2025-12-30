<?php
/**
 * Single Post Template
 *
 * @package BVDK10
 */

get_header();
?>

<article <?php post_class('single-post'); ?>>
    <div class="container">
        <?php bvdk10_breadcrumb(); ?>

        <header class="single-post__header">
            <?php
            $categories = get_the_category();
            if ($categories) :
            ?>
                <div class="single-post__categories">
                    <?php foreach ($categories as $cat) : ?>
                        <a href="<?php echo get_category_link($cat->term_id); ?>" class="single-post__category">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <h1 class="single-post__title"><?php the_title(); ?></h1>

            <div class="single-post__meta">
                <span class="single-post__date">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V10H19V20ZM19 8H5V6H19V8Z" fill="currentColor"/>
                    </svg>
                    <?php echo get_the_date('d/m/Y'); ?>
                </span>
                <span class="single-post__reading-time">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM12 20C7.59 20 4 16.41 4 12C4 7.59 7.59 4 12 4C16.41 4 20 7.59 20 12C20 16.41 16.41 20 12 20ZM12.5 7H11V13L16.2 16.2L17 14.9L12.5 12.2V7Z" fill="currentColor"/>
                    </svg>
                    <?php echo bvdk10_reading_time(); ?>
                </span>
            </div>
        </header>

        <?php if (has_post_thumbnail()) : ?>
            <div class="single-post__thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="single-post__content">
            <?php the_content(); ?>
        </div>

        <footer class="single-post__footer">
            <?php bvdk10_share_buttons(); ?>

            <?php
            $tags = get_the_tags();
            if ($tags) :
            ?>
                <div class="single-post__tags">
                    <span class="single-post__tags-label">Tags:</span>
                    <?php foreach ($tags as $tag) : ?>
                        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="single-post__tag">
                            <?php echo esc_html($tag->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </footer>

        <!-- Related Posts -->
        <?php
        $related = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post__not_in'   => array(get_the_ID()),
            'category__in'   => wp_get_post_categories(get_the_ID()),
        ));

        if ($related->have_posts()) :
        ?>
            <div class="related-posts">
                <h3 class="related-posts__title">Bài viết liên quan</h3>
                <div class="related-posts__grid">
                    <?php while ($related->have_posts()) : $related->the_post(); ?>
                        <article class="post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="post-card__image">
                                    <?php the_post_thumbnail('story-card'); ?>
                                </a>
                            <?php endif; ?>
                            <div class="post-card__content">
                                <div class="post-card__meta">
                                    <span class="post-card__date"><?php echo get_the_date('d/m/Y'); ?></span>
                                </div>
                                <h4 class="post-card__title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</article>

<style>
.single-post {
    padding: var(--spacing-16) 0;
    margin-top: 80px;
}

.single-post__header {
    max-width: 800px;
    margin: 0 auto var(--spacing-10);
    text-align: center;
}

.single-post__categories {
    display: flex;
    justify-content: center;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-4);
}

.single-post__category {
    font-size: var(--font-size-sm);
    font-weight: 500;
    color: var(--color-primary);
    background: rgba(229, 57, 53, 0.1);
    padding: var(--spacing-1) var(--spacing-3);
    border-radius: var(--radius-full);
}

.single-post__title {
    font-size: var(--font-size-4xl);
    font-weight: 700;
    color: var(--color-text);
    line-height: 1.2;
    margin-bottom: var(--spacing-6);
}

.single-post__meta {
    display: flex;
    justify-content: center;
    gap: var(--spacing-6);
    color: var(--color-text-secondary);
}

.single-post__date,
.single-post__reading-time {
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
    font-size: var(--font-size-sm);
}

.single-post__thumbnail {
    margin-bottom: var(--spacing-10);
    border-radius: var(--radius-xl);
    overflow: hidden;
}

.single-post__thumbnail img {
    width: 100%;
    height: auto;
}

.single-post__content {
    max-width: 800px;
    margin: 0 auto var(--spacing-10);
    font-size: var(--font-size-lg);
    line-height: 1.8;
    color: var(--color-text-secondary);
}

.single-post__content h2,
.single-post__content h3,
.single-post__content h4 {
    color: var(--color-text);
    margin-top: var(--spacing-10);
    margin-bottom: var(--spacing-4);
}

.single-post__content p {
    margin-bottom: var(--spacing-6);
}

.single-post__content img {
    border-radius: var(--radius-lg);
    margin: var(--spacing-8) 0;
}

.single-post__content ul,
.single-post__content ol {
    margin-bottom: var(--spacing-6);
    padding-left: var(--spacing-8);
}

.single-post__content li {
    margin-bottom: var(--spacing-2);
}

.single-post__content ul li {
    list-style: disc;
}

.single-post__content ol li {
    list-style: decimal;
}

.single-post__footer {
    max-width: 800px;
    margin: 0 auto var(--spacing-16);
    padding-top: var(--spacing-8);
    border-top: 1px solid var(--color-gray-200);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--spacing-4);
}

.share-buttons {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
}

.share-buttons__label {
    font-size: var(--font-size-sm);
    font-weight: 500;
    color: var(--color-text);
}

.share-buttons__link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: var(--color-gray-100);
    border-radius: var(--radius-full);
    color: var(--color-text);
    transition: all var(--transition-fast);
}

.share-buttons__link:hover {
    background: var(--color-primary);
    color: var(--color-white);
}

.single-post__tags {
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
    flex-wrap: wrap;
}

.single-post__tags-label {
    font-size: var(--font-size-sm);
    font-weight: 500;
    color: var(--color-text);
}

.single-post__tag {
    font-size: var(--font-size-sm);
    color: var(--color-text-secondary);
    background: var(--color-gray-100);
    padding: var(--spacing-1) var(--spacing-3);
    border-radius: var(--radius-full);
    transition: all var(--transition-fast);
}

.single-post__tag:hover {
    background: var(--color-primary);
    color: var(--color-white);
}

.related-posts {
    max-width: 1000px;
    margin: 0 auto;
}

.related-posts__title {
    font-size: var(--font-size-2xl);
    font-weight: 700;
    margin-bottom: var(--spacing-8);
    text-align: center;
}

.related-posts__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--spacing-6);
}

@media (max-width: 768px) {
    .single-post__title {
        font-size: var(--font-size-2xl);
    }

    .single-post__content {
        font-size: var(--font-size-base);
    }

    .related-posts__grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>

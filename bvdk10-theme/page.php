<?php
/**
 * Page Template
 *
 * @package BVDK10
 */

get_header();
?>

<article <?php post_class('page-content'); ?>>
    <div class="container">
        <?php bvdk10_breadcrumb(); ?>

        <header class="page-content__header">
            <h1 class="page-content__title"><?php the_title(); ?></h1>
        </header>

        <div class="page-content__body">
            <?php the_content(); ?>
        </div>
    </div>
</article>

<style>
.page-content {
    padding: var(--spacing-16) 0;
    margin-top: 80px;
}

.page-content__header {
    margin-bottom: var(--spacing-10);
    text-align: center;
}

.page-content__title {
    font-size: var(--font-size-4xl);
    font-weight: 700;
    color: var(--color-text);
}

.page-content__body {
    max-width: 900px;
    margin: 0 auto;
    font-size: var(--font-size-lg);
    line-height: 1.8;
    color: var(--color-text-secondary);
}

.page-content__body h2,
.page-content__body h3,
.page-content__body h4 {
    color: var(--color-text);
    margin-top: var(--spacing-10);
    margin-bottom: var(--spacing-4);
}

.page-content__body p {
    margin-bottom: var(--spacing-6);
}

.page-content__body img {
    border-radius: var(--radius-lg);
    margin: var(--spacing-8) 0;
}

.page-content__body ul,
.page-content__body ol {
    margin-bottom: var(--spacing-6);
    padding-left: var(--spacing-8);
}

.page-content__body li {
    margin-bottom: var(--spacing-2);
}

.page-content__body ul li {
    list-style: disc;
}

.page-content__body ol li {
    list-style: decimal;
}

@media (max-width: 768px) {
    .page-content__title {
        font-size: var(--font-size-2xl);
    }

    .page-content__body {
        font-size: var(--font-size-base);
    }
}
</style>

<?php get_footer(); ?>

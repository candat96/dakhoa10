<?php
/**
 * Main Index Template
 *
 * @package BVDK10
 */

get_header();
?>

<div class="archive-page">
    <div class="container">
        <?php bvdk10_breadcrumb(); ?>

        <header class="archive-page__header">
            <?php if (is_home()) : ?>
                <h1 class="archive-page__title">Tin tức</h1>
            <?php elseif (is_search()) : ?>
                <h1 class="archive-page__title">Kết quả tìm kiếm: "<?php echo get_search_query(); ?>"</h1>
            <?php else : ?>
                <h1 class="archive-page__title"><?php the_archive_title(); ?></h1>
                <?php the_archive_description('<div class="archive-page__description">', '</div>'); ?>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="archive-page__grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="post-card__image">
                                <?php the_post_thumbnail('story-card'); ?>
                            </a>
                        <?php endif; ?>

                        <div class="post-card__content">
                            <div class="post-card__meta">
                                <span class="post-card__date"><?php echo get_the_date('d/m/Y'); ?></span>
                                <span class="post-card__reading-time"><?php echo bvdk10_reading_time(); ?></span>
                            </div>

                            <h2 class="post-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <p class="post-card__excerpt"><?php echo bvdk10_excerpt(15); ?></p>

                            <a href="<?php the_permalink(); ?>" class="post-card__link">
                                Đọc thêm
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <nav class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                    'next_text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
                ));
                ?>
            </nav>
        <?php else : ?>
            <div class="archive-page__empty">
                <p>Không tìm thấy bài viết nào.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>

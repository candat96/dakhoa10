<?php
/**
 * Doctor Card Component
 *
 * @package BVDK10
 */

$credentials = bvdk10_get_field('doctor_credentials');
$specialties = bvdk10_get_field('doctor_specialties');
$specialty_terms = get_the_terms(get_the_ID(), 'chuyen-khoa');
$specialty_name = $specialty_terms ? $specialty_terms[0]->name : '';
?>

<div class="doctor-card">
    <div class="doctor-card__image">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('doctor-thumbnail'); ?>
        <?php else : ?>
            <div class="doctor-card__placeholder"></div>
        <?php endif; ?>
    </div>
    <div class="doctor-card__content">
        <div class="doctor-card__meta">
            <?php if ($credentials) : ?>
                <span class="doctor-card__credential">
                    <span class="doctor-card__dot"></span>
                    <?php echo esc_html($credentials); ?>
                </span>
            <?php endif; ?>
            <?php if ($specialty_name) : ?>
                <span class="doctor-card__specialty">
                    <span class="doctor-card__dot"></span>
                    Chuyên khoa: <?php echo esc_html($specialty_name); ?>
                </span>
            <?php endif; ?>
        </div>
        <h3 class="doctor-card__name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <?php if ($specialties) : ?>
            <p class="doctor-card__desc"><?php echo esc_html($specialties); ?></p>
        <?php endif; ?>
    </div>
</div>

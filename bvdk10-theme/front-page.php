<?php
/**
 * Front Page Template
 *
 * @package BVDK10
 */

get_header();
?>

<!-- Hero Section -->
<?php get_template_part('template-parts/sections/hero'); ?>

<!-- Quick Actions -->
<?php get_template_part('template-parts/sections/quick-actions'); ?>

<!-- About Section -->
<?php get_template_part('template-parts/sections/about'); ?>

<!-- Why Choose Us Section -->
<?php get_template_part('template-parts/sections/why-choose-us'); ?>

<!-- Services Section -->
<?php get_template_part('template-parts/sections/services'); ?>

<!-- Doctors Section -->
<?php get_template_part('template-parts/sections/doctors'); ?>

<!-- Achievements Section -->
<?php get_template_part('template-parts/sections/achievements'); ?>

<!-- Partners Section -->
<?php get_template_part('template-parts/sections/partners'); ?>

<!-- Customer Stories Section -->
<?php get_template_part('template-parts/sections/customer-stories'); ?>

<!-- Mobile App Section -->
<?php get_template_part('template-parts/sections/mobile-app'); ?>

<?php get_footer(); ?>

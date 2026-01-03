<?php
/**
 * Core Values Section Template
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

// Lấy data từ flexible content hoặc fallback
$badge = get_sub_field('badge') ?: 'Giá trị cốt lõi';
$title = get_sub_field('title') ?: '<span class="core-values__title-highlight">Sức khỏe</span><br><span class="core-values__title-sub">là <em>hạnh phúc</em></span><br><span class="core-values__title-sub">của mọi người</span>';
$values = get_sub_field('values');

// Default values if not set
$default_values = array(
    array('name' => 'Trách nhiệm', 'image' => null),
    array('name' => 'Tận tâm', 'image' => null),
    array('name' => 'Sự bền vững', 'image' => null),
    array('name' => 'Chuyên nghiệp', 'image' => null),
);

if (!$values || !is_array($values)) {
    $values = $default_values;
}
?>

<section class="core-values" id="core-values">
    <div class="container">
        <div class="core-values__header">
            <span class="core-values__badge"><?php echo esc_html($badge); ?></span>
            <h2 class="core-values__title">
                <?php echo wp_kses_post($title); ?>
            </h2>
        </div>

        <div class="core-values__grid">
            <?php foreach ($values as $value) : ?>
                <div class="core-values__item">
                    <div class="core-values__image">
                        <?php if (!empty($value['image'])) : ?>
                            <img src="<?php echo esc_url($value['image']['url']); ?>" 
                                 alt="<?php echo esc_attr($value['name']); ?>">
                        <?php else : ?>
                            <div class="core-values__image-placeholder"></div>
                        <?php endif; ?>
                    </div>
                    <h3 class="core-values__name"><?php echo esc_html($value['name']); ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

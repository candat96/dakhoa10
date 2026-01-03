<?php
/**
 * About Statistics Section Template
 *
 * @package BVDK10
 */

if (!defined('ABSPATH')) {
    exit;
}

// Lấy data từ flexible content hoặc fallback
$title = get_sub_field('title') ?: 'Chăm sóc và phục vụ người bệnh một cách <span class="about-stats__highlight">tốt nhất</span>, là tiêu chí được đặt lên hàng đầu tại <span class="about-stats__brand">Bệnh viện đa khoa số 10.</span>';
$statistics = get_sub_field('statistics');

// Default stats if not set
$default_stats = array(
    array('number' => '2900', 'label' => 'Nhân viên y tế'),
    array('number' => '4000', 'label' => 'Bệnh nhân mỗi ngày'),
    array('number' => '5M+', 'label' => 'Lượt khám mỗi năm'),
);

if (!$statistics || !is_array($statistics)) {
    $statistics = $default_stats;
}
?>

<section class="about-stats" id="about-stats">
    <div class="container">
        <div class="about-stats__header">
            <h2 class="about-stats__title">
                <?php echo wp_kses_post($title); ?>
            </h2>
        </div>

        <div class="about-stats__grid">
            <?php foreach ($statistics as $stat) : ?>
                <div class="about-stats__item">
                    <span class="about-stats__number"><?php echo esc_html($stat['number']); ?></span>
                    <span class="about-stats__label"><?php echo esc_html($stat['label']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

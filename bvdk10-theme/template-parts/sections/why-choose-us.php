<?php
/**
 * Why Choose Us Section Template
 *
 * @package BVDK10
 */

$badge = bvdk10_get_field('why_badge', false, 'Các giá trị');
$title_1 = bvdk10_get_field('why_title_1', false, 'Tại sao nên chọn');
$title_2 = bvdk10_get_field('why_title_2', false, 'Bệnh viện Đa khoa số 10');
$doctor_image = bvdk10_get_field('why_doctor_image');
$values = bvdk10_get_field('why_values');

// Default values
if (!$values || empty($values)) {
    $values = array(
        array(
            'number'      => '01',
            'title'       => 'Chuyên gia hàng đầu',
            'description' => 'Quy tụ đội ngũ chuyên gia đầu ngành, bác sĩ, dược sĩ, điều dưỡng và nhân viên y tế có trình độ chuyên môn cao, tay nghề giỏi, tận tâm và chuyên nghiệp.',
        ),
        array(
            'number'      => '02',
            'title'       => 'Công nghệ tiên tiến',
            'description' => 'Bệnh viện thường xuyên cập nhật, ứng dụng các phương pháp tiên tiến trong chẩn đoán và điều trị; đặc biệt luôn tuân thủ quy trình khám, chữa bệnh chuyên nghiệp.',
        ),
        array(
            'number'      => '03',
            'title'       => 'Cơ sở vật chất - Trang thiết bị hiện đại',
            'description' => 'Bệnh viện liên tục đầu tư cơ sở vật chất, trang thiết bị rất hiện đại với sứ mệnh mang lại sự lựa chọn hoàn hảo về chăm sóc sức khỏe, điều trị bệnh với chi phí hợp lý cho người bệnh.',
        ),
    );
}
?>

<section class="why-choose" id="why-choose">
    <!-- Background -->
    <div class="why-choose__background">
        <div class="why-choose__bg-image"></div>
    </div>

    <div class="container">
        <!-- Header -->
        <div class="why-choose__header">
            <?php echo bvdk10_section_badge($badge); ?>
            <h2 class="why-choose__title">
                <span class="why-choose__title-1"><?php echo esc_html($title_1); ?></span>
                <span class="why-choose__title-2"><?php echo esc_html($title_2); ?></span>
            </h2>
        </div>

        <!-- Circular Layout -->
        <div class="why-choose__layout">
            <!-- Circles -->
            <div class="why-choose__circles">
                <div class="why-choose__circle why-choose__circle--1"></div>
                <div class="why-choose__circle why-choose__circle--2"></div>
                <div class="why-choose__circle why-choose__circle--3"></div>
                <div class="why-choose__circle why-choose__circle--4"></div>
            </div>

            <!-- Doctor Image -->
            <div class="why-choose__doctor">
                <?php if ($doctor_image) : ?>
                    <img src="<?php echo esc_url($doctor_image['url']); ?>"
                         alt="<?php echo esc_attr($doctor_image['alt'] ?: 'Bác sĩ'); ?>"
                         class="why-choose__doctor-image">
                <?php endif; ?>
            </div>

            <!-- Value Cards -->
            <div class="why-choose__values">
                <?php foreach ($values as $index => $value) : ?>
                    <div class="value-card value-card--<?php echo $index + 1; ?>">
                        <div class="value-card__number">
                            <?php echo esc_html($value['number']); ?>
                        </div>
                        <div class="value-card__content">
                            <h3 class="value-card__title"><?php echo esc_html($value['title']); ?></h3>
                            <p class="value-card__desc"><?php echo esc_html($value['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

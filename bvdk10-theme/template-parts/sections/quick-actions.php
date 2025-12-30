<?php
/**
 * Quick Actions Section Template
 *
 * @package BVDK10
 */

$quick_actions = bvdk10_get_field('quick_actions');

// Default actions if ACF not set
if (!$quick_actions || empty($quick_actions)) {
    $quick_actions = array(
        array(
            'icon'        => '',
            'title'       => 'Gọi tổng đài',
            'description' => 'Tư vấn về triệu chứng bệnh, chuyên khoa, bác sĩ điều trị',
            'link'        => 'tel:+842933959115',
        ),
        array(
            'icon'        => '',
            'title'       => 'Đặt lịch hẹn',
            'description' => 'Hỗ trợ khách hàng 24/7',
            'link'        => '#dat-lich',
        ),
        array(
            'icon'        => '',
            'title'       => 'Tìm bác sĩ',
            'description' => 'Trực tiếp thăm khám và điều trị bệnh với bác sĩ bạn tin tưởng nhất.',
            'link'        => '/bac-si',
        ),
    );
}

// Icons for each action type
$action_icons = array(
    0 => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.95 21C17.8 21 15.7043 20.5207 13.663 19.562C11.621 18.604 9.81267 17.3373 8.238 15.762C6.66267 14.1873 5.396 12.379 4.438 10.337C3.47933 8.29567 3 6.2 3 4.05C3 3.75 3.1 3.5 3.3 3.3C3.5 3.1 3.75 3 4.05 3H8.1C8.33333 3 8.54167 3.075 8.725 3.225C8.90833 3.375 9.01667 3.56667 9.05 3.8L9.7 7.3C9.73333 7.53333 9.72933 7.74567 9.688 7.937C9.646 8.129 9.55 8.3 9.4 8.45L6.975 10.9C7.675 12.1 8.55433 13.225 9.613 14.275C10.671 15.325 11.8333 16.2333 13.1 17L15.45 14.65C15.6 14.5 15.796 14.3873 16.038 14.312C16.2793 14.2373 16.5167 14.2167 16.75 14.25L20.2 14.95C20.4333 15 20.625 15.1127 20.775 15.288C20.925 15.4627 21 15.6667 21 15.9V19.95C21 20.25 20.9 20.5 20.7 20.7C20.5 20.9 20.25 21 19.95 21Z" fill="currentColor"/>
          </svg>',
    1 => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V10H19V20ZM19 8H5V6H19V8ZM12 13H17V18H12V13Z" fill="currentColor"/>
          </svg>',
    2 => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6C13.1 6 14 5.1 14 4C14 2.9 13.1 2 12 2C10.9 2 10 2.9 10 4C10 5.1 10.9 6 12 6ZM20 13V4.83C20 3.27 18.73 2 17.17 2C16.42 2 15.7 2.3 15.17 2.83L13.92 4.08C13.21 3.4 12.29 3 11.25 3H4C2.9 3 2 3.9 2 5V8H4V5H11.25C11.9 5 12.5 5.2 13 5.55L11.03 7.52C10.38 8.17 10 9.07 10 10V22H12V15H14V22H16V10C16 9.62 15.94 9.26 15.84 8.91L18 6.75V13H20ZM18.17 4C18.44 4 18.67 4.1 18.83 4.27C18.94 4.38 19 4.53 19 4.69V5.07L17.93 6.14L16.86 5.07L17.93 4C18.1 3.83 18.32 3.73 18.56 3.73C18.43 3.73 18.3 3.83 18.17 4Z" fill="currentColor"/>
          </svg>',
);
?>

<section class="quick-actions" id="quick-actions">
    <div class="container">
        <div class="quick-actions__grid">
            <?php foreach ($quick_actions as $index => $action) : ?>
                <a href="<?php echo esc_url($action['link']); ?>" class="quick-action">
                    <div class="quick-action__icon">
                        <?php if (!empty($action['icon'])) : ?>
                            <img src="<?php echo esc_url($action['icon']); ?>" alt="">
                        <?php else : ?>
                            <?php echo $action_icons[$index] ?? $action_icons[0]; ?>
                        <?php endif; ?>
                    </div>
                    <div class="quick-action__content">
                        <h3 class="quick-action__title"><?php echo esc_html($action['title']); ?></h3>
                        <p class="quick-action__desc"><?php echo esc_html($action['description']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

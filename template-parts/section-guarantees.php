<?php
/**
 * Template part: Guarantees Section
 *
 * @package Kadence Child
 */

defined( 'ABSPATH' ) || exit;

$guarantees = [
    [
        'title' => 'Соблюдение сроков',
        'desc'  => 'работаем четко по графику',
    ],
    [
        'title' => 'Качественные материалы',
        'desc'  => 'используем проверенные смеси и арматуру',
    ],
    [
        'title' => 'Поэтапный контроль',
        'desc'  => 'каждый шаг под строгим надзором эксперта',
    ],
    [
        'title' => 'Честная и прозрачная смета',
        'desc'  => 'никаких скрытых платежей и переплат',
    ],
    [
        'title' => 'Прочность конструкций',
        'desc'  => 'надежные фундаменты на десятилетия',
    ],
    [
        'title' => 'Устойчивость к влаге и морозу',
        'desc'  => 'защита от деформаций и трещин',
    ],
];
?>

<section class="section-guarantees" id="guarantees">
    <div class="container">
        <h2 class="section-title">Какие <span>гарантии</span> получают наши клиенты</h2>
        <div class="guarantees-inner">
            <div class="guarantees-grid">
                <?php foreach ( $guarantees as $guarantee ) : ?>
                <div class="guarantee-item">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <circle cx="16" cy="16" r="16" fill="#F28A2E"/>
                        <path d="M10 16.5L14 20.5L22 12.5" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <p class="guarantee-title"><?php echo esc_html( $guarantee['title'] ); ?></p>
                        <p class="guarantee-desc"><?php echo esc_html( $guarantee['desc'] ); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="guarantees-image">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/contract.jpg" alt="договор на бетонные работы" loading="lazy">
            </div>
        </div>
        <p class="guarantees-note">Все финансовые условия, сроки выполнения работ и гарантийные обязательства фиксируются в договоре</p>
    </div>
</section>

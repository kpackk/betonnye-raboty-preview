<?php
/**
 * Template part: Services Section
 *
 * @package Kadence Child
 */

defined( 'ABSPATH' ) || exit;

$services = [
    [
        'image' => 'monolithic-foundation.jpg',
        'title' => 'МОНОЛИТНЫЙ ФУНДАМЕНТ',
        'price' => 'от 13 000 руб./м³',
        'items' => ['Разметка участка', 'Земляные работы', 'Песчаная подушка', 'Щебеночная подушка', 'Установка опалубки', 'Арматурный каркас', 'Заливка бетона', 'Виброуплотнение'],
    ],
    [
        'image' => 'strip-foundation.jpg',
        'title' => 'ЛЕНТОЧНЫЙ ФУНДАМЕНТ',
        'price' => 'от 3 500 руб./м.п.',
        'items' => ['Рытье траншей', 'Устройство основания', 'Устройство подошвы', 'Заливка бетона', 'Гидроизоляция и утепление'],
    ],
    [
        'image' => 'foundation-reinforcement.jpg',
        'title' => 'УКРЕПЛЕНИЕ ФУНДАМЕНТА',
        'price' => 'от 4 500 руб./м пог.',
        'items' => ['Обследование фундамента', 'Определение деформаций', 'Выбор технологии', 'Заделка трещин', 'Усиление подошвы'],
    ],
    [
        'image' => 'path-concreting.jpg',
        'title' => 'БЕТОНИРОВАНИЕ ДОРОЖЕК',
        'price' => 'от 4 000 руб./м пог.',
        'items' => ['Разметка территории', 'Земляные работы', 'Песчаная подушка', 'Щебеночная подушка', 'Установка опалубки', 'Армирование'],
    ],
    [
        'image' => 'yard-concreting.jpg',
        'title' => 'БЕТОНИРОВАНИЕ ДВОРОВ',
        'price' => 'от 3 000 руб./м²',
        'items' => ['Разметка двора', 'Удаление грунта', 'Подготовка подушки', 'Монтаж опалубки', 'Армирование участка', 'Заливка бетона'],
    ],
    [
        'image' => 'car-platform.jpg',
        'title' => 'ПЛОЩАДКИ ПОД АВТО',
        'price' => 'от 5 000 руб./м²',
        'items' => ['Разметка территории', 'Земляные работы', 'Подготовка основания', 'Монтаж опалубки', 'Армирование площадки', 'Заливка бетона'],
    ],
    [
        'image' => 'monolithic-walls.jpg',
        'title' => 'МОНОЛИТНЫЕ СТЕНЫ',
        'price' => 'от 15 000 руб./м³',
        'items' => ['Устройство основания', 'Установка опалубки', 'Грунтовка и армирование', 'Приготовление смеси', 'Заливка бетона'],
    ],
    [
        'image' => 'concrete-blindarea.jpg',
        'title' => 'БЕТОННЫЕ ОТМОСТКИ',
        'price' => 'от 3 500 руб./м.пог.',
        'items' => ['Подготовка участка', 'Снятие грунта', 'Устройство подушки', 'Монтаж опалубки', 'Армирование зоны', 'Заливка бетона'],
    ],
];
?>

<section class="section-services" id="services">
    <div class="container">
        <div class="section-title-shadow" aria-hidden="true">Какие мы выполняем бетонные работы в Луганске (ЛНР)</div>
        <p class="section-label">Какие мы выполняем бетонные работы в Луганске (ЛНР)</p>
        <h2 class="section-title">Какие мы выполняем бетонные работы в Луганске (ЛНР)</h2>
        <div class="services-grid">
            <?php foreach ( $services as $service ) : ?>
            <div class="service-card">
                <img class="service-card-img" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/services/<?php echo esc_attr( $service['image'] ); ?>" alt="<?php echo esc_attr( $service['title'] ); ?>" loading="lazy">
                <div class="service-card-content">
                    <div class="service-card-header"><?php echo esc_html( $service['title'] ); ?><br><br><?php echo esc_html( $service['price'] ); ?></div>
                    <div class="service-card-checklist">
                        <?php foreach ( $service['items'] as $item ) : ?>
                            <span>✅ <?php echo esc_html( $item ); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="service-card-actions">
                        <button class="btn-service" data-modal="modal-service">Оставить заявку</button>
                        <a href="#" class="btn-service-price" data-modal="modal-price">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M8 12a.5.5 0 0 1-.354-.146l-4-4a.5.5 0 1 1 .708-.708L8 10.793l3.646-3.647a.5.5 0 0 1 .708.708l-4 4A.5.5 0 0 1 8 12z"/><path d="M8 1a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0v-9A.5.5 0 0 1 8 1z"/><path d="M1 14.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/></svg>
                            Скачать прайс
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

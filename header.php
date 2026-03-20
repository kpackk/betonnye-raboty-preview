<?php
/**
 * The header template.
 *
 * @package Betonnye_Raboty
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="header-inner container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" style="height: 76px; width: auto;">
		</a>

		<div class="header-tagline">
			<span>Профессиональные</span>
			<strong>бетонные и монолитные работы</strong>
			<span>в Луганске и ЛНР</span>
		</div>

		<div class="header-address">
			<svg width="18" height="18" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M8 1C5.24 1 3 3.24 3 6c0 3.75 5 9 5 9s5-5.25 5-9c0-2.76-2.24-5-5-5Zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4Z" fill="#E74C3C"/>
			</svg>
			<span>г. Луганск,<br>ул. Фрунзе 42</span>
		</div>

		<a href="#" class="header-btn btn-price" data-modal="modal-price">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
				<path d="M17 12v5H3v-5H1v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5h-2Z" fill="currentColor"/>
				<path d="M10 15l4-5h-3V1H9v9H6l4 5Z" fill="currentColor"/>
			</svg>
			<span>Скачать прайс с ценами</span>
		</a>

		<div class="header-online">
			<span><span style="color:#4CAF50; font-size:10px; margin-right:4px;">&#9679;</span>Мы онлайн, <em>пишите</em></span>
			<div class="header-online__links">
				<a href="https://t.me/+79592591159" class="header-online__link header-online__link--tg" target="_blank" rel="noopener noreferrer" aria-label="Telegram">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/telegram.svg' ); ?>" alt="Telegram" width="32" height="32" loading="lazy">
				</a>
			</div>
		</div>

		<div class="header-phone-wrap">
			<a href="tel:+79592591159" class="header-phone">+7 (959) 259-11-59</a>
			<button type="button" class="btn-callback" data-modal="modal-callback">ЗАКАЗ ЗВОНКА</button>
		</div>

		<button type="button" class="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'Меню', 'betonnye-raboty' ); ?>" aria-expanded="false">
			<span></span>
			<span></span>
			<span></span>
		</button>
	</div>
</header>

<?php
/**
 * The footer template.
 *
 * @package Betonnye_Raboty
 */

defined( 'ABSPATH' ) || exit;
?>

<footer class="site-footer">
	<div class="footer-inner container">
		<div class="footer-col footer-logo-col">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="180" height="40" loading="lazy">
			</a>
		</div>

		<div class="footer-col footer-menu-col">
			<h4><?php esc_html_e( 'Меню', 'betonnye-raboty' ); ?></h4>
			<?php
			if ( has_nav_menu( 'footer-menu' ) ) {
				wp_nav_menu( [
					'theme_location' => 'footer-menu',
					'container'      => false,
					'menu_class'     => 'footer-menu-list',
					'depth'          => 1,
				] );
			} else {
				?>
				<ul class="footer-menu-list">
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">О компании</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contacts/' ) ); ?>">Контакты</a></li>
				</ul>
				<?php
			}
			?>
		</div>

		<div class="footer-col footer-advantages-col">
			<h4>Преимущества</h4>
			<ul class="footer-advantages-list">
				<li>Выполняем работы любой сложности.</li>
				<li>Проектируем каркас под нагрузки и тип грунта.</li>
				<li>Каждый этап проверяется инженером.</li>
				<li>Повышаем морозостойкость, влагозащиту, пластичность.</li>
				<li>Гарантируем идеальную геометрию и гладкость поверхностей.</li>
			</ul>
		</div>

		<div class="footer-col footer-info-col">
			<h4>Информация</h4>
			<p>Копирование и распространение материалов сайта без письменного согласия правообладателя запрещено.</p>
			<p>Все права защищены</p>
			<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="footer-info__link">Политика конфиденциальности</a>
			<a href="#" class="footer-info__link">Правовая информация</a>
		</div>
	</div>

	<div class="footer-bottom container">
		<span><?php echo esc_html( sprintf( 'Обновлен: %s', wp_date( 'j.n.Y' ) ) ); ?></span>
	</div>
</footer>

<!-- Cookie consent banner -->
<div class="cookie-banner" id="cookieBanner" role="alert" aria-live="polite" style="display:none;">
	<p>Для улучшения работы сайта мы используем файлы cookie. Вы всегда можете отключить файлы cookie в настройках вашего браузера.</p>
	<button type="button" class="btn-cookie-accept" id="cookieAccept">Хорошо</button>
</div>

<?php wp_footer(); ?>
</body>
</html>

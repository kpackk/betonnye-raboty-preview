<?php
/**
 * Template Part: Consultation Section
 *
 * @package Kadence_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section-consultation" id="consultation">
	<div class="container">
		<div class="consultation-box">
			<div class="consultation-inner">
				<div class="consultation-info">
					<p class="consultation-label">Перед заказом работ <strong>получите консультацию специалиста!</strong></p>
					<p class="consultation-schedule">Звоните Пн-Сб с <strong>8.00 до 18.00</strong></p>
					<a href="tel:+79592591159" class="consultation-phone">
						<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.0137 15.6172C20.1387 14.7096 19.0013 14.7096 18.09 15.6172C17.4046 16.2997 16.7266 16.9749 16.0412 17.6574C15.8516 17.8462 15.6985 17.8825 15.4725 17.7735C15.0569 17.5122 14.5611 17.3234 14.1455 17.0548C12.1697 15.806 10.5 14.2159 9.01997 12.4081C8.29816 11.5005 7.65656 10.5567 7.19723 9.46035C7.12432 9.23527 7.12432 9.11911 7.31388 8.93034C8.03569 8.28416 8.6773 7.60894 9.36265 6.92646C10.3105 5.9826 10.3105 4.88627 9.36265 3.94242C8.79395 3.3761 8.26171 2.84609 7.72947 2.31608C7.16077 1.74976 6.62853 1.18345 6.05983 0.653439C5.18491 -0.217813 4.04752 -0.217813 3.13614 0.653439C2.45079 1.33592 1.77273 2.01114 1.08738 2.69362C0.438477 3.3398 0.103092 4.09489 0.0228907 4.95888C-0.0937651 6.36014 0.248911 7.71784 0.744699 9.03924C1.77273 11.7982 3.32571 14.1796 5.18491 16.4086C7.72947 19.4362 10.7625 21.8176 14.2987 23.5166C15.8954 24.2716 17.5286 24.8743 19.2711 24.9904C20.5252 25.063 21.5896 24.729 22.4573 23.7779C23.026 23.0954 23.7113 22.5291 24.3165 21.8902C25.2278 20.9464 25.2278 19.8137 24.3165 18.9062C23.2155 17.8098 22.1146 16.7135 21.0137 15.6172Z" fill="white"/></svg>
						<span>+7 (959) 259-11-59</span>
					</a>
					<div class="consultation-messengers">
						<span class="consultation-msg-label">Пишите нам в мессенджер</span>
						<a href="https://t.me/+79592591159" target="_blank" rel="noopener" style="background:#0088cc;">
							<svg width="22" height="22" viewBox="0 0 40 40" aria-label="Telegram"><path d="M28.5 12.5l-3.2 15.1c-.2 1-.8 1.3-1.7.8l-4.5-3.3-2.2 2.1c-.2.2-.4.4-.9.4l.3-4.5 8.3-7.5c.4-.3-.1-.5-.5-.2l-10.3 6.5-4.4-1.4c-1-.3-1-.9.2-1.4l17.2-6.6c.8-.3 1.5.2 1.2 1.4z" fill="white"/></svg>
						</a>
					</div>
				</div>
				<div class="consultation-form-col">
					<p class="consultation-form-title">Оставьте свой номер и мастер вам перезвонит</p>
					<ul class="form-list">
						<li>обсудим объемы работ;</li>
						<li>определимся с технологией заливки;</li>
						<li>подберем оптимальные материалы;</li>
						<li>обсудим цену и условия оплаты;</li>
						<li>предложим скидки и бонусы</li>
					</ul>
					<form data-form-name="Консультация мастера">
						<input type="text" name="phone" placeholder="Ваш номер телефона" required>
						<button type="submit" class="btn-submit">Консультация мастера</button>
						<label class="form-privacy">
							<input type="checkbox">
							<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
						</label>
					</form>
				</div>
			</div>
			<div class="consultation-manager">
				<div class="consultation-manager-info">
					<p class="consultation-manager-name">Александр</p>
					<p class="consultation-manager-role">Старший мастер</p>
				</div>
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/122.png" alt="Александр">
			</div>
		</div>
	</div>
</section>

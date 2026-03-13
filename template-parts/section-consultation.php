<?php
/**
 * Template Part: Consultation Section
 *
 * Dark section with phone, messengers, callback form, and manager photo.
 *
 * @package Kadence_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="section-consultation" id="consultation">
	<div class="container">
		<div class="consultation-inner">
			<div class="consultation-content">
				<p class="consultation-label">Перед заказом работ <strong>получите консультацию специалиста!</strong></p>
				<p class="consultation-schedule">Звоните Пн-Сб с <strong>8.00 до 18.00</strong></p>
				<a href="tel:+79592591159" class="consultation-phone">+7 (959) 259-11-59</a>
				<p class="consultation-msg-label">Пишите нам в мессенджер</p>
				<div class="consultation-messengers">
					<a href="https://t.me/+79592591159" target="_blank" rel="noopener">
						<svg width="40" height="40" viewBox="0 0 40 40" aria-label="Telegram"><circle cx="20" cy="20" r="20" fill="#0088cc"/><path d="M28.5 12.5l-3.2 15.1c-.2 1-.8 1.3-1.7.8l-4.5-3.3-2.2 2.1c-.2.2-.4.4-.9.4l.3-4.5 8.3-7.5c.4-.3-.1-.5-.5-.2l-10.3 6.5-4.4-1.4c-1-.3-1-.9.2-1.4l17.2-6.6c.8-.3 1.5.2 1.2 1.4z" fill="white"/></svg>
					</a>
					<a href="https://wa.me/+79592591159" target="_blank" rel="noopener">
						<svg width="40" height="40" viewBox="0 0 40 40" aria-label="WhatsApp"><circle cx="20" cy="20" r="20" fill="#25D366"/><path d="M27.472 22.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z" fill="white"/></svg>
					</a>
				</div>
				<div class="consultation-form">
					<form data-form-name="Консультация мастера">
						<p class="consultation-form-title">Оставьте свой номер и мастер вам перезвонит</p>
						<ul class="form-list">
							<li>обсудим объемы работ;</li>
							<li>определимся с технологией заливки;</li>
							<li>подберем оптимальные материалы;</li>
							<li>обсудим цену и условия оплаты;</li>
							<li>предложим скидки и бонусы</li>
						</ul>
						<input type="text" name="phone" placeholder="Ваш номер телефона" required>
						<button type="submit" class="btn-submit">Консультация мастера</button>
						<label class="form-privacy">
							<input type="checkbox" checked>
							<span>Согласен с условиями <a href="/privacy-policy/">политики конфиденциальности данных</a></span>
						</label>
					</form>
				</div>
			</div>
			<div class="consultation-manager">
				<p class="consultation-manager-name">Александр</p>
				<p class="consultation-manager-role">Старший мастер</p>
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/manager-consultation.jpg" alt="менеджер" loading="lazy">
			</div>
		</div>
	</div>
</section>

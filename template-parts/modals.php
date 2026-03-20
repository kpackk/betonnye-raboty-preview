<?php
/**
 * Template Part: Modal Popups
 *
 * 7 modal dialogs: price download, callback, exit intent, promotion,
 * service request, surveyor, and consultation.
 *
 * @package Kadence_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!-- Modal: Download Price -->
<div class="modal-overlay" id="modal-price">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Скачайте прайс-лист на все услуги в 1 клик</h3>
		<form data-form-name="Попап скачать прайс">
			<label class="modal-select-label">Выберите куда вам удобнее отправить прайс?</label>
			<select name="messenger">
				<option value="Telegram">Получить в Telegram</option>
				<option value="Viber">Получить в Viber</option>
			</select>
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Получить прайс сейчас</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Callback -->
<div class="modal-overlay" id="modal-callback">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Перезвоните мне</h3>
		<form data-form-name="Попап перезвоните мне">
			<label>В какое время вам позвонить?</label>
			<select name="callback_time">
				<option>Сейчас</option>
				<option>В течение часа</option>
				<option>В течение дня</option>
				<option>На этой неделе</option>
			</select>
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Заказать звонок</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Exit Intent -->
<div class="modal-overlay" id="modal-exit">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Стойте! Подождите!</h3>
		<p class="modal-desc">Бесплатный расчет и смету работ</p>
		<form data-form-name="Попап exit intent">
			<p>Оставьте заявку и получите расчет в течении 60 минут!</p>
			<label>Выберите куда вам выслать?</label>
			<select name="messenger">
				<option value="Telegram">Получить в Telegram</option>
				<option value="Viber">Получить в Viber</option>
			</select>
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Получить смету бесплатно</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Promotion -->
<div class="modal-overlay" id="modal-promo">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Участвовать в акции</h3>
		<p class="modal-desc">Только телефон и вы участник акции. Перезвоним через пару минут для уточнения деталей.</p>
		<form data-form-name="Попап участвовать в акции">
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Участвовать в акции</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Service Request -->
<div class="modal-overlay" id="modal-service">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Оставьте заявку на услугу</h3>
		<p class="modal-desc">Только телефон и мы в деле. Перезвоним как можно скорее</p>
		<form data-form-name="Попап заявка на услугу">
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Оставить заявку</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Surveyor -->
<div class="modal-overlay" id="modal-surveyor">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Вызвать замерщика бесплатно</h3>
		<p class="modal-desc">Оставьте телефон и мы перезвоним</p>
		<form data-form-name="Попап вызов замерщика">
			<label>В какое время вам позвонить?</label>
			<select name="callback_time">
				<option>Сейчас</option>
				<option>В течение часа</option>
				<option>В течение дня</option>
				<option>На этой неделе</option>
			</select>
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Заказать звонок</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

<!-- Modal: Consultation (triggered by hero CTA) -->
<div class="modal-overlay" id="modal-consultation">
	<div class="modal">
		<button class="modal-close">&times;</button>
		<h3 class="modal-title">Оставьте заявку на расчет стоимости</h3>
		<form data-form-name="Оставьте заявку на расчет стоимости">
			<label>Какая у вас кровля?</label>
			<select name="roofing">
				<option>Металлочерепица</option>
				<option>Профнастил</option>
				<option>Черепица</option>
				<option>Ондулин</option>
				<option>Другая</option>
			</select>
			<input type="text" name="phone" placeholder="Ваш номер телефона" required>
			<button type="submit" class="btn-submit">Оставить заявку</button>
			<label class="form-privacy">
				<input type="checkbox">
				<span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
			</label>
		</form>
	</div>
</div>

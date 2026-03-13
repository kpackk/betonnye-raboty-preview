<?php
/**
 * Template part: Quiz Section
 *
 * @package Kadence Child
 */

defined( 'ABSPATH' ) || exit;

$theme_uri = esc_url( get_stylesheet_directory_uri() );
?>
<section class="section-quiz" id="quiz">
    <div class="container">
        <h2 class="section-title">Пройдите опрос и получите <span>смету и персональную скидку</span></h2>
        <p class="section-subtitle">Это займет не более 2 минут</p>
        <div class="quiz-inner">
            <div class="quiz-form">
                <div class="quiz-progress">
                    <div class="quiz-progress-bar" style="width: 0%"></div>
                </div>

                <!-- Step 1 -->
                <div class="quiz-step active" data-step="1">
                    <p class="quiz-step-label">Вопрос 1</p>
                    <h3 class="quiz-question">Какие работы вы хотите заказать?</h3>
                    <div class="quiz-options">
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Заливка фундамента">
                            <span>Заливка фундамента</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Укрепление фундамента">
                            <span>Укрепление фундамента</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Бетонирование дорожек">
                            <span>Бетонирование дорожек</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Бетонирование дворов">
                            <span>Бетонирование дворов</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Площадка под авто">
                            <span>Площадка под авто</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Заливка стяжки пола">
                            <span>Заливка стяжки пола</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Бетонные отмостки">
                            <span>Бетонные отмостки</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q1" value="Другие работы">
                            <span>Другие работы</span>
                        </label>
                    </div>
                    <div class="quiz-nav">
                        <span></span>
                        <button class="quiz-btn quiz-btn-next" disabled>Далее</button>
                    </div>
                    <p class="quiz-hint">Чтобы продолжить ответьте на вопрос выше</p>
                </div>

                <!-- Step 2 -->
                <div class="quiz-step" data-step="2">
                    <p class="quiz-step-label">Вопрос 2</p>
                    <h3 class="quiz-question">Когда нужно приступить к бетонным работам?</h3>
                    <div class="quiz-options">
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q2" value="Как можно быстрее">
                            <span>Как можно быстрее</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q2" value="В течение 3 дней">
                            <span>В течение 3 дней</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q2" value="В течение 7 дней">
                            <span>В течение 7 дней</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q2" value="В течение месяца">
                            <span>В течение месяца</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q2" value="Только планируем работы">
                            <span>Только планируем работы</span>
                        </label>
                    </div>
                    <div class="quiz-nav">
                        <button class="quiz-btn quiz-btn-back">Назад</button>
                        <button class="quiz-btn quiz-btn-next" disabled>Далее</button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="quiz-step" data-step="3">
                    <p class="quiz-step-label">Вопрос 3</p>
                    <h3 class="quiz-question">Что вы хотите получить в подарок?</h3>
                    <div class="quiz-options">
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q3" value="Индивидуальная скидка">
                            <span>Индивидуальная скидка</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q3" value="Скидка для друга">
                            <span>Скидка для друга</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_q3" value="Скидка на следующий заказ">
                            <span>Скидка на следующий заказ</span>
                        </label>
                    </div>
                    <div class="quiz-nav">
                        <button class="quiz-btn quiz-btn-back">Назад</button>
                        <button class="quiz-btn quiz-btn-next" disabled>Далее</button>
                    </div>
                </div>

                <!-- Step 4: Contact -->
                <div class="quiz-step" data-step="4">
                    <h3 class="quiz-question">Ваша смета готова</h3>
                    <p>Куда вам отправить коммерческое предложение?</p>
                    <div class="quiz-messenger-options">
                        <label class="quiz-option">
                            <input type="radio" name="quiz_messenger" value="WhatsApp">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.111.546 4.093 1.506 5.814L.057 23.68a.5.5 0 00.612.613l5.866-1.45A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818c-1.898 0-3.72-.517-5.312-1.494l-.38-.228-3.482.86.86-3.481-.228-.381A9.785 9.785 0 012.182 12c0-5.417 4.401-9.818 9.818-9.818S21.818 6.583 21.818 12 17.417 21.818 12 21.818z"/></svg>
                            <span>WhatsApp</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_messenger" value="Viber">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#7360F2" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20.775 3.28C18.925 1.54 15.944.426 12.953.264h-.058C10.1.122 7.654.844 5.768 2.24 4.096 3.47 2.974 5.183 2.476 7.233c-.498 2.05-.39 4.356.308 6.66.076.252.163.5.26.744v4.49c0 .33.266.598.597.598h.002l4.368-.002c.267.11.54.207.82.29 1.23.365 2.484.548 3.724.548h.002c.132.002 7.09.077 10.027-3.236 1.414-1.594 2.133-3.68 2.133-6.19.002-3.222-1.14-6.438-4.142-7.855zM18.1 16.146c-.42.97-1.236 1.595-2.226 1.705a3.3 3.3 0 01-.417.026c-.564 0-1.19-.156-1.91-.477a15.66 15.66 0 01-4.362-2.96 13.843 13.843 0 01-2.742-3.578c-.79-1.462-1.058-2.717-.796-3.73.178-.688.63-1.226 1.302-1.554a1.5 1.5 0 011.535.155l.007.005c.43.35.815.748 1.143 1.185.33.44.536.78.535 1.135 0 .408-.31.755-.776 1.09l-.127.09c-.37.263-.5.356-.452.58.256 1.177 1.048 2.186 2.16 2.755.126.065.26.112.398.14.232.05.376-.08.662-.36l.085-.084c.308-.308.657-.466 1.034-.466.37 0 .67.15 1.104.46.486.347.943.734 1.36 1.155.42.396.498.88.283 1.528z"/><path d="M13.072 5.738a5.125 5.125 0 013.666 3.208.5.5 0 00.94-.342 6.124 6.124 0 00-4.378-3.833.5.5 0 00-.228.967z"/><path d="M17.94 9.57a.5.5 0 00.966-.26 8.136 8.136 0 00-5.862-5.99.5.5 0 00-.248.968A7.14 7.14 0 0117.94 9.57z"/></svg>
                            <span>Viber</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_messenger" value="Telegram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#0088cc" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.161l-1.97 9.282c-.146.658-.537.818-1.084.508l-3-2.211-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.538-.194 1.006.13.833.94z"/></svg>
                            <span>Telegram</span>
                        </label>
                        <label class="quiz-option">
                            <input type="radio" name="quiz_messenger" value="E-mail">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="#EA4335" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <span>E-mail</span>
                        </label>
                    </div>
                    <form class="quiz-contact-form" data-form-name="<?php echo esc_attr( 'Форма квиза' ); ?>">
                        <input type="text" name="phone" placeholder="Ваш номер WhatsApp" required>
                        <input type="email" name="email" placeholder="Ваш e-mail" style="display:none">
                        <button type="submit" class="btn-submit">Выслать смету</button>
                        <label class="form-privacy">
                            <input type="checkbox" checked>
                            <span>Согласен с условиями <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">политики конфиденциальности данных</a></span>
                        </label>
                    </form>
                    <div class="quiz-bonuses">
                        <p>Вы также получите:</p>
                        <div class="quiz-bonus-items">
                            <div class="quiz-bonus-item">
                                <img src="<?php echo esc_url( $theme_uri ); ?>/assets/img/calc-icon.svg" alt="">
                                <span>Подробный расчет</span>
                            </div>
                            <div class="quiz-bonus-item">
                                <img src="<?php echo esc_url( $theme_uri ); ?>/assets/img/gift-icon.svg" alt="">
                                <span>Подарок</span>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-nav">
                        <button class="quiz-btn quiz-btn-back">Назад</button>
                        <span></span>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="quiz-sidebar">
                <div class="quiz-sidebar-status">Онлайн</div>
                <img src="<?php echo esc_url( $theme_uri ); ?>/assets/img/manager.jpg" alt="<?php echo esc_attr( 'Менеджер' ); ?>">
                <p class="quiz-sidebar-name">Полуянов Андрей</p>
                <p class="quiz-sidebar-text">Дайте ответы на вопросы и получите <strong>скидку + подробную смету</strong></p>
                <div class="quiz-sidebar-bonuses">
                    <p>В конце получите:</p>
                    <div class="quiz-bonus-items">
                        <div class="quiz-bonus-item">
                            <img src="<?php echo esc_url( $theme_uri ); ?>/assets/img/calc-icon.svg" alt="">
                            <span>Подробный расчет</span>
                        </div>
                        <div class="quiz-bonus-item">
                            <img src="<?php echo esc_url( $theme_uri ); ?>/assets/img/gift-icon.svg" alt="">
                            <span>Подарок</span>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<?php
/**
 * Template Name: Контакты
 */
get_header();
?>

<style>
    .contacts-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
    }
    .contact-item {
        margin-bottom: 25px;
    }
    .contact-item h3 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .contacts-messengers a {
        display: inline-block;
        margin-right: 15px;
        color: #A34100;
    }
    .contacts-form input[type="text"] {
        width: 100%;
        padding: 14px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 15px;
    }
</style>

<main class="site-main">
    <div class="page-breadcrumbs">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a> &rarr;
            <span>Контакты</span>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <h1>Контакты</h1>

            <div class="contacts-grid">
                <div class="contacts-info">
                    <div class="contact-item">
                        <h3>Адрес</h3>
                        <p>г. Луганск, ул. Фрунзе 42</p>
                    </div>
                    <div class="contact-item">
                        <h3>Телефон</h3>
                        <p><a href="tel:+79592591159">+7 (959) 259-11-59</a></p>
                    </div>
                    <div class="contact-item">
                        <h3>Мессенджеры</h3>
                        <div class="contacts-messengers">
                            <a href="https://wa.me/+79592591159" target="_blank" rel="noopener">WhatsApp</a>
                            <a href="https://t.me/+79592591159" target="_blank" rel="noopener">Telegram</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <h3>Режим работы</h3>
                        <p>Пн-Сб: 8:00 — 18:00</p>
                    </div>
                </div>
                <div class="contacts-form">
                    <h3>Напишите нам</h3>
                    <form data-form-name="Форма контактов">
                        <input type="text" name="phone" placeholder="Ваш номер телефона" required>
                        <button type="submit" class="btn-submit">Отправить заявку</button>
                        <label class="form-privacy">
                            <input type="checkbox" checked>
                            <span>Согласен с условиями <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">политики конфиденциальности данных</a></span>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/modals'); ?>
<?php get_footer(); ?>

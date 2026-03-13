<?php
$portfolio_query = new WP_Query([
    'post_type'      => 'portfolio',
    'posts_per_page' => 20,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<section class="section-portfolio" id="portfolio">
    <div class="container">
        <h2 class="section-title"><span>Наши работы</span> в Луганске и ЛНР</h2>
        <p class="section-subtitle">Листайте влево/вправо</p>

        <?php if ($portfolio_query->have_posts()) : ?>
        <div class="portfolio-slider swiper">
            <div class="swiper-wrapper">
                <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                <div class="swiper-slide portfolio-slide">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" target="_blank">
                            <?php the_post_thumbnail('medium_large', ['loading' => 'lazy', 'alt' => get_the_title()]); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <!-- Fallback: static images when no CPT posts exist -->
        <div class="portfolio-slider swiper">
            <div class="swiper-wrapper">
                <?php
                $fallback_images = [
                    'stupeni-iz-betona.jpg'          => 'Ступени из бетона',
                    'betonnye-kolony.jpg'            => 'Бетонные колонны',
                    'kolony-iz-betona.jpg'           => 'Колонны из бетона',
                    'zalivka-betonnyh-polov.jpg'     => 'Заливка бетонных полов',
                    'betonirovanie-dorozhki.jpg'     => 'Бетонирование дорожки',
                    'zalivka-fundamenta.jpg'         => 'Заливка фундамента',
                    'zalivka-betonnoj-dorozhki.jpg'  => 'Заливка бетонной дорожки',
                    'fundament.jpg'                  => 'Фундамент',
                    'zalivka-betonnogo-pola.jpg'     => 'Заливка бетонного пола',
                    'zalivka-lestniczy.jpg'          => 'Заливка лестницы',
                    'betonnyj-fundament.jpg'         => 'Бетонный фундамент',
                ];
                $theme_uri = esc_url(get_stylesheet_directory_uri());
                foreach ($fallback_images as $file => $alt) : ?>
                <div class="swiper-slide portfolio-slide">
                    <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/portfolio/' . $file); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy">
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <?php endif; ?>

        <div class="portfolio-more">
            <button class="btn-load-more">Загрузить еще фото</button>
        </div>
    </div>
</section>

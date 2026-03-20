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
        <h2 class="section-title"><b>Наши работы</b> в Луганске и ЛНР</h2>
        <span class="portfolio-tab">Бетонные работы</span>

        <?php if ($portfolio_query->have_posts()) : ?>
        <div class="portfolio-grid">
            <?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium_large')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" loading="lazy">
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
        <!-- Fallback: static images when no CPT posts exist -->
        <div class="portfolio-grid">
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
            foreach ($fallback_images as $file => $alt) : ?>
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/portfolio/' . $file); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="portfolio-more">
            <button class="btn-load-more">Загрузить еще фото</button>
        </div>
    </div>
</section>

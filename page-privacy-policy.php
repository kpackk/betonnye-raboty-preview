<?php
/**
 * Template Name: Политика конфиденциальности
 */
get_header();
?>

<main class="site-main">
    <div class="page-breadcrumbs">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>">Главная</a> &rarr;
            <span>Политика конфиденциальности</span>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_template_part('template-parts/modals'); ?>
<?php get_footer(); ?>

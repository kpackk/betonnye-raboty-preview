<?php
/**
 * Front Page Template
 */
get_header();
?>

<main class="site-main">
    <?php get_template_part('template-parts/section', 'hero'); ?>
    <?php get_template_part('template-parts/section', 'quiz'); ?>
    <?php get_template_part('template-parts/section', 'about'); ?>
    <?php get_template_part('template-parts/section', 'services'); ?>
    <?php get_template_part('template-parts/section', 'guarantees'); ?>
    <?php get_template_part('template-parts/section', 'portfolio'); ?>
    <?php get_template_part('template-parts/section', 'team'); ?>
    <?php get_template_part('template-parts/section', 'faq'); ?>
    <?php get_template_part('template-parts/section', 'consultation'); ?>
    <?php get_template_part('template-parts/section', 'price-table'); ?>
</main>

<?php get_template_part('template-parts/modals'); ?>

<?php get_footer(); ?>

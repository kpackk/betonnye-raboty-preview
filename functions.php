<?php
/**
 * Betonnye Raboty child theme functions.
 *
 * @package Betonnye_Raboty
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue parent and child styles.
 */
add_action( 'wp_enqueue_scripts', 'betonnye_enqueue_styles' );
function betonnye_enqueue_styles() {
	// Parent theme style.
	wp_enqueue_style(
		'flavor-style',
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme( 'flavor' )->get( 'Version' )
	);

	// Google Fonts: Manrope + Inter.
	wp_enqueue_style(
		'betonnye-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@400;500;600;700;800&display=swap',
		[],
		null
	);

	// Swiper.js CSS.
	wp_enqueue_style(
		'swiper-css',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
		[],
		'11.0'
	);

	// Main child theme CSS (compiled stylesheet).
	wp_enqueue_style(
		'betonnye-main',
		get_stylesheet_directory_uri() . '/assets/css/main.css',
		[ 'flavor-style', 'betonnye-fonts' ],
		'1.0.0'
	);

	// Child theme style.css (overrides).
	wp_enqueue_style(
		'betonnye-child',
		get_stylesheet_uri(),
		[ 'betonnye-main' ],
		'1.0.0'
	);
}

/**
 * Enqueue scripts.
 */
add_action( 'wp_enqueue_scripts', 'betonnye_enqueue_scripts' );
function betonnye_enqueue_scripts() {
	// Swiper.js.
	wp_enqueue_script(
		'swiper-js',
		'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
		[],
		'11.0',
		true
	);

	// Theme main script.
	wp_enqueue_script(
		'betonnye-main',
		get_stylesheet_directory_uri() . '/assets/js/main.js',
		[],
		'1.0.0',
		true
	);

	// Quiz script.
	wp_enqueue_script(
		'betonnye-quiz',
		get_stylesheet_directory_uri() . '/assets/js/quiz.js',
		[],
		'1.0.0',
		true
	);

	// FAQ accordion script.
	wp_enqueue_script(
		'betonnye-faq',
		get_stylesheet_directory_uri() . '/assets/js/faq.js',
		[],
		'1.0.0',
		true
	);

	// Modals script.
	wp_enqueue_script(
		'betonnye-modals',
		get_stylesheet_directory_uri() . '/assets/js/modals.js',
		[],
		'1.0.0',
		true
	);

	// Forms script.
	wp_enqueue_script(
		'betonnye-forms',
		get_stylesheet_directory_uri() . '/assets/js/forms.js',
		[],
		'1.0.0',
		true
	);

	// Localize for AJAX.
	wp_localize_script( 'betonnye-forms', 'betonnye_ajax', [
		'url'   => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'betonnye_form_nonce' ),
	] );
}

/**
 * Include Custom Post Types.
 */
require_once get_stylesheet_directory() . '/inc/cpt-portfolio.php';

/**
 * Include AJAX handlers.
 */
require_once get_stylesheet_directory() . '/inc/ajax-handlers.php';

/**
 * Theme setup.
 */
add_action( 'after_setup_theme', 'betonnye_theme_setup' );
function betonnye_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	] );
}

/**
 * Register navigation menus.
 */
add_action( 'init', 'betonnye_register_menus' );
function betonnye_register_menus() {
	register_nav_menus( [
		'footer-menu' => esc_html__( 'Footer Menu', 'betonnye-raboty' ),
	] );
}

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
		'kadence-style',
		get_template_directory_uri() . '/style.css',
		[],
		wp_get_theme( 'kadence' )->get( 'Version' )
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
		[ 'kadence-style', 'betonnye-fonts' ],
		filemtime( get_stylesheet_directory() . '/assets/css/main.css' )
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

/**
 * SEO meta tags, webmaster verification codes, and analytics.
 *
 * Replace placeholder values with actual codes from the client.
 */
add_action( 'wp_head', 'betonnye_seo_and_analytics', 1 );
function betonnye_seo_and_analytics() {
	// Basic SEO meta tags.
	if ( is_front_page() ) {
		echo '<meta name="description" content="Бетонные и монолитные работы в Луганске и ЛНР. Фундаменты, стяжки, отмостки, армопояса. Профессиональная бригада с гарантией качества.">' . "\n";
		echo '<meta name="keywords" content="бетонные работы Луганск, монолитные работы, фундамент, стяжка пола, отмостка, армопояс, бетон ЛНР">' . "\n";
	}

	// Yandex Webmaster verification (replace YANDEX_VERIFICATION_CODE with actual code).
	echo '<meta name="yandex-verification" content="YANDEX_VERIFICATION_CODE">' . "\n";

	// Google Search Console verification (replace GOOGLE_VERIFICATION_CODE with actual code).
	echo '<meta name="google-site-verification" content="GOOGLE_VERIFICATION_CODE">' . "\n";
}

/**
 * Yandex Metrika counter.
 *
 * Replace XXXXXXXX with the actual Metrika counter ID from the client.
 */
add_action( 'wp_head', 'betonnye_yandex_metrika', 99 );
function betonnye_yandex_metrika() {
	?>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		m[i].l=1*new Date();
		for(var j=0;j<document.scripts.length;j++){if(document.scripts[j].src===r)return;}
		k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		(window,document,"script","https://mc.yandex.ru/metrika/tag.js","ym");

		ym(XXXXXXXX, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true,
			webvisor:true
		});
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/XXXXXXXX" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<?php
}

/**
 * Favicon (fallback if not set via WP Customizer).
 */
add_action( 'wp_head', 'betonnye_favicon', 2 );
function betonnye_favicon() {
	if ( ! has_site_icon() ) {
		echo '<link rel="icon" href="' . esc_url( get_stylesheet_directory_uri() . '/assets/img/favicon.ico' ) . '" type="image/x-icon">' . "\n";
		echo '<link rel="shortcut icon" href="' . esc_url( get_stylesheet_directory_uri() . '/assets/img/favicon.ico' ) . '" type="image/x-icon">' . "\n";
	}
}

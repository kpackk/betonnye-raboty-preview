<?php
/**
 * Template part: Guarantees Section
 *
 * @package Kadence Child
 */

defined( 'ABSPATH' ) || exit;

$guarantees = [
	[
		'title' => 'Соблюдение сроков',
		'desc'  => 'работаем четко по графику',
	],
	[
		'title' => 'Качественные материалы',
		'desc'  => 'используем проверенные смеси и арматуру',
	],
	[
		'title' => 'Поэтапный контроль',
		'desc'  => 'каждый шаг под строгим надзором эксперта',
	],
	[
		'title' => 'Честная и прозрачная смета',
		'desc'  => 'никаких скрытых платежей и переплат',
	],
	[
		'title' => 'Прочность конструкций',
		'desc'  => 'надежные фундаменты на десятилетия',
	],
	[
		'title' => 'Устойчивость к влаге и морозу',
		'desc'  => 'защита от деформаций и трещин',
	],
];
?>

<section class="section-guarantees" id="guarantees">
	<div class="container">
		<h2 class="section-title">Какие <b>гарантии</b> получают<br>наши клиенты</h2>
		<div class="guarantees-grid">
			<?php foreach ( $guarantees as $guarantee ) : ?>
			<div class="guarantee-item">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/galochka.png" alt="" width="27" height="27" style="flex-shrink:0;">
				<p><b><?php echo esc_html( $guarantee['title'] ); ?></b><br><?php echo esc_html( $guarantee['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<p class="guarantees-note">Все финансовые условия, сроки выполнения работ и гарантийные обязательства фиксируются в договоре</p>
		<div class="guarantees-image">
			<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/dogovor.png" alt="договор на бетонные работы" loading="lazy">
		</div>
	</div>
</section>

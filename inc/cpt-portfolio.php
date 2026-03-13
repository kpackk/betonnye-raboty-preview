<?php
/**
 * Register Portfolio custom post type.
 *
 * @package Betonnye_Raboty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', 'betonnye_register_portfolio_cpt' );
/**
 * Register the 'portfolio' custom post type.
 */
function betonnye_register_portfolio_cpt() {
	$labels = [
		'name'                  => 'Портфолио',
		'singular_name'         => 'Работа',
		'menu_name'             => 'Портфолио',
		'name_admin_bar'        => 'Работа',
		'add_new'               => 'Добавить работу',
		'add_new_item'          => 'Добавить новую работу',
		'new_item'              => 'Новая работа',
		'edit_item'             => 'Редактировать работу',
		'view_item'             => 'Просмотреть работу',
		'all_items'             => 'Все работы',
		'search_items'          => 'Искать работы',
		'not_found'             => 'Работы не найдены.',
		'not_found_in_trash'    => 'В корзине работ не найдено.',
		'archives'              => 'Наши работы',
		'featured_image'        => 'Фото работы',
		'set_featured_image'    => 'Задать фото работы',
		'remove_featured_image' => 'Удалить фото работы',
		'use_featured_image'    => 'Использовать как фото работы',
	];

	$args = [
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'query_var'           => false,
		'rewrite'             => false,
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-images-alt2',
		'supports'            => [ 'title', 'editor', 'thumbnail' ],
	];

	register_post_type( 'portfolio', $args );
}

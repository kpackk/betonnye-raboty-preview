<?php
/**
 * AJAX form handlers.
 *
 * @package Betonnye_Raboty
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_ajax_betonnye_submit_form', 'betonnye_handle_form_submission' );
add_action( 'wp_ajax_nopriv_betonnye_submit_form', 'betonnye_handle_form_submission' );

/**
 * Handle form submissions via AJAX.
 */
function betonnye_handle_form_submission() {
	// Verify nonce.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'betonnye_form_nonce' ) ) {
		wp_send_json_error( [ 'message' => 'Ошибка безопасности. Попробуйте обновить страницу.' ], 403 );
	}

	// Sanitize fields.
	$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$form_name = isset( $_POST['form_name'] ) ? sanitize_text_field( wp_unslash( $_POST['form_name'] ) ) : '';
	$messenger = isset( $_POST['messenger'] ) ? sanitize_text_field( wp_unslash( $_POST['messenger'] ) ) : '';

	// Validate phone (required).
	if ( empty( $phone ) ) {
		wp_send_json_error( [ 'message' => 'Пожалуйста, укажите номер телефона.' ], 400 );
	}

	// Validate phone format: allow digits, spaces, dashes, parentheses, plus sign.
	$phone_clean = preg_replace( '/[^\d+\-\s()]/', '', $phone );
	if ( strlen( preg_replace( '/\D/', '', $phone_clean ) ) < 7 ) {
		wp_send_json_error( [ 'message' => 'Пожалуйста, укажите корректный номер телефона.' ], 400 );
	}

	// Allowed messengers whitelist.
	$allowed_messengers = [ 'whatsapp', 'telegram', 'viber', '' ];
	if ( ! in_array( $messenger, $allowed_messengers, true ) ) {
		$messenger = '';
	}

	// Build email.
	$to      = get_option( 'admin_email' );
	$subject = sprintf( 'Заявка с сайта: %s', $form_name ? $form_name : 'Форма на сайте' );

	$body_parts = [];
	$body_parts[] = sprintf( 'Форма: %s', esc_html( $form_name ) );
	$body_parts[] = sprintf( 'Телефон: %s', esc_html( $phone_clean ) );

	if ( ! empty( $messenger ) ) {
		$body_parts[] = sprintf( 'Мессенджер: %s', esc_html( $messenger ) );
	}

	$body_parts[] = '';
	$body_parts[] = sprintf( 'Отправлено: %s', wp_date( 'd.m.Y H:i' ) );
	$body_parts[] = sprintf( 'Страница: %s', esc_url( wp_get_referer() ) );

	$body = implode( "\n", $body_parts );

	$headers = [ 'Content-Type: text/plain; charset=UTF-8' ];

	// Send email.
	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( $sent ) {
		wp_send_json_success( [ 'message' => 'Спасибо! Мы свяжемся с вами в ближайшее время.' ] );
	} else {
		wp_send_json_error( [ 'message' => 'Ошибка при отправке. Пожалуйста, позвоните нам.' ], 500 );
	}
}

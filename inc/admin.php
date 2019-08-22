<?php
/**
 * @package realtor
 * created by akweb
 */

## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if ( 'disable_gutenberg' ) {
	add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

	// отключим подключение базовых css стилей для блоков
	// ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
	remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

	// Move the Privacy Policy help notice back under the title field.
	add_action( 'admin_init', function () {
		remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
		add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
	} );
}

add_action( 'admin_enqueue_scripts', 'gk_load_admin_style' );
function gk_load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
}

function gk_admin_search_code_object( $where ) {
	global $pagenow, $wpdb;
	if ( is_admin() && $pagenow == 'edit.php' && ! empty( $_GET['post_type'] ) && $_GET['post_type'] == 'realty' && ! empty( $_GET['s'] ) ) {
		$sparam = $_GET['s'];
		$where  .= " OR $wpdb->posts.ID IN (SELECT $wpdb->postmeta.post_id FROM $wpdb->postmeta WHERE meta_key = 'code_object' AND meta_value LIKE '%$sparam%') ";
	}

	return $where;
}

add_filter( 'posts_where', 'gk_admin_search_code_object' );

add_action( "admin_menu", "gk_admin_menu_link" );
function gk_admin_menu_link() {
	add_menu_page( "Настройки темы Золотой ключ", "Золотой ключ", "manage_options", "goldenkey", "gk_admin_options_page", null, 99 );
}

function gk_admin_options_page() {
	get_template_part( 'template-parts/admin/options', '' );
}

add_action( "admin_init", "gk_admin_options_fields" );
function gk_admin_options_fields() {
	add_settings_section( 'gk_general_options', 'Онсовные настройки темы', '', 'goldenkey' );

	add_settings_field( 'gk_address', 'Адрес', 'gk_address_field', 'goldenkey', 'gk_general_options' );
	add_settings_field( 'gk_phone', 'Телефон', 'gk_phone_field', 'goldenkey', 'gk_general_options' );

	register_setting( "goldenkey", "gk_address" );
	register_setting( "goldenkey", "gk_phone" );
}

function gk_phone_field() {
	echo '<input type="text" style="width: 100%" name="gk_phone" id="gk_phone" value="' . get_option( 'gk_phone' ) . '"/>';
}

function gk_address_field() {
	echo '<input type="text" style="width: 100%" name="gk_address" id="gk_address" value="' . get_option( 'gk_address' ) . '"/>';
}
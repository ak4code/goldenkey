<?php
/**
 * @package realtor
 * created by akweb
 */

function gk_map_realty_metabox() {
	add_meta_box( 'realtymap', 'Расположение на карте', 'gk_display_realty_map_metabox', 'realty', 'normal', 'high' );
}

add_action( 'admin_menu', 'gk_map_realty_metabox' );

function gk_display_realty_map_metabox( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'map_metabox_nonce' );

	$html = '<div id="realty-map" style="min-height: 350px; width: 100%;"></div>';

	echo $html;
}

function gk_save_realty_map_metabox( $post_id ) {
	// проверяем, пришёл ли запрос со страницы с метабоксом
	if ( ! isset( $_POST['map_metabox_nonce'] )
	     || ! wp_verify_nonce( $_POST['map_metabox_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}
	// проверяем, является ли запрос автосохранением
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// проверяем, права пользователя, может ли он редактировать записи
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}
	// теперь также проверим тип записи
	$post = get_post( $post_id );
	if ( $post->post_type == 'realty' ) { // укажите собственный
		update_post_meta( $post_id, 'lat', esc_attr( $_POST['lat'] ) );
		update_post_meta( $post_id, 'lng', esc_attr( $_POST['lng'] ) );
	}

	return $post_id;
}
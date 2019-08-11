<?php

function realty_featured_image($post_ID) {
	$post_thumbnail_id = get_post_thumbnail_id($post_ID);
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'gallery-post-prev');
		return $post_thumbnail_img[0];
	}
}

function realty_columns_head($defaults) {
	$defaults['featured_image'] = 'Фото';
	$defaults['code_object'] = 'Код объекта';
	return $defaults;
}

function realty_columns_content($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = realty_featured_image($post_ID);
		if ($post_featured_image) {
			echo '<img src="' . $post_featured_image . '" width="50" height="50" />';
		} else {
			echo '<img src="' . get_template_directory_uri() . '/nophoto.jpg" width="50" height="50" />';
		}
	}
	if ($column_name == 'code_object') {
		$property = pods('realty', $post_ID);
		if ($property) {
			echo $property->display('code_object');
		} else {
			echo 'Не указан';
		}
	}
}

add_filter('manage_realty_posts_columns', 'realty_columns_head', 10);

add_action('manage_realty_posts_custom_column', 'realty_columns_content', 10, 2);


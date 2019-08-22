<?php
/**
 * @package realtor
 * created by akweb
 */

add_filter( 'get_the_archive_title', function ( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		if ( is_post_type_archive( 'realty' ) ) {
			$title = 'Продажа недвижимости в Анапе';
		}

	}

	return $title;
} );

add_filter( 'nav_menu_item_id', 'gk_remove_menu_li_id', 10, 4 );
function gk_remove_menu_li_id( $menu_id, $item, $args, $depth ) {
	$menu_id = '';

	return $menu_id;
}

add_filter( 'nav_menu_css_class', 'gk_change_menu_li_classes', 10, 4 );
function gk_change_menu_li_classes( $classes, $item, $args, $depth ) {

	$key = array_search( 'current-menu-item', $classes );
	if ( $key ) {
		$classes = array( 'uk-active' );
	} else {
		$classes = array();
	}

	return $classes;
}

add_filter( 'navigation_markup_template', 'gk_navigation_template', 10, 2 );
function gk_navigation_template( $template, $class ) {
	return '<nav class="gk-pagination uk-margin-top" >
		<div class="uk-flex uk-flex-middle uk-flex-center uk-grid-small">%3$s</div>
	</nav>      
	';
}

add_filter( 'pods_api_pre_save_pod_item', 'gk_realty_pre_save', 10, 2 );
function gk_realty_pre_save( $pieces, $is_new_item ) {

	if ( $pieces['params']->pod == 'realty' ) {
		$pieces['fields']['code_object']['value'] = str_pad( $pieces['params']->id, 4, "0", STR_PAD_LEFT );
	}

	return $pieces;
}
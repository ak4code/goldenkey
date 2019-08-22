<?php
/**
 * @package realtor
 * created by akweb
 */

class Header_Menu_Walker extends Walker_Nav_Menu {
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent        = str_repeat( $t, $depth );
		$display_depth = ( $depth + 1 );
		// Default class.
		$classes = array( 'uk-nav', 'uk-navbar-dropdown-nav' );
		$class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		if ( $display_depth > 1 ) {
			$output .= "{$n}{$indent}<ul class='uk-nav-sub'>{$n}";
		} else {
			$output .= "{$n}{$indent}<div class=\"uk-navbar-dropdown\" uk-dropdown=\"offset: 1; animation: uk-animation-slide-top-small;\"><ul$class_names>{$n}";
		}
	}
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent        = str_repeat( $t, $depth );
		$display_depth = ( $depth + 1 );
		if ( $display_depth > 1 ) {
			$output .= "$indent</ul>{$n}";
		} else {
			$output .= "$indent</ul></div>{$n}";
		}
	}
}
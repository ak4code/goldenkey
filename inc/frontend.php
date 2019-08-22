<?php
/**
 * @package realtor
 * created by akweb
 */

function realtor_frontend() {
	if ( WP_DEBUG ) {
		wp_enqueue_style( 'realtor-style', 'http://localhost:8081/css/app.css', array(), null );
		wp_enqueue_script( 'realtor-js', 'http://localhost:8081/app.js', array(), null, true );
	} else {
		wp_enqueue_style( 'realtor-style', get_template_directory_uri() . '/dist/css/app.css', array(), null );
		wp_enqueue_script( 'realtor-js', get_template_directory_uri() . '/dist/js/app.js', array(), null, true );
		wp_enqueue_script( 'realtor-js-chunk', get_template_directory_uri() . '/dist/js/chunk-vendors.js', array(), null, true );
	}
}

add_action( 'wp_enqueue_scripts', 'realtor_frontend' );

add_action( 'wp_head', function () {

	global $wp_scripts;
	global $wp_styles;

	foreach ( $wp_styles->queue as $handle ) {
		$style = $wp_styles->registered[ $handle ];

		if ( $style->handle === 'realtor-style' ) {

			//-- If version is set, append to end of source.
			$source = $style->src . ( $style->ver ? "?ver={$style->ver}" : "" );

			//-- Spit out the tag.
			echo "<link rel='preload' href='{$source}' as='style'/>\n";
		}
	}

	foreach ( $wp_scripts->queue as $handle ) {
		$script = $wp_scripts->registered[ $handle ];

		//-- Weird way to check if script is being enqueued in the footer.
		if ( $script->handle === 'realtor-js' || $script->handle === 'realtor-js-chunk' ) {

			//-- If version is set, append to end of source.
			$source = $script->src . ( $script->ver ? "?ver={$script->ver}" : "" );

			//-- Spit out the tag.
			echo "<link rel='preload' href='{$source}' as='script'/>\n";
		}
	}
}, 1 );

function gk_theme_widgets_init() {

	register_sidebar( array(
		'name'          => 'Подвал',
		'id'            => 'footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="gk-widget-h4">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Боковая панель (Объекты)',
		'id'            => 'sidebar_realty',
		'before_widget' => '<div class="uk-card uk-card-body uk-card-small uk-border-rounded uk-card-default uk-box-shadow-medium">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="gk-widget-h4">',
		'after_title'   => '</h4>',
	) );

}

add_action( 'widgets_init', 'gk_theme_widgets_init' );

if ( ! function_exists( 'gk_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function gk_the_posts_navigation() {
		the_posts_pagination(
			array(
				'type'      => 'array',
				'mid_size'  => 2,
				'end_size'  => 2,
				'prev_text' => '<span uk-pagination-previous></span>',
				'next_text' => '<span uk-pagination-next></span>'
			)
		);
	}
endif;

//Cian Feed
add_action( 'init', 'gk_cian_export_feed' );
function gk_cian_export_feed() {
	add_feed( 'cian-import.xml', 'gk_cian_feed_rss' );
}

function gk_cian_feed_rss() {
	get_template_part( 'template-parts/realty/feed', 'cian' );
}
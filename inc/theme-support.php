<?php
/**
 * @package realtor
 * created by akweb
 */

function realtor_setup()
{
    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support(
        'custom-logo',
        array(
            'height' => 190,
            'width' => 190,
            'flex-width' => false,
            'flex-height' => false,
        )
    );

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('wp-block-styles');

    add_theme_support('align-wide');

    add_theme_support('custom-logo');

    add_theme_support('responsive-embeds');

    register_nav_menus(
        array(
            'header' => 'Главное меню',
            'footer' => 'Меню в подвале',
            'side' => 'Боковое меню',
        )
    );
}

add_action('after_setup_theme', 'realtor_setup');

// Enable the option show in rest
add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

// Enable the option edit in rest
add_filter( 'acf/rest_api/field_settings/edit_in_rest', '__return_true' );
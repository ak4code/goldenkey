<?php
/**
 * @package realtor
 * created by akweb
 */

function realtor_frontend()
{
    if (WP_DEBUG) {
        wp_enqueue_style('realtor-style', 'http://localhost:8081/css/app.css', array(), null);
        wp_enqueue_script('realtor-js', 'http://localhost:8081/app.js', array(), null, true);
    } else {
        wp_enqueue_style('realtor-style', get_template_directory_uri() . '/dist/css/app.css', array(), null);
        wp_enqueue_script('realtor-js', get_template_directory_uri() . '/dist/js/app.js', array(), null, true);
    }
}

add_action('wp_enqueue_scripts', 'realtor_frontend');

add_action('wp_head', function () {

    global $wp_scripts;
    global $wp_styles;

    foreach ($wp_styles->queue as $handle) {
        $style = $wp_styles->registered[$handle];

        if ($style->handle === 'realtor-style') {

            //-- If version is set, append to end of source.
            $source = $style->src . ($style->ver ? "?ver={$style->ver}" : "");

            //-- Spit out the tag.
            echo "<link rel='preload' href='{$source}' as='style'/>\n";
        }
    }

    foreach ($wp_scripts->queue as $handle) {
        $script = $wp_scripts->registered[$handle];

        //-- Weird way to check if script is being enqueued in the footer.
        if ($script->handle === 'realtor-js') {

            //-- If version is set, append to end of source.
            $source = $script->src . ($script->ver ? "?ver={$script->ver}" : "");

            //-- Spit out the tag.
            echo "<link rel='preload' href='{$source}' as='script'/>\n";
        }
    }
}, 1);
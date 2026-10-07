<?php
/*
Plugin Name: Disable Gutenberg Classic
*/

if (!defined('ABSPATH')) {
    exit;
}

add_filter('use_block_editor_for_post', '__return_false', 100);
add_filter('use_block_editor_for_post_type', '__return_false', 100);
add_filter('use_widgets_block_editor', '__return_false');
add_filter('gutenberg_use_widgets_block_editor', '__return_false', 100);

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}, 100);

remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

<?php
/**
* Avi Tannenbaum AIB child theme stylesheet, loading first the parent theme stylesheet.
*/
function aib_custom_enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-theme-css', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'aib_custom_enqueue_child_theme_styles', 11 );
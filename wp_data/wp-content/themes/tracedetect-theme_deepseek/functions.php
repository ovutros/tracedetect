<?php
function tracedetect_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => 'Menu principal',
        'footer' => 'Menu footer',
        'legal' => 'Menu légal'
    ));
}
add_action('after_setup_theme', 'tracedetect_setup');

function tracedetect_scripts() {
    wp_enqueue_style('tracedetect-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Roboto:wght@300;400;500&display=swap');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'tracedetect_scripts');
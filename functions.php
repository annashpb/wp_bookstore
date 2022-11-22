<?php
function bookstore_styles()
{
	wp_enqueue_style('main-stylesheet', get_bloginfo('template_directory') . '/style.css');
	wp_enqueue_style('bootstrap', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap.min.css');
	wp_enqueue_style('bootstrap-reboot', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap-reboot.min.css');
	wp_enqueue_style('bootstrap-grid', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap-grid.css.map');
}
add_action('wp_head', 'bookstore_styles');

add_theme_support( 'woocommerce' );

<?php
function bookstore_styles()
{
	wp_enqueue_style('main-stylesheet', get_bloginfo('template_directory') . '/style.css');
	wp_enqueue_style('bootstrap', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap.min.css');
	wp_enqueue_style('bootstrap-grid', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap-grid.css.map');
	wp_enqueue_style('woocommerce', get_bloginfo('template_directory') . '/styles/woocommerce/woocommerce.css');
}
add_action('wp_head', 'bookstore_styles');

add_theme_support( 'woocommerce' );

function bookstore_sidebar() {
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'bookstore_sidebar' );

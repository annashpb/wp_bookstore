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

function custom_add_to_cart_message() {
    $return_to  = get_permalink(wc_get_page_id('shop'));

    if (get_option('woocommerce_cart_redirect_after_add')=='yes') {
        $message = sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(wc_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
    } else {
        $message = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
    }

    return $message;
}
add_filter( 'wc_add_to_cart_message', 'custom_add_to_cart_message' );

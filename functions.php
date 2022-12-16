<?php
function bookstore_styles()
{
    wp_enqueue_style('main-stylesheet', get_bloginfo('template_directory') . '/style.css');
    wp_enqueue_style('bootstrap', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap.min.css');
    wp_enqueue_style('bootstrap-grid', get_bloginfo('template_directory') . '/styles/bootstrap/bootstrap-grid.min.css');
    wp_enqueue_style('woocommerce', get_bloginfo('template_directory') . '/styles/woocommerce/woocommerce.css');
}
add_action('wp_head', 'bookstore_styles');

add_theme_support('woocommerce');

function bookstore_sidebar()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'bookstore_sidebar');

function custom_add_to_cart_message()
{
    $return_to  = get_permalink(wc_get_page_id('shop'));
    if (get_option('woocommerce_cart_redirect_after_add') == 'yes') {
        $message = sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(wc_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce'));
    } else {
        $message = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce'));
    }
    return $message;
}
add_filter('wc_add_to_cart_message', 'custom_add_to_cart_message');

function custom_home_breadcrumb($defaults)
{
    $defaults['home'] = 'Cozy homepage';
    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'custom_home_breadcrumb');

function custom_add_to_cart_btn_msg($text, $product)
{
    if ($product->is_type('variable')) {
        $text = 'Select variation';
    } else if ($product->is_type('simple') && $product->is_purchasable() && $product->is_in_stock()) {
        $text = 'Buy now';
    } else {
        $text = "Out of stock";
    }
    return $text;
}
add_filter('woocommerce_product_add_to_cart_text', 'custom_add_to_cart_btn_msg', 9, 2);

function after_shop_loop_message()
{
    echo '<p>Get back to the <a href="' . get_home_url() . '">home</a> page</p>';
}
add_action('woocommerce_after_shop_loop', 'after_shop_loop_message');

function before_cart_totals_msg()
{
    echo '<p>Please check if you\'ve ordered everything you wanted. If not, you\'re welcome to visit our <a href="' . get_permalink(wc_get_page_id('shop')) . '">shop</a> page again!</p>';
}
add_action('woocommerce_before_cart_totals', 'before_cart_totals_msg');

<?php
/**
 * WooCommerce compatibility functions.
 *
 * @package Buran Wordpress Theme
 * @subpackage Framework
 * @version 1.0.0
 */

/**
 * -------------------------------------------------------------------------
 * [ General ]
 * -------------------------------------------------------------------------
 */

/**
 * Declare WooCommerce Support
 */
function buran_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'buran_woocommerce_support' );
add_filter( 'post_class', 'buran_shop_post_class', 10, 2 );
function buran_shop_post_class( $classes, $post_id ){
    if( 'product' == get_post_type( $post_id ) ){
        $classes[] = 'use-star-ratings';
    }
    return $classes;
}


add_filter( 'loop_shop_per_page', 'buran_loop_shop_per_page', 20 );

function buran_loop_shop_per_page() {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	if(isset($_GET['per_page'])){
		return filter_var($_GET['per_page'], FILTER_SANITIZE_NUMBER_INT);
	}else{
		return filter_var(get_theme_mod( 'prodocts_per_page','12'), FILTER_SANITIZE_NUMBER_INT);
	}

}


add_filter( 'body_class', 'buran_shop_class' );
function buran_shop_class( $classes ) {
	global $post;
	if(isset($_GET['per_row'])){
		if($_GET['per_row'] == '3'){
			$classes[] = 'products_per_row_3';
		}else if ($_GET['per_row'] == '2'){
			$classes[] = 'products_per_row_2';
		}else if ($_GET['per_row'] == '4'){
			$classes[] = 'products_per_row_4';
		}else{
			$classes[] = 'products_per_row_3';
		}
	}else{
		$classes[] = get_theme_mod( 'prodocts_per_row','products_per_row_3');
	}
	if(!is_user_logged_in() && is_account_page()){
		$classes[] = 'not_logged_in';
		if(get_option('woocommerce_enable_myaccount_registration') =='no'){
			$classes[] = 'woocommerce_enable_myaccount_registration_no';
		}
		if(get_option('woocommerce_registration_generate_password') =='no'){
			$classes[] = 'woocommerce_registration_generate_password_no';
		}
		if(get_option('woocommerce_registration_generate_username') =='no'){
			$classes[] = 'woocommerce_registration_generate_username_no';
		}
		
	}
	if(!is_buran_cart()){
			$classes[] ='empty_cart';
		}
	return $classes;
}


add_filter('loop_shop_columns', 'buran_loop_columns');
if (!function_exists('buran_loop_columns')) {
	function buran_loop_columns() {
		if(isset($_GET['per_row'])){
			if($_GET['per_row'] == '3'){
				return 3;
			}else if ($_GET['per_row'] == '2'){
				return 2;
			}else if ($_GET['per_row'] == '4'){
				return 4;
			}else{
				$classes[] = 'products_per_row_3';
			}
		}else{
			return filter_var(get_theme_mod( 'prodocts_per_row','products_per_row_3'), FILTER_SANITIZE_NUMBER_INT);
		}
	}
}



function buran_shop_widgets_init() {
	register_sidebar( array(
		'name' => esc_attr__( 'Shop Sidebar', 'buran' ),
		'id' => 'shop_sidebar',
		'description' => esc_attr__( 'Add widgets here to appear in your shop sidebar.', 'buran' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'buran_shop_widgets_init' );

function buran_empty_cart() {
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
		return false;
	}else{
		return true;
	}
}
// Add to cart page
add_action( 'woocommerce_check_cart_items', 'buran_empty_cart' );
// Add to shop archives & product pages
add_action( 'woocommerce_before_main_content', 'buran_empty_cart' );


add_filter( 'woocommerce_output_related_products_args', 'buran_related_products_args' );
  function buran_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}

function is_buran_cart(){
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
        return false;
	}else{
		return true;
	}
}


<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see           https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post, $product;
$_html = '';

if ( ! $product->is_in_stock() ) {
	$_html .= '<span class="out-of-stock">' . esc_html__( 'Sold out', 'businext' ) . '</span>';
} else {

	if ( $product->is_featured() ) {
		$_html .= '<span class="hot">' . esc_html__( 'Hot', 'businext' ) . '</span>';
	}

	if ( $product->is_on_sale() ) {
		$_final_price = Businext_Woo::get_percentage_price();
		$_html        .= apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . $_final_price . '</span>', $post, $product );
	}

	$postdate        = get_the_time( 'Y-m-d', $product->get_id() );
	$post_date_stamp = strtotime( $postdate );
	$new_days        = Businext::setting( 'shop_archive_new_days' );

	if ( ( time() - ( 60 * 60 * 24 * $new_days ) ) < $post_date_stamp ) {
		$_html .= '<span class="new">' . esc_html__( 'New', 'businext' ) . '</span>';
	}
}

if ( $_html !== '' ) {
	echo '<div class="product-badges">' . $_html . '</div>';
}

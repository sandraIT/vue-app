<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
 * @version       3.3.2
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

$open_gallery   = apply_filters( 'woocommerce_single_product_open_gallery', true );
$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids ) {

	$shop_single = get_option( 'shop_single_image_size' );

	$crop = true;

	if ( isset( $shop_single['crop'] ) ) {
		if ( $shop_single['crop'] === 1 ) {
			$crop = true;
		} else {
			$crop = false;
		}
	}

	foreach ( $attachment_ids as $attachment_id ) {
		$classes     = array( 'zoom' );
		$image_class = implode( ' ', $classes );
		$props       = wc_get_product_attachment_props( $attachment_id, $post );

		if ( ! $props['url'] ) {
			continue;
		}

		$sub_html = '';

		if ( $props['title'] !== '' ) {
			$sub_html .= "<h4>{$props['title']}</h4>";
		}

		if ( $props['caption'] !== '' ) {
			$sub_html .= "<p>{$props['caption']}</p>";
		}

		$image = Businext_Helper::get_lazy_load_image( array(
			'url'    => $props['url'],
			'width'  => $shop_single['width'],
			'height' => $shop_single['height'],
			'crop'   => $crop,
			'echo'   => false,
			'alt'    => $props['alt'],
			'lazy'   => false,
		) );

		$_link = $props['url'];

		if ( $open_gallery === false ) {
			$_link = get_the_permalink();
		}

		echo sprintf( '
				<div class="swiper-slide"><div>
					<a href="%s" class="%s" data-sub-html="%s">%s</a>
				</div></div>', esc_url( $_link ), esc_attr( $image_class ), $sub_html, $image );
	}
}

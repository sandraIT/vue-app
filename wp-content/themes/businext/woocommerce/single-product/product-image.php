<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.2
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;
$class = 'images tm-swiper';

$open_gallery = apply_filters( 'woocommerce_single_product_open_gallery', true );
?>
<div class="<?php echo esc_attr( $class ); ?>"
     data-pagination="1"
>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div>
					<?php if ( has_post_thumbnail() ) { ?>

						<?php
						$props    = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
						$sub_html = '';

						if ( $props['title'] !== '' ) {
							$sub_html .= "<h4>{$props['title']}</h4>";
						}

						if ( $props['caption'] !== '' ) {
							$sub_html .= "<p>{$props['caption']}</p>";
						}

						$shop_single = get_option( 'shop_single_image_size' );

						$crop = true;

						if ( isset( $shop_single['crop'] ) ) {
							if ( $shop_single['crop'] === 1 ) {
								$crop = true;
							} else {
								$crop = false;
							}
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

						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" data-sub-html="%s">%s</a>', esc_url( $_link ), $sub_html, $image ), $post->ID );
						?>
						<?php
					} else {
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__( 'Placeholder', 'businext' ) ), $post->ID );
					}
					?>
				</div>
			</div>

			<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		</div>
	</div>
</div>

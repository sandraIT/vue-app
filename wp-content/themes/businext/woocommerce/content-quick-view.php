<?php
/**
 * Quickview popup template.
 *
 * @package  Businext
 * @since    1.0
 */

global $post, $product;

add_filter( 'woocommerce_single_product_open_gallery', function () {
	return false;
} );
?>
<div class="woo-quick-view-popup">
	<div class="woo-quick-view-popup-content">
		<div class="woocommerce single-product">
			<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="woo-single-images product-feature">
					<?php
					/**
					 * woocommerce_before_single_product_summary hook.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
				</div>

				<div class="woo-single-summary summary entry-summary">
					<div class="inner-content">
						<?php do_action( 'woocommerce_single_product_summary' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

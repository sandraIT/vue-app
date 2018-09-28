<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$product_id     = $product->get_id();
$_extra_classes = 'grid-item';
?>
<div <?php wc_product_class( $_extra_classes ); ?>>
	<div class="product-wrapper">
		<?php
		//do_action( 'woocommerce_before_shop_loop_item_title' );

		if ( function_exists( 'woocommerce_show_product_loop_sale_flash' ) ) {
			woocommerce_show_product_loop_sale_flash();
		}
		?>
		<div class="product-thumbnail">
			<div class="thumbnail">
				<?php woocommerce_template_loop_product_link_open(); ?>

				<?php
				$full_image_size = wp_get_attachment_url( get_post_thumbnail_id() );
				$image_url       = Businext_Helper::aq_resize( array(
					'url'    => $full_image_size,
					'width'  => 400,
					'height' => 520,
					'crop'   => true,
				) );
				?>
				<div class="product-main-image">
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php get_the_title(); ?>"
					     class="wp-post-image"/>
				</div>

				<?php woocommerce_template_loop_product_link_close(); ?>
			</div>

			<?php do_action( 'insight_swatches' ); ?>

			<div class="product-actions">

				<?php if ( ( Businext::setting( 'shop_archive_quick_view' ) === '1' ) && ! wp_is_mobile() ) { ?>

					<?php wc_get_template_part( 'content', 'quick-view' ); ?>

					<div class="product-action quickview-btn hint--left hint--rounded hint--bounce"
					     aria-label="<?php echo esc_attr__( 'Quick view', 'businext' ) ?>"
					     data-pid="<?php echo esc_attr( $product_id ); ?>"
					     data-pnonce="<?php echo wp_create_nonce( 'woo_quickview' ); ?>">
						<a class="quickview-icon" href="#"></a>
					</div>

				<?php } ?>

				<?php
				add_filter( 'woocommerce_add_to_cart_tooltip_position', function ( $position ) {
					return 'left';
				} );
				?>
				<?php woocommerce_template_loop_add_to_cart(); ?>

				<?php Businext_Woo::get_wishlist_button_template( array( 'tooltip_position' => 'left' ) ); ?>

				<?php Businext_Woo::get_compare_button_template(); ?>

			</div>
		</div>

		<div class="product-info">
			<?php
			/**
			 * woocommerce_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );

			/**
			 * woocommerce_after_shop_loop_item_title hook.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
	</div>
</div>

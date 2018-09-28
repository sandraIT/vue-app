<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<div class="product-item">
		<div class="thumbnail">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<?php echo wp_kses( $product->get_image(), 'businext-default' ); ?>
			</a>
		</div>
		<div class="info">
			<h6 class="product-title">
				<a href="<?php the_permalink(); ?>">
					<?php echo wp_kses( $product->get_name(), 'businext-default' ); ?>
				</a>
			</h6>

			<?php if ( ! empty( $show_rating ) ) : ?>
				<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
			<?php endif; ?>

			<span class="price">
				<?php echo wp_kses( $product->get_price_html(), 'businext-default' ); ?>
			</span>
		</div>
	</div>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>

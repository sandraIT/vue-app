<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style       = $el_class = $columns = $animation = '';
$pagination  = $pagination_align = $pagination_button_text = $pagination_custom_button_id = '';
$gutter      = 0;
$filter_wrap = $filter_enable = $filter_align = $filter_counter = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-product-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$businext_post_args = array(
	'post_type'      => 'product',
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => 1,
	'post_status'    => 'publish',
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ) ) ) {
	$businext_post_args['meta_key'] = $meta_key;
}

if ( get_query_var( 'paged' ) ) {
	$businext_post_args['paged'] = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$businext_post_args['paged'] = get_query_var( 'page' );
}

$businext_post_args = Businext_VC::get_tax_query_of_taxonomies( $businext_post_args, $taxonomies );

if ( $main_query === '1' ) {
	global $wp_query;
	$businext_query = $wp_query;
} else {
	$businext_query = new WP_Query( $businext_post_args );
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-grid-wrapper tm-product ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

if ( $filter_wrap === '1' ) {
	$css_class .= ' filter-wrap';
}

$grid_classes = 'tm-grid modern-grid';
$grid_classes .= Businext_Helper::get_grid_animation_classes( $animation );

Businext_Enqueue::instance()->enqueue_woocommerce_styles_scripts();

if ( Businext::setting( 'shop_archive_quick_view' ) === '1' ) {
	wp_enqueue_style( 'magnific-popup' );
	wp_enqueue_script( 'magnific-popup' );
}
?>
<?php if ( $businext_query->have_posts() ) : ?>
	<div class="woocommerce">
		<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
			<?php if ( $pagination !== '' && $businext_query->found_posts > $number ) : ?>
				data-pagination="<?php echo esc_attr( $pagination ); ?>"
			<?php endif; ?>

			<?php if ( $pagination_custom_button_id !== '' ): ?>
				data-pagination-custom-button-id="<?php echo esc_attr( $pagination_custom_button_id ); ?>"
			<?php endif; ?>
		>
			<?php
			$count = $businext_query->post_count;

			$tm_grid_query                  = $businext_post_args;
			$tm_grid_query['action']        = 'product_infinite_load';
			$tm_grid_query['max_num_pages'] = $businext_query->max_num_pages;
			$tm_grid_query['found_posts']   = $businext_query->found_posts;
			$tm_grid_query['taxonomies']    = $taxonomies;
			$tm_grid_query['style']         = $style;
			$tm_grid_query['pagination']    = $pagination;
			$tm_grid_query['count']         = $count;
			$tm_grid_query                  = htmlspecialchars( wp_json_encode( $tm_grid_query ) );
			?>

			<?php Businext_Templates::grid_filters( 'product', $filter_enable, $filter_align, $filter_counter, $filter_wrap ); ?>

			<input type="hidden" class="tm-grid-query" <?php echo 'value="' . $tm_grid_query . '"'; ?>/>

			<div class="<?php echo esc_attr( $grid_classes ); ?>">
				<?php while ( $businext_query->have_posts() ) : $businext_query->the_post(); ?>
					<?php wc_get_template_part( 'content', 'product' ); ?>
				<?php endwhile; ?>
			</div>

			<?php Businext_Templates::grid_pagination( $businext_query, $number, $pagination, $pagination_align, $pagination_button_text ); ?>

		</div>
	</div>
<?php endif;
wp_reset_postdata();

<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $order = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-service-pricing-menu-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$businext_post_args = array(
	'post_type'      => 'service',
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => 1,
	'post_status'    => 'publish',
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ), true ) ) {
	$businext_post_args['meta_key'] = $meta_key;
}

if ( get_query_var( 'paged' ) ) {
	$businext_post_args['paged'] = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$businext_post_args['paged'] = get_query_var( 'page' );
}

$businext_post_args = Businext_VC::get_tax_query_of_taxonomies( $businext_post_args, $taxonomies );
$businext_query     = new WP_Query( $businext_post_args );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-service-pricing-menu ' . $el_class, $this->settings['base'], $atts );

$grid_classes = 'modern-grid tm-grid';

$grid_classes .= Businext_Helper::get_grid_animation_classes( $animation );
?>
<?php if ( $businext_query->have_posts() ) : ?>
	<div class="tm-grid-wrapper <?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
		<div class="<?php echo esc_attr( $grid_classes ); ?>">

			<?php
			while ( $businext_query->have_posts() ) :
				$businext_query->the_post();
				$classes = array( 'service-item grid-item' );

				$meta = unserialize( get_post_meta( get_the_ID(), 'insight_service_options', true ) );
				$cost = Businext_Helper::get_the_post_meta( $meta, 'service_cost', '' );
				?>
				<div <?php post_class( implode( ' ', $classes ) ); ?>>
					<div class="service-item-wrap">
						<div class="service-header">

							<h3 class="service-name">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>

							<div class="service-separator"></div>

							<?php if ( $cost !== '' ) : ?>
								<div class="service-cost">
									<?php echo esc_html( $cost ); ?>
								</div>
							<?php endif; ?>

						</div>

						<div class="service-text">
							<?php Businext_Templates::excerpt( array(
								'limit' => 150,
								'type'  => 'character',
							) ); ?>
						</div>

					</div>
				</div>
			<?php endwhile; ?>

		</div>
	</div>
<?php endif; ?>
<?php wp_reset_postdata();

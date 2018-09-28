<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-category-feature-' );
$this->get_inline_css( "#$css_id", $atts );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-category-feature ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$grid_classes = 'tm-grid modern-grid';
//$css_class    .= Businext_Helper::get_animation_classes();

$items = (array) vc_param_group_parse_atts( $items );

if ( count( $items ) < 1 ) {
	return;
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<div class="<?php echo esc_attr( $grid_classes ); ?>">
		<?php
		global $wp_query;
		$cat_ID = '';
		if ( is_category() || is_single() ) {
			$cat_ID = get_query_var( 'cat' );
		}
		?>
		<?php foreach ( $items as $item ):

			if ( ! isset( $item['taxonomies'] ) || $item['taxonomies'] === '' ) {
				continue;
			}

			$tax = explode( ':', $item['taxonomies'] );

			if ( ! is_array( $tax ) ) {
				continue;
			}

			$term = get_term_by( 'slug', $tax[1], $tax[0] );

			if ( $term === false ) {
				continue;
			}

			$term_link = get_term_link( $term );

			if ( ! is_string( $term_link ) ) {
				continue;
			}
			
			$icon_type = isset( $item['icon_type'] ) ? $item['icon_type'] : '';

			$classes = array( 'category-item grid-item' );
			if ( $cat_ID === $term->term_id ) {
				$classes[] = 'current';
			}
			?>
			<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
				<a href="<?php echo esc_url( $term_link ); ?>">
					<div class="cat-item-wrap">

						<?php if ( isset( $item["icon_$icon_type"] ) && $item["icon_$icon_type"] !== '' ) { ?>
							<?php Businext_Helper::get_vc_icon_template( array(
								'type'        => $icon_type,
								'icon'        => $item["icon_$icon_type"],
								'svg_animate' => '',
							) ) ?>
						<?php } ?>

						<h3 class="cat-name">
							<?php echo esc_html( $term->name ); ?>
						</h3>

					</div>
				</a>
			</div>


		<?php endforeach; ?>
	</div>
</div>

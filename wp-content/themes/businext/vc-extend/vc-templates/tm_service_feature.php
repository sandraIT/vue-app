<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-service-feature-' );
$this->get_inline_css( "#$css_id", $atts );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-service-feature ' . $el_class, $this->settings['base'], $atts );
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
		global $post;
		$post_slug = $post->post_name;
		?>
		<?php foreach ( $items as $item ):
			if ( ! isset( $item['page'] ) || $item['page'] === '' ) {
				continue;
			}

			$businext_post_args = array(
				'post_type'      => 'service',
				'posts_per_page' => 1,
				'post_status'    => 'publish',
				'name'           => $item['page'],
			);

			Businext_Helper::d( $businext_post_args );

			$businext_query = new WP_Query( $businext_post_args );

			$icon_type = isset( $item['icon_type'] ) ? $item['icon_type'] : '';
			?>

			<?php if ( $businext_query->have_posts() ) : ?>
			<?php
			while ( $businext_query->have_posts() ) :
				$businext_query->the_post();
				$classes = array( 'service-item grid-item' );

				if ( $post_slug === $item['page'] ) {
					$classes[] = 'current';
				}
				?>
				<div <?php post_class( implode( ' ', $classes ) ); ?>>
					<a href="<?php the_permalink(); ?>">
						<div class="post-item-wrap">

							<?php if ( isset( $item["icon_$icon_type"] ) && $item["icon_$icon_type"] !== '' ) { ?>
								<?php Businext_Helper::get_vc_icon_template( array(
									'type'        => $icon_type,
									'icon'        => $item["icon_$icon_type"],
									'svg_animate' => '',
								) ) ?>
							<?php } ?>

							<h3 class="post-title">
								<?php the_title(); ?>
							</h3>

						</div>
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
			<?php wp_reset_postdata(); ?>

		<?php endforeach; ?>
	</div>
</div>

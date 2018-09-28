<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $image = $action = $custom_link = $animation = $output = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-image-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-image ' . $el_class, $this->settings['base'], $atts );

if ( $action === 'popup' ) {
	wp_enqueue_style( 'lightgallery' );
	wp_enqueue_script( 'lightgallery' );
}

$css_class .= Businext_Helper::get_animation_classes( $animation );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php if ( $image ) : ?>
		<?php
		$_image_full_url = wp_get_attachment_image_url( $image, 'full' );
		$_image_template = Businext_Helper::get_attachment_by_url( $_image_full_url, $image_size, $image_size_width, $image_size_height, false );

		$_image_template = '<div class="image">' . $_image_template . '</div>';

		if ( $action === 'custom_link' ) {

			$_link = vc_build_link( $custom_link );
			if ( $_link['url'] !== '' ) {
				$output .= '<a href="' . esc_url( $_link['url'] ) . '"';

				if ( $_link['target'] !== '' ) {
					$output .= ' target="_blank"';
				}
				if ( $_link['title'] !== '' ) {
					$output .= 'title="' . $_link['title'] . '"';
				}

				$output .= ' >' . $_image_template . '</a>';
			}

		} elseif ( $action === 'popup' ) {
			$output .= '<div class="tm-light-gallery"><a href="' . esc_url( $_image_full_url ) . '" class="zoom">' . $_image_template . '</a></div>';
		} elseif ( $action === 'go_to_home' ) {
			$output .= '<a href="' . esc_url( home_url( '/' ) ) . '">' . $_image_template . '</a>';
		} else {
			$output .= $_image_template;
		}

		echo '' . $output;
		?>
	<?php endif; ?>
</div>

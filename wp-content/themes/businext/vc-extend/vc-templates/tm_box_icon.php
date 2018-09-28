<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $el_class = $icon_type = $icon_color = $icon_svg_animate_type = $image = $text = $button = $button_color = $link = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-box-icon-' );
$this->get_inline_css( '#' . $css_id, $atts );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-box-icon ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= Businext_Helper::get_animation_classes( $animation );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php
	if ( $overlay_background !== '' ) {
		$_overlay_style   = '';
		$_overlay_classes = 'overlay';
		if ( $overlay_background === 'primary' ) {
			$_overlay_classes .= ' primary-background-color';
		} elseif ( $overlay_background === 'overlay_custom_background' ) {
			$_overlay_style .= 'background-color: ' . $overlay_custom_background . ';';
		}
		$_overlay_style .= 'opacity: ' . $overlay_opacity / 100 . ';';

		printf( '<div class="%s" style="%s"></div>', esc_attr( $_overlay_classes ), esc_attr( $_overlay_style ) );
	}
	?>
	<?php
	set_query_var( 'businext_shortcode_atts', $atts );

	get_template_part( 'loop/shortcodes/box-icon/style', $style );
	?>
</div>

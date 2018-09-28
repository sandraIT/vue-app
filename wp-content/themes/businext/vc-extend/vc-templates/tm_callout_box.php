<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-callout-box-' );
//$this->get_inline_css( '#' . $css_id, $atts );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-callout-box ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= Businext_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php echo wpb_js_remove_wpautop( $content ); ?>

</div>

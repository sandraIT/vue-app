<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class = $style = $wrap_style = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-blog-' );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-contact-form-7 ' . $el_class, $this->settings['base'], $atts );

$css_class .= " style-$style";

if ( $wrap_style !== '' ) {
	$css_class .= " wrap-style-$wrap_style";
}

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
}

$css_class .= Businext_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<?php echo do_shortcode( '[contact-form-7 id="' . $id . '"]' ); ?>
</div>

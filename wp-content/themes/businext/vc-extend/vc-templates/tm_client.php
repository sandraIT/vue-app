<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $hover_style = $loop = $auto_play = $el_class = $items = $items_display = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );
if ( count( $items ) <= 0 ) {
	return;
}

$atts['items'] = $items;

$css_id = uniqid( 'tm-client-' );
$this->get_inline_css( '#' . $css_id, $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-client' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

if ( $hover_style !== '' ) {
	$css_class .= " hover-$hover_style";
}

$css_class .= Businext_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php
	set_query_var( 'businext_shortcode_atts', $atts );

	get_template_part( 'loop/shortcodes/client/style', $style );
	?>

</div>

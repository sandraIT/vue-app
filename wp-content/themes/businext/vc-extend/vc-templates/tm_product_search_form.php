<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $style = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-product-search-form ' . $el_class, $this->settings['base'], $atts );

$css_class .= Businext_Helper::get_animation_classes();

if ( $style !== '' ) {
	$css_class .= " style-$style";
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
	<?php get_product_search_form(); ?>
</div>

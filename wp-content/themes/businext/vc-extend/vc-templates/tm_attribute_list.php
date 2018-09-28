<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$style = $attributes = '';
$atts  = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );
$css_id = uniqid( 'tm-attribute-list-' );
$this->get_inline_css( "#$css_id", $atts );
$attributes = (array) vc_param_group_parse_atts( $attributes );

if ( count( $attributes ) < 1 ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-attribute-list ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= Businext_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<ul>
		<?php
		foreach ( $attributes as $attribute ) { ?>
			<?php if ( isset( $attribute['name'] ) && isset( $attribute['value'] ) ) : ?>
				<li>
					<span class="name"><?php echo esc_html( $attribute['name'] ); ?></span>
					<span class="value"><?php echo esc_html( $attribute['value'] ); ?></span>
				</li>
			<?php endif; ?>
		<?php } ?>
	</ul>
</div>

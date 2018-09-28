<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $style = $smooth_scroll = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-separator-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-separator ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$separator_class = 'separator-wrap';

if ( $smooth_scroll !== '' ) {
	$separator_class .= ' smooth-scroll-link';
}
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">
	<div class="<?php echo esc_attr( $separator_class ); ?>"
		<?php if ( $smooth_scroll !== '' ) : ?>
			data-href="<?php echo esc_attr( $smooth_scroll ); ?>"
		<?php endif; ?>
	>

		<?php if ( $style === 'modern-dots' ) : ?>
			<div class="dot first-circle"></div>
			<div class="dot second-circle"></div>
			<div class="dot third-circle"></div>
		<?php endif; ?>

	</div>
</div>

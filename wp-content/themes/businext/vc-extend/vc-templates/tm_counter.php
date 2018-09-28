<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $el_class = $text = $icon_class = $number_prefix = $number_suffix = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-counter-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-counter ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";
$css_class .= " align-$align";

if ( isset( ${"icon_{$icon_type}"} ) && ${"icon_{$icon_type}"} !== '' ) {
	$icon_class = esc_attr( ${"icon_{$icon_type}"} );

	vc_icon_element_fonts_enqueue( $icon_type );
}

if ( $animation === 'odometer' ) {
	wp_enqueue_script( 'odometer' );
} else {
	wp_enqueue_script( 'counter-up' );
}
wp_enqueue_script( 'counter' );

$css_class .= Businext_Helper::get_animation_classes();
?>
<div id="<?php echo esc_attr( $css_id ); ?>" class="<?php echo esc_attr( trim( $css_class ) ); ?>"
     data-animation="<?php echo esc_attr( $animation ); ?>"
>
	<div class="counter-wrap">
		<?php if ( $icon_class !== '' ) : ?>
			<div class="icon">
				<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
			</div>
		<?php endif; ?>

		<?php if ( $number !== '' ) : ?>
			<div class="number-wrap">
				<?php if ( $number_prefix !== '' ) : ?>
					<span class="number-prefix"><?php echo esc_html( $number_prefix ); ?></span>
				<?php endif; ?>
				<span class="number"><?php echo esc_html( $number ); ?></span>
				<?php if ( $number_suffix !== '' ) : ?>
					<?php echo '<span class="number-suffix">' . $number_suffix . '</span>'; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $text !== '' ) : ?>
			<?php printf( '<h6 class="text">%s</h6>', esc_html( $text ) ); ?>
		<?php endif; ?>
	</div>
</div>

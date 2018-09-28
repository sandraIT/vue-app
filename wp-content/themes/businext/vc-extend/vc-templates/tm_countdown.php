<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$el_class = $skin = $datetime = $number_color = $text_color = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-countdown-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-countdown ' . $el_class, $this->settings['base'], $atts );

$css_class .= " style-$style";

if ( $skin !== '' ) {
	$css_class .= " skin-$skin";
}

wp_enqueue_script( 'countdown' );

$css_class .= Businext_Helper::get_animation_classes();
?>
<div id="<?php echo esc_attr( $css_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>"></div>
<script>
    jQuery( document ).ready( function ( $ ) {
        $( '#<?php echo esc_js( $css_id ); ?>' ).countdown( "<?php echo esc_js( $datetime ); ?>", function ( event ) {
            $( this )
                .html( event.strftime( '<div class="countdown-wrap"><div class="day"><span class="number">%D</span><span class="text"><?php echo esc_js( $days ); ?></span></div><div class="hour"><span class="number">%H</span><span class="text"><?php echo esc_js( $hours ); ?></span></div><div class="minute"><span class="number">%M</span><span class="text"><?php echo esc_js( $minutes ); ?></span></div><div class="second"><span class="number">%S</span><span class="text"><?php echo esc_js( $seconds ); ?></span></div></div>' ) );
        } );
    } );
</script>

<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style  = $el_id = $el_class = $align = $color = $full_wide = '';
$button = $icon_align = $action = $animation = $image = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( $el_id === '' ) {
	$el_id = uniqid( 'tm-button-' );
}

$this->get_inline_css( "#$el_id", $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-button-wrapper ' . $el_class, $this->settings['base'], $atts );
$classes   = "tm-button";
$classes   .= " style-$style";
$classes   .= " tm-button-$size";
$classes   .= " tm-button-$color";
$classes   .= " tm-button-$hover_animation";

$icon_class = '';
if ( isset( $icon_type ) && isset( ${"icon_{$icon_type}"} ) && ${"icon_{$icon_type}"} !== '' ) {
	$icon_class .= esc_attr( ${"icon_{$icon_type}"} );
	$classes    .= " has-icon icon-$icon_align";

	vc_icon_element_fonts_enqueue( $icon_type );
}

if ( $full_wide === '1' ) {
	$classes .= ' tm-button-full-wide';
}

$button = vc_build_link( $button );

if ( $action === 'smooth_scroll' ) {
	$classes .= " smooth-scroll-link";
} elseif ( $action === 'popup_video' ) {
	$css_class .= ' tm-popup-video';

	wp_enqueue_style( 'lightgallery' );
	wp_enqueue_script( 'lightgallery' );
}

$css_class .= Businext_Helper::get_animation_classes( $animation );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $el_id ); ?>">
	<?php
	$_button_title = $button['title'] !== '' ? $button['title'] : esc_html__( 'Button Text', 'businext' );
	?>
	<a class="<?php echo esc_attr( $classes ); ?>" href="<?php echo esc_url( $button['url'] ); ?>"
		<?php if ( $button['target'] !== '' ) {
			echo 'target="' . $button['target'] . '"';
		} ?>
	>

		<?php if ( in_array( $style, array( 'image-text' ) ) && $image !== '' ) : ?>
			<div>
				<?php
				echo wp_get_attachment_image( $image, 'full' );
				?>
				<span class="button-text" data-text="<?php echo esc_attr( $_button_title ); ?>">
				<?php echo esc_html( $_button_title ); ?>
			</span>
			</div>
		<?php else: ?>

			<?php if ( $icon_class !== '' && $icon_align === 'left' ) { ?>
				<span class="button-icon">
				<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
			</span>
			<?php } ?>
			<span class="button-text" data-text="<?php echo esc_attr( $_button_title ); ?>">
				<?php echo esc_html( $_button_title ); ?>
			</span>
			<?php if ( $icon_class !== '' && $icon_align === 'right' ) { ?>
				<span class="button-icon">
				<i class="<?php echo esc_attr( $icon_class ); ?>"></i>
			</span>
			<?php } ?>

		<?php endif; ?>


	</a>
</div>

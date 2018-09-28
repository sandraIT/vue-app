<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$el_class = $style = $items = $multi_open = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-accordion-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$items = (array) vc_param_group_parse_atts( $items );

if ( count( $items ) <= 0 ) {
	return;
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-accordion ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$css_class .= Businext_Helper::get_animation_classes();

wp_enqueue_script( 'businext-accordion' );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
	<?php
	if ( $multi_open === '1' ) {
		echo 'data-multi-open="1"';
	}
	?>
>
	<?php
	$i = 1;
	foreach ( $items as $item ) {
		?>

		<div class="accordion-section <?php if ( $i == 1 ) {
			echo 'active';
		} ?>">
			<?php if ( isset( $item['title'] ) ) { ?>
				<div class="accordion-title-wrapper">
					<h6 class="accordion-title"><?php echo esc_html( $item['title'] ); ?><span class="accordion-icon"></span></h6>
				</div>
			<?php } ?>
			<div class="accordion-content">
				<?php if ( isset( $item['content'] ) ) : ?>
					<?php echo wp_kses( $item['content'], array(
						'a'      => array(
							'href'  => array(),
							'title' => array(),
						),
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
					) ); ?>
				<?php endif; ?>
			</div>
		</div>
		<?php
		$i ++;
	}
	?>
</div>

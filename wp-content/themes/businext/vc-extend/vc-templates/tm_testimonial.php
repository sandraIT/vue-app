<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$pagination = $nav = $auto_play = $loop = $text_color = $name_color = $by_line_color = $style = $el_class = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-testimonial-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-testimonial ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

$businext_post_args = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ), true ) ) {
	$businext_post_args['meta_key'] = $meta_key;
}

$businext_post_args = Businext_VC::get_tax_query_of_taxonomies( $businext_post_args, $taxonomies );

$businext_query = new WP_Query( $businext_post_args );
$css_class      .= Businext_Helper::get_animation_classes();
?>
<?php if ( $businext_query->have_posts() ) : ?>

	<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

		<?php
		set_query_var( 'businext_shortcode_atts', $atts );
		set_query_var( 'businext_query', $businext_query );
		set_query_var( 'css_id', $css_id );

		get_template_part( 'loop/shortcodes/testimonial/style', $style );
		?>

	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

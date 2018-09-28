<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$post_type  = 'post';
$style      = $el_class = '';
$categories = $meta_key = $main_query = $pagination = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-blog-' );
$this->get_inline_css( "#$css_id", $atts );
Businext_VC::get_shortcode_custom_css( "#$css_id", $atts );
extract( $atts );

$businext_post_args = array(
	'post_type'      => $post_type,
	'posts_per_page' => $number,
	'orderby'        => $orderby,
	'order'          => $order,
	'paged'          => 1,
	'post_status'    => 'publish',
	'post__not_in'   => get_option( 'sticky_posts' ),
);

if ( in_array( $orderby, array( 'meta_value', 'meta_value_num' ) ) ) {
	$businext_post_args['meta_key'] = $meta_key;
}

if ( get_query_var( 'paged' ) ) {
	$businext_post_args['paged'] = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) {
	$businext_post_args['paged'] = get_query_var( 'page' );
}

$businext_post_args = Businext_VC::get_tax_query_of_taxonomies( $businext_post_args, $taxonomies );

if ( $main_query === '1' ) {
	global $wp_query;
	$businext_query = $wp_query;
} else {
	$businext_query = new WP_Query( $businext_post_args );
}

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-blog ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

if ( $filter_wrap === '1' ) {
	$css_class .= ' filter-wrap';
}

$grid_classes = 'tm-grid';
$is_swiper    = false;

if ( in_array( $style, array(
	'grid_classic_01',
	'grid_classic_02',
	'grid_classic_03',
	'grid_classic_04',
	'grid_classic_05',
	'metro',
) ) ) {
	$grid_classes .= ' modern-grid';

	$grid_classes .= Businext_Helper::get_grid_animation_classes( $animation );
} elseif ( in_array( $style, array(
	'carousel',
	'carousel_02',
) ) ) {
	$is_swiper = true;

	$css_class .= Businext_Helper::get_animation_classes();
}

// Same design for these style.
if ( in_array( $style, array(
	'grid_classic_03',
	'carousel',
) ) ) {
	$css_class .= ' style-01';
}

if ( $is_swiper ) {
	$grid_classes   .= ' swiper-wrapper';
	$slider_classes = 'tm-swiper';
	if ( $carousel_nav !== '' ) {
		$slider_classes .= " nav-style-$carousel_nav";
	}
	if ( $carousel_pagination !== '' ) {
		$slider_classes .= " pagination-style-$carousel_pagination";
	}
}
?>

<?php if ( $businext_query->have_posts() ) : ?>
	<div class="tm-grid-wrapper <?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
		<?php if ( $pagination !== '' && $businext_query->found_posts > $number ) : ?>
			data-pagination="<?php echo esc_attr( $pagination ); ?>"
		<?php endif; ?>

		<?php if ( $is_swiper ) { ?>
			data-type="swiper"
		<?php } ?>

		 data-filter-type="<?php echo esc_attr( $filter_type ); ?>"
	>
		<?php
		$count = $businext_query->post_count;

		$tm_grid_query                  = $businext_post_args;
		$tm_grid_query['action']        = "{$post_type}_infinite_load";
		$tm_grid_query['max_num_pages'] = $businext_query->max_num_pages;
		$tm_grid_query['found_posts']   = $businext_query->found_posts;
		$tm_grid_query['taxonomies']    = $taxonomies;
		$tm_grid_query['style']         = $style;
		$tm_grid_query['pagination']    = $pagination;
		$tm_grid_query['count']         = $count;
		$tm_grid_query['metro_layout']  = $metro_layout;
		$tm_grid_query                  = htmlspecialchars( wp_json_encode( $tm_grid_query ) );
		?>

		<?php Businext_Templates::grid_filters( $post_type, $filter_enable, $filter_align, $filter_counter, $filter_wrap, $businext_query->found_posts ); ?>

		<input type="hidden" class="tm-grid-query" value="<?php echo '' . $tm_grid_query; ?>"/>

		<?php if ( $is_swiper ) { ?>
		<div class="<?php echo esc_attr( $slider_classes ); ?>"
			<?php
			if ( $carousel_items_display !== '' ) {
				$arr = explode( ';', $carousel_items_display );
				foreach ( $arr as $value ) {
					$tmp = explode( ':', $value );
					echo ' data-' . $tmp[0] . '-items="' . $tmp[1] . '"';
				}
			}
			?>

			<?php if ( $carousel_gutter > 1 ) : ?>
				data-lg-gutter="<?php echo esc_attr( $carousel_gutter ); ?>"
			<?php endif; ?>

			<?php if ( $carousel_loop === '1' ) : ?>
				data-loop="1"
			<?php endif; ?>

			<?php if ( $carousel_nav !== '' ) : ?>
				data-nav="1"
			<?php endif; ?>

			<?php if ( $carousel_nav === 'custom' ) : ?>
				data-custom-nav="<?php echo esc_attr( $slider_button_id ); ?>"
			<?php endif; ?>

			<?php Businext_Helper::get_swiper_pagination_attributes( $carousel_pagination ); ?>

			<?php if ( $carousel_auto_play !== '' ) : ?>
				data-autoplay="<?php echo esc_attr( $carousel_auto_play ); ?>"
			<?php endif; ?>
		>
			<div class="swiper-container">
				<?php } ?>

				<div class="<?php echo esc_attr( $grid_classes ); ?>"
					<?php if ( in_array( $style, array( 'list' ), true ) ) : ?>
						data-grid-has-gallery="true"
					<?php endif; ?>
				>
					<?php
					set_query_var( 'businext_query', $businext_query );
					set_query_var( 'count', $count );
					set_query_var( 'metro_layout', $metro_layout );

					get_template_part( 'loop/shortcodes/blog/style', $style );
					?>
				</div>

				<?php if ( $is_swiper ) { ?>
			</div>
		</div>
	<?php } ?>

		<?php Businext_Templates::grid_pagination( $businext_query, $number, $pagination, $pagination_align, $pagination_button_text ); ?>

	</div>
<?php endif; ?>
<?php wp_reset_postdata();

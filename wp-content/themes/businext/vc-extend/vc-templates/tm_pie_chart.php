<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$cutout          = 0;
$legend_position = 'bottom';
$el_class        = $legend_position = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-pie-chart-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-js-chart tm-pie-chart ' . $el_class, $this->settings['base'], $atts );
$css_class .= Businext_Helper::get_animation_classes();
$datasets = (array) vc_param_group_parse_atts( $datasets );

if ( count( $datasets ) <= 0 ) {
	return;
}

$labels       = array();
$border_width = isset( $border_width ) && $border_width !== '' ? intval( $border_width ) : 0;
$sets         = array(
	'backgroundColor'      => array(),
	'hoverBackgroundColor' => array(),
	'data'                 => array(),
	'borderWidth'          => $border_width,
);

foreach ( $datasets as $set ) {
	if ( ! isset( $set['title'] ) || $set['title'] === '' || ! $set['value'] || $set['value'] === '' ) {
		continue;
	}

	$labels[] = $set['title'];

	$sets['backgroundColor'][]      = $set['color'];
	$sets['hoverBackgroundColor'][] = $set['color'];
	$sets['data'][]                 = $set['value'];
}

$data = array(
	'labels'   => $labels,
	'datasets' => array(
		$sets,
	),
);

$options = array(
	'animation'           => array(
		'duration' => 2000,
	),
	'maintainAspectRatio' => true,
	'cutoutPercentage'    => intval( $cutout ),
	'tooltips'            => array(
		'enabled'         => true,
		'bodySpacing'     => 8,
		'titleSpacing'    => 6,
		'cornerRadius'    => 8,
		'xPadding'        => 10,
		'footerFontSize'  => 15,
		'footerFontColor' => '#222222',
	),
	'legend'              => array(
		'display'  => $legend === '1' ? true : false,
		'position' => $legend_position,
		'labels'   => array(
			'usePointStyle' => true,
			'padding'       => 30,
			'boxWidth'      => 16,
			/*'fontSize'      => 15,
			'fontColor'     => '#222',*/
		),
	),
);

if ( $legend_onclick !== '1' ) {
	$options['legend']['onClick'] = null;
}

$chart_options = array(
	'type'    => 'pie',
	'data'    => $data,
	'options' => $options,
);

$chart_height = Businext_Helper::process_chart_aspect_ratio( $aspect_ratio );

wp_enqueue_script( 'advanced-chart' );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<div class="chart-data" style="display:none;"><?php echo json_encode( $chart_options ); ?></div>
	<canvas width="500" height="<?php echo esc_attr( $chart_height ); ?>"></canvas>
</div>

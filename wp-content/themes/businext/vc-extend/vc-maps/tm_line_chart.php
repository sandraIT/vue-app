<?php

class WPBakeryShortCode_TM_Line_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$legend_tab = esc_html__( 'Tooltips and Legends', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Line Chart', 'businext' ),
	'base'                      => 'tm_line_chart',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-accordion',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'X axis labels', 'businext' ),
			'description' => esc_html__( 'List of labels for X axis (separate labels with ";").', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'labels',
			'std'         => 'Jul; Aug; Sep; Oct; Nov; Dec',
		),
		array(
			'heading'    => esc_html__( 'Datasets', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'datasets',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Title', 'businext' ),
					'description' => esc_html__( 'Dataset title used in tooltips and legends.', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Values', 'businext' ),
					'description' => esc_html__( 'text format for the tooltip (available placeholders: {d} dataset title, {x} X axis label, {y} Y axis value)', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'values',
				),
				array(
					'heading'    => esc_html__( 'Dataset Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'color',
				),
				array(
					'heading'     => esc_html__( 'Area filling', 'businext' ),
					'description' => esc_html__( 'How to fill the area below the line', 'businext' ),
					'type'        => 'dropdown',
					'param_name'  => 'fill',
					'value'       => array(
						esc_html__( 'Custom', 'businext' ) => 'custom',
						esc_html__( 'None', 'businext' )   => 'none',
					),
					'std'         => 'none',
				),
				array(
					'heading'    => esc_html__( 'Fill Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'fill_color',
					'dependency' => array(
						'element' => 'fill',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'point_style',
					'heading'    => esc_html__( 'Point Style', 'businext' ),
					'value'      => array(
						esc_html__( 'none', 'businext' )              => 'none',
						esc_html__( 'circle', 'businext' )            => 'circle',
						esc_html__( 'triangle', 'businext' )          => 'triangle',
						esc_html__( 'rectangle', 'businext' )         => 'rect',
						esc_html__( 'rotated rectangle', 'businext' ) => 'rectRot',
						esc_html__( 'cross', 'businext' )             => 'cross',
						esc_html__( 'rotated cross', 'businext' )     => 'crossRot',
						esc_html__( 'star', 'businext' )              => 'star',
					),
					'std'        => 'circle',
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'line_type',
					'heading'    => esc_html__( 'Line type', 'businext' ),
					'value'      => array(
						esc_html__( 'normal', 'businext' )  => 'normal',
						esc_html__( 'stepped', 'businext' ) => 'step',
					),
					'std'        => 'normal',
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'line_style',
					'heading'    => esc_html__( 'Line style', 'businext' ),
					'value'      => array(
						esc_html__( 'solid', 'businext' )  => 'solid',
						esc_html__( 'dashed', 'businext' ) => 'dashed',
						esc_html__( 'dotted', 'businext' ) => 'dotted',
					),
					'std'        => 'solid',
				),
				array(
					'heading'     => esc_html__( 'Thickness', 'businext' ),
					'description' => esc_html__( 'line and points thickness', 'businext' ),
					'type'        => 'dropdown',
					'param_name'  => 'thickness',
					'value'       => array(
						esc_html__( 'thin', 'businext' )    => 'thin',
						esc_html__( 'normal', 'businext' )  => 'normal',
						esc_html__( 'thick', 'businext' )   => 'thick',
						esc_html__( 'thicker', 'businext' ) => 'thicker',
					),
					'std'         => 'normal',
				),
				array(
					'heading'     => esc_html__( 'Line tension', 'businext' ),
					'description' => esc_html__( 'tension of the line ( 100 for a straight line )', 'businext' ),
					'type'        => 'number',
					'param_name'  => 'line_tension',
					'std'         => 10,
					'min'         => 0,
					'max'         => 100,
					'step'        => 1,
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'title'        => esc_html__( 'Item 01', 'businext' ),
					'values'       => '15; 10; 22; 19; 23; 17',
					'color'        => 'rgba(105, 59, 255, 0.55)',
					'fill'         => 'none',
					'thickness'    => 'normal',
					'point_style'  => 'circle',
					'line_style'   => 'solid',
					'line_tension' => 10,

				),
				array(
					'title'        => esc_html__( 'Item 02', 'businext' ),
					'values'       => '34; 38; 35; 33; 37; 40',
					'color'        => 'rgba(0, 110, 253, 0.56)',
					'fill'         => 'none',
					'thickness'    => 'normal',
					'point_style'  => 'circle',
					'line_style'   => 'solid',
					'line_tension' => 10,
				),
			) ) ),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Enable legends', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'legend',
			'value'      => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
			'std'        => '1',
		),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Legends Style', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'legend_style',
			'value'      => array(
				esc_html__( 'Normal', 'businext' )          => 'normal',
				esc_html__( 'Use Point Style', 'businext' ) => 'point',
			),
			'std'        => 'normal',
		),
		array(
			'group'      => $legend_tab,
			'heading'    => esc_html__( 'Legends Position', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'legend_position',
			'value'      => array(
				esc_html__( 'Top', 'businext' )    => 'top',
				esc_html__( 'Right', 'businext' )  => 'right',
				esc_html__( 'Bottom', 'businext' ) => 'bottom',
				esc_html__( 'Left', 'businext' )   => 'left',
			),
			'std'        => 'bottom',
		),
		array(
			'group'       => $legend_tab,
			'heading'     => esc_html__( 'Click on legends', 'businext' ),
			'description' => esc_html__( 'Hide dataset on click on legend', 'businext' ),
			'type'        => 'checkbox',
			'param_name'  => 'legend_onclick',
			'value'       => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
			'std'         => '1',
		),
		array(
			'group'      => esc_html__( 'Chart Options', 'businext' ),
			'heading'    => esc_html__( 'Aspect Ratio', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'aspect_ratio',
			'value'      => array(
				'1:1'  => '1:1',
				'21:9' => '21:9',
				'16:9' => '16:9',
				'4:3'  => '4:3',
				'3:4'  => '3:4',
				'9:16' => '9:16',
				'9:21' => '9:21',
			),
			'std'        => '4:3',
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

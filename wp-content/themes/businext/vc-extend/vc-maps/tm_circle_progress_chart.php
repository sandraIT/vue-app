<?php

class WPBakeryShortCode_TM_Circle_Progress_Chart extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;

		if ( isset( $atts['number_font_size'] ) ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .chart-number",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['number_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		$icon_tmp      = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$title_tmp     = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['title_color'], $atts['custom_title_color'] );
		$sub_title_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['sub_title_color'], $atts['custom_sub_title_color'] );

		if ( $icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .chart-icon { $icon_tmp }";
		}

		if ( $title_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .title { $title_tmp }";
		}

		if ( $sub_title_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .subtitle { $sub_title_tmp }";
		}
	}
}

$content_group = esc_html__( 'Content', 'businext' );
$style_group   = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Circle Progress Chart', 'businext' ),
	'base'                      => 'tm_circle_progress_chart',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pie-chart',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '01',
				esc_html__( 'Style 02', 'businext' ) => '02',
			),
			'std'         => '01',
		),
		array(
			'heading'     => esc_html__( 'Number', 'businext' ),
			'description' => esc_html__( 'Controls the number you would like to display in pie chart.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'number',
			'min'         => 1,
			'max'         => 100,
			'std'         => 75,
		),
		array(
			'heading'     => esc_html__( 'Circle Size', 'businext' ),
			'description' => esc_html__( 'Controls the size of the pie chart circle. Default: 220', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'size',
			'suffix'      => 'px',
			'std'         => 220,
		),
		array(
			'heading'     => esc_html__( 'Measuring unit', 'businext' ),
			'description' => esc_html__( 'Controls the unit of chart.', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'unit',
			'std'         => '%',
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => $content_group,
			'heading'    => esc_html__( 'Title', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'title',
		),
		array(
			'group'      => $content_group,
			'heading'    => esc_html__( 'Subtitle', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'subtitle',
		),
	), Businext_VC::icon_libraries( array( 'allow_none' => true, ) ), array(
		array(
			'group'      => $style_group,
			'heading'    => esc_html__( 'Line Cap', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'line_cap',
			'value'      => array(
				esc_html__( 'Butt', 'businext' )   => 'butt',
				esc_html__( 'Round', 'businext' )  => 'round',
				esc_html__( 'Square', 'businext' ) => 'square',
			),
			'std'        => 'square',
		),
		array(
			'group'       => $style_group,
			'heading'     => esc_html__( 'Line Width', 'businext' ),
			'description' => esc_html__( 'Controls the line width of chart.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'line_width',
			'suffix'      => 'px',
			'min'         => 1,
			'max'         => 50,
			'std'         => 6,
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Bar Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'bar_color',
			'value'            => array(
				esc_html__( 'Gradient Color', 'businext' )  => 'gradient',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => 'primary',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Bar Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_bar_color',
			'dependency'       => array( 'element' => 'bar_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Track Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'track_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Track Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_track_color',
			'dependency'       => array( 'element' => 'track_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Icon Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Icon Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_color',
			'dependency'       => array( 'element' => 'icon_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Title Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'title_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Title Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_title_color',
			'dependency'       => array( 'element' => 'title_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Sub Title Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'sub_title_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $style_group,
			'heading'          => esc_html__( 'Custom Sub Title Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_sub_title_color',
			'dependency'       => array( 'element' => 'sub_title_color', 'value' => array( 'custom' ) ),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'       => $style_group,
			'heading'     => esc_html__( 'Number Font Size', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'number_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
	) ),
) );

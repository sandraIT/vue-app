<?php

class WPBakeryShortCode_TM_CountDown extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		$skin = '';
		extract( $atts );

		if ( $skin === 'custom' ) {
			$number_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['number_color'], $atts['custom_number_color'] );
			$text_tmp   = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );

			if ( $number_tmp !== '' ) {
				$businext_shortcode_lg_css .= "$selector .number { $number_tmp }";
			}

			if ( $text_tmp !== '' ) {
				$businext_shortcode_lg_css .= "$selector .text { $text_tmp }";
			}
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Countdown', 'businext' ),
	'base'                      => 'tm_countdown',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-countdownclock',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'businext' ) => '1',
				esc_html__( '02', 'businext' ) => '2',
			),
			'std'         => '1',
		),
		array(
			'heading'     => esc_html__( 'Skin', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'skin',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Custom', 'businext' ) => 'custom',
				esc_html__( 'Dark', 'businext' )   => 'dark',
				esc_html__( 'Light', 'businext' )  => 'light',
			),
			'std'         => 'dark',
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Number Color', 'businext' ),
			'param_name'       => 'number_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => 'secondary',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'skin',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Number Color', 'businext' ),
			'param_name'       => 'custom_number_color',
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'       => array(
				'element' => 'number_color',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'businext' ),
			'param_name'       => 'text_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => 'custom',
			'edit_field_class' => 'vc_col-sm-6 col-break',
			'dependency'       => array(
				'element' => 'skin',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'businext' ),
			'param_name'       => 'custom_text_color',
			'edit_field_class' => 'vc_col-sm-6',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#ababab',
		),
		array(
			'heading'     => esc_html__( 'Date Time', 'businext' ),
			'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm).', 'businext' ),
			'type'        => 'datetimepicker',
			'param_name'  => 'datetime',
			'value'       => '',
			'admin_label' => true,
			'settings'    => array(
				'minDate' => 0,
			),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Days" text', 'businext' ),
			'param_name' => 'days',
			'value'      => esc_attr( 'Days', 'businext' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Hours" text', 'businext' ),
			'param_name' => 'hours',
			'value'      => 'Hours',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Minutes" text', 'businext' ),
			'param_name' => 'minutes',
			'value'      => esc_attr( 'Minutes', 'businext' ),
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( '"Seconds" text', 'businext' ),
			'param_name' => 'seconds',
			'value'      => esc_attr( 'Seconds', 'businext' ),
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),
) );


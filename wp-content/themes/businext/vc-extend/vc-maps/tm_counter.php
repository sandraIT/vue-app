<?php

class WPBakeryShortCode_TM_Counter extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		$align = 'center';

		extract( $atts );

		$tmp = "text-align: {$align}";

		$number_tmp     = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['number_color'], $atts['custom_number_color'] );
		$text_tmp       = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$icon_tmp       = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$background_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'] );

		if ( $number_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .number-wrap { $number_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .text { $text_tmp }";
		}

		if ( $icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .icon { $icon_tmp }";
		}

		if ( $background_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .counter-wrap { $background_tmp }";
		}

		$businext_shortcode_lg_css .= "$selector { $tmp }";

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$style_group = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Counter', 'businext' ),
	'base'                      => 'tm_counter',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-counter',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'businext' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'businext' ) => '01',
				esc_html__( '02', 'businext' ) => '02',
				esc_html__( '03', 'businext' ) => '03',
				esc_html__( '04', 'businext' ) => '04',
				esc_html__( '05', 'businext' ) => '05',
				esc_html__( '06', 'businext' ) => '06',
			),
			'std'         => '01',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Counter Animation', 'businext' ),
			'param_name' => 'animation',
			'value'      => array(
				esc_html__( 'Counter Up', 'businext' ) => 'counter-up',
				esc_html__( 'Odometer', 'businext' )   => 'odometer',
			),
			'std'        => 'counter-up',
		),
		array(
			'heading'    => esc_html__( 'Text Align', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'Left', 'businext' )   => 'left',
				esc_html__( 'Center', 'businext' ) => 'center',
				esc_html__( 'Right', 'businext' )  => 'right',
			),
			'std'        => 'center',
		),
		array(
			'group'       => esc_html__( 'Data', 'businext' ),
			'heading'     => esc_html__( 'Number', 'businext' ),
			'type'        => 'number',
			'admin_label' => true,
			'param_name'  => 'number',
		),
		array(
			'group'       => esc_html__( 'Data', 'businext' ),
			'heading'     => esc_html__( 'Number Prefix', 'businext' ),
			'description' => esc_html__( 'Prefix your number with a symbol or text.', 'businext' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'number_prefix',
		),
		array(
			'group'       => esc_html__( 'Data', 'businext' ),
			'heading'     => esc_html__( 'Number Suffix', 'businext' ),
			'description' => esc_html__( 'Suffix your number with a symbol or text.', 'businext' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'number_suffix',
		),
		array(
			'group'       => esc_html__( 'Data', 'businext' ),
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text', 'businext' ),
			'admin_label' => true,
			'param_name'  => 'text',
		),
		Businext_VC::extra_class_field(),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Number Color', 'businext' ),
			'param_name'       => 'number_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Number Color', 'businext' ),
			'param_name'       => 'custom_number_color',
			'dependency'       => array(
				'element' => 'number_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'businext' ),
			'param_name'       => 'text_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'businext' ),
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon Color', 'businext' ),
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon Color', 'businext' ),
			'param_name'       => 'custom_icon_color',
			'dependency'       => array(
				'element' => 'icon_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $style_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background Color', 'businext' ),
			'param_name'       => 'background_color',
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
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Background Color', 'businext' ),
			'param_name'       => 'custom_background_color',
			'dependency'       => array(
				'element' => 'background_color',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Businext_VC::icon_libraries( array( 'allow_none' => true ) ), Businext_VC::get_vc_spacing_tab() ),
) );

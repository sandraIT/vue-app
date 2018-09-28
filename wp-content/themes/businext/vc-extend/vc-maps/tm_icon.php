<?php

class WPBakeryShortCode_TM_Icon extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

		$wrapper_tmp = $tmp = '';

		if ( $atts['align'] !== '' ) {
			$wrapper_tmp .= "text-align: {$atts['align']};";
		}

		if ( $atts['md_align'] !== '' ) {
			$businext_shortcode_md_css .= "$selector { text-align: {$atts['md_align']} }";
		}

		if ( $atts['sm_align'] !== '' ) {
			$businext_shortcode_sm_css .= "$selector { text-align: {$atts['sm_align']} }";
		}

		if ( $atts['xs_align'] !== '' ) {
			$businext_shortcode_xs_css .= "$selector { text-align: {$atts['xs_align']} }";
		}

		$tmp .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );

		if ( $wrapper_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector  { $wrapper_tmp }";
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .icon { $tmp }";
		}

		if ( isset( $atts['font_size'] ) ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$params = array_merge( Businext_VC::icon_libraries( array(
	'allow_none' => true,
	'group'      => '',
) ), Businext_VC::get_alignment_fields(), array(
	array(
		'heading'     => esc_html__( 'Style', 'businext' ),
		'type'        => 'dropdown',
		'param_name'  => 'style',
		'value'       => array(
			esc_html__( 'Circle Icon', 'businext' ) => '01',
		),
		'admin_label' => true,
		'std'         => '01',
	),
	array(
		'heading'     => esc_html__( 'Font Size', 'businext' ),
		'type'        => 'number_responsive',
		'param_name'  => 'font_size',
		'min'         => 8,
		'suffix'      => 'px',
		'media_query' => array(
			'lg' => '',
			'md' => '',
			'sm' => '',
			'xs' => '',
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Icon Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'icon_color',
		'value'      => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'        => '',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Custom Icon Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_icon_color',
		'dependency' => array(
			'element' => 'icon_color',
			'value'   => 'custom',
		),
		'std'        => '#fff',
	),
	Businext_VC::get_animation_field(),
	Businext_VC::extra_class_field(),
), Businext_VC::get_vc_spacing_tab() );

vc_map( array(
	'name'                      => esc_html__( 'Icon', 'businext' ),
	'base'                      => 'tm_icon',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => $params,
) );

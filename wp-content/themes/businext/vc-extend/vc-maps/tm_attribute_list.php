<?php

class WPBakeryShortCode_TM_Attribute_List extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Attribute List', 'businext' ),
	'base'     => 'tm_attribute_list',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-portfoliogrid',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '01',
			),
			'std'         => '01',
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Attributes', 'businext' ),
			'heading'    => esc_html__( 'Attributes', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'attributes',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Name', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'name',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Value', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'value',
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );


<?php

class WPBakeryShortCode_TM_Accordion extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Accordion', 'businext' ),
	'base'                      => 'tm_accordion',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-accordion',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '1',
				esc_html__( 'Style 02', 'businext' ) => '2',
				esc_html__( 'Style 03', 'businext' ) => '3',
			),
			'std'         => '1',
		),
		array(
			'heading'    => esc_html__( 'Multi Open', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'multi_open',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Content', 'businext' ),
					'type'       => 'textarea',
					'param_name' => 'content',
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

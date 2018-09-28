<?php

class WPBakeryShortCode_TM_Drop_Cap extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Drop Cap', 'businext' ),
	'base'                      => 'tm_drop_cap',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-dropcap',
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
			),
			'std'         => '1',
		),
		array(
			'heading'    => esc_html__( 'Text', 'businext' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),
) );

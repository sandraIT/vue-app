<?php

class WPBakeryShortCode_TM_Table extends WPBakeryShortCode {

}

vc_map( array(
	'name'     => esc_html__( 'Table', 'businext' ),
	'base'     => 'tm_table',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-call-to-action',
	'params'   => array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '1',
			),
			'std'         => '1',
		),
		array(
			'heading'    => esc_html__( 'Content', 'businext' ),
			'type'       => 'textarea_html',
			'param_name' => 'content',
		),
		Businext_VC::extra_class_field(),
	),
) );


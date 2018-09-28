<?php

class WPBakeryShortCode_TM_Search_Form extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Search Form', 'businext' ),
	'base'                      => 'tm_search_form',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-mailchimp-form',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '1', 'businext' ) => '1',
			),
			'std'         => '1',
		),
		Businext_VC::extra_class_field(),
	),
) );

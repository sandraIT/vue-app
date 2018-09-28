<?php

class WPBakeryShortCode_TM_Mailchimp_Form extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Mailchimp Form', 'businext' ),
	'base'                      => 'tm_mailchimp_form',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-mailchimp-form',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Widget title', 'businext' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'What text use as a widget title. Leave blank to use default widget title.', 'businext' ),
		),
		array(
			'heading'     => esc_html__( 'Form Id', 'businext' ),
			'description' => esc_html__( 'Input the id of form. Leave blank to show default form.', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'form_id',
		),
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '1', 'businext' ) => '1',
				esc_html__( '2', 'businext' ) => '2',
				esc_html__( '3', 'businext' ) => '3',
				esc_html__( '4', 'businext' ) => '4',
				esc_html__( '5', 'businext' ) => '5',
				esc_html__( '6', 'businext' ) => '6',
				esc_html__( '7', 'businext' ) => '7',
				esc_html__( '8', 'businext' ) => '8',
				esc_html__( '9', 'businext' ) => '9',
			),
			'std'         => '1',
		),
		Businext_VC::extra_class_field(),
	),
) );

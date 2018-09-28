<?php

class WPBakeryShortCode_TM_Callout_Box extends WPBakeryShortCodesContainer {

}

vc_map( array(
	'name'                    => esc_html__( 'Callout Box', 'businext' ),
	'base'                    => 'tm_callout_box',
	'content_element'         => true,
	'show_settings_on_create' => false,
	'is_container'            => true,
	'category'                => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                    => 'insight-i insight-i-contact-form-7',
	'js_view'                 => 'VcColumnView',
	'params'                  => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'businext' ) => '01',
			),
			'std'         => '01',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_custom_style_tab() ),
) );

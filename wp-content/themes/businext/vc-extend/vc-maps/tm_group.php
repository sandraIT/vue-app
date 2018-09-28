<?php

class WPBakeryShortCode_TM_Group extends WPBakeryShortCodesContainer {

}

vc_map( array(
	'name'                    => esc_html__( 'Group', 'businext' ),
	'base'                    => 'tm_group',
	'content_element'         => true,
	'show_settings_on_create' => false,
	'is_container'            => true,
	'category'                => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                    => 'insight-i insight-i-pricing-group',
	'js_view'                 => 'VcColumnView',
	'params'                  => array(
		Businext_VC::extra_class_field(),
	),
) );


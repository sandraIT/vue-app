<?php

class WPBakeryShortCode_TM_Image_Hotspot extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Image Hotspot', 'businext' ),
	'base'                      => 'tm_image_hotspot',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-blockquote',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'heading'    => esc_html__( 'Image Hotspot', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'hotspot',
			'value'      => Businext_Helper::get_list_hotspot(),
		),
	),
) );

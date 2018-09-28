<?php

class WPBakeryShortCode_TM_Hotspot_Content extends WPBakeryShortCode {

}

vc_map( array(
	'name'                      => esc_html__( 'Image Hotspot Content', 'businext' ),
	'base'                      => 'tm_hotspot_content',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-blockquote',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Heading', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'heading',
		),

		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Text', 'businext' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
	),
) );

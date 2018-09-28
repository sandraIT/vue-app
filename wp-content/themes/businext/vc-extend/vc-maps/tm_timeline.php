<?php

class WPBakeryShortCode_TM_Timeline extends WPBakeryShortCode {
	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Timeline', 'businext' ),
	'base'                      => 'tm_timeline',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-timeline',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge(
		array(
			array(
				'heading'     => esc_html__( 'Style', 'businext' ),
				'type'        => 'dropdown',
				'param_name'  => 'style',
				'admin_label' => true,
				'value'       => array(
					esc_html__( '01', 'businext' ) => '01',
					esc_html__( '02', 'businext' ) => '02',
				),
				'std'         => '01',
			),
			array(
				'group'      => esc_html__( 'Items', 'businext' ),
				'heading'    => esc_html__( 'Items', 'businext' ),
				'type'       => 'param_group',
				'param_name' => 'items',
				'params'     => array(
					array(
						'heading'    => esc_html__( 'Image', 'businext' ),
						'type'       => 'attach_image',
						'param_name' => 'image',
					),
					array(
						'heading'     => esc_html__( 'Title', 'businext' ),
						'type'        => 'textfield',
						'param_name'  => 'title',
						'admin_label' => true,
					),
					array(
						'heading'     => esc_html__( 'Date Time', 'businext' ),
						'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm).', 'businext' ),
						'type'        => 'datetimepicker',
						'param_name'  => 'datetime',
						'value'       => '',
						'admin_label' => true,
					),
					array(
						'heading'    => esc_html__( 'Text', 'businext' ),
						'type'       => 'textarea',
						'param_name' => 'text',
					),
				),

			),
		), Businext_VC::get_vc_spacing_tab()
	),
) );

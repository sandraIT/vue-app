<?php

class WPBakeryShortCode_TM_Restaurant_Menu extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Restaurant Menu', 'businext' ),
	'base'                      => 'tm_restaurant_menu',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-restaurant-menu',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'description' => esc_html__( 'Select style for menu.', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( '01', 'businext' ) => '1',
			),
			'admin_label' => true,
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Item Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Item Description', 'businext' ),
					'type'       => 'textarea',
					'param_name' => 'text',
				),
				array(
					'heading'    => esc_html__( 'Item Price', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'price',
				),
				array(
					'heading'     => esc_html__( 'Badge', 'businext' ),
					'type'        => 'dropdown',
					'param_name'  => 'badge',
					'value'       => array(
						esc_html__( 'None', 'businext' ) => '',
						esc_html__( 'New', 'businext' )  => 'new',
					),
					'admin_label' => true,
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

<?php

class WPBakeryShortCode_TM_Banner extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Banner', 'businext' ),
	'base'     => 'tm_banner',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-product-categories',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'businext' ) => '1',
				esc_html__( '02', 'businext' ) => '2',
			),
			'std'         => '1',
		),
		array(
			'heading'    => esc_html__( 'Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'heading'    => esc_html__( 'Text', 'businext' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
		array(
			'heading'    => esc_html__( 'Button', 'businext' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),
) );

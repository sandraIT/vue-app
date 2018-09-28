<?php

class WPBakeryShortCode_TM_Blockquote extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$content_tab = esc_html__( 'Content', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Blockquote', 'businext' ),
	'base'                      => 'tm_blockquote',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-blockquote',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'businext' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '1',
			),
			'std'         => '1',
		),
		Businext_VC::extra_class_field(),
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
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Photo', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'photo',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Position', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'position',
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

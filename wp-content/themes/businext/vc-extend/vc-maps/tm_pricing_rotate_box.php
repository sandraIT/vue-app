<?php

class WPBakeryShortCode_TM_Pricing_Rotate_Box extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		$tmp = '';

		if ( isset( $atts['image'] ) && $atts['image'] !== '' ) {
			$full_image_size = wp_get_attachment_image_url( $atts['image'], 'full' );
			$image_url       = Businext_Helper::aq_resize( array(
				'url'    => $full_image_size,
				'width'  => 480,
				'height' => 480,
				'crop'   => true,
			) );

			$tmp .= "background-image: url( {$image_url} );";
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .front { $tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Pricing Rotate Box', 'businext' ),
	'base'                      => 'tm_pricing_rotate_box',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-pricing',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
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
		array(
			'heading'    => esc_html__( 'Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'heading'     => esc_html__( 'Title', 'businext' ),
			'type'        => 'textfield',
			'admin_label' => true,
			'param_name'  => 'title',
		),
		array(
			'heading'          => esc_html__( 'Currency', 'businext' ),
			'type'             => 'textfield',
			'param_name'       => 'currency',
			'value'            => '$',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'heading'          => esc_html__( 'Price', 'businext' ),
			'type'             => 'textfield',
			'param_name'       => 'price',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'heading'          => esc_html__( 'Period', 'businext' ),
			'type'             => 'textfield',
			'param_name'       => 'period',
			'value'            => 'per monthly',
			'edit_field_class' => 'vc_col-sm-4',
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Button', 'businext' ),
			'param_name' => 'button',
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Text', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'text',
					'admin_label' => true,
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

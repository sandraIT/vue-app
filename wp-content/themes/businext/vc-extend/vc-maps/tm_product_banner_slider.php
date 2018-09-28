<?php

class WPBakeryShortCode_TM_Product_Banner_Slider extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$slides_tab = esc_html__( 'Slides', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Product Banner Slider', 'businext' ),
	'base'                      => 'tm_product_banner_slider',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-carousel',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'    => esc_html__( 'Image Size', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( '960x960', 'businext' ) => '960x960',
				esc_html__( 'Full', 'businext' )    => 'full',
			),
			'std'        => '960x960',
		),
		array(
			'heading'    => esc_html__( 'Auto Height', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'auto_height',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Loop', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'loop',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
			'std'        => '1',
		),
		array(
			'heading'     => esc_html__( 'Auto Play', 'businext' ),
			'description' => esc_html__( 'Delay between transitions (in ms), ex: 3000. Leave blank to disabled.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'auto_play',
		),
		array(
			'heading'    => esc_html__( 'Equal Height', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'equal_height',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Vertically Center', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'v_center',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Navigation', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'nav',
			'value'      => Businext_VC::get_slider_navs(),
			'std'        => '',
		),
		Businext_VC::extra_id_field( array(
			'heading'    => esc_html__( 'Slider Button ID', 'businext' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'heading'    => esc_html__( 'Pagination', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination',
			'value'      => Businext_VC::get_slider_dots(),
			'std'        => '',
		),
		array(
			'heading'    => esc_html__( 'Gutter', 'businext' ),
			'type'       => 'number',
			'param_name' => 'gutter',
			'std'        => 30,
			'min'        => 0,
			'max'        => 50,
			'step'       => 1,
			'suffix'     => 'px',
		),
		array(
			'heading'     => esc_html__( 'Items Display', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'items_display',
			'min'         => 1,
			'max'         => 10,
			'suffix'      => 'item (s)',
			'media_query' => array(
				'lg' => 3,
				'md' => 3,
				'sm' => 2,
				'xs' => 1,
			),
		),
		array(
			'heading'    => esc_html__( 'Full-width Image', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'fw_image',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => $slides_tab,
			'heading'    => esc_html__( 'Slides', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Image', 'businext' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Sub Title', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'sub_title',
				),
				array(
					'heading'     => esc_html__( 'Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Text', 'businext' ),
					'type'       => 'textarea',
					'param_name' => 'text',
				),
				array(
					'heading'    => esc_html__( 'Link', 'businext' ),
					'type'       => 'vc_link',
					'param_name' => 'link',
					'value'      => esc_html__( 'Link', 'businext' ),
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

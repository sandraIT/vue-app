<?php

class WPBakeryShortCode_TM_Info_Boxes extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_grid_css( $selector, $atts );
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_group = esc_html__( 'Carousel Settings', 'businext' );

vc_map( array(
	'name'     => esc_html__( 'Info Boxes', 'businext' ),
	'base'     => 'tm_info_boxes',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-info-boxes',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Info Boxes Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid Metro', 'businext' ) => 'metro',
			),
			'std'         => 'metro',
		),
		array(
			'heading'    => esc_html__( 'Metro Layout', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'metro_layout',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Item Size', 'businext' ),
					'type'        => 'dropdown',
					'param_name'  => 'size',
					'admin_label' => true,
					'value'       => array(
						esc_html__( 'Width 1 - Height 1', 'businext' ) => '1:1',
						esc_html__( 'Width 1 - Height 2', 'businext' ) => '1:2',
						esc_html__( 'Width 2 - Height 1', 'businext' ) => '2:1',
						esc_html__( 'Width 2 - Height 2', 'businext' ) => '2:2',
					),
					'std'         => '1:1',
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'size' => '2:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '2:1',
				),
			) ) ),
			'dependency' => array(
				'element' => 'style',
				'value'   => array( 'metro' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 6,
			'step'        => 1,
			'suffix'      => '',
			'media_query' => array(
				'lg' => '3',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'metro' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Grid Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 0,
			'min'         => 0,
			'max'         => 100,
			'step'        => 2,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'metro' ),
			),
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(

			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array_merge( array(
				array(
					'heading'    => esc_html__( 'Background Color', 'businext' ),
					'type'       => 'dropdown',
					'param_name' => 'background_color',
					'value'      => array(
						esc_html__( 'None', 'businext' )            => '',
						esc_html__( 'Primary Color', 'businext' )   => 'primary',
						esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
						esc_html__( 'Custom Color', 'businext' )    => 'custom',
						esc_html__( 'Gradient Color', 'businext' )  => 'gradient',
					),
					'std'        => '',
				),
				array(
					'heading'    => esc_html__( 'Custom Background Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'custom_background_color',
					'dependency' => array(
						'element' => 'background_color',
						'value'   => array( 'custom' ),
					),
				),
				array(
					'heading'    => esc_html__( 'Background Gradient', 'businext' ),
					'type'       => 'gradient',
					'param_name' => 'background_gradient',
					'dependency' => array(
						'element' => 'background_color',
						'value'   => array( 'gradient' ),
					),
				),
				array(
					'heading'     => esc_html__( 'Background Image', 'businext' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
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
					'heading'    => esc_html__( 'Button', 'businext' ),
					'type'       => 'vc_link',
					'param_name' => 'button',
				),
				array(
					'heading'    => esc_html__( 'Icon Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'icon_color',
				),
				array(
					'heading'    => esc_html__( 'Heading Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'heading_color',
				),
				array(
					'heading'    => esc_html__( 'Text Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'text_color',
				),
				array(
					'heading'    => esc_html__( 'Button Text Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'button_text_color',
				),
				array(
					'heading'    => esc_html__( 'Button Icon Color', 'businext' ),
					'type'       => 'colorpicker',
					'param_name' => 'button_icon_color',
				),
			), Businext_VC::icon_libraries( array(
				'allow_none' => true,
				'group'      => '',
			) ) ),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );


<?php

class WPBakeryShortCode_TM_Client extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		$style = isset( $atts['style'] ) ? $atts['style'] : '';

		if ( in_array( $style, array(
			'grid',
		), true ) ) {
			$atts['row_gutter'] = $atts['gutter'];

			Businext_VC::get_grid_css( $selector, $atts );
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$slides_tab    = esc_html__( 'Slides', 'businext' );
$slider_styles = array(
	'',
	'2-rows',
);

$grid_styles = array(
	'grid',
);

vc_map( array(
	'name'                      => esc_html__( 'Client Logos', 'businext' ),
	'base'                      => 'tm_client',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-carousel',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Carousel', 'businext' )          => '',
				esc_html__( 'Carousel Two Rows', 'businext' ) => '2-rows',
				esc_html__( 'Grid', 'businext' )              => 'grid',
			),
			'std'         => '',
		),
		array(
			'heading'     => esc_html__( 'Hover Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'hover_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Slide Up', 'businext' )           => 'slide-up',
				esc_html__( 'Slide Down', 'businext' )         => 'slide-down',
				esc_html__( 'Grow Up', 'businext' )            => 'grow-up',
				esc_html__( 'Main Image Move Up', 'businext' ) => 'main-move-up',
			),
			'std'         => 'slide-up',
		),
		array(
			'heading'    => esc_html__( 'Loop', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'loop',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
			'std'        => '1',
			'dependency' => array(
				'element' => 'style',
				'value'   => $slider_styles,
			),
		),
		array(
			'heading'     => esc_html__( 'Auto Play', 'businext' ),
			'description' => esc_html__( 'Delay between transitions (in ms), ex: 3000. Leave blank to disabled.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'auto_play',
			'std'         => 5000,
			'dependency'  => array(
				'element' => 'style',
				'value'   => $slider_styles,
			),
		),
		array(
			'heading'     => esc_html__( 'Columns', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 10,
			'step'        => 1,
			'suffix'      => '',
			'media_query' => array(
				'lg' => '4',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => $grid_styles,
			),
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
				'lg' => 6,
				'md' => 4,
				'sm' => 3,
				'xs' => 2,
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => $slider_styles,
			),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => $slides_tab,
			'heading'    => esc_html__( 'Client', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Logo', 'businext' ),
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Logo Hover', 'businext' ),
					'type'        => 'attach_image',
					'param_name'  => 'image_hover',
					'admin_label' => true,
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

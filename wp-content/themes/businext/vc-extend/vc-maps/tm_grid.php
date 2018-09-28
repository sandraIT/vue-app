<?php

class WPBakeryShortCode_TM_Grid extends WPBakeryShortCodesContainer {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		Businext_VC::get_grid_css( $selector, $atts );

		if ( isset( $atts['item_max_width'] ) && $atts['item_max_width'] !== '' ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .grid-item",
				'atts'    => array(
					'max-width' => array(
						'media_str' => $atts['item_max_width'],
						'unit'      => 'px',
					),
				),
			) );

			$businext_shortcode_lg_css .= "$selector .grid-item { margin-left: auto; margin-right: auto; }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'            => esc_html__( 'Grid', 'businext' ),
	'base'            => 'tm_grid',
	'category'        => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'            => 'insight-i insight-i-portfoliogrid',
	'as_parent'       => array( 'only' => array( 'tm_box_icon', 'tm_card' ) ),
	'content_element' => true,
	'is_container'    => true,
	'js_view'         => 'VcColumnView',
	'params'          => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'None', 'businext' )                => '',
				esc_html__( 'With separator', 'businext' )      => 'border',
				esc_html__( 'With Light Border', 'businext' )   => 'light-border',
				esc_html__( 'With Dark Border', 'businext' )    => 'dark-border',
				esc_html__( 'Rounded With Border', 'businext' ) => 'rounded-separator',
			),
			'std'         => '',
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
				'lg' => '4',
				'md' => '3',
				'sm' => '2',
				'xs' => '1',
			),
		),
		array(
			'heading'     => esc_html__( 'Columns Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid columns.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'     => esc_html__( 'Rows Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid rows.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'row_gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'     => esc_html__( 'Grid Items Max Width', 'businext' ),
			'description' => esc_html__( 'Controls the max width of items, and centered.', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'item_max_width',
			'min'         => 1,
			'max'         => 1000,
			'step'        => 1,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		Businext_VC::get_animation_field( array(
			'std' => 'move-up',
		) ),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),
) );


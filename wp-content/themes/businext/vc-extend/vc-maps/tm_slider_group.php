<?php

class WPBakeryShortCode_TM_Slider_Group extends WPBakeryShortCodesContainer {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                    => esc_html__( 'Slider Group', 'businext' ),
	'base'                    => 'tm_slider_group',
	'as_parent'               => array( 'only' => 'tm_box_icon,tm_team_member,tm_group' ),
	'content_element'         => true,
	'show_settings_on_create' => false,
	'is_container'            => true,
	'category'                => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                    => 'insight-i insight-i-carousel',
	'js_view'                 => 'VcColumnView',
	'params'                  => array_merge( array(
		array(
			'heading'    => esc_html__( 'Slider Style', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'style',
			'value'      => array(
				esc_html__( 'Normal', 'businext' )         => '',
				esc_html__( 'With Separator', 'businext' ) => 'separator',
			),
			'std'        => '',
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
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),
) );


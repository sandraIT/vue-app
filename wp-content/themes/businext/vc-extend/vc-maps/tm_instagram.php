<?php

class WPBakeryShortCode_TM_Instagram extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;

		$tmp = '';

		if ( $atts['rounded'] !== '' ) {
			$tmp .= Businext_Helper::get_css_prefix( 'border-radius', "{$atts['rounded']}px" );
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .inner { $tmp }";
		}

		Businext_VC::get_grid_css( $selector, $atts );

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Instagram', 'businext' ),
	'base'                      => 'tm_instagram',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-instagram',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Widget title', 'businext' ),
			'description' => esc_html__( 'What text use as a widget title.', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'widget_title',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'businext' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid', 'businext' ) => 'grid',
			),
			'std'         => 'grid',
		),
		array(
			'heading'    => esc_html__( 'User Name', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'username',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image Size', 'businext' ),
			'param_name'  => 'size',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Thumbnail 150x150', 'businext' )   => 'thumbnail',
				esc_html__( 'Small 240x240', 'businext' )       => 'small',
				esc_html__( 'Small 320x320', 'businext' )       => 'medium',
				esc_html__( 'Large 480x480', 'businext' )       => 'large',
				esc_html__( 'Extra Large 640x640', 'businext' ) => 'extra_large',
				esc_html__( 'Original', 'businext' )            => 'original',
			),
			'std'         => 'large',
		),
		array(
			'heading'    => esc_html__( 'Number of items', 'businext' ),
			'type'       => 'number',
			'param_name' => 'number_items',
			'std'        => '6',
		),
		array(
			'heading'     => esc_html__( 'Columns', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 10,
			'step'        => 1,
			'suffix'      => 'column (s)',
			'media_query' => array(
				'lg' => 3,
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'heading'     => esc_html__( 'Columns Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid columns.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
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
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'    => esc_html__( 'Show User Name', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'show_user_name',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Show overlay likes and comments', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'overlay',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'heading'    => esc_html__( 'Open links in a new tab.', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'link_target',
			'value'      => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
			'std'        => '1',
		),
		Businext_VC::extra_class_field(),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Rounded', 'businext' ),
			'description' => esc_html__( 'Controls the rounded of images', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'rounded',
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

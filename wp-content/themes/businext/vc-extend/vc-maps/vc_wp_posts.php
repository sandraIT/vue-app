<?php

function businext_vc_wp_posts_get_inline_css( $selector = '', $atts ) {
	global $businext_shortcode_lg_css;

	$link_tmp       = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_color'], $atts['custom_link_color'] );
	$link_hover_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['link_hover_color'], $atts['custom_link_hover_color'] );

	if ( $link_tmp !== '' ) {
		$businext_shortcode_lg_css .= "$selector a { $link_tmp }";
	}

	if ( $link_hover_tmp !== '' ) {
		$businext_shortcode_lg_css .= "$selector a:hover { $link_hover_tmp }";
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_add_params( 'vc_wp_posts', array(
	array(
		'heading'    => esc_html__( 'Sidebar Position', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'sidebar_position',
		'value'      => array(
			esc_html__( 'Left', 'businext' )  => 'left',
			esc_html__( 'Right', 'businext' ) => 'right',
		),
		'std'        => 'right',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Link Color', 'businext' ),
		'type'             => 'dropdown',
		'param_name'       => 'link_color',
		'value'            => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'              => '',
		'edit_field_class' => 'vc_col-sm-6 col-break',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Custom Link Color', 'businext' ),
		'type'             => 'colorpicker',
		'param_name'       => 'custom_link_color',
		'dependency'       => array(
			'element' => 'link_color',
			'value'   => array( 'custom' ),
		),
		'std'              => '#fff',
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Link Hover Color', 'businext' ),
		'type'             => 'dropdown',
		'param_name'       => 'link_hover_color',
		'value'            => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'              => '',
		'edit_field_class' => 'vc_col-sm-6 col-break',
	),
	array(
		'group'            => $styling_tab,
		'heading'          => esc_html__( 'Custom Link Hover Color', 'businext' ),
		'type'             => 'colorpicker',
		'param_name'       => 'custom_link_hover_color',
		'dependency'       => array(
			'element' => 'link_hover_color',
			'value'   => array( 'custom' ),
		),
		'std'              => '#fff',
		'edit_field_class' => 'vc_col-sm-6',
	),
) );

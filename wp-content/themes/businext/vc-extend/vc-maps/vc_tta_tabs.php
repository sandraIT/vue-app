<?php
$_color_field                                                 = WPBMap::getParam( 'vc_tta_tabs', 'color' );
$_color_field['value'][ esc_html__( 'Primary', 'businext' ) ] = 'primary';
$_color_field['std']                                          = 'primary';
vc_update_shortcode_param( 'vc_tta_tabs', $_color_field );

vc_update_shortcode_param( 'vc_tta_tabs', array(
	'param_name' => 'style',
	'value'      => array(
		esc_html__( 'Businext 01', 'businext' ) => 'businext-01',
		esc_html__( 'Businext 02', 'businext' ) => 'businext-02',
		esc_html__( 'Classic', 'businext' )     => 'classic',
		esc_html__( 'Modern', 'businext' )      => 'modern',
		esc_html__( 'Flat', 'businext' )        => 'flat',
		esc_html__( 'Outline', 'businext' )     => 'outline',
	),
) );

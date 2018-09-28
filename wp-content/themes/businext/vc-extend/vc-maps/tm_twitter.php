<?php

class WPBakeryShortCode_TM_Twitter extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;

		$icon_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$text_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );

		if ( $icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tweet:before{ $icon_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tweet{ $text_tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$slider_tab  = esc_html__( 'Slider Settings', 'businext' );
$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Twitter', 'businext' ),
	'base'                      => 'tm_twitter',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-twitter',
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
				esc_html__( 'List', 'businext' )         => 'list',
				esc_html__( 'Slider', 'businext' )       => 'slider',
				esc_html__( 'Slider Quote', 'businext' ) => 'slider-quote',
			),
			'std'         => 'slider-quote',
		),
		array(
			'heading'    => esc_html__( 'Consumer Key', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'consumer_key',
		),
		array(
			'heading'    => esc_html__( 'Consumer Secret', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'consumer_secret',
		),
		array(
			'heading'    => esc_html__( 'Access Token', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'access_token',
		),
		array(
			'heading'    => esc_html__( 'Access Token Secret', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'access_token_secret',
		),
		array(
			'heading'    => esc_html__( 'Twitter Username', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'username',
		),
		array(
			'heading'    => esc_html__( 'Number of tweets', 'businext' ),
			'type'       => 'number',
			'param_name' => 'number_items',
		),
		array(
			'heading'    => esc_html__( 'Heading', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'heading',
			'std'        => esc_html__( 'From Twitter', 'businext' ),
		),
		array(
			'heading'    => esc_html__( 'Show date.', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'show_date',
			'value'      => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'       => $slider_tab,
			'heading'     => esc_html__( 'Speed', 'businext' ),
			'description' => esc_html__( 'Duration of transition between slides (in ms), ex: 1000. Leave blank to use default.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_speed',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider-quote',
				),
			),
		),
		array(
			'group'       => $slider_tab,
			'heading'     => esc_html__( 'Auto Play', 'businext' ),
			'description' => esc_html__( 'Delay between transitions (in ms), ex: 3000. Leave blank to disabled.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_auto_play',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider-quote',
				),
			),
		),
		array(
			'group'      => $slider_tab,
			'heading'    => esc_html__( 'Navigation', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_nav',
			'value'      => Businext_VC::get_slider_navs(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider-quote',
				),
			),
		),
		Businext_VC::extra_id_field( array(
			'group'      => $slider_tab,
			'heading'    => esc_html__( 'Slider Button ID', 'businext' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'carousel_nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'group'      => $slider_tab,
			'heading'    => esc_html__( 'Pagination', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_pagination',
			'value'      => Businext_VC::get_slider_dots(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'slider',
					'slider-quote',
				),
			),
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Icon Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
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
			'heading'          => esc_html__( 'Custom Icon Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_color',
			'dependency'       => array(
				'element' => 'icon_color',
				'value'   => 'custom',
			),
			'std'              => '#999',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Text Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_color',
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
			'heading'          => esc_html__( 'Custom Text Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#999',
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

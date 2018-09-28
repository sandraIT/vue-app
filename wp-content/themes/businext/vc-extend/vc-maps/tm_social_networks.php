<?php

class WPBakeryShortCode_TM_Social_Networks extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

		$tmp = $link_css = $link_hover_css = $icon_css = $icon_hover_css = $text_css = $text_hover_css = '';
		extract( $atts );

		$icon_css       .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$icon_hover_css .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_hover_color'], $atts['custom_icon_hover_color'] );
		$text_css       .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$text_hover_css .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_hover_color'], $atts['custom_text_hover_color'] );
		$link_css       .= Businext_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['border_color'], $atts['custom_border_color'] );
		$link_hover_css .= Businext_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['border_hover_color'], $atts['custom_border_hover_color'] );
		$link_css       .= Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'] );
		$link_hover_css .= Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_hover_color'], $atts['custom_background_hover_color'] );

		if ( $atts['align'] !== '' ) {
			$tmp .= "text-align: {$atts['align']};";
		}

		if ( $atts['md_align'] !== '' ) {
			$businext_shortcode_md_css .= "$selector { text-align: {$atts['md_align']} }";
		}

		if ( $atts['sm_align'] !== '' ) {
			$businext_shortcode_sm_css .= "$selector { text-align: {$atts['sm_align']} }";
		}

		if ( $atts['xs_align'] !== '' ) {
			$businext_shortcode_xs_css .= "$selector { text-align: {$atts['xs_align']} }";
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector { $tmp }";
		}

		if ( $icon_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .link-icon { $icon_css }";
		}

		if ( $icon_hover_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .item:hover .link-icon { $icon_hover_css }";
		}

		if ( $text_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .link-text { $text_css }";
		}

		if ( $text_hover_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .item:hover .link-text { $text_hover_css }";
		}

		if ( $link_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .link { $link_css }";
		}

		if ( $link_hover_css !== '' ) {
			$businext_shortcode_lg_css .= "$selector .item:hover .link { $link_hover_css }";
		}
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Social Networks', 'businext' ),
	'base'                      => 'tm_social_networks',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-social-networks',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Icons', 'businext' )                 => 'icons',
				esc_html__( 'Large Icons', 'businext' )           => 'large-icons',
				esc_html__( 'Solid Square Icon', 'businext' )     => 'solid-square-icon',
				esc_html__( 'Solid Rounded Icon', 'businext' )    => 'solid-rounded-icon',
				esc_html__( 'Solid Rounded Icon 02', 'businext' ) => 'solid-rounded-icon-02',
				esc_html__( 'Title', 'businext' )                 => 'title',
				esc_html__( 'Icon + Title', 'businext' )          => 'icon-title',
			),
			'std'         => 'icons',
		),
		array(
			'heading'     => esc_html__( 'Layout', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'layout',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Inline', 'businext' )    => 'inline',
				esc_html__( 'List', 'businext' )      => 'list',
				esc_html__( '2 Columns', 'businext' ) => 'two-columns',
			),
			'std'         => 'inline',
		),

	), Businext_VC::get_alignment_fields(), array(
		array(
			'heading'    => esc_html__( 'Open link in a new tab.', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'target',
			'value'      => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
			'std'        => '1',
		),
		array(
			'heading'    => esc_html__( 'Show tooltip as item title.', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'tooltip_enable',
			'value'      => array(
				esc_html__( 'Yes', 'businext' ) => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Tooltip Position', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'tooltip_position',
			'value'      => array(
				esc_html__( 'Top', 'businext' )    => 'top',
				esc_html__( 'Right', 'businext' )  => 'right',
				esc_html__( 'Bottom', 'businext' ) => 'bottom',
				esc_html__( 'Left', 'businext' )   => 'left',
			),
			'std'        => 'top',
			'dependency' => array(
				'element' => 'tooltip_enable',
				'value'   => '1',
			),
		),
		array(
			'heading'    => esc_html__( 'Tooltip Skin', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'tooltip_skin',
			'value'      => array(
				esc_html__( 'Default', 'businext' ) => '',
				esc_html__( 'Primary', 'businext' ) => 'primary',
			),
			'std'        => '',
			'dependency' => array(
				'element' => 'tooltip_enable',
				'value'   => '1',
			),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array_merge( array(
				array(
					'heading'     => esc_html__( 'Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Link', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'link',
				),
			), Businext_VC::icon_libraries() ),

			'value' => rawurlencode( wp_json_encode( array(
				array(
					'title'     => esc_html__( 'Twitter', 'businext' ),
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-twitter',
				),
				array(
					'title'     => esc_html__( 'Facebook', 'businext' ),
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-facebook',
				),
				array(
					'title'     => esc_html__( 'Vimeo', 'businext' ),
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-vimeo',
				),
				array(
					'title'     => esc_html__( 'Linkedin', 'businext' ),
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-linkedin',
				),
			) ) ),

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
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Icon Hover Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_hover_color',
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
			'heading'          => esc_html__( 'Custom Icon Hover Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_hover_color',
			'dependency'       => array(
				'element' => 'icon_hover_color',
				'value'   => 'custom',
			),
			'std'              => '#fff',
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
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Text Hover Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'text_hover_color',
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
			'heading'          => esc_html__( 'Custom Text Hover Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_text_hover_color',
			'dependency'       => array(
				'element' => 'text_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Border Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'border_color',
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
			'heading'          => esc_html__( 'Custom Border Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_border_color',
			'dependency'       => array(
				'element' => 'border_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Border Hover Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'border_hover_color',
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
			'heading'          => esc_html__( 'Custom Border Hover Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_border_hover_color',
			'dependency'       => array(
				'element' => 'border_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Background Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'background_color',
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
			'heading'          => esc_html__( 'Custom Background Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_background_color',
			'dependency'       => array(
				'element' => 'background_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Background Hover Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'background_hover_color',
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
			'heading'          => esc_html__( 'Custom Background Hover Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_background_hover_color',
			'dependency'       => array(
				'element' => 'background_hover_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
	) ),
) );

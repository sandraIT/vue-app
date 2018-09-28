<?php

class WPBakeryShortCode_TM_List extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

		$marker_tmp  = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['marker_color'], $atts['custom_marker_color'] );
		$marker_tmp  .= Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['marker_background_color'], $atts['custom_marker_background_color'] );
		$heading_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['title_color'], $atts['custom_title_color'] );
		$text_tmp    = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['desc_color'], $atts['custom_desc_color'] );

		if ( $marker_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .marker { $marker_tmp }";
		}

		if ( $heading_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .title { $heading_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .desc { $text_tmp }";
		}

		if ( isset( $atts['columns'] ) && $atts['columns'] !== '' ) {
			$arr = explode( ';', $atts['columns'] );
			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );

				switch ( $tmp[0] ) {
					case 'sm' :
						$businext_shortcode_sm_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'md' :
						$businext_shortcode_md_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'xs' :
						$businext_shortcode_xs_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
					case 'lg' :
						$businext_shortcode_lg_css .= "$selector { grid-template-columns: repeat({$tmp[1]}, 1fr); }";
						break;
				}
			}
		}

		Businext_VC::get_responsive_css( array(
			'element' => "$selector .title",
			'atts'    => array(
				'font-size' => array(
					'media_str' => $atts['heading_font_size'],
					'unit'      => 'px',
				),
			),
		) );

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'List', 'businext' ),
	'base'                      => 'tm_list',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-list',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Widget title', 'businext' ),
			'description' => esc_html__( 'What text use as a widget title.', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'widget_title',
		),
		array(
			'heading'     => esc_html__( 'List Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'list_style',
			'value'       => array(
				esc_html__( 'Circle List', 'businext' )               => 'circle',
				esc_html__( 'Circle List 02', 'businext' )            => 'circle-02',
				esc_html__( 'Circle List 03', 'businext' )            => 'circle-03',
				esc_html__( 'Circle List 04', 'businext' )            => 'circle-04',
				esc_html__( 'Circle List 05', 'businext' )            => 'circle-05',
				esc_html__( 'Check List', 'businext' )                => 'check',
				esc_html__( 'Check List 02', 'businext' )             => 'check-02',
				esc_html__( 'Icon List', 'businext' )                 => 'icon',
				esc_html__( 'Icon List 02', 'businext' )              => 'icon-02',
				esc_html__( 'Icon List 03', 'businext' )              => 'icon-03',
				esc_html__( 'Modern Icon List', 'businext' )          => 'modern-icon',
				esc_html__( 'Modern Icon List 02', 'businext' )       => 'modern-icon-02',
				esc_html__( 'Modern Icon List 03', 'businext' )       => 'modern-icon-03',
				esc_html__( 'Modern Icon List 04', 'businext' )       => 'modern-icon-04',
				esc_html__( 'Modern Icon List 05', 'businext' )       => 'modern-icon-05',
				esc_html__( '(Automatic) Numbered List', 'businext' ) => 'auto-numbered',
				esc_html__( '(Manual) Numbered List', 'businext' )    => 'manual-numbered',
			),
			'admin_label' => true,
			'std'         => 'icon',
		),
		array(
			'heading'     => esc_html__( 'Columns', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 10,
			'suffix'      => 'item (s)',
			'media_query' => array(
				'lg' => 1,
				'md' => '',
				'sm' => '',
				'xs' => 1,
			),
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Marker Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'marker_color',
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
			'heading'          => esc_html__( 'Custom Marker Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_marker_color',
			'dependency'       => array(
				'element' => 'marker_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Marker Background Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'marker_background_color',
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
			'heading'          => esc_html__( 'Custom Marker Background Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_marker_background_color',
			'dependency'       => array(
				'element' => 'marker_background_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Title Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'title_color',
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
			'heading'          => esc_html__( 'Custom Title Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_title_color',
			'dependency'       => array(
				'element' => 'title_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Description Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'desc_color',
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
			'heading'          => esc_html__( 'Custom Description Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_desc_color',
			'dependency'       => array(
				'element' => 'desc_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Heading Font Size', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'heading_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
	),

		Businext_VC::icon_libraries( array(
			'allow_none' => true,
			'group'      => '',
			'dependency' => array(
				'element' => 'list_style',
				'value'   => array(
					'icon',
					'icon-02',
					'icon-03',
					'modern-icon',
					'modern-icon-02',
					'modern-icon-03',
					'modern-icon-04',
					'modern-icon-05',
				),
			),
		) ), array(
			Businext_VC::get_animation_field(),
			Businext_VC::extra_class_field(),
			array(
				'group'      => esc_html__( 'Items', 'businext' ),
				'heading'    => esc_html__( 'Items', 'businext' ),
				'type'       => 'param_group',
				'param_name' => 'items',
				'params'     => array(
					array(
						'heading'     => esc_html__( 'Number', 'businext' ),
						'type'        => 'textfield',
						'param_name'  => 'item_number',
						'admin_label' => true,
						'description' => esc_html__( 'Only work with List Type: (Manual) Numbered list.', 'businext' ),
					),
					array(
						'heading'     => esc_html__( 'Title', 'businext' ),
						'type'        => 'textfield',
						'param_name'  => 'item_title',
						'admin_label' => true,
					),
					array(
						'heading'    => esc_html__( 'Sub Title', 'businext' ),
						'type'       => 'textfield',
						'param_name' => 'item_sub_title',
					),
					array(
						'heading'    => esc_html__( 'Link', 'businext' ),
						'type'       => 'vc_link',
						'param_name' => 'link',
					),
					array(
						'heading'    => esc_html__( 'Description', 'businext' ),
						'type'       => 'textarea',
						'param_name' => 'item_desc',
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => esc_html__( 'Icon', 'businext' ),
						'param_name' => 'icon',
						'settings'   => array(
							'emptyIcon'    => true,
							'type'         => 'ion',
							'iconsPerPage' => 400,
						),
					),
				),
			),

		), Businext_VC::get_vc_spacing_tab() ),
) );

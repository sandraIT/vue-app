<?php

class WPBakeryShortCode_TM_Box_Icon extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;
		$btn_tmp = '';

		$tmp         = Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'], $atts['background_gradient'] );
		$icon_tmp    = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['icon_color'], $atts['custom_icon_color'] );
		$icon_tmp    .= Businext_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['icon_color'], $atts['custom_icon_color'] );
		$heading_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['heading_color'], $atts['custom_heading_color'] );
		$text_tmp    = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );

		if ( $atts['background_image'] !== '' ) {
			$_url = wp_get_attachment_image_url( $atts['background_image'], 'full' );
			if ( $_url !== false ) {
				$tmp .= "background-image: url( $_url );";

				if ( $atts['background_size'] !== 'auto' ) {
					$tmp .= "background-size: {$atts['background_size']};";
				}

				$tmp .= "background-repeat: {$atts['background_repeat']};";
				if ( $atts['background_position'] !== '' ) {
					$tmp .= "background-position: {$atts['background_position']};";
				}
			}
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector{ $tmp }";
		}

		if ( isset( $atts['icon_font_size'] ) ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['icon_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		if ( $atts['text_width'] !== '' ) {
			$text_tmp .= "max-width: {$atts['text_width']};";
		}

		if ( $icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .icon{ $icon_tmp }";
		}

		if ( $heading_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .heading { $heading_tmp }";
		}

		if ( $text_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .text{ $text_tmp }";
		}

		if ( $atts['text'] === '' && $atts['heading'] === '' ) {
			$businext_shortcode_lg_css .= "$selector .image { margin-bottom: 0; }";
		}

		if ( $atts['button_color'] === 'custom' ) {
			$btn_tmp .= "color: {$atts['custom_button_color']}; ";
		}

		if ( $btn_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tm-button .button-text{ $btn_tmp }";
		}

		$tmp = "text-align: {$atts['align']}; ";
		if ( $atts['align'] === 'left' ) {
			$tmp .= 'align-items: flex-start';
		} elseif ( $atts['align'] === 'center' ) {
			$tmp .= 'align-items: center;';
		} elseif ( $atts['align'] === 'right' ) {
			$tmp .= 'align-items: flex-end;';
		}

		$businext_shortcode_lg_css .= "$selector .content-wrap { $tmp }";

		$tmp = '';
		if ( $atts['md_align'] !== '' ) {
			$tmp .= "text-align: {$atts['md_align']};";

			if ( $atts['md_align'] === 'left' ) {
				$tmp .= 'align-items: flex-start';
			} elseif ( $atts['md_align'] === 'center' ) {
				$tmp .= 'align-items: center;';
			} elseif ( $atts['md_align'] === 'right' ) {
				$tmp .= 'align-items: flex-end;';
			}

			$businext_shortcode_md_css .= "$selector .content-wrap { $tmp }";
		}

		$tmp = '';
		if ( $atts['sm_align'] !== '' ) {
			$tmp .= "text-align: {$atts['sm_align']};";

			if ( $atts['sm_align'] === 'left' ) {
				$tmp .= 'align-items: flex-start';
			} elseif ( $atts['sm_align'] === 'center' ) {
				$tmp .= 'align-items: center;';
			} elseif ( $atts['sm_align'] === 'right' ) {
				$tmp .= 'align-items: flex-end;';
			}

			$businext_shortcode_sm_css .= "$selector .content-wrap { $tmp }";
		}

		$tmp = '';
		if ( $atts['xs_align'] !== '' ) {
			$tmp .= "text-align: {$atts['xs_align']};";

			if ( $atts['xs_align'] === 'left' ) {
				$tmp .= 'align-items: flex-start';
			} elseif ( $atts['xs_align'] === 'center' ) {
				$tmp .= 'align-items: center;';
			} elseif ( $atts['xs_align'] === 'right' ) {
				$tmp .= 'align-items: flex-end;';
			}

			$businext_shortcode_xs_css .= "$selector .content-wrap { $tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$content_tab = esc_html__( 'Content', 'businext' );
$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Box Icon', 'businext' ),
	'base'                      => 'tm_box_icon',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'description' => esc_html__( 'Select style for box icon.', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '1',
				esc_html__( 'Style 02', 'businext' ) => '2',
				esc_html__( 'Style 03', 'businext' ) => '3',
				esc_html__( 'Style 04', 'businext' ) => '4',
				esc_html__( 'Style 05', 'businext' ) => '5',
				esc_html__( 'Style 06', 'businext' ) => '6',
				esc_html__( 'Style 07', 'businext' ) => '7',
				esc_html__( 'Style 08', 'businext' ) => '8',
				esc_html__( 'Style 09', 'businext' ) => '9',
				esc_html__( 'Style 10', 'businext' ) => '10',
				esc_html__( 'Style 11', 'businext' ) => '11',
				esc_html__( 'Style 12', 'businext' ) => '12',
				esc_html__( 'Style 13', 'businext' ) => '13',
				esc_html__( 'Style 14', 'businext' ) => '14',
				esc_html__( 'Style 15', 'businext' ) => '15',
				esc_html__( 'Style 16', 'businext' ) => '16',
				esc_html__( 'Style 17', 'businext' ) => '17',
				esc_html__( 'Style 18', 'businext' ) => '18',
				esc_html__( 'Style 19', 'businext' ) => '19',
				esc_html__( 'Style 20', 'businext' ) => '20',
				esc_html__( 'Style 21', 'businext' ) => '21',
			),
			'admin_label' => true,
			'std'         => '1',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
	), Businext_VC::get_alignment_fields(), Businext_VC::icon_libraries( array(
		'group'      => $content_tab,
		'allow_none' => true,
		'allow_svg'  => true,
	) ), array(
		array(
			'group'       => $content_tab,
			'heading'     => esc_html__( 'Heading', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'heading',
			'admin_label' => true,
		),
		array(
			'group'       => $content_tab,
			'heading'     => esc_html__( 'Link', 'businext' ),
			'description' => esc_html__( 'Add a link to heading.', 'businext' ),
			'type'        => 'vc_link',
			'param_name'  => 'link',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Text', 'businext' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
		array(
			'group'       => $content_tab,
			'heading'     => esc_html__( 'Text Width', 'businext' ),
			'description' => esc_html__( 'Input width of box text. For Ex: 300px', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'text_width',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Button', 'businext' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Icon Font Size', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'icon_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Heading Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'heading_color',
			'value'      => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Heading Color', 'businext' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_heading_color',
			'dependency' => array(
				'element' => 'heading_color',
				'value'   => array( 'custom' ),
			),
			'std'        => '#222',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Icon Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'icon_color',
			'value'      => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Icon Color', 'businext' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_icon_color',
			'dependency' => array(
				'element' => 'icon_color',
				'value'   => 'custom',
			),
			'std'        => '#999',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Text Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'text_color',
			'value'      => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Text Color', 'businext' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_text_color',
			'dependency' => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'        => '#999',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Button Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'button_color',
			'value'      => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'        => '',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Button Color', 'businext' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_button_color',
			'dependency' => array(
				'element' => 'button_color',
				'value'   => array( 'custom' ),
			),
			'std'        => '#fff',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'background_color',
			'value'      => array(
				esc_html__( 'None', 'businext' )            => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Gradient Color', 'businext' )  => 'gradient',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'        => '',
		),

		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Background Color', 'businext' ),
			'type'       => 'colorpicker',
			'param_name' => 'custom_background_color',
			'dependency' => array(
				'element' => 'background_color',
				'value'   => array( 'custom' ),
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Gradient', 'businext' ),
			'type'       => 'gradient',
			'param_name' => 'background_gradient',
			'dependency' => array(
				'element' => 'background_color',
				'value'   => array( 'gradient' ),
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'background_image',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Repeat', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'background_repeat',
			'value'      => array(
				esc_html__( 'No repeat', 'businext' )         => 'no-repeat',
				esc_html__( 'Tile', 'businext' )              => 'repeat',
				esc_html__( 'Tile Horizontally', 'businext' ) => 'repeat-x',
				esc_html__( 'Tile Vertically', 'businext' )   => 'repeat-y',
			),
			'std'        => 'no-repeat',
			'dependency' => array(
				'element'   => 'background_image',
				'not_empty' => true,
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Size', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'background_size',
			'value'      => array(
				esc_html__( 'Auto', 'businext' )    => 'auto',
				esc_html__( 'Cover', 'businext' )   => 'cover',
				esc_html__( 'Contain', 'businext' ) => 'contain',
			),
			'std'        => 'cover',
			'dependency' => array(
				'element'   => 'background_image',
				'not_empty' => true,
			),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Background Position', 'businext' ),
			'description' => esc_html__( 'Ex: left center', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'background_position',
			'dependency'  => array(
				'element'   => 'background_image',
				'not_empty' => true,
			),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Background Overlay', 'businext' ),
			'description' => esc_html__( 'Choose an overlay background color.', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'overlay_background',
			'value'       => array(
				esc_html__( 'None', 'businext' )          => '',
				esc_html__( 'Primary Color', 'businext' ) => 'primary',
				esc_html__( 'Custom Color', 'businext' )  => 'overlay_custom_background',
			),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Custom Background Overlay', 'businext' ),
			'description' => esc_html__( 'Choose an custom background color overlay.', 'businext' ),
			'type'        => 'colorpicker',
			'param_name'  => 'overlay_custom_background',
			'std'         => '#000000',
			'dependency'  => array(
				'element' => 'overlay_background',
				'value'   => array( 'overlay_custom_background' ),
			),
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Opacity', 'businext' ),
			'type'       => 'number',
			'param_name' => 'overlay_opacity',
			'value'      => 100,
			'min'        => 0,
			'max'        => 100,
			'step'       => 1,
			'suffix'     => '%',
			'std'        => 80,
			'dependency' => array(
				'element'   => 'overlay_background',
				'not_empty' => true,
			),
		),
	), Businext_VC::get_vc_spacing_tab(), Businext_VC::get_custom_style_tab() ),

) );

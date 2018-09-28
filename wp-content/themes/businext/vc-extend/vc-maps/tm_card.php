<?php

class WPBakeryShortCode_TM_Card extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

		$tmp = Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['background_color'], $atts['custom_background_color'], $atts['background_gradient'] );

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

		if ( $atts['overlay_background'] !== '' ) {
			$businext_shortcode_lg_css .= "$selector .overlay{ background: {$atts['overlay_background']}; }";
		}

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector{ $tmp }";
		}

		if ( $atts['heading_color'] === 'custom' ) {
			$businext_shortcode_lg_css .= "$selector .heading {  color: {$atts['custom_heading_color']}; }";
		}

		if ( $atts['text_color'] === 'custom' ) {
			$businext_shortcode_lg_css .= "$selector .content-wrap {  color: {$atts['custom_text_color']}; }";
		}

		if ( $atts['icon_color'] === 'custom' ) {
			$businext_shortcode_lg_css .= "$selector .icon { color: {$atts['custom_icon_color']}; }";
		}

		if ( $atts['icon_bg_color'] === 'custom' ) {
			if ( $atts['style'] === '2' ) {
				$businext_shortcode_lg_css .= "$selector .icon:before { background-color: {$atts['custom_icon_bg_color']}; }";
			}
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
	'name'                      => esc_html__( 'Card', 'businext' ),
	'base'                      => 'tm_card',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-icons',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '1',
				esc_html__( 'Style 02', 'businext' ) => '2',
			),
			'admin_label' => true,
			'std'         => '1',
		),
	), Businext_VC::get_alignment_fields(), Businext_VC::icon_libraries( array(
		'group'      => $content_tab,
		'allow_none' => true,
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
			'heading'    => esc_html__( 'Phone Number', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'phone_number',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Text', 'businext' ),
			'type'       => 'textarea',
			'param_name' => 'text',
		),
		array(
			'group'      => $content_tab,
			'heading'    => esc_html__( 'Card List', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'list',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Item Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Item Sub Title', 'businext' ),
					'type'       => 'textarea',
					'param_name' => 'sub_title',
				),
			),
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Heading Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'heading_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' ) => '',
				esc_html__( 'Custom Color', 'businext' )  => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Heading Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_heading_color',
			'dependency'       => array(
				'element' => 'heading_color',
				'value'   => array( 'custom' ),
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
				esc_html__( 'Default Color', 'businext' ) => '',
				esc_html__( 'Custom Color', 'businext' )  => 'custom',
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
			'heading'          => esc_html__( 'Icon Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' ) => '',
				esc_html__( 'Custom Color', 'businext' )  => 'custom',
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
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Icon Background Color', 'businext' ),
			'type'             => 'dropdown',
			'param_name'       => 'icon_bg_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' ) => '',
				esc_html__( 'Custom Color', 'businext' )  => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'heading'          => esc_html__( 'Custom Icon Background Color', 'businext' ),
			'type'             => 'colorpicker',
			'param_name'       => 'custom_icon_bg_color',
			'dependency'       => array(
				'element' => 'icon_bg_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Color', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'background_color',
			'value'      => array(
				esc_html__( 'Default Color', 'businext' )   => '',
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
			'type'        => 'colorpicker',
			'param_name'  => 'overlay_background',
			'dependency'  => array(
				'element'   => 'background_image',
				'not_empty' => true,
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),

) );

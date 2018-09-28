<?php

class WPBakeryShortCode_TM_Button extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

		$wrapper_tmp     = '';
		$button_tmp      = $button_hover_tmp = '';
		$button_icon_tmp = $button_hover_icon_tmp = '';

		if ( $atts['align'] !== '' ) {
			$wrapper_tmp .= "text-align: {$atts['align']};";
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

		if ( $atts['rounded'] !== '' ) {
			$button_tmp .= Businext_Helper::get_css_prefix( 'border-radius', $atts['rounded'] );
		}

		if ( $atts['size'] === 'custom' ) {
			if ( $atts['width'] !== '' ) {
				$button_tmp .= "min-width: {$atts['width']}px;";
			}

			if ( $atts['border_width'] !== '' ) {
				$button_tmp .= "border-width: {$atts['border_width']}px;";
			}

			if ( $atts['height'] !== '' ) {
				$button_tmp   .= "min-height: {$atts['height']}px;";
				$_line_height = $atts['height'];
				if ( $atts['border_width'] !== '' ) {
					$_line_height = $_line_height - ( $atts['border_width'] * 2 );
				}

				$button_tmp .= "line-height: {$_line_height}px;";
			}
		}

		if ( isset( $atts['icon_font_size'] ) ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .button-icon",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['icon_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		if ( isset( $atts['text_font_size'] ) ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .button-text",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $atts['text_font_size'],
						'unit'      => 'px',
					),
				),
			) );
		}

		$font_color       = $border_color = $bg_color = '';
		$font_hover_color = $border_hover_color = $bg_hover_color = '';
		$icon_color       = $icon_hover_color = '';

		if ( $atts['color'] === 'custom' ) {


			$font_color         .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['font_color'], $atts['custom_font_color'] );
			$border_color       .= Businext_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['button_border_color'], $atts['custom_button_border_color'] );
			$bg_color           .= Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['button_bg_color'], $atts['custom_button_bg_color'], $atts['button_bg_gradient'] );
			$font_hover_color   .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['font_color_hover'], $atts['custom_font_color_hover'] );
			$border_hover_color .= Businext_Helper::get_shortcode_css_color_inherit( 'border-color', $atts['button_border_color_hover'], $atts['custom_button_border_color_hover'] );
			$bg_hover_color     .= Businext_Helper::get_shortcode_css_color_inherit( 'background-color', $atts['button_bg_color_hover'], $atts['custom_button_bg_color_hover'], $atts['button_bg_gradient_hover'] );
			$icon_color         .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_icon_color'], $atts['custom_button_icon_color'] );
			$icon_hover_color   .= Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['button_icon_color_hover'], $atts['custom_button_icon_color_hover'] );

			$button_tmp            .= $font_color . $border_color . $bg_color;
			$button_hover_tmp      .= $font_hover_color . $border_hover_color . $bg_hover_color;
			$button_icon_tmp       .= $icon_color;
			$button_hover_icon_tmp .= $icon_hover_color;
		}

		if ( $wrapper_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector { $wrapper_tmp }";
		}

		if ( $button_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tm-button{ $button_tmp }";

			if ( $atts['style'] === 'border-text-02' ) {
				if ( $border_color !== '' ) {
					$businext_shortcode_lg_css .= "$selector .tm-button:before{ $border_color }";
				}

			} elseif ( $atts['style'] === 'border-icon' ) {
				$businext_shortcode_lg_css .= "$selector .tm-button .button-icon {{$border_color}}";
			}
		}

		if ( $button_hover_tmp !== '' ) {
			if ( $atts['style'] === 'text' ) {
				$businext_shortcode_lg_css .= "$selector .tm-button:hover span { $button_hover_tmp }";
			} elseif ( $atts['style'] === 'border-text-02' ) {
				$businext_shortcode_lg_css .= "$selector .tm-button:hover { $button_hover_tmp }";

				if ( $border_hover_color !== '' ) {
					$businext_shortcode_lg_css .= "$selector .tm-button:after{ $border_hover_color }";
				}
			} elseif ( $atts['style'] === 'modern' ) {
				$businext_shortcode_lg_css .= "$selector .tm-button:after { $bg_hover_color }";

				$businext_shortcode_lg_css .= "$selector .tm-button:hover {{$font_hover_color} {$border_hover_color}}";
			} elseif ( $atts['style'] === 'border-icon' ) {
				$businext_shortcode_lg_css .= "$selector .tm-button:after { $bg_hover_color }";

				$businext_shortcode_lg_css .= "$selector .tm-button:hover {{$font_hover_color} {$border_hover_color}}";
				$businext_shortcode_lg_css .= "$selector .tm-button:hover .button-icon {{$border_hover_color}}";
			} else {
				$businext_shortcode_lg_css .= "$selector .tm-button:hover { $button_hover_tmp }";
			}
		}

		if ( $button_icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tm-button .button-icon { $button_icon_tmp }";
		}

		if ( $button_hover_icon_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .tm-button:hover .button-icon { $button_hover_icon_tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'     => esc_html__( 'Button', 'businext' ),
	'base'     => 'tm_button',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-button',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Modern', 'businext' )         => 'modern',
				esc_html__( 'Border Icon', 'businext' )    => 'border-icon',
				esc_html__( 'Flat', 'businext' )           => 'flat',
				esc_html__( 'Outline', 'businext' )        => 'outline',
				esc_html__( 'Text', 'businext' )           => 'text',
				esc_html__( 'Border Text', 'businext' )    => 'border-text',
				esc_html__( 'Border Text 02', 'businext' ) => 'border-text-02',
				esc_html__( 'Border Text 03', 'businext' ) => 'border-text-03',
				esc_html__( 'Image Text', 'businext' )     => 'image-text',
			),
			'std'         => 'flat',
		),
		array(
			'heading'    => esc_html__( 'Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
			'dependency' => array( 'element' => 'style', 'value' => 'image-text' ),
		),
		array(
			'heading'     => esc_html__( 'Size', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'size',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Large', 'businext' )       => 'lg',
				esc_html__( 'Normal', 'businext' )      => 'nm',
				esc_html__( 'Small', 'businext' )       => 'sm',
				esc_html__( 'Extra Small', 'businext' ) => 'xs',
				esc_html__( 'Custom', 'businext' )      => 'custom',
			),
			'std'         => 'nm',
		),
		array(
			'heading'     => esc_html__( 'Width', 'businext' ),
			'description' => esc_html__( 'Controls the width of button.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'width',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Height', 'businext' ),
			'description' => esc_html__( 'Controls the height of button.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'height',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Border Width', 'businext' ),
			'description' => esc_html__( 'Controls the border width of button.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'px',
			'param_name'  => 'border_width',
			'dependency'  => array( 'element' => 'size', 'value' => 'custom' ),
		),
		array(
			'heading'     => esc_html__( 'Force Full Width', 'businext' ),
			'description' => esc_html__( 'Make button full wide.', 'businext' ),
			'type'        => 'checkbox',
			'param_name'  => 'full_wide',
			'value'       => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'heading'     => esc_html__( 'Rounded', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'rounded',
			'description' => esc_html__( 'Input a valid radius. Fox Ex: 10px. Leave blank to use default.', 'businext' ),
		),
		array(
			'heading'    => esc_html__( 'Button', 'businext' ),
			'type'       => 'vc_link',
			'param_name' => 'button',
			'value'      => esc_html__( 'Button', 'businext' ),
		),
		array(
			'group'      => esc_html__( 'Icon', 'businext' ),
			'heading'    => esc_html__( 'Icon Align', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'icon_align',
			'value'      => array(
				esc_html__( 'Left', 'businext' )  => 'left',
				esc_html__( 'Right', 'businext' ) => 'right',
			),
			'std'        => 'right',
		),
		array(
			'heading'     => esc_html__( 'Button Action', 'businext' ),
			'description' => esc_html__( 'To make smooth scroll action work then input button url like this: #about-us-section. )', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'action',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'businext' )                    => '',
				esc_html__( 'Smooth scroll to a section', 'businext' ) => 'smooth_scroll',
				esc_html__( 'Open link as popup video', 'businext' )   => 'popup_video',

			),
			'std'         => '',
		),
		array(
			'heading'     => esc_html__( 'Hover Animation', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'hover_animation',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Icon Move', 'businext' ) => 'icon-move',
				esc_html__( 'Move Up', 'businext' )   => 'move-up',
			),
			'std'         => '',
		),
	), Businext_VC::get_alignment_fields(), array(
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		Businext_VC::extra_id_field(),
	), Businext_VC::icon_libraries( array(
		'allow_none' => true,
	) ), array(
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
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Text Font Size', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'text_font_size',
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
			'group'       => $styling_tab,
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Color', 'businext' ),
			'param_name'  => 'color',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Grey', 'businext' )      => 'grey',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'         => 'primary',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background color', 'businext' ),
			'param_name'       => 'button_bg_color',
			'value'            => array(
				esc_html__( 'Default', 'businext' )     => '',
				esc_html__( 'Primary', 'businext' )     => 'primary',
				esc_html__( 'Secondary', 'businext' )   => 'secondary',
				esc_html__( 'Gradient', 'businext' )    => 'gradient',
				esc_html__( 'Transparent', 'businext' ) => 'transparent',
				esc_html__( 'Custom', 'businext' )      => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom background color', 'businext' ),
			'param_name'       => 'custom_button_bg_color',
			'dependency'       => array(
				'element' => 'button_bg_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Gradient', 'businext' ),
			'type'       => 'gradient',
			'param_name' => 'button_bg_gradient',
			'dependency' => array(
				'element' => 'button_bg_color',
				'value'   => array( 'gradient' ),
			),
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text color', 'businext' ),
			'param_name'       => 'font_color',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom text color', 'businext' ),
			'param_name'       => 'custom_font_color',
			'dependency'       => array(
				'element' => 'font_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Border color', 'businext' ),
			'param_name'       => 'button_border_color',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Border color', 'businext' ),
			'param_name'       => 'custom_button_border_color',
			'dependency'       => array(
				'element' => 'button_border_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon color', 'businext' ),
			'param_name'       => 'button_icon_color',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon color', 'businext' ),
			'param_name'       => 'custom_button_icon_color',
			'dependency'       => array(
				'element' => 'button_icon_color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Background color (on hover)', 'businext' ),
			'param_name'       => 'button_bg_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'businext' )     => '',
				esc_html__( 'Primary', 'businext' )     => 'primary',
				esc_html__( 'Secondary', 'businext' )   => 'secondary',
				esc_html__( 'Gradient', 'businext' )    => 'gradient',
				esc_html__( 'Transparent', 'businext' ) => 'transparent',
				esc_html__( 'Custom', 'businext' )      => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom background color (on hover)', 'businext' ),
			'param_name'       => 'custom_button_bg_color_hover',
			'dependency'       => array(
				'element' => 'button_bg_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Background Gradient (on hover)', 'businext' ),
			'type'       => 'gradient',
			'param_name' => 'button_bg_gradient_hover',
			'dependency' => array(
				'element' => 'button_bg_color_hover',
				'value'   => array( 'gradient' ),
			),
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text color (on hover)', 'businext' ),
			'param_name'       => 'font_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text color (on hover)', 'businext' ),
			'param_name'       => 'custom_font_color_hover',
			'dependency'       => array(
				'element' => 'font_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Border color (on hover)', 'businext' ),
			'param_name'       => 'button_border_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Border color (on hover)', 'businext' ),
			'param_name'       => 'custom_button_border_color_hover',
			'dependency'       => array(
				'element' => 'button_border_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Icon color (on hover)', 'businext' ),
			'param_name'       => 'button_icon_color_hover',
			'value'            => array(
				esc_html__( 'Default', 'businext' )   => '',
				esc_html__( 'Primary', 'businext' )   => 'primary',
				esc_html__( 'Secondary', 'businext' ) => 'secondary',
				esc_html__( 'Custom', 'businext' )    => 'custom',
			),
			'std'              => 'default',
			'dependency'       => array(
				'element' => 'color',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_tab,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Icon color (on hover)', 'businext' ),
			'param_name'       => 'custom_button_icon_color_hover',
			'dependency'       => array(
				'element' => 'button_icon_color_hover',
				'value'   => 'custom',
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
	),

		Businext_VC::get_vc_spacing_tab() ),
) );

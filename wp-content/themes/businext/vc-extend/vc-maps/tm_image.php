<?php

class WPBakeryShortCode_TM_Image extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;
		$tmp = $image_tmp = '';

		$tmp .= "text-align: {$atts['align']}";

		if ( $tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector{ $tmp }";
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
			$image_tmp .= Businext_Helper::get_css_prefix( 'border-radius', "{$atts['rounded']}px" );
		}

		if ( $atts['box_shadow'] !== '' ) {
			$image_tmp .= Businext_Helper::get_css_prefix( 'box-shadow', $atts['box_shadow'] );
		}

		if ( $atts['full_wide'] === '1' ) {
			$image_tmp .= "width: 100%;";
		}

		if ( $image_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector img { $image_tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Single Image', 'businext' ),
	'base'                      => 'tm_image',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-singleimage',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'    => esc_html__( 'Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'image',
		),
		array(
			'heading'     => esc_html__( 'Image Size', 'businext' ),
			'description' => esc_html__( 'Controls the size of image.', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'image_size',
			'value'       => array(
				esc_html__( 'Full', 'businext' )   => 'full',
				esc_html__( 'Custom', 'businext' ) => 'custom',
			),
			'std'         => 'full',
		),
		array(
			'heading'          => esc_html__( 'Image Width', 'businext' ),
			'type'             => 'number',
			'param_name'       => 'image_size_width',
			'min'              => 0,
			'max'              => 1920,
			'step'             => 10,
			'suffix'           => 'px',
			'dependency'       => array(
				'element' => 'image_size',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'heading'          => esc_html__( 'Image Height', 'businext' ),
			'type'             => 'number',
			'param_name'       => 'image_size_height',
			'min'              => 0,
			'max'              => 1920,
			'step'             => 10,
			'suffix'           => 'px',
			'dependency'       => array(
				'element' => 'image_size',
				'value'   => array( 'custom' ),
			),
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'heading'    => esc_html__( 'On Click Action', 'businext' ),
			'desc'       => esc_html__( 'Select action for click action.', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'action',
			'value'      => array(
				esc_html__( 'None', 'businext' )             => '',
				esc_html__( 'Open Popup', 'businext' )       => 'popup',
				esc_html__( 'Open Custom Link', 'businext' ) => 'custom_link',
				esc_html__( 'Return To Home', 'businext' )   => 'go_to_home',
			),
			'std'        => '',
		),
		array(
			'heading'     => esc_html__( 'Link', 'businext' ),
			'description' => esc_html__( 'Add a link to image.', 'businext' ),
			'type'        => 'vc_link',
			'param_name'  => 'custom_link',
			'dependency'  => array(
				'element' => 'action',
				'value'   => 'custom_link',
			),
		),
		array(
			'heading'     => esc_html__( 'Full wide', 'businext' ),
			'description' => esc_html__( 'Make image fit wide of container', 'businext' ),
			'type'        => 'checkbox',
			'param_name'  => 'full_wide',
			'value'       => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Rounded', 'businext' ),
			'description' => esc_html__( 'Controls the rounded of image', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'rounded',
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Box Shadow', 'businext' ),
			'description' => esc_html__( 'Ex: 0 20px 30px #ccc', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'box_shadow',
		),
	), Businext_VC::get_alignment_fields(), array(
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab() ),

) );

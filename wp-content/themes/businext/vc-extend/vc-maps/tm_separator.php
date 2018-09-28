<?php

class WPBakeryShortCode_TM_Separator extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;
		extract( $atts );

		$wrapper_tmp = '';

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

		if ( $wrapper_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector { $wrapper_tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}

}

vc_map( array(
	'name'     => esc_html__( 'Separator', 'businext' ),
	'base'     => 'tm_separator',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-call-to-action',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Modern Dots', 'businext' )      => 'modern-dots',
				esc_html__( 'Thick Short Line', 'businext' ) => 'thick-short-line',
				esc_html__( 'Single Line', 'businext' )      => 'single-line',
			),
			'std'         => 'thick-short-line',
		),
		array(
			'heading'     => esc_html__( 'Smooth Scroll', 'businext' ),
			'description' => esc_html__( 'Input valid id to smooth scroll to a section on click. ( For Ex: #about-us-section )', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'smooth_scroll',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_alignment_fields(), Businext_VC::get_vc_spacing_tab() ),
) );


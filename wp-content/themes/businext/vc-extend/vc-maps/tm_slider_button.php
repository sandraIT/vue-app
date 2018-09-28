<?php

class WPBakeryShortCode_TM_Slider_Button extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;

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
	'name'                      => esc_html__( 'Slider Button', 'businext' ),
	'base'                      => 'tm_slider_button',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-carousel',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( '01', 'businext' ) => '01',
				esc_html__( '02', 'businext' ) => '02',
			),
			'admin_label' => true,
			'std'         => '01',
		),
		Businext_VC::extra_id_field(),
	), Businext_VC::get_alignment_fields(), Businext_VC::get_vc_spacing_tab() ),
) );

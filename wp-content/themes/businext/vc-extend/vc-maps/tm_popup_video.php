<?php

class WPBakeryShortCode_TM_Popup_Video extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$posters_style = array(
	'poster-01',
	'poster-02',
	'poster-03',
	'poster-04',
	'poster-05',
	'poster-06',
);

vc_map( array(
	'name'                      => esc_html__( 'Popup Video', 'businext' ),
	'base'                      => 'tm_popup_video',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-video',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Poster Style 01', 'businext' ) => 'poster-01',
				esc_html__( 'Poster Style 02', 'businext' ) => 'poster-02',
				esc_html__( 'Poster Style 03', 'businext' ) => 'poster-03',
				esc_html__( 'Poster Style 04', 'businext' ) => 'poster-04',
				esc_html__( 'Poster Style 05', 'businext' ) => 'poster-05',
				esc_html__( 'Poster Style 06', 'businext' ) => 'poster-06',
				esc_html__( 'Button Style 01', 'businext' ) => 'button',
				esc_html__( 'Button Style 02', 'businext' ) => 'button-02',
				esc_html__( 'Button Style 03', 'businext' ) => 'button-03',
				esc_html__( 'Button Style 04', 'businext' ) => 'button-04',
			),
			'std'         => 'poster-01',
		),
		array(
			'heading'     => esc_html__( 'Video Url', 'businext' ),
			'description' => esc_html__( 'Ex: "https://www.youtube.com/watch?v=9No-FiEInLA"', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'video',
		),
		array(
			'heading'    => esc_html__( 'Video Text', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'video_text',
			'std'        => esc_html__( 'Play Video', 'businext' ),
			'dependency' => array(
				'element'            => 'style',
				'value_not_equal_to' => array(
					'poster-02',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Poster Image', 'businext' ),
			'type'       => 'attach_image',
			'param_name' => 'poster',
			'dependency' => array( 'element' => 'style', 'value' => $posters_style ),
		),
		array(
			'heading'     => esc_html__( 'Poster Image Size', 'businext' ),
			'description' => esc_html__( 'Controls the size of poster image.', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'image_size',
			'value'       => array(
				esc_html__( '670x455', 'businext' ) => '670x455',
				esc_html__( '600x420', 'businext' ) => '600x420',
				esc_html__( '570x364', 'businext' ) => '570x364',
				esc_html__( '470x320', 'businext' ) => '470x320',
				esc_html__( 'Full', 'businext' )    => 'full',
				esc_html__( 'Custom', 'businext' )  => 'custom',
			),
			'std'         => '670x455',
			'dependency'  => array( 'element' => 'style', 'value' => $posters_style ),
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
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_vc_spacing_tab(), Businext_VC::get_custom_style_tab() ),
) );

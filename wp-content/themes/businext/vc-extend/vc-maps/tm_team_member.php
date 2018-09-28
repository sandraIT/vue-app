<?php

class WPBakeryShortCode_TM_Team_Member extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'                      => esc_html__( 'Team Member', 'businext' ),
	'base'                      => 'tm_team_member',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'allowed_container_element' => 'vc_row',
	'icon'                      => 'insight-i insight-i-member',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Style', 'businext' ),
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '1', 'businext' ) => '1',
				esc_html__( '2', 'businext' ) => '2',
			),
			'std'         => '1',
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Photo of member', 'businext' ),
			'param_name'  => 'photo',
			'admin_label' => true,
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Photo Effect', 'businext' ),
			'param_name' => 'photo_effect',
			'value'      => array(
				esc_html__( 'None', 'businext' )      => '',
				esc_html__( 'Grayscale', 'businext' ) => 'grayscale',
			),
			'dependency' => array(
				'element' => 'style',
				'value'   => array( '1' ),
			),
			'std'        => '',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Name', 'businext' ),
			'admin_label' => true,
			'param_name'  => 'name',
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Position', 'businext' ),
			'param_name'  => 'position',
			'description' => esc_html__( 'Example: CEO/Founder', 'businext' ),
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Description', 'businext' ),
			'param_name' => 'desc',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Profile url', 'businext' ),
			'param_name' => 'profile',
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Social Networks', 'businext' ),
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Social Networks', 'businext' ),
			'param_name' => 'social_networks',
			'params'     => array_merge( Businext_VC::icon_libraries( array( 'allow_none' => true ) ), array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Link', 'businext' ),
					'param_name'  => 'link',
					'admin_label' => true,
				),
			) ),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-twitter',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-facebook',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-googleplus',
				),
				array(
					'link'      => '#',
					'icon_type' => 'ion',
					'icon_ion'  => 'ion-social-linkedin',
				),
			) ) ),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

<?php

class WPBakeryShortCode_TM_Contact_Form_7 extends WPBakeryShortCode {

}

/**
 * Add Shortcode To Visual Composer
 */
$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

$contact_forms = array();
if ( $cf7 ) {
	foreach ( $cf7 as $cform ) {
		$contact_forms[ $cform->post_title ] = $cform->ID;
	}
} else {
	$contact_forms[ esc_html__( 'No contact forms found', 'businext' ) ] = 0;
}

vc_map( array(
	'name'                      => esc_html__( 'Contact Form 7', 'businext' ),
	'base'                      => 'tm_contact_form_7',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-contact-form-7',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Form', 'businext' ),
			'param_name'  => 'id',
			'value'       => $contact_forms,
			'save_always' => true,
			'admin_label' => true,
			'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'businext' ),
		),
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( '01', 'businext' ) => '01',
				esc_html__( '02', 'businext' ) => '02',
				esc_html__( '03', 'businext' ) => '03',
				esc_html__( '04', 'businext' ) => '04',
				esc_html__( '05', 'businext' ) => '05',
				esc_html__( '06', 'businext' ) => '06',
				esc_html__( '07', 'businext' ) => '07',
			),
			'std'         => '01',
		),
		array(
			'heading'     => esc_html__( 'Form Box Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'wrap_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'None', 'businext' ) => '',
				esc_html__( '01', 'businext' )   => '01',
				esc_html__( '02', 'businext' )   => '02',
			),
			'std'         => '',
		),
		Businext_VC::extra_class_field(),
	), Businext_VC::get_custom_style_tab() ),
) );

<?php
add_filter( 'vc_autocomplete_tm_service_feature_items_page_callback', 'businext_tm_service_feature_page_field_callback', 10, 1 );

add_filter( 'vc_autocomplete_tm_service_feature_items_page_render', 'businext_tm_service_feature_page_field_render', 10, 1 );

function businext_tm_service_feature_page_field_render( $term ) {
	$args = array(
		'post_type'      => 'service',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		'name'           => $term['value'],
	);

	$query = new WP_Query( $args );
	$data  = false;
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) :
			$query->the_post();
			global $post;

			$data = array(
				'label' => get_the_title(),
				'value' => $post->post_name,
			);
		endwhile;
	}

	return $data;
}

function businext_tm_service_feature_page_field_callback( $search_string ) {
	$data = array();
	$args = array(
		'post_type'      => 'service',
		'posts_per_page' => - 1,
		'post_status'    => 'publish',
		's'              => $search_string,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) :
			$query->the_post();
			global $post;

			$data[] = array(
				'label' => get_the_title(),
				'value' => $post->post_name,
			);
		endwhile;
	}

	return $data;
}

class WPBakeryShortCode_TM_Service_Feature extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Service Feature', 'businext' ),
	'base'     => 'tm_service_feature',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-portfoliogrid',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Style 01', 'businext' ) => '01',
			),
			'std'         => '01',
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array_merge( array(
				array(
					'heading'     => esc_html__( 'Service Page', 'businext' ),
					'type'        => 'autocomplete',
					'param_name'  => 'page',
					'admin_label' => true,
				),
			), Businext_VC::icon_libraries_no_depend() ),
		),
	), Businext_VC::get_vc_spacing_tab(), Businext_VC::get_custom_style_tab() ),
) );


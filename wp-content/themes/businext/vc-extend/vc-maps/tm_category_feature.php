<?php
add_filter( 'vc_autocomplete_tm_category_feature_items_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Category_Feature',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_category_feature_items_taxonomies_render', array(
	Businext_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Category_Feature extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	public static function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Businext_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'post' );

		return $data;
	}

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Blog Category Feature', 'businext' ),
	'base'     => 'tm_category_feature',
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
					'group'              => esc_html__( 'Data Settings', 'businext' ),
					'heading'            => esc_html__( 'Narrow data source', 'businext' ),
					'description'        => esc_html__( 'Enter categories, tags or custom taxonomies.', 'businext' ),
					'type'               => 'autocomplete',
					'param_name'         => 'taxonomies',
					'settings'           => array(
						'min_length'     => 1,
						'groups'         => true,
						// In UI show results grouped by groups, default false.
						'unique_values'  => true,
						// In UI show results except selected. NB! You should manually check values in backend, default false.
						'display_inline' => true,
						// In UI show results inline view, default false (each value in own line).
						'delay'          => 500,
						// delay for search. default 500.
						'auto_focus'     => true,
						// auto focus input, default true.
					),
					'param_holder_class' => 'vc_not-for-custom',
				),
			), Businext_VC::icon_libraries( array( 'group' => '' ) ) ),
		),
	), Businext_VC::get_vc_spacing_tab(), Businext_VC::get_custom_style_tab() ),
) );


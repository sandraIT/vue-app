<?php

add_filter( 'vc_autocomplete_tm_testimonial_list_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Testimonial_List',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_testimonial_list_taxonomies_render', array(
	Businext_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Testimonial_List extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	public static function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Businext_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'testimonial' );

		return $data;
	}

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;

		$text_tmp    = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['text_color'], $atts['custom_text_color'] );
		$name_tmp    = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['name_color'], $atts['custom_name_color'] );
		$by_line_tmp = Businext_Helper::get_shortcode_css_color_inherit( 'color', $atts['by_line_color'], $atts['custom_by_line_color'] );

		if ( $text_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .testimonial-desc { $text_tmp }";
		}

		if ( $name_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .testimonial-name { $name_tmp }";
		}

		if ( $by_line_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .testimonial-by-line { $by_line_tmp }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_group = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'                      => esc_html__( 'Testimonials', 'businext' ),
	'base'                      => 'tm_testimonial_list',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-testimonials',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
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
			'group'       => esc_html__( 'Data Settings', 'businext' ),
			'heading'     => esc_html__( 'Number', 'businext' ),
			'description' => esc_html__( 'Number of items to show.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'number',
			'std'         => 9,
			'min'         => 1,
			'max'         => 100,
			'step'        => 1,
		),
		array(
			'group'              => esc_html__( 'Data Settings', 'businext' ),
			'heading'            => esc_html__( 'Narrow data source', 'businext' ),
			'description'        => esc_html__( 'Enter categories, tags or custom taxonomies.', 'businext' ),
			'type'               => 'autocomplete',
			'param_name'         => 'taxonomies',
			'settings'           => array(
				'multiple'       => true,
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
		array(
			'group'       => esc_html__( 'Data Settings', 'businext' ),
			'heading'     => esc_html__( 'Order by', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'orderby',
			'value'       => array(
				esc_html__( 'Date', 'businext' )                  => 'date',
				esc_html__( 'Post ID', 'businext' )               => 'ID',
				esc_html__( 'Author', 'businext' )                => 'author',
				esc_html__( 'Title', 'businext' )                 => 'title',
				esc_html__( 'Last modified date', 'businext' )    => 'modified',
				esc_html__( 'Post/page parent ID', 'businext' )   => 'parent',
				esc_html__( 'Number of comments', 'businext' )    => 'comment_count',
				esc_html__( 'Menu order/Page Order', 'businext' ) => 'menu_order',
				esc_html__( 'Meta value', 'businext' )            => 'meta_value',
				esc_html__( 'Meta value number', 'businext' )     => 'meta_value_num',
				esc_html__( 'Random order', 'businext' )          => 'rand',
			),
			'description' => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'businext' ),
			'std'         => 'date',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'businext' ),
			'heading'     => esc_html__( 'Sort order', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Descending', 'businext' ) => 'DESC',
				esc_html__( 'Ascending', 'businext' )  => 'ASC',
			),
			'description' => esc_html__( 'Select sorting order.', 'businext' ),
			'std'         => 'DESC',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'businext' ),
			'heading'     => esc_html__( 'Meta key', 'businext' ),
			'description' => esc_html__( 'Input meta key for grid ordering.', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'meta_key',
			'dependency'  => array(
				'element' => 'orderby',
				'value'   => array(
					'meta_value',
					'meta_value_num',
				),
			),
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Text Color', 'businext' ),
			'param_name'       => 'text_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Text Color', 'businext' ),
			'param_name'       => 'custom_text_color',
			'dependency'       => array(
				'element' => 'text_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'Name Color', 'businext' ),
			'param_name'       => 'name_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom Name Color', 'businext' ),
			'param_name'       => 'custom_name_color',
			'dependency'       => array(
				'element' => 'name_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'dropdown',
			'heading'          => esc_html__( 'By Line Color', 'businext' ),
			'param_name'       => 'by_line_color',
			'value'            => array(
				esc_html__( 'Default Color', 'businext' )   => '',
				esc_html__( 'Primary Color', 'businext' )   => 'primary',
				esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
				esc_html__( 'Custom Color', 'businext' )    => 'custom',
			),
			'std'              => '',
			'edit_field_class' => 'vc_col-sm-6 col-break',
		),
		array(
			'group'            => $styling_group,
			'type'             => 'colorpicker',
			'heading'          => esc_html__( 'Custom By Line Color', 'businext' ),
			'param_name'       => 'custom_by_line_color',
			'dependency'       => array(
				'element' => 'by_line_color',
				'value'   => array( 'custom' ),
			),
			'std'              => '#fff',
			'edit_field_class' => 'vc_col-sm-6',
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

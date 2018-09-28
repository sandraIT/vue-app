<?php

add_filter( 'vc_autocomplete_tm_blog_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Blog',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_blog_taxonomies_render', array(
	Businext_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Blog extends WPBakeryShortCode {

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
		$style = isset( $atts['style'] ) ? $atts['style'] : '';

		if ( in_array( $style, array(
			'grid_classic_01',
			'grid_classic_02',
			'grid_classic_03',
			'grid_classic_04',
			'grid_classic_05',
			'metro',
		), true ) ) {
			$atts['row_gutter'] = $atts['gutter'];

			Businext_VC::get_grid_css( $selector, $atts );
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_tab = esc_html__( 'Carousel Settings', 'businext' );

vc_map( array(
	'name'     => esc_html__( 'Blog', 'businext' ),
	'base'     => 'tm_blog',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-blog',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Blog Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'List Large Image', 'businext' )   => 'list',
				esc_html__( 'Grid Classic 01', 'businext' )    => 'grid_classic_01',
				esc_html__( 'Grid Classic 02', 'businext' )    => 'grid_classic_02',
				esc_html__( 'Grid Classic 03', 'businext' )    => 'grid_classic_03',
				esc_html__( 'Grid Classic 04', 'businext' )    => 'grid_classic_04',
				esc_html__( 'Grid Classic 05', 'businext' )    => 'grid_classic_05',
				esc_html__( 'Grid Metro', 'businext' )         => 'metro',
				esc_html__( 'Carousel Slider', 'businext' )    => 'carousel',
				esc_html__( 'Carousel Slider 02', 'businext' ) => 'carousel_02',
			),
			'std'         => 'list',
		),
		array(
			'heading'    => esc_html__( 'Metro Layout', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'metro_layout',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Item Size', 'businext' ),
					'type'        => 'dropdown',
					'param_name'  => 'size',
					'admin_label' => true,
					'value'       => array(
						esc_html__( 'Width 1 - Height 1', 'businext' ) => '1:1',
						esc_html__( 'Width 1 - Height 2', 'businext' ) => '1:2',
						esc_html__( 'Width 2 - Height 1', 'businext' ) => '2:1',
						esc_html__( 'Width 2 - Height 2', 'businext' ) => '2:2',
					),
					'std'         => '1:1',
				),
			),
			'value'      => rawurlencode( wp_json_encode( array(
				array(
					'size' => '2:2',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '2:2',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
			) ) ),
			'dependency' => array(
				'element' => 'style',
				'value'   => array( 'metro' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'columns',
			'min'         => 1,
			'max'         => 6,
			'step'        => 1,
			'suffix'      => '',
			'media_query' => array(
				'lg' => '3',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'grid_classic_01',
					'grid_classic_02',
					'grid_classic_03',
					'grid_classic_04',
					'grid_classic_05',
					'metro',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Grid Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid. Default 30px', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'grid_classic_01',
					'grid_classic_02',
					'grid_classic_03',
					'grid_classic_04',
					'grid_classic_05',
					'metro',
				),
			),
		),
		Businext_VC::get_animation_field(),
		Businext_VC::extra_class_field(),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Auto Play', 'businext' ),
			'description' => esc_html__( 'Delay between transitions (in ms), ex: 3000. Leave blank to disabled.', 'businext' ),
			'type'        => 'number',
			'suffix'      => 'ms',
			'param_name'  => 'carousel_auto_play',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Loop', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'carousel_loop',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
			'std'        => '1',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Navigation', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_nav',
			'value'      => Businext_VC::get_slider_navs(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		Businext_VC::extra_id_field( array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Slider Button ID', 'businext' ),
			'param_name' => 'slider_button_id',
			'dependency' => array(
				'element' => 'carousel_nav',
				'value'   => array(
					'custom',
				),
			),
		) ),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Pagination', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'carousel_pagination',
			'value'      => Businext_VC::get_slider_dots(),
			'std'        => '',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		array(
			'group'       => $carousel_tab,
			'heading'     => esc_html__( 'Items Display', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'carousel_items_display',
			'min'         => 1,
			'max'         => 10,
			'suffix'      => 'item (s)',
			'media_query' => array(
				'lg' => 3,
				'md' => 3,
				'sm' => 2,
				'xs' => 1,
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		array(
			'group'      => $carousel_tab,
			'heading'    => esc_html__( 'Gutter', 'businext' ),
			'type'       => 'number',
			'param_name' => 'carousel_gutter',
			'std'        => 30,
			'min'        => 0,
			'max'        => 50,
			'step'       => 1,
			'suffix'     => 'px',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'carousel',
					'carousel_02',
				),
			),
		),
		array(
			'group'      => esc_html__( 'Data Settings', 'businext' ),
			'type'       => 'hidden',
			'param_name' => 'main_query',
			'std'        => '',
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'businext' ),
			'heading'     => esc_html__( 'Items per page', 'businext' ),
			'description' => esc_html__( 'Number of items to show per page.', 'businext' ),
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
	), Businext_VC::get_grid_filter_fields(), Businext_VC::get_grid_pagination_fields(), Businext_VC::get_vc_spacing_tab(), Businext_VC::get_custom_style_tab() ),
) );

<?php

add_filter( 'vc_autocomplete_tm_product_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Product',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_product_taxonomies_render', array(
	Businext_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Product extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Businext_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'product' );

		return $data;
	}

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_grid_css( $selector, $atts );

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Product', 'businext' ),
	'base'     => 'tm_product',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-product',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Product Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid', 'businext' ) => 'grid',
			),
			'std'         => 'grid',
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
				'lg' => '4',
				'md' => '',
				'sm' => '2',
				'xs' => '1',
			),
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'grid' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Columns Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid columns.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		array(
			'heading'     => esc_html__( 'Rows Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid rows.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'row_gutter',
			'std'         => 30,
			'min'         => 0,
			'max'         => 100,
			'step'        => 1,
			'suffix'      => 'px',
		),
		Businext_VC::get_animation_field( array( 'std' => 'move-up' ) ),
		Businext_VC::extra_class_field(),
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
			'std'         => 12,
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
			'group'      => esc_html__( 'Filter', 'businext' ),
			'heading'    => esc_html__( 'Filter Enable', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'filter_enable',
			'value'      => array( esc_html__( 'Enable', 'businext' ) => '1' ),
		),
		array(
			'group'      => esc_html__( 'Filter', 'businext' ),
			'heading'    => esc_html__( 'Filter Counter', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'filter_counter',
			'value'      => array( esc_html__( 'Enable', 'businext' ) => '1' ),
		),
		array(
			'group'       => esc_html__( 'Filter', 'businext' ),
			'heading'     => esc_html__( 'Filter Grid Wrapper', 'businext' ),
			'description' => esc_html__( 'Wrap filter into grid container.', 'businext' ),
			'type'        => 'checkbox',
			'param_name'  => 'filter_wrap',
			'value'       => array( esc_html__( 'Enable', 'businext' ) => '1' ),
		),
		array(
			'group'      => esc_html__( 'Filter', 'businext' ),
			'heading'    => esc_html__( 'Filter Align', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'filter_align',
			'value'      => array(
				esc_html__( 'Left', 'businext' )   => 'left',
				esc_html__( 'Center', 'businext' ) => 'center',
				esc_html__( 'Right', 'businext' )  => 'right',
			),
			'std'        => 'center',
		),
		array(
			'group'      => esc_html__( 'Pagination', 'businext' ),
			'heading'    => esc_html__( 'Pagination', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination',
			'value'      => array(
				esc_html__( 'No Pagination', 'businext' ) => '',
				esc_html__( 'Pagination', 'businext' )    => 'pagination',
				esc_html__( 'Button', 'businext' )        => 'loadmore',
				esc_html__( 'Custom Button', 'businext' ) => 'loadmore_alt',
				esc_html__( 'Infinite', 'businext' )      => 'infinite',
			),
			'std'        => '',
		),
		array(
			'group'      => esc_html__( 'Pagination', 'businext' ),
			'heading'    => esc_html__( 'Pagination Align', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'pagination_align',
			'value'      => array(
				esc_html__( 'Left', 'businext' )   => 'left',
				esc_html__( 'Center', 'businext' ) => 'center',
				esc_html__( 'Right', 'businext' )  => 'right',
			),
			'std'        => 'left',
			'dependency' => array(
				'element' => 'pagination',
				'value'   => array( 'pagination', 'infinite', 'loadmore', 'loadmore_alt' ),
			),
		),
		array(
			'group'       => esc_html__( 'Pagination', 'businext' ),
			'heading'     => esc_html__( 'Button ID', 'businext' ),
			'description' => esc_html__( 'Input id of custom button to load more posts when click. For EX: #product-load-more-btn', 'businext' ),
			'type'        => 'el_id',
			'param_name'  => 'pagination_custom_button_id',
			'dependency'  => array(
				'element' => 'pagination',
				'value'   => 'loadmore_alt',
			),
		),
		array(
			'group'      => esc_html__( 'Pagination', 'businext' ),
			'heading'    => esc_html__( 'Pagination Button Text', 'businext' ),
			'type'       => 'textfield',
			'param_name' => 'pagination_button_text',
			'std'        => esc_html__( 'Load More', 'businext' ),
			'dependency' => array(
				'element' => 'pagination',
				'value'   => 'loadmore',
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

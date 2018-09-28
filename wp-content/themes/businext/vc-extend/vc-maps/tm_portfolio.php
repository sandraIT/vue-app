<?php

add_filter( 'vc_autocomplete_tm_portfolio_taxonomies_callback', array(
	'WPBakeryShortCode_TM_Portfolio',
	'autocomplete_taxonomies_field_search',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_portfolio_taxonomies_render', array(
	Businext_VC::instance(),
	'autocomplete_taxonomies_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_Portfolio extends WPBakeryShortCode {

	/**
	 * @param $search_string
	 *
	 * @return array|bool
	 */
	function autocomplete_taxonomies_field_search( $search_string ) {
		$data = Businext_VC::instance()->autocomplete_get_data_from_post_type( $search_string, 'portfolio' );

		return $data;
	}

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		global $businext_shortcode_md_css;
		global $businext_shortcode_sm_css;
		global $businext_shortcode_xs_css;
		extract( $atts );

		if ( isset( $atts['carousel_height'] ) && $atts['carousel_height'] !== '' ) {
			$arr = explode( ';', $atts['carousel_height'] );

			foreach ( $arr as $value ) {
				$tmp = explode( ':', $value );
				if ( $tmp['0'] === 'lg' ) {
					$businext_shortcode_lg_css .= "$selector .swiper-slide img { height: {$tmp['1']}px; }";
				} elseif ( $tmp['0'] === 'md' ) {
					$businext_shortcode_md_css .= "$selector .swiper-slide img { height: {$tmp['1']}px; }";
				} elseif ( $tmp['0'] === 'sm' ) {
					$businext_shortcode_sm_css .= "$selector .swiper-slide img { height: {$tmp['1']}px; }";
				} elseif ( $tmp['0'] === 'xs' ) {
					$businext_shortcode_xs_css .= "$selector .swiper-slide img { height: {$tmp['1']}px; }";
				}
			}
		}

		$image_tmp = '';

		if ( $custom_styling_enable === '1' ) {
			Businext_VC::get_responsive_css( array(
				'element' => "$selector .post-overlay-title",
				'atts'    => array(
					'font-size' => array(
						'media_str' => $overlay_title_font_size,
						'unit'      => 'px',
					),
				),
			) );

			if ( isset( $atts['image_rounded'] ) && $atts['image_rounded'] !== '' ) {
				$image_tmp .= Businext_Helper::get_css_prefix( 'border-radius', $atts['image_rounded'] );
			}
		}

		if ( $image_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .post-thumbnail img { {$image_tmp} }";
		}

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$carousel_tab = esc_html__( 'Carousel Settings', 'businext' );
$styling_tab  = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'     => esc_html__( 'Portfolio', 'businext' ),
	'base'     => 'tm_portfolio',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-portfoliogrid',
	'params'   => array_merge( array(
		array(
			'heading'     => esc_html__( 'Portfolio Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid Classic', 'businext' )         => 'grid',
				esc_html__( 'Grid Metro', 'businext' )           => 'metro',
				esc_html__( 'Grid Masonry', 'businext' )         => 'masonry',
				esc_html__( 'Carousel Slider', 'businext' )      => 'carousel',
				esc_html__( 'Full Wide Slider', 'businext' )     => 'full-wide-slider',
				esc_html__( 'Grid Justify Gallery', 'businext' ) => 'justified',
			),
			'std'         => 'grid',
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
					'size' => '1:1',
				),
				array(
					'size' => '2:2',
				),
				array(
					'size' => '1:2',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '1:1',
				),
				array(
					'size' => '2:1',
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
					'grid',
					'metro',
					'masonry',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Grid Gutter', 'businext' ),
			'description' => esc_html__( 'Controls the gutter of grid.', 'businext' ),
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
					'grid',
					'metro',
					'masonry',
					'justified',
				),
			),
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( '480x480', 'businext' ) => '480x480',
				esc_html__( '480x311', 'businext' ) => '480x311',
				esc_html__( '481x325', 'businext' ) => '481x325',
				esc_html__( '500x324', 'businext' ) => '500x324',
			),
			'std'        => '480x480',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'grid',
				),
			),
		),
		array(
			'heading'     => esc_html__( 'Row Height', 'businext' ),
			'description' => esc_html__( 'Controls the height of grid row.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'justify_row_height',
			'std'         => 300,
			'min'         => 50,
			'max'         => 500,
			'step'        => 10,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		array(
			'heading'     => esc_html__( 'Max Row Height', 'businext' ),
			'description' => esc_html__( 'Controls the max height of grid row. Leave blank or 0 keep it disabled.', 'businext' ),
			'type'        => 'number',
			'param_name'  => 'justify_max_row_height',
			'std'         => 0,
			'min'         => 0,
			'max'         => 500,
			'step'        => 10,
			'suffix'      => 'px',
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		array(
			'heading'    => esc_html__( 'Last row alignment', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'justify_last_row_alignment',
			'value'      => array(
				esc_html__( 'Justify', 'businext' )                              => 'justify',
				esc_html__( 'Left', 'businext' )                                 => 'nojustify',
				esc_html__( 'Center', 'businext' )                               => 'center',
				esc_html__( 'Right', 'businext' )                                => 'right',
				esc_html__( 'Hide ( if row can not be justified )', 'businext' ) => 'hide',
			),
			'std'        => 'justify',
			'dependency' => array(
				'element' => 'style',
				'value'   => array( 'justified' ),
			),
		),
		array(
			'heading'    => esc_html__( 'Overlay Style', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'overlay_style',
			'value'      => array(
				esc_html__( 'None', 'businext' )                             => 'none',
				esc_html__( 'Modern', 'businext' )                           => 'modern',
				esc_html__( 'Image zoom - content below', 'businext' )       => 'zoom',
				esc_html__( 'Zoom and Move Up - content below', 'businext' ) => 'zoom2',
				esc_html__( 'Faded', 'businext' )                            => 'faded',
				esc_html__( 'Faded - Light', 'businext' )                    => 'faded-light',
			),
			'std'        => 'faded-light',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'grid',
					'metro',
					'masonry',
					'carousel',
					'justified',
				),
			),
		),
		Businext_VC::get_animation_field( array(
			'std'        => 'move-up',
			'dependency' => array(
				'element' => 'style',
				'value'   => array(
					'grid',
					'metro',
					'masonry',
					'justified',
				),
			),
		) ),
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
					'full-wide-slider',
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
					'full-wide-slider',
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
					'full-wide-slider',
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
				'value'   => 'carousel',
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
		array(
			'group'      => $styling_tab,
			'heading'    => esc_html__( 'Custom Styling Enable', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'custom_styling_enable',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Overlay Title Font Size', 'businext' ),
			'type'        => 'number_responsive',
			'param_name'  => 'overlay_title_font_size',
			'min'         => 8,
			'suffix'      => 'px',
			'media_query' => array(
				'lg' => '',
				'md' => '',
				'sm' => '',
				'xs' => '',
			),
		),
		array(
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Image Rounded', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'image_rounded',
			'description' => esc_html__( 'Input a valid radius. Fox Ex: 10px. Leave blank to use default.', 'businext' ),
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


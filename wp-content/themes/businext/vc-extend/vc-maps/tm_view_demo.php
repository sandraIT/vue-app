<?php

add_filter( 'vc_autocomplete_tm_view_demo_items_page_callback', array(
	'WPBakeryShortCode_TM_View_Demo',
	'autocomplete_page_field_callback',
), 10, 1 );

add_filter( 'vc_autocomplete_tm_view_demo_items_page_render', array(
	'WPBakeryShortCode_TM_View_Demo',
	'autocomplete_page_field_render',
), 10, 1 );

class WPBakeryShortCode_TM_View_Demo extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		Businext_VC::get_grid_css( $selector, $atts );

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}

	public static function autocomplete_page_field_render( $term ) {
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
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

	public static function autocomplete_page_field_callback( $search_string ) {
		$data = array();
		$args = array(
			'post_type'      => 'page',
			'posts_per_page' => -1,
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
}

vc_map( array(
	'name'                      => esc_html__( 'View Demo', 'businext' ),
	'base'                      => 'tm_view_demo',
	'category'                  => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'                      => 'insight-i insight-i-iconbox',
	'allowed_container_element' => 'vc_row',
	'params'                    => array_merge( array(
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
				'md' => '3',
				'sm' => '2',
				'xs' => '1',
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
		array(
			'heading'    => esc_html__( 'Show Filter', 'businext' ),
			'type'       => 'checkbox',
			'param_name' => 'filter_enable',
			'value'      => array( esc_html__( 'Yes', 'businext' ) => '1' ),
		),
		Businext_VC::extra_class_field(),
		array(
			'group'      => esc_html__( 'Items', 'businext' ),
			'heading'    => esc_html__( 'Items', 'businext' ),
			'type'       => 'param_group',
			'param_name' => 'items',
			'params'     => array(
				array(
					'heading'     => esc_html__( 'Page', 'businext' ),
					'type'        => 'autocomplete',
					'param_name'  => 'page',
					'admin_label' => true,
				),
				array(
					'heading'     => esc_html__( 'Custom Title', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'title',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Custom Link', 'businext' ),
					'type'       => 'textfield',
					'param_name' => 'link',
				),
				array(
					'heading'    => esc_html__( 'Image', 'businext' ),
					'type'       => 'attach_image',
					'param_name' => 'image',
				),
				array(
					'heading'     => esc_html__( 'Category', 'businext' ),
					'description' => esc_html__( 'Multi categories separator with comma', 'businext' ),
					'type'        => 'textfield',
					'param_name'  => 'category',
					'admin_label' => true,
				),
				array(
					'heading'    => esc_html__( 'Badge', 'businext' ),
					'type'       => 'dropdown',
					'param_name' => 'badge',
					'value'      => array(
						esc_html__( 'None', 'businext' )        => '',
						esc_html__( 'Coming Soon', 'businext' ) => 'coming',
					),
					'std'        => '',
				),
			),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );

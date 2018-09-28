<?php

class WPBakeryShortCode_TM_Gallery extends WPBakeryShortCode {

	public function get_inline_css( $selector = '', $atts ) {
		global $businext_shortcode_lg_css;
		$image_tmp = '';

		if ( isset( $atts['image_rounded'] ) && $atts['image_rounded'] !== '' ) {
			$image_tmp .= Businext_Helper::get_css_prefix( 'border-radius', $atts['image_rounded'] );
		}

		if ( $image_tmp !== '' ) {
			$businext_shortcode_lg_css .= "$selector .grid-item { {$image_tmp} }";
		}

		Businext_VC::get_grid_css( $selector, $atts );

		Businext_VC::get_vc_spacing_css( $selector, $atts );
	}
}

$styling_tab = esc_html__( 'Styling', 'businext' );

vc_map( array(
	'name'     => esc_html__( 'Gallery', 'businext' ),
	'base'     => 'tm_gallery',
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-gallery',
	'params'   => array_merge( array(
		array(
			'heading'    => esc_html__( 'Images', 'businext' ),
			'type'       => 'attach_images',
			'param_name' => 'images',
		),
		array(
			'heading'     => esc_html__( 'Gallery Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Grid Classic', 'businext' )    => 'grid',
				esc_html__( 'Grid Metro', 'businext' )      => 'metro',
				esc_html__( 'Grid Masonry', 'businext' )    => 'masonry',
				esc_html__( 'Justify Gallery', 'businext' ) => 'justified',
			),
			'std'         => 'grid',
		),
		array(
			'heading'     => esc_html__( 'Hover Style', 'businext' ),
			'type'        => 'dropdown',
			'param_name'  => 'hover_style',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'With Overlay', 'businext' ) => 'overlay',
				esc_html__( 'Simple', 'businext' )       => 'simple',
			),
			'std'         => 'overlay',
		),
		array(
			'heading'    => esc_html__( 'Image Size', 'businext' ),
			'type'       => 'dropdown',
			'param_name' => 'image_size',
			'value'      => array(
				esc_html__( 'Full', 'businext' )    => 'full',
				esc_html__( 'Custom', 'businext' )  => 'custom',
				esc_html__( '480x480', 'businext' ) => '480x480',
				esc_html__( '370x250', 'businext' ) => '370x250',
				esc_html__( '570x385', 'businext' ) => '570x385',
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
			'edit_field_class' => 'vc_col-sm-6',
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
					'grid',
					'metro',
					'masonry',
				),
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
			'group'       => $styling_tab,
			'heading'     => esc_html__( 'Image Rounded', 'businext' ),
			'type'        => 'textfield',
			'param_name'  => 'image_rounded',
			'description' => esc_html__( 'Input a valid radius. Fox Ex: 10px. Leave blank to use default.', 'businext' ),
		),
	), Businext_VC::get_vc_spacing_tab() ),
) );


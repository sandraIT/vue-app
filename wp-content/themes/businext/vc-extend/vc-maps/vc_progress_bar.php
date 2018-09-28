<?php
vc_map_update( 'vc_progress_bar', array(
	'category' => BUSINEXT_VC_SHORTCODE_CATEGORY,
	'icon'     => 'insight-i insight-i-processbar',
) );

vc_remove_param( 'vc_progress_bar', 'bgcolor' );
vc_remove_param( 'vc_progress_bar', 'custombgcolor' );
vc_remove_param( 'vc_progress_bar', 'customtxtcolor' );
vc_remove_param( 'vc_progress_bar', 'values' );
vc_remove_param( 'vc_progress_bar', 'css' );
vc_remove_param( 'vc_progress_bar', 'title' );

$weight = 100;

vc_add_params( 'vc_progress_bar', array_merge( Businext_VC::get_vc_spacing_tab(), array(
	array(
		'heading'    => esc_html__( 'Style', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'style',
		'value'      => array(
			esc_html__( '01', 'businext' ) => '1',
			esc_html__( '02', 'businext' ) => '2',
		),
		'std'        => '1',
		'weight'     => $weight --,
	),
	array(
		'heading'     => esc_html__( 'Bar height', 'businext' ),
		'description' => esc_html__( 'Controls the height of bar.', 'businext' ),
		'type'        => 'number',
		'param_name'  => 'bar_height',
		'std'         => 4,
		'min'         => 1,
		'max'         => 50,
		'step'        => 1,
		'suffix'      => 'px',
		'weight'      => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Background Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'background_color',
		'value'      => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'        => '',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Custom Background Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_background_color',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'custom' ),
		),
		'std'        => '#222',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Track Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'track_color',
		'value'      => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'        => '',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Custom Track Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_track_color',
		'dependency' => array(
			'element' => 'track_color',
			'value'   => array( 'custom' ),
		),
		'std'        => '#ededed',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Text Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'text_color',
		'value'      => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'        => '',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Custom Text Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_text_color',
		'dependency' => array(
			'element' => 'text_color',
			'value'   => array( 'custom' ),
		),
		'std'        => '#333',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Units Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'units_color',
		'value'      => array(
			esc_html__( 'Default Color', 'businext' )   => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
		'std'        => '',
		'weight'     => $weight --,
	),
	array(
		'heading'    => esc_html__( 'Custom Units Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_units_color',
		'dependency' => array(
			'element' => 'units_color',
			'value'   => array( 'custom' ),
		),
		'std'        => '#333',
		'weight'     => $weight --,
	),
	array(
		'group'       => esc_html__( 'Items', 'businext' ),
		'type'        => 'param_group',
		'heading'     => esc_html__( 'Values', 'businext' ),
		'param_name'  => 'values',
		'description' => esc_html__( 'Enter values for graph - value, title and color.', 'businext' ),
		'value'       => rawurlencode( wp_json_encode( array(
			array(
				'label' => esc_html__( 'Development', 'businext' ),
				'value' => '90',
			),
			array(
				'label' => esc_html__( 'Design', 'businext' ),
				'value' => '80',
			),
			array(
				'label' => esc_html__( 'Marketing', 'businext' ),
				'value' => '70',
			),
		) ) ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Label', 'businext' ),
				'param_name'  => 'label',
				'description' => esc_html__( 'Enter text used as title of bar.', 'businext' ),
				'admin_label' => true,
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Value', 'businext' ),
				'param_name'  => 'value',
				'description' => esc_html__( 'Enter value of bar.', 'businext' ),
				'admin_label' => true,
			),
			array(
				'heading'    => esc_html__( 'Background Color', 'businext' ),
				'type'       => 'dropdown',
				'param_name' => 'background_color',
				'value'      => array(
					esc_html__( 'Default', 'businext' )         => '',
					esc_html__( 'Primary Color', 'businext' )   => 'primary',
					esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
					esc_html__( 'Custom Color', 'businext' )    => 'custom',
				),
				'std'        => '',
			),
			array(
				'heading'    => esc_html__( 'Custom Background Color', 'businext' ),
				'type'       => 'colorpicker',
				'param_name' => 'custom_background_color',
				'dependency' => array(
					'element' => 'background_color',
					'value'   => array( 'custom' ),
				),
				'std'        => '#222',
			),
			array(
				'heading'    => esc_html__( 'Track Color', 'businext' ),
				'type'       => 'dropdown',
				'param_name' => 'track_color',
				'value'      => array(
					esc_html__( 'Default', 'businext' )         => '',
					esc_html__( 'Primary Color', 'businext' )   => 'primary',
					esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
					esc_html__( 'Custom Color', 'businext' )    => 'custom',
				),
				'std'        => '',
			),
			array(
				'heading'    => esc_html__( 'Custom Track Color', 'businext' ),
				'type'       => 'colorpicker',
				'param_name' => 'custom_track_color',
				'dependency' => array(
					'element' => 'track_color',
					'value'   => array( 'custom' ),
				),
				'std'        => '#ededed',
			),
			array(
				'heading'    => esc_html__( 'Text Color', 'businext' ),
				'type'       => 'dropdown',
				'param_name' => 'text_color',
				'value'      => array(
					esc_html__( 'Default', 'businext' )         => '',
					esc_html__( 'Primary Color', 'businext' )   => 'primary',
					esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
					esc_html__( 'Custom Color', 'businext' )    => 'custom',
				),
				'std'        => '',
			),
			array(
				'heading'    => esc_html__( 'Custom Text Color', 'businext' ),
				'type'       => 'colorpicker',
				'param_name' => 'custom_text_color',
				'dependency' => array(
					'element' => 'text_color',
					'value'   => array( 'custom' ),
				),
				'std'        => '#333',
			),
		),
	),
) ) );

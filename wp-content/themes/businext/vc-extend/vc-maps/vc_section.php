<?php
$styling_tab = esc_html__( 'Styling', 'businext' );

vc_remove_param( 'vc_section', 'css' );

vc_add_params( 'vc_section', array_merge( Businext_VC::get_vc_spacing_tab(), array(
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Border Radius', 'businext' ),
		'description' => esc_html__( 'Ex: 5px or 50%', 'businext' ),
		'type'        => 'textfield',
		'param_name'  => 'border_radius',
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Box Shadow', 'businext' ),
		'description' => esc_html__( 'Ex: 0 20px 30px #ccc', 'businext' ),
		'type'        => 'textfield',
		'param_name'  => 'box_shadow',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Color', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'background_color',
		'value'      => array(
			esc_html__( 'None', 'businext' )            => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
			esc_html__( 'Gradient Color', 'businext' )  => 'gradient',
		),
		'std'        => '',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Custom Background Color', 'businext' ),
		'type'       => 'colorpicker',
		'param_name' => 'custom_background_color',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'custom' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Gradient', 'businext' ),
		'type'       => 'gradient',
		'param_name' => 'background_gradient',
		'dependency' => array(
			'element' => 'background_color',
			'value'   => array( 'gradient' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Image', 'businext' ),
		'type'       => 'attach_image',
		'param_name' => 'background_image',
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Hide Background Image', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'hide_background_image',
		'value'      => array(
			esc_html__( 'Always show', 'businext' )             => '',
			esc_html__( 'Medium Device Down', 'businext' )      => 'md',
			esc_html__( 'Small Device Down', 'businext' )       => 'sm',
			esc_html__( 'Extra Small Device Down', 'businext' ) => 'xs',
		),
		'std'        => '',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Repeat', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'background_repeat',
		'value'      => array(
			esc_html__( 'No repeat', 'businext' )         => 'no-repeat',
			esc_html__( 'Tile', 'businext' )              => 'repeat',
			esc_html__( 'Tile Horizontally', 'businext' ) => 'repeat-x',
			esc_html__( 'Tile Vertically', 'businext' )   => 'repeat-y',
		),
		'std'        => 'no-repeat',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Size', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'background_size',
		'value'      => array(
			esc_html__( 'Auto', 'businext' )    => 'auto',
			esc_html__( 'Cover', 'businext' )   => 'cover',
			esc_html__( 'Contain', 'businext' ) => 'contain',
			esc_html__( 'Manual', 'businext' )  => 'manual',
		),
		'std'        => 'cover',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Size (Manual Setting)', 'businext' ),
		'description' => esc_html__( 'Ex: 50% 100%', 'businext' ),
		'type'        => 'textfield',
		'param_name'  => 'background_size_manual',
		'dependency'  => array(
			'element' => 'background_size',
			'value'   => 'manual',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Position', 'businext' ),
		'description' => esc_html__( 'Ex: left center', 'businext' ),
		'type'        => 'textfield',
		'param_name'  => 'background_position',
		'dependency'  => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Scroll Effect', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'background_attachment',
		'value'      => array(
			esc_html__( 'Move with the content', 'businext' ) => 'scroll',
			esc_html__( 'Fixed at its position', 'businext' ) => 'fixed',
			esc_html__( 'Marque', 'businext' )                => 'marque',
		),
		'std'        => 'scroll',
		'dependency' => array(
			'element'   => 'background_image',
			'not_empty' => true,
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Direction', 'businext' ),
		'type'       => 'dropdown',
		'param_name' => 'marque_direction',
		'value'      => array(
			esc_html__( 'To Left', 'businext' )  => 'to-left',
			esc_html__( 'To Right', 'businext' ) => 'to-right',
		),
		'std'        => 'to-right',
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Marque Pause On Hover.', 'businext' ),
		'type'       => 'checkbox',
		'param_name' => 'marque_pause_on_hover',
		'value'      => array(
			esc_html__( 'Yes', 'businext' ) => '1',
		),
		'dependency' => array(
			'element' => 'background_attachment',
			'value'   => 'marque',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Background Overlay', 'businext' ),
		'description' => esc_html__( 'Choose an overlay background color.', 'businext' ),
		'type'        => 'dropdown',
		'param_name'  => 'overlay_background',
		'value'       => array(
			esc_html__( 'None', 'businext' )            => '',
			esc_html__( 'Primary Color', 'businext' )   => 'primary',
			esc_html__( 'Secondary Color', 'businext' ) => 'secondary',
			esc_html__( 'Gradient Color', 'businext' )  => 'gradient',
			esc_html__( 'Custom Color', 'businext' )    => 'custom',
		),
	),
	array(
		'group'       => $styling_tab,
		'heading'     => esc_html__( 'Custom Background Overlay', 'businext' ),
		'description' => esc_html__( 'Choose an custom background color overlay.', 'businext' ),
		'type'        => 'colorpicker',
		'param_name'  => 'overlay_custom_background',
		'std'         => '#000000',
		'dependency'  => array(
			'element' => 'overlay_background',
			'value'   => array( 'custom' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Background Gradient Overlay', 'businext' ),
		'type'       => 'gradient',
		'param_name' => 'overlay_gradient_background',
		'dependency' => array(
			'element' => 'overlay_background',
			'value'   => array( 'gradient' ),
		),
	),
	array(
		'group'      => $styling_tab,
		'heading'    => esc_html__( 'Opacity', 'businext' ),
		'type'       => 'number',
		'param_name' => 'overlay_opacity',
		'value'      => 100,
		'min'        => 0,
		'max'        => 100,
		'step'       => 1,
		'suffix'     => '%',
		'std'        => 80,
		'dependency' => array(
			'element'   => 'overlay_background',
			'not_empty' => true,
		),
	),
) ) );

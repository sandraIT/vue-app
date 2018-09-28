<?php
$section  = 'top_bar_style_01';
$priority = 1;
$prefix   = 'top_bar_style_01_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'text',
	'settings' => $prefix . 'text',
	'label'    => esc_html__( 'Text', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => esc_html__( 'Your Trusted 24 Hours Businext Service Provider ! ', 'businext' ),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => $prefix . 'social_networks_enable',
	'label'       => esc_html__( 'Social Networks', 'businext' ),
	'description' => esc_html__( 'Controls the display the social networks', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Hide', 'businext' ),
		'1' => esc_html__( 'Show', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_top',
	'label'     => esc_html__( 'Padding top', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'These settings control the typography of texts of top bar section.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '500',
		'line-height'    => '1.78',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
	),
	'output'      => array(
		array(
			'element' => '.top-bar-01, .top-bar-01 a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'font_size',
	'label'     => esc_html__( 'Font size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 14,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-01, .top-bar-01 a',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_color',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls the background color of top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'border_width',
	'label'     => esc_html__( 'Border Bottom Width', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 1,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Bottom Color', 'businext' ),
	'description' => esc_html__( 'Controls the border bottom color of top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'border-bottom-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'text_color',
	'label'       => esc_html__( 'Text', 'businext' ),
	'description' => esc_html__( 'Controls the color of text on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#777',
	'output'      => array(
		array(
			'element'  => '.top-bar-01',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_color',
	'label'       => esc_html__( 'Link Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of links on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#d8d8d8',
	'output'      => array(
		array(
			'element'  => '.top-bar-01 a',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => $prefix . 'link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of links on top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.top-bar-01 a:hover, .top-bar-01 a:focus',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'separator_color',
	'label'       => esc_html__( 'Separator Color', 'businext' ),
	'description' => esc_html__( 'Controls the separator color of top bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#eeeeee',
	'output'      => array(
		array(
			'element'  => '
			.top-bar-01 .top-bar-text-wrap,
			.top-bar-01 .top-bar-social-network,
			.top-bar-01 .top-bar-social-network .social-link + .social-link
			',
			'property' => 'border-color',
		),
	),
) );

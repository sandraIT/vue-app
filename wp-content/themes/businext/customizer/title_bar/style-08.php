<?php
$section  = 'title_bar_08';
$priority = 1;
$prefix   = 'title_bar_08_';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'background',
	'label'       => esc_html__( 'Background', 'businext' ),
	'description' => esc_html__( 'Controls the background of title bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#222',
		'background-image'      => BUSINEXT_THEME_IMAGE_URI . '/title-bar-bg-08.jpg',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.page-title-bar-08 .page-title-bar-inner',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'bg_overlay_color',
	'label'       => esc_html__( 'Background Overlay Color', 'businext' ),
	'description' => esc_html__( 'Controls the background overlay color of title bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(0, 0, 0, 0.59)',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .page-title-bar-overlay',
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
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title-bar-08 .page-title-bar-inner',
			'property' => 'border-bottom-width',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'border_color',
	'label'       => esc_html__( 'Border Color', 'businext' ),
	'description' => esc_html__( 'Controls the border bottom color of the page title bar.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => 'rgba(0, 0, 0, 0)',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .page-title-bar-inner',
			'property' => 'border-bottom-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_top',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 145,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title-bar-08 .page-title-bar-inner',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'padding_bottom',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 111,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title-bar-08 .page-title-bar-inner',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Heading', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'heading_typography',
	'label'       => esc_html__( 'Font Family', 'businext' ),
	'description' => esc_html__( 'Controls the font family for the page title heading.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '700',
		'line-height'    => '1.04',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
		'color'          => '#fff',
	),
	'output'      => array(
		array(
			'element' => '.page-title-bar-08 .heading',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'heading_font_size',
	'label'     => esc_html__( 'Font Size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 42,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title-bar-08 .heading',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Breadcrumb', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'breadcrumb_typography',
	'label'       => esc_html__( 'Typography', 'businext' ),
	'description' => esc_html__( 'Controls the typography for the breadcrumb text.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '600',
		'line-height'    => '1.26',
		'letter-spacing' => '0em',
		'text-transform' => 'none',
		'font-size'      => '15px',
	),
	'output'      => array(
		array(
			'element' => '.page-title-bar-08 .insight_core_breadcrumb li, .page-title-bar-08 .insight_core_breadcrumb li a',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'breadcrumb_text_color',
	'label'       => esc_html__( 'Text Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of text on breadcrumb.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .insight_core_breadcrumb li',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'breadcrumb_link_color',
	'label'       => esc_html__( 'Link Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of links on breadcrumb.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .insight_core_breadcrumb a',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'breadcrumb_link_hover_color',
	'label'       => esc_html__( 'Link Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color when hover of links on breadcrumb.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ffffff',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .insight_core_breadcrumb a:hover',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'breadcrumb_arrow_color',
	'label'       => esc_html__( 'Arrow Color', 'businext' ),
	'description' => esc_html__( 'Controls the color arrows.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ffffff',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .insight_core_breadcrumb li + li:before',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => $prefix . 'breadcrumb_underline_color',
	'label'       => esc_html__( 'Underline Color', 'businext' ),
	'description' => esc_html__( 'Controls the color for underline.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ffffff',
	'output'      => array(
		array(
			'element'  => '.page-title-bar-08 .insight_core_breadcrumb a:after',
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Responsive Options', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Medium Device', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'md_padding_top',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 105,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-top',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_md_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'md_padding_bottom',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 105,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-bottom',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_md_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'md_heading_font_size',
	'label'     => esc_html__( 'Heading Font Size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 36,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner .heading',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_md_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Small Device', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'sm_padding_top',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-top',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_sm_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'sm_padding_bottom',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-bottom',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_sm_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'sm_heading_font_size',
	'label'     => esc_html__( 'Heading Font Size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 28,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner .heading',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_sm_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Extra Small Device', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'xs_padding_top',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-top',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_xs_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'xs_padding_bottom',
	'label'     => esc_html__( 'Padding Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 50,
		'max'  => 500,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner',
			'property'    => 'padding-bottom',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_xs_media_query(),
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'xs_heading_font_size',
	'label'     => esc_html__( 'Heading Font Size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 28,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'     => '.page-title-bar-08 .page-title-bar-inner .heading',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => Businext_Helper::get_xs_media_query(),
		),
	),
) );

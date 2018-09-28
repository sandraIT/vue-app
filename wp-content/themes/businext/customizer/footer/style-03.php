<?php
$section  = 'footer_03';
$priority = 1;
$prefix   = 'footer_03_';

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_color',
	'label'     => esc_html__( 'Widget Title Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '.footer-style-03 .widgettitle',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'widget_title_border_color',
	'label'     => esc_html__( 'Widget Title Border Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(238, 238, 238, 0.13)',
	'output'    => array(
		array(
			'element'  => '.footer-style-03 .widgettitle',
			'property' => 'border-bottom-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => $prefix . 'widget_title_margin_bottom',
	'label'     => esc_html__( 'Widget Title Margin Bottom', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 30,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer-style-03 .widgettitle',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'text_color',
	'label'     => esc_html__( 'Text Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(255, 255, 255, 0.5)',
	'output'    => array(
		array(
			'element'  => '.footer-style-03, .footer-style-03 .widget_text',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_color',
	'label'     => esc_html__( 'Link Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-03 a,
            .footer-style-03 .widget_recent_entries li a,
            .footer-style-03 .widget_recent_comments li a,
            .footer-style-03 .widget_archive li a,
            .footer-style-03 .widget_categories li a,
            .footer-style-03 .widget_meta li a,
            .footer-style-03 .widget_product_categories li a,
            .footer-style-03 .widget_rss li a,
            .footer-style-03 .widget_pages li a,
            .footer-style-03 .widget_nav_menu li a,
            .footer-style-03 .insight-core-bmw li a
			',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => $prefix . 'link_hover_color',
	'label'     => esc_html__( 'Link Hover Color', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#05D49C',
	'output'    => array(
		array(
			'element'  => '
			.footer-style-03 a:hover,
            .footer-style-03 .widget_recent_entries li a:hover,
            .footer-style-03 .widget_recent_comments li a:hover,
            .footer-style-03 .widget_archive li a:hover,
            .footer-style-03 .widget_categories li a:hover,
            .footer-style-03 .widget_meta li a:hover,
            .footer-style-03 .widget_product_categories li a:hover,
            .footer-style-03 .widget_rss li a:hover,
            .footer-style-03 .widget_pages li a:hover,
            .footer-style-03 .widget_nav_menu li a:hover,
            .footer-style-03 .insight-core-bmw li a:hover 
			',
			'property' => 'color',
		),
	),
) );

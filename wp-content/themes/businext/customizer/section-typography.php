<?php
$section  = 'typography';
$priority = 1;
$prefix   = 'typography_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="desc"><strong class="insight-label insight-label-info">' . esc_html__( 'IMPORTANT NOTE: ', 'businext' ) . '</strong>' . esc_html__( 'This section contains general typography options. Additional typography options for specific areas can be found within other sections. Example: For breadcrumb typography options go to the breadcrumb section.', 'businext' ) . '</div>',
) );

/*--------------------------------------------------------------
# Link color
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Link', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_color',
	'label'       => esc_html__( 'Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of all links.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Businext::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'a, .tm-button.style-text',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'link_color_hover',
	'label'       => esc_html__( 'Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of all links when hover.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Businext::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => 'a:hover, a:focus',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Body Typography
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Body Typography', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'body',
	'label'       => esc_html__( 'Font family', 'businext' ),
	'description' => esc_html__( 'These settings control the typography for all body text.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Businext::PRIMARY_FONT,
		'variant'        => '500',
		'line-height'    => '1.66',
		'letter-spacing' => '0em',
	),
	'choices'     => array(
		'variant' => array(
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => 'body, .gmap-marker-wrap',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'body_color',
	'label'       => esc_html__( 'Body Text Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of body text.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#777',
	'output'      => array(
		array(
			'element'  => '
			.top-bar-office-wrapper .office-list a,
			.tm-testimonial,
			.text-color,
			body
			',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'body_font_size',
	'label'     => esc_html__( 'Font size', 'businext' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 15,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => 'body',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Heading typography
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Heading Typography', 'businext' ) . '</div>',
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'kirki_typography',
	'settings'    => $prefix . 'heading',
	'label'       => esc_html__( 'Font family', 'businext' ),
	'description' => esc_html__( 'These settings control the typography for all heading text.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => '',
		'variant'        => '700',
		'line-height'    => '1.23',
		'letter-spacing' => '0em',
	),
	'choices'     => array(
		'variant' => array(
			'regular',
			'italic',
			'500',
			'500italic',
			'600',
			'600italic',
			'700',
			'700italic',
			'800',
			'800italic',
			'900',
			'900italic',
		),
	),
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'heading_color',
	'label'       => esc_html__( 'Heading Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of heading.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Businext::HEADING_COLOR,
	'output'      => array(
		array(
			'element'  => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6,th,
			.heading-color,
			.tm-swiper .swiper-pagination-fraction,
			.widget_search .search-submit,
			.widget_product_search .search-submit,
			.comment-nav-links a, .comment-nav-links span,
			.page-pagination a, .page-pagination span,
			.nav-links a:hover,
			.tm-pricing.style-1 .tm-pricing-list,
			.tm-case-study.style-carousel .post-read-more,
			.vc_chart.vc_chart .vc_chart-legend li,
			.tm-attribute-list.style-01 .name,
			.tm-table caption,
            .tm-card.style-2 .icon,
            .tm-counter.style-02 .number-wrap,
            .tm-pricing.style-2 .tm-pricing-list,
            .tm-social-networks.style-title .item:hover .link-text,
            .portfolio-details-list label,
            .portfolio-share a:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce.single-product #reviews .comment-reply-title,
			.product-sharing-list a:hover
			',
			'property' => 'color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'heading_font_sensitive',
	'label'       => esc_html__( 'Font sensitivity', 'businext' ),
	'description' => esc_html__( 'Values below 1 decrease rate of resizing, values above 1 increase rate of resizing.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0.7,
	'choices'     => array(
		'min'  => 0.5,
		'max'  => 1,
		'step' => 0.05,
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h1_font_size',
	'label'       => esc_html__( 'Font size', 'businext' ),
	'description' => esc_html__( 'H1', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 56,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h1,.h1',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h2_font_size',
	'description' => esc_html__( 'H2', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 36,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h2,.h2',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h3_font_size',
	'description' => esc_html__( 'H3', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 32,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h3,.h3',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h4_font_size',
	'description' => esc_html__( 'H4', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 24,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h4,.h4',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h5_font_size',
	'description' => esc_html__( 'H5', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 20,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h5,.h5',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h6_font_size',
	'description' => esc_html__( 'H6', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 100,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'     => 'h6,.h6',
			'property'    => 'font-size',
			'media_query' => '@media (min-width: 1200px)',
			'units'       => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Button Color
--------------------------------------------------------------*/
Businext_Kirki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => $prefix . 'group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="big_title">' . esc_html__( 'Button', 'businext' ) . '</div>',
) );

$button_selector = '
button, input[type="button"], input[type="reset"], input[type="submit"],
.woocommerce #respond input#submit.disabled,
.woocommerce #respond input#submit:disabled,
.woocommerce #respond input#submit:disabled[disabled],
.woocommerce a.button.disabled,
.woocommerce a.button:disabled,
.woocommerce a.button:disabled[disabled],
.woocommerce button.button.disabled,
.woocommerce button.button:disabled,
.woocommerce button.button:disabled[disabled],
.woocommerce input.button.disabled,
.woocommerce input.button:disabled,
.woocommerce input.button:disabled[disabled],
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce a.button.alt,
.woocommerce input.button.alt,
.woocommerce button.button.alt,
.button
';

$button_hover_selector = '
button:hover,
input[type="button"]:hover,
input[type="reset"]:hover,
input[type="submit"]:hover,
.woocommerce #respond input#submit.disabled:hover,
.woocommerce #respond input#submit:disabled:hover,
.woocommerce #respond input#submit:disabled[disabled]:hover,
.woocommerce a.button.disabled:hover,
.woocommerce a.button:disabled:hover,
.woocommerce a.button:disabled[disabled]:hover,
.woocommerce button.button.disabled:hover,
.woocommerce button.button:disabled:hover,
.woocommerce button.button:disabled[disabled]:hover,
.woocommerce input.button.disabled:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button:hover,
.woocommerce a.button.alt:hover,
.woocommerce input.button.alt:hover,
.button:hover
';

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => 'button_color',
	'label'       => esc_html__( 'Button Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of button.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'businext' ),
		'background' => esc_attr__( 'Background', 'businext' ),
		'border'     => esc_attr__( 'Border', 'businext' ),
	),
	'default'     => array(
		'color'      => '#fff',
		'background' => Businext::PRIMARY_COLOR,
		'border'     => Businext::PRIMARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => $button_selector,
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => $button_selector,
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => $button_selector,
			'property' => 'background-color',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'multicolor',
	'settings'    => 'button_hover_color',
	'label'       => esc_html__( 'Button Hover Color', 'businext' ),
	'description' => esc_html__( 'Controls the color of button when hover.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'choices'     => array(
		'color'      => esc_attr__( 'Color', 'businext' ),
		'background' => esc_attr__( 'Background', 'businext' ),
		'border'     => esc_attr__( 'Border', 'businext' ),
	),
	'default'     => array(
		'color'      => Businext::PRIMARY_COLOR,
		'background' => 'rgba(0, 0, 0, 0)',
		'border'     => Businext::PRIMARY_COLOR,
	),
	'output'      => array(
		array(
			'choice'   => 'color',
			'element'  => $button_hover_selector,
			'property' => 'color',
		),
		array(
			'choice'   => 'border',
			'element'  => $button_hover_selector,
			'property' => 'border-color',
		),
		array(
			'choice'   => 'background',
			'element'  => $button_hover_selector,
			'property' => 'background-color',
		),
	),
) );

<?php
$section  = 'blog_single';
$priority = 1;
$prefix   = 'single_post_';

Businext_Kirki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => $prefix . 'style',
	'label'    => esc_html__( 'Style', 'businext' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '01',
	'choices'  => array(
		'01' => esc_html__( 'Style 01', 'businext' ),
		'02' => esc_html__( 'Style 02', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'background',
	'settings'    => $prefix . 'banner_background',
	'label'       => esc_html__( 'Banner Background', 'businext' ),
	'description' => esc_html__( 'Controls the background of banner in single blog posts style 02.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => array(
		'background-color'      => '#222',
		'background-image'      => BUSINEXT_THEME_IMAGE_URI . '/title-bar-bg-blog.jpg',
		'background-repeat'     => 'no-repeat',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
		'background-position'   => 'center center',
	),
	'output'      => array(
		array(
			'element' => '.entry-banner',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_feature_enable',
	'label'       => esc_html__( 'Featured Image', 'businext' ),
	'description' => esc_html__( 'Turn on to display featured image on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_title_enable',
	'label'       => esc_html__( 'Post Title', 'businext' ),
	'description' => esc_html__( 'Turn on to display the post title.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_categories_enable',
	'label'       => esc_html__( 'Categories', 'businext' ),
	'description' => esc_html__( 'Turn on to display the categories on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_tags_enable',
	'label'       => esc_html__( 'Tags', 'businext' ),
	'description' => esc_html__( 'Turn on to display the tags on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_date_enable',
	'label'       => esc_html__( 'Post Meta Date', 'businext' ),
	'description' => esc_html__( 'Turn on to display the date on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_like_enable',
	'label'       => esc_html__( 'Post Like', 'businext' ),
	'description' => esc_html__( 'Turn on to display the like button on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_view_enable',
	'label'       => esc_html__( 'Post View', 'businext' ),
	'description' => esc_html__( 'Turn on to display the view button on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_comment_count_enable',
	'label'       => esc_html__( 'Comment Count', 'businext' ),
	'description' => esc_html__( 'Turn on to display the comment count on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_author_enable',
	'label'       => esc_html__( 'Author Meta', 'businext' ),
	'description' => esc_html__( 'Turn on to display the author meta on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_share_enable',
	'label'       => esc_html__( 'Post Sharing', 'businext' ),
	'description' => esc_html__( 'Turn on to display the social sharing on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_author_box_enable',
	'label'       => esc_html__( 'Author Info Box', 'businext' ),
	'description' => esc_html__( 'Turn on to display the author info box on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_pagination_enable',
	'label'       => esc_html__( 'Previous/Next Pagination', 'businext' ),
	'description' => esc_html__( 'Turn on to display the previous/next post pagination on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_related_enable',
	'label'       => esc_html__( 'Related', 'businext' ),
	'description' => esc_html__( 'Turn on to display related posts on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '0',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'            => 'number',
	'settings'        => 'single_post_related_number',
	'label'           => esc_html__( 'Number of related posts item', 'businext' ),
	'section'         => $section,
	'priority'        => $priority ++,
	'default'         => 10,
	'choices'         => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'active_callback' => array(
		array(
			'setting'  => 'single_post_related_enable',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Businext_Kirki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'single_post_comment_enable',
	'label'       => esc_html__( 'Comments', 'businext' ),
	'description' => esc_html__( 'Turn on to display comments on blog single posts.', 'businext' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'0' => esc_html__( 'Off', 'businext' ),
		'1' => esc_html__( 'On', 'businext' ),
	),
) );

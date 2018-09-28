<?php
$panel    = 'blog';
$priority = 1;

Businext_Kirki::add_section( 'blog_single', array(
	'title'    => esc_html__( 'Blog Single Post', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

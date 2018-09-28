<?php
$panel    = 'shortcode';
$priority = 1;

Businext_Kirki::add_section( 'shortcode_animation', array(
	'title'    => esc_html__( 'CSS Animation', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

<?php
$panel    = 'maintenance';
$priority = 1;

Businext_Kirki::add_section( 'general', array(
	'title'       => esc_html__( 'General', 'businext' ),
	'description' => sprintf( '<div class="desc">
			<strong class="insight-label insight-label-info">%s</strong>
			<p>%s</p>
			<p><span class="insight-label insight-label-info">%s</span></p>
			<p>%s</p>
		</div>', esc_html__( 'IMPORTANT NOTE: ', 'businext' ), esc_html__( 'To active maintenance mode, please add this line to wp-config.php file, before "That\'s all, stop editing! Happy blogging" comment.', 'businext' ), esc_html__( 'define(\'BUSINEXT_MAINTENANCE\', true);', 'businext' ), esc_html__( 'Then select a maintenance page below.', 'businext' ) ),
	'panel'       => $panel,
	'priority'    => $priority ++,
) );

Businext_Kirki::add_section( 'coming_soon_01', array(
	'title'    => esc_html__( 'Coming Soon 01', 'businext' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

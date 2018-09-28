<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_Maintenance' ) ) {

	class Businext_Maintenance {

		public static $templates = array(
			'coming-soon-01.php',
		);

		public function __construct() {
			add_action( 'wp', array( $this, 'maintenance_mode' ) );
		}

		public function maintenance_mode() {
			if ( defined( 'BUSINEXT_MAINTENANCE' ) && BUSINEXT_MAINTENANCE === true ) {
				global $pagenow;
				global $post;
				$maintenance_page = Businext::setting( 'maintenance_page' );

				if ( $maintenance_page !== '' && $post->ID != $maintenance_page && $pagenow !== 'wp-login.php' && ! current_user_can( 'manage_options' ) && ! is_admin() ) {
					wp_safe_redirect( get_permalink( $maintenance_page ) );
					exit;
				}
			}
		}

		public static function get_maintenance_templates() {
			return self::$templates;
		}

		public static function get_maintenance_templates_dir() {
			$results = array();

			foreach ( self::$templates as $value ) {
				$results[] = 'templates/' . $value;
			}

			return $results;
		}

		public static function get_maintenance_pages() {
			$maintenance_templates = self::get_maintenance_templates();

			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => - 1,
				'meta_query'     => array(
					'relation' => 'OR',
				),
			);

			foreach ( $maintenance_templates as $value ) {
				$args['meta_query'][] = array(
					'key'     => '_wp_page_template',
					'value'   => $value,
					'compare' => 'LIKE',
				);
			}

			$query   = new WP_Query( $args );
			$results = array(
				'' => esc_html__( 'Select a page', 'businext' ),
			);

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					$id             = get_the_ID();
					$results[ $id ] = get_the_title();
				}
			}

			wp_reset_postdata();

			return $results;
		}
	}

	new Businext_Maintenance();
}

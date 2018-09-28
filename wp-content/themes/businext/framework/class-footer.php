<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_Footer' ) ) {

	class Businext_Footer {

		function __construct() {
			add_action( 'admin_bar_menu', array( $this, 'add_edit_footer_link' ), 90 );
		}

		function add_edit_footer_link( $wp_admin_bar ) {
			$footer_page = Businext_Global::instance()->get_footer_type();

			if ( $footer_page === '' ) {
				return;
			}

			$args = array(
				'post_type'      => 'ic_footer',
				'posts_per_page' => 1,
				'post_name__in'  => array( $footer_page ),
				'fields'         => 'ids',
			);

			$footer_ids = get_posts( $args );

			if ( ! empty( $footer_ids ) ) {
				$args = array(
					'id'    => 'edit_footer',
					'title' => esc_html__( 'Edit Footer', 'businext' ),
					'href'  => get_edit_post_link( $footer_ids[0] ),
				);

				$wp_admin_bar->add_node( $args );
			}
		}

		public static function get_list_footers( $default = false ) {
			$args = array(
				'post_type'      => 'ic_footer',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
				'meta_query'     => array(
					'relation' => 'OR',
				),
			);

			$query   = new WP_Query( $args );
			$results = array(
				'' => esc_html__( 'Select a footer', 'businext' ),
			);

			if ( $default === true ) {
				$results['default'] = esc_html__( 'Default', 'businext' );
			}

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					global $post;
					$slug             = $post->post_name;
					$results[ $slug ] = get_the_title();
				}
			}

			wp_reset_postdata();

			return $results;
		}
	}

	new Businext_Footer();
}

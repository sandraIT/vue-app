<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Businext_Portfolio' ) ) {
	class Businext_Portfolio {

		public function __construct() {
			add_action( 'wp_ajax_portfolio_infinite_load', array( $this, 'infinite_load' ) );
			add_action( 'wp_ajax_nopriv_portfolio_infinite_load', array( $this, 'infinite_load' ) );
		}

		public static function is_taxonomy() {
			return is_tax( get_object_taxonomies( 'portfolio' ) );
		}

		public static function get_categories( $args = array() ) {
			$defaults = array(
				'all' => true,
			);
			$args     = wp_parse_args( $args, $defaults );
			$terms    = get_terms( array(
				'taxonomy' => 'portfolio_category',
			) );
			$results  = array();

			if ( $args['all'] === true ) {
				$results['-1'] = esc_html__( 'All', 'businext' );
			}

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$results[ $term->slug ] = $term->name;
				}
			}

			return $results;
		}

		public static function get_tags( $args = array() ) {
			$defaults = array(
				'all' => true,
			);
			$args     = wp_parse_args( $args, $defaults );
			$terms    = get_terms( array(
				'taxonomy' => 'portfolio_tags',
			) );
			$results  = array();

			if ( $args['all'] === true ) {
				$results['-1'] = esc_html__( 'All', 'businext' );
			}

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$results[ $term->slug ] = $term->name;
				}
			}

			return $results;
		}

		public function infinite_load() {
			$args = array(
				'post_type'      => $_POST['post_type'],
				'posts_per_page' => $_POST['posts_per_page'],
				'orderby'        => $_POST['orderby'],
				'order'          => $_POST['order'],
				'paged'          => $_POST['paged'],
				'post_status'    => 'publish',
			);

			if ( ! empty( $_POST['taxonomies'] ) ) {
				$args = Businext_VC::get_tax_query_of_taxonomies( $args, $_POST['taxonomies'] );
			}

			$style = '1';
			if ( isset( $_POST['style'] ) ) {
				$style = $_POST['style'];
			}
			$overlay_style  = $_POST['overlay_style'];
			$thumbnail_size = $_POST['thumbnail_size'];
			$count          = $_POST['count'];
			$businext_query  = new WP_Query( $args );

			if ( $businext_query->have_posts() ) : ?>

				<?php
			endif;
			wp_reset_postdata();
			wp_die();
		}
	}

	new Businext_Portfolio();
}

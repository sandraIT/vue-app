<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Businext
 * @since   1.0
 */

get_header( 'blank' );

$logo     = Businext::setting( 'error404_page_logo' );
$logo_url = Businext::setting( "logo_{$logo}" );
?>

	<div class="page-header simple-header" id="page-header">
		<div class="branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr__( 'Logo', 'businext' ); ?>"/>
			</a>
		</div>
	</div>

	<div class="container">
		<div class="row row-xs-center maintenance-page" id="maintenance-wrap">
			<div class="col-md-12">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/image_404.png'; ?>"
				     alt="<?php esc_attr_e( '404 Image', 'businext' ); ?>">
				<div class="error-404-title">
					<?php echo esc_html( Businext::setting( 'error404_page_title' ) ); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer( 'simple' );

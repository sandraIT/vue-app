<?php
/**
 * Template Name: Coming Soon 01
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Businext
 * @since   1.0
 */

get_header( 'blank' );

$title            = Businext::setting( 'coming_soon_01_title' );
$text             = Businext::setting( 'coming_soon_01_text' );
$countdown        = Businext::setting( 'coming_soon_01_countdown' );
$mailchimp_enable = Businext::setting( 'coming_soon_01_mailchimp_enable' );
$logo             = Businext::setting( 'coming_soon_01_logo' );
$logo_url         = Businext::setting( "logo_{$logo}" );
?>

<div class="page-wavify-wrap">
	<svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"
	     data-wavify-height="180"
	     data-wavify-background="rgba( 98, 20, 136, 0.32 )"
	     data-wavify-amplitude="200"
	     data-wavify-bones="2"
	>
		<defs></defs>
		<path d=""/>
	</svg>
	<svg width="100%" height="100%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wavify-item"
	     data-wavify-height="160"
	     data-wavify-background="rgba( 98, 20, 136, 0.32 )"
	     data-wavify-amplitude="200"
	     data-wavify-bones="3"
	     data-speed=".25"
	>
		<defs></defs>
		<path d=""/>
	</svg>
</div>

<div class="page-header simple-header" id="page-header">
	<div class="branding">
		<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr__( 'Logo', 'businext' ); ?>"/>
	</div>
</div>

<div class="container">
	<div class="row row-xs-center maintenance-page" id="maintenance-wrap">
		<div class="col-md-12">

			<?php if ( $title !== '' ) : ?>
				<?php echo '<h2 class="cs-title">' . $title . '</h2>'; ?>
			<?php endif; ?>

			<?php if ( $text !== '' ) : ?>
				<?php echo '<div class="cs-text">' . $text . '</div>'; ?>
			<?php endif; ?>

			<?php if ( $countdown !== '' ) : ?>
				<div id="countdown" class="cs-countdown"
				     data-date="<?php echo esc_attr( $countdown ); ?>"
				></div>
			<?php endif; ?>

			<?php if ( $mailchimp_enable === '1' && function_exists( 'mc4wp_show_form' ) ) : ?>
				<div class="cs-mailchimp-title">
					<?php esc_html_e( 'Please subscribe to newsletter to get updates from us.', 'businext' ); ?>
				</div>
				<div class="cs-form">
					<?php echo do_shortcode( '[tm_mailchimp_form skin="secondary"]' ); ?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php get_footer( 'simple' ); ?>

<?php
/**
 * Template part for displaying single post pages.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Businext
 * @since   1.0
 */

$_post_title = Businext::setting( 'single_post_title_enable' );
$format      = '';
if ( get_post_format() !== false ) {
	$format = get_post_format();
}

$style = Businext_Helper::get_post_meta( 'post_style', '' );

if ( $style === '' ) {
	$style = Businext::setting( 'single_post_style' );
}
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( $style !== '02' ) : ?>
			<div class="entry-header">
				<?php if ( $_post_title === '1' ) : ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php endif; ?>

				<?php get_template_part( 'loop/blog-single/meta' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( Businext::setting( 'single_post_feature_enable' ) === '1' ) : ?>
			<?php get_template_part( 'loop/blog-single/format', $format ); ?>
		<?php endif; ?>

		<div class="entry-content">
			<?php
			the_content( sprintf( wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'businext' ), array( 'span' => array( 'class' => array() ) ) ), the_title( '<span class="screen-reader-text">"', '"</span>', false ) ) );

			Businext_Templates::page_links();
			?>
		</div>

		<div class="entry-footer">
			<div class="row row-xs-center">
				<div class="col-md-6">
					<?php if ( Businext::setting( 'single_post_tags_enable' ) === '1' && has_tag() ) : ?>
						<div class="post-tags">
							<span class="heading-color"><?php esc_html_e( 'Tags', 'businext' ); ?></span>
							<?php the_tags( '', '', '' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="col-md-6">
					<?php if ( Businext::setting( 'single_post_share_enable' ) === '1' ) : ?>
						<?php Businext_Templates::post_sharing(); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	</article>
<?php
$author_desc = get_the_author_meta( 'description' );
if ( Businext::setting( 'single_post_author_box_enable' ) === '1' && ! empty( $author_desc ) ) {
	Businext_Templates::post_author();
}

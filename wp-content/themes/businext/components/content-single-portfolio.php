<?php
/**
 * The template for displaying all single portfolio posts.
 *
 * @package Businext
 * @since   1.0
 */
get_header();

$style = Businext_Helper::get_post_meta( 'portfolio_layout_style', '' );
if ( $style === '' ) {
	$style = Businext::setting( 'single_portfolio_style' );
}
?>
<?php Businext_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Businext_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php get_template_part( 'loop/portfolio/single/style', $style ); ?>
						</article>
						<?php
						if ( Businext::setting( 'portfolio_related_enable' ) ) {
							get_template_part( 'components/content-single-related-portfolios' );
						} ?>
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( Businext::setting( 'single_portfolio_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;
						?>
					<?php endwhile; ?>
				</div>

				<?php Businext_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php
get_footer();

<?php
/**
 * The template for displaying all single posts.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Businext
 * @since   1.0
 */
get_header();

$style = Businext_Helper::get_post_meta( 'post_style', '' );

if ( $style === '' ) {
	$style = Businext::setting( 'single_post_style' );
}
?>
<?php Businext_Templates::title_bar(); ?>

<?php if ( $style === '02' ) : ?>
	<div class="entry-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php $_post_title = Businext::setting( 'single_post_title_enable' ); ?>
					<?php if ( $_post_title === '1' ) : ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php endif; ?>

					<?php get_template_part( 'loop/blog-single/meta' ); ?>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Businext_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'components/content', 'single' );

						if ( Businext::setting( 'single_post_pagination_enable' ) === '1' ) {
							Businext_Templates::post_nav_links();
						}

						if ( Businext::setting( 'single_post_related_enable' ) ) {
							get_template_part( 'components/content', 'single-related-posts' );
						}

						// If comments are open or we have at least one comment, load up the comment template.
						if ( Businext::setting( 'single_post_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

				<?php Businext_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>

<?php if ( Businext::setting( 'single_post_comment_enable' ) === '1' ) : ?>
	<?php get_template_part( 'components/comment-form' ); ?>
<?php endif; ?>

<?php
get_footer();

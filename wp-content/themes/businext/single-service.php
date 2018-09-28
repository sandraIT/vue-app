<?php
/**
 * The template for displaying all single service posts.
 *
 * @package Businext
 * @since   1.0
 */
get_header();
?>
<?php Businext_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Businext_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php get_template_part( 'components/content-single', 'service' ); ?>

						</article>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( Businext::setting( 'single_service_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;
						?>
					<?php endwhile; ?>
				</div>

				<?php Businext_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>

<?php if ( Businext::setting( 'single_service_comment_enable' ) === '1' ) : ?>
	<?php get_template_part( 'components/comment-form' ); ?>
<?php endif; ?>

<?php
get_footer();

<?php
/**
 * The template for displaying all single case study posts.
 *
 * @package Businext
 * @since   1.0
 */
get_header();
?>
<?php Businext_Templates::title_bar(); ?>

<?php if ( Businext::setting( 'single_case_study_banner_enable' ) === '1' ) : ?>

	<div class="entry-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-categories">
						<?php echo get_the_term_list( get_the_ID(), 'case_study_category', '', ', ' ); ?>
					</div>

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
					<?php while ( have_posts() ) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content(); ?>
						</article>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( Businext::setting( 'single_case_study_comment_enable' ) === '1' && ( comments_open() || get_comments_number() ) ) :
							comments_template();
						endif;
						?>
					<?php endwhile; ?>
				</div>

				<?php Businext_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>

<?php if ( Businext::setting( 'single_case_study_comment_enable' ) === '1' ) : ?>
	<?php get_template_part( 'components/comment-form' ); ?>
<?php endif; ?>

<?php
get_footer();

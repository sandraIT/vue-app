<?php
/**
 * The template for displaying search results pages.
 *
 * @link     https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package  Businext
 * @since    1.0
 */
get_header();
?>
<?php Businext_Templates::title_bar(); ?>
	<div id="page-content" class="page-content">
		<div class="container">
			<div class="row">

				<?php Businext_Templates::render_sidebar( 'left' ); ?>

				<div class="page-main-content">
					<?php if ( 'above' === Businext::setting( 'search_page_search_form_display' ) ) : ?>
						<div
							class="search-page-search-form <?php echo esc_attr( Businext::setting( 'search_page_search_form_display' ) ); ?>">
							<?php get_search_form(); ?>
						</div>
					<?php endif; ?>

					<?php get_template_part( 'components/content', 'blog' ); ?>

					<?php if ( 'below' === Businext::setting( 'search_page_search_form_display' ) ) : ?>
						<div
							class="search-page-search-form <?php echo esc_attr( Businext::setting( 'search_page_search_form_display' ) ); ?>">
							<?php get_search_form(); ?>
						</div>
					<?php endif; ?>
				</div>

				<?php Businext_Templates::render_sidebar( 'right' ); ?>

			</div>
		</div>
	</div>
<?php
get_footer();

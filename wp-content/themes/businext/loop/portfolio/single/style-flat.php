<?php
// Meta.
$portfolio_url     = Businext_Helper::get_post_meta( 'portfolio_url', '' );
$portfolio_gallery = Businext_Helper::get_post_meta( 'portfolio_gallery', '' );
?>

	<div class="row row-xs-bottom portfolio-main-info">
		<div class="col-md-12">
			<div class="portfolio-categories">
				<?php echo get_the_term_list( get_the_ID(), 'portfolio_category', '', ', ' ); ?>
			</div>
			<h3 class="portfolio-title"><?php the_title(); ?></h3>
		</div>
	</div>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="portfolio-feature">
		<?php
		$full_image_size = get_the_post_thumbnail_url( null, 'full' );
		Businext_Helper::get_lazy_load_image( array(
			'url'    => $full_image_size,
			'width'  => 1170,
			'height' => 420,
			'crop'   => true,
			'echo'   => true,
			'alt'    => get_the_title(),
		) );
		?>
	</div>
<?php endif; ?>
	<div class="row">
		<div class="col-md-5">
			<div class="portfolio-details-content">
				<?php the_content(); ?>

				<?php Businext_Templates::portfolio_view_project_button( $portfolio_url ); ?>
			</div>
		</div>
		<div class="col-md-6 col-md-offset-1">
			<?php Businext_Templates::portfolio_details(); ?>
			<div class="portfolio-details-social">
				<?php Businext_Templates::portfolio_sharing(); ?>
			</div>
		</div>
	</div>
<?php

Businext_Templates::portfolio_link_pages();

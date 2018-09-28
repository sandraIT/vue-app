<?php
$number_post = Businext::setting( 'portfolio_related_number' );
$results     = Businext_Query::get_related_portfolios( array(
	'post_id'      => get_the_ID(),
	'number_posts' => $number_post,
) );
?>
<?php if ( $results !== false && $results->have_posts() ) : ?>
	<div class="related-portfolio-wrap">
		<h3 class="related-portfolio-title">
			<?php echo Businext::setting( 'portfolio_related_title' ); ?>
		</h3>
		<div class="related-portfolio-list tm-swiper"
		     data-lg-items="3"
		     data-md-items="2"
		     data-xs-items="1"
		     data-lg-gutter="30"
		     data-pagination="1"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php while ( $results->have_posts() ) : $results->the_post(); ?>
						<div class="swiper-slide">
							<div class="related-portfolio-item">
								<div class="post-thumbnail">
									<?php
									if ( has_post_thumbnail() ) { ?>
										<?php
										$full_image_size = get_the_post_thumbnail_url( null, 'full' );
										Businext_Helper::get_lazy_load_image( array(
											'url'    => $full_image_size,
											'width'  => 500,
											'height' => 340,
											'crop'   => true,
											'echo'   => true,
											'alt'    => get_the_title(),
										) );
										?>
										<?php
									} else {
										Businext_Templates::image_placeholder( 500, 340 );
									}
									?>
									<?php get_template_part( 'loop/portfolio/overlay', 'faded-light' ); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif;
wp_reset_postdata();

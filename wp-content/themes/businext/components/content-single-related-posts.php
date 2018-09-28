<?php
$number_post = Businext::setting( 'single_post_related_number' );
$results     = Businext_Query::get_related_posts( array(
	'post_id'      => get_the_ID(),
	'number_posts' => $number_post,
) );

if ( $results !== false && $results->have_posts() ) : ?>
	<div class="related-posts">
		<h3 class="related-title">
			<?php esc_html_e( 'Related posts', 'businext' ); ?>
		</h3>
		<div class="tm-swiper equal-height"
		     data-lg-items="2"
		     data-md-items="2"
		     data-sm-items="1"
		     data-pagination="1"
		     data-slides-per-group="inherit"
		>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php while ( $results->have_posts() ) : $results->the_post(); ?>
						<div class="swiper-slide">
							<div class="related-post-item">
								<div class="post-item-wrapper">

									<?php
									$format = '';
									if ( get_post_format() !== false ) {
										$format = get_post_format();
									}
									?>
									<?php get_template_part( 'loop/blog-related/format', $format ); ?>
									<div class="post-info">
										<?php get_template_part( 'loop/blog/category' ); ?>

										<h3 class="related-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
									</div>
									<div class="related-post-meta">
										<?php if ( Businext::setting( 'single_post_author_enable' ) === '1' ) : ?>
											<div class="post-author-meta">
												<span class="ion-ios-person"></span>
												<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
											</div>
										<?php endif; ?>

										<div class="post-meta-right">
											<?php if ( Businext::setting( 'single_post_view_enable' ) === '1' && function_exists( 'the_views' ) ) : ?>
												<div class="post-view">
													<span class="ion-eye"></span>
													<?php the_views(); ?>
												</div>
											<?php endif; ?>

											<?php if ( Businext::setting( 'single_post_like_enable' ) === '1' ) : ?>
												<?php Businext_Templates::post_likes(); ?>
											<?php endif; ?>
										</div>
									</div>

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

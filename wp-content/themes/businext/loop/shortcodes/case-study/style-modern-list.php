<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'case-study-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<div class="post-thumbnail-wrap">
				<a href="<?php the_permalink(); ?>">
					<div class="post-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php
							$image_url = get_the_post_thumbnail_url( null, 'full' );

							Businext_Helper::get_lazy_load_image( array(
								'url'    => $image_url,
								'width'  => 670,
								'height' => 453,
								'crop'   => true,
								'echo'   => true,
								'alt'    => get_the_title(),
							) );
							?>
						<?php } else { ?>
							<?php Businext_Templates::image_placeholder( 670, 453 ); ?>
						<?php } ?>

					</div>
				</a>
			</div>
			<div class="post-info">
				<div class="post-categories">
					<?php echo get_the_term_list( get_the_ID(), 'case_study_category', '', ', ', '' ); ?>
				</div>

				<h5 class="post-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h5>

				<div class="post-excerpt">
					<?php Businext_Templates::excerpt( array(
						'limit' => 180,
						'type'  => 'character',
					) ); ?>
				</div>

				<div class="post-read-more">
					<a href="<?php the_permalink(); ?>" class="tm-button style-outline">
												<span class="btn-text">
													<?php esc_html_e( 'View Details', 'businext' ); ?>
												</span>
					</a>
				</div>

			</div>
		</div>
	</div>
<?php endwhile;

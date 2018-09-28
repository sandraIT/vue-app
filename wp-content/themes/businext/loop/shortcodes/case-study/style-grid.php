<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'case-study-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-item-wrap">
			<a href="<?php the_permalink(); ?>">
				<div class="post-thumbnail-wrap">
					<div class="post-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php
							$image_url = get_the_post_thumbnail_url( null, 'full' );

							if ( $image_size !== '' ) {
								$_sizes  = explode( 'x', $image_size );
								$_width  = $_sizes[0];
								$_height = $_sizes[1];

								Businext_Helper::get_lazy_load_image( array(
									'url'    => $image_url,
									'width'  => $_width,
									'height' => $_height,
									'crop'   => true,
									'echo'   => true,
									'alt'    => get_the_title(),
								) );
							}
							?>
						<?php } else { ?>
							<?php Businext_Templates::image_placeholder( 480, 480 ); ?>
						<?php } ?>

					</div>

					<div class="post-overlay"></div>
					<div class="post-overlay-content">
						<div class="post-overlay-content-inner">
							<div class="post-overlay-info">
								<div class="post-categories">
									<?php
									$terms     = get_the_terms( $post->ID, 'case_study_category' );
									$separator = ', ';
									$_c        = 0;
									$tem       = '';
									foreach ( $terms as $term ) {
										if ( $_c > 0 ) {
											$tem .= $separator;
										}

										$tem .= $term->name;

										$_c ++;
									}

									echo esc_html( $tem );
									?>
								</div>

								<h5 class="post-title"><?php the_title(); ?></h5>
							</div>
						</div>
					</div>

					<div class="post-read-more">
						<span class="ion-arrow-right-c"></span>
					</div>

				</div>
			</a>
		</div>
	</div>
<?php endwhile;

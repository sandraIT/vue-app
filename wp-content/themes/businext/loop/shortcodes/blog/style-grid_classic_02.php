<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'post-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<div class="post-item-wrap">
			<div class="post-feature-wrap">
				<?php get_template_part( 'loop/blog-classic/format' ); ?>
				<div class="post-date">
					<h6 class="post-day">
						<?php echo get_the_date( 'd' ); ?>
					</h6>
					<h6 class="post-month">
						<?php echo get_the_date( 'M' ); ?>
					</h6>
				</div>
			</div>


			<div class="post-info">

				<div class="post-meta">

					<div class="post-author-meta">
						<?php echo esc_html__( 'by', 'businext' ) . ' '; ?><a
							href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
					</div>

					<?php get_template_part( 'loop/blog/category' ); ?>

				</div>

				<?php get_template_part( 'loop/blog/title' ); ?>
			</div>
		</div>

	</div>
<?php endwhile;

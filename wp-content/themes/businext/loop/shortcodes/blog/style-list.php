<?php
while ( $businext_query->have_posts() ) :
	$businext_query->the_post();
	$classes = array( 'grid-item', 'post-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<?php get_template_part( 'loop/blog/format' ); ?>

		<div class="post-info">

			<div class="post-meta">

				<div class="post-author-meta">
					<?php echo esc_html__( 'by', 'businext' ) . ' '; ?><a
						href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
				</div>

				<?php get_template_part( 'loop/blog/category' ); ?>

				<?php get_template_part( 'loop/blog/sticky' ); ?>
			</div>

			<?php get_template_part( 'loop/blog/title' ); ?>

			<div class="post-excerpt">
				<?php Businext_Templates::excerpt( array(
					'limit' => 100,
					'type'  => 'word',
				) ); ?>
			</div>

			<?php get_template_part( 'loop/blog/readmore' ); ?>
		</div>
	</div>
<?php endwhile;

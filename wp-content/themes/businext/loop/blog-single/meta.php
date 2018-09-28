<div class="post-meta">
	<?php if ( Businext::setting( 'single_post_author_enable' ) === '1' ) : ?>
		<div class="post-author-meta">
			<span class="ion-android-person meta-icon"></span>
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
		</div>
	<?php endif; ?>

	<?php if ( Businext::setting( 'single_post_date_enable' ) === '1' ) : ?>
		<div class="post-date">
			<span class="ion-android-calendar meta-icon"></span>
			<?php echo get_the_date(); ?></div>
	<?php endif; ?>

	<?php if ( Businext::setting( 'single_post_categories_enable' ) === '1' && has_category() ) : ?>
		<div class="post-categories">
			<span class="ion-folder meta-icon"></span>
			<?php the_category( ', ' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( Businext::setting( 'single_post_comment_count_enable' ) ) : ?>
		<div class="post-comments-number">
			<span class="ion-chatbubbles meta-icon"></span>
			<?php
			$comment_count = get_comments_number();

			$comment_count .= $comment_count != 1 ? esc_html__( ' Comments', 'businext' ) : esc_html__( ' Comment', 'businext' );
			?>
			<a href="#comments" class="smooth-scroll-link"><?php echo esc_html( $comment_count ); ?></a>
		</div>
	<?php endif; ?>

	<?php if ( Businext::setting( 'single_post_view_enable' ) === '1' && function_exists( 'the_views' ) ) : ?>
		<div class="post-view">
			<span class="ion-eye meta-icon"></span>
			<?php the_views(); ?>
		</div>
	<?php endif; ?>

	<?php if ( Businext::setting( 'single_post_like_enable' ) === '1' ) : ?>
		<?php Businext_Templates::post_likes(); ?>
	<?php endif; ?>
</div>

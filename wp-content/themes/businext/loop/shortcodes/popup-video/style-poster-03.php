<?php
extract( $businext_shortcode_atts );
?>
<a href="<?php echo esc_url( $video ); ?>">
	<div class="video-poster">
		<?php
		Businext_Helper::get_attachment_by_id( $poster, $image_size, $image_size_width, $image_size_height );
		?>
	</div>
	<div class="video-overlay">
		<div class="video-button">
			<div class="video-play">
				<i class="ion-ios-play"></i>
			</div>

			<?php if ( $video_text !== '' ) : ?>
				<div class="video-text">
					<?php echo esc_html( $video_text ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</a>

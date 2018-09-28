<?php
extract( $businext_shortcode_atts );
?>
<div class="video-mark">
	<div class="wave-pulse wave-pulse-1"></div>
	<div class="wave-pulse wave-pulse-2"></div>
	<div class="wave-pulse wave-pulse-3"></div>
</div>

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
		</div>
	</div>
</a>

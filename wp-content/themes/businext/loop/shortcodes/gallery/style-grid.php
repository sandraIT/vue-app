<?php
extract( $businext_shortcode_atts );
$images = explode( ',', $images );
?>
<?php
foreach ( $images as $image ) {
	$classes = array( 'gallery-item grid-item' );

	$image_full = Businext_Helper::get_attachment_info( $image );

	$_sub_html = '';
	if ( $image_full['title'] !== '' ) {
		$_sub_html .= "<h4>{$image_full['title']}</h4>";
	}

	if ( $image_full['caption'] !== '' ) {
		$_sub_html .= "<p>{$image_full['caption']}</p>";
	}
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<a href="<?php echo esc_url( $image_full['src'] ); ?>" class="zoom"
		   data-sub-html="<?php echo esc_attr( $_sub_html ); ?>">

			<?php Businext_Helper::get_attachment_by_id( $image, $image_size, $image_size_width, $image_size_height, true ); ?>

			<?php get_template_part( 'loop/shortcodes/gallery/hover', $hover_style ); ?>
		</a>
	</div>
	<?php
}

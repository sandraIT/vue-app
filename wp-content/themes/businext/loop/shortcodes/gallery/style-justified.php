<?php
extract( $businext_shortcode_atts );
$images = explode( ',', $images );
?>
<?php
foreach ( $images as $image ) {
	$classes = array( 'gallery-item grid-item' );

	$image_full = Businext_Helper::get_attachment_info( $image );

	$image_url = Businext_Helper::aq_resize( array(
		'url'    => $image_full['src'],
		'width'  => 480,
		'height' => 9999,
		'crop'   => false,
	) );
	$_sub_html = '';
	if ( $image_full['title'] !== '' ) {
		$_sub_html .= "<h4>{$image_full['title']}</h4>";
	}

	if ( $image_full['caption'] !== '' ) {
		$_sub_html .= "<p>{$image_full['caption']}</p>";
	}

	$alt = $image_full['title'] !== '' ? $image_full['title'] : 'Gallery Photo';
	?>
	<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<a href="<?php echo esc_url( $image_full['src'] ); ?>" class="zoom"
		   data-sub-html="<?php echo esc_attr( $_sub_html ); ?>">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr( $alt ); ?>">
			<div class="overlay">
				<div><span class="ion-ios-plus-empty"></span></div>
			</div>
		</a>
	</div>
	<?php
}

<?php
wp_enqueue_script( 'isotope-packery' );
?>
<div class="tm-grid-wrapper"
     data-type="masonry"
     data-lg-columns="2"
     data-xs-columns="1"
>
	<div class="tm-grid has-animation move-up">
		<div class="line"></div>
		<div class="grid-sizer"></div>

		<?php foreach ( $items as $item ) { ?>
			<div class="grid-item">
				<div class="item-wrapper">
					<div class="dot"></div>

					<div class="content-wrap">

						<div class="content-header">
							<h6 class="heading">
								<?php
								$_year = $_title = '';
								if ( isset( $item['datetime'] ) ) {
									$_year = date( 'Y', strtotime( $item['datetime'] ) );
								}

								if ( isset( $item['title'] ) ) {
									$_title = $item['title'];
								}

								if ( $_year !== '' && $_title !== '' ) {
									echo esc_html( "$_year - $_title" );
								} else {
									echo esc_html( "{$_year}{$_title}" );
								}
								?>
							</h6>
						</div>

						<div class="content-body">
							<?php if ( isset( $item['image'] ) ) : ?>
								<div class="photo">
									<?php
									$full_image_size = wp_get_attachment_url( $item['image'] );
									Businext_Helper::get_lazy_load_image( array(
										'url'    => $full_image_size,
										'width'  => 290,
										'height' => 160,
										'crop'   => true,
										'echo'   => true,
									) );
									?>

								</div>
							<?php endif; ?>

							<?php if ( isset( $item['text'] ) ) : ?>
								<div class="text">
									<?php echo wp_kses( $item['text'], 'businext-default' ); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

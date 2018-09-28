<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = $el_class = $icon_type = $icon_class = $text = $phone_number = $list = $link = $animation = '';

$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id = uniqid( 'tm-card-' );
$this->get_inline_css( '#' . $css_id, $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-card ' . $el_class, $this->settings['base'], $atts );
$css_class .= " style-$style";

if ( isset( ${"icon_$icon_type"} ) && ${"icon_$icon_type"} !== '' ) {
	$icon_class = esc_attr( ${"icon_$icon_type"} );

	vc_icon_element_fonts_enqueue( $icon_type );
}

$css_class .= Businext_Helper::get_animation_classes( $animation );
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>">

	<?php if ( $overlay_background !== '' ) : ?>
		<div class="overlay"></div>
	<?php endif; ?>

	<?php if ( $style === '1' ) : ?>
		<div class="icon">
			<span class="<?php echo esc_attr( $icon_class ); ?>"></span>
		</div>

		<div class="content-wrap">
			<div class="content">

				<?php if ( $heading ) : ?>
					<?php $link = vc_build_link( $link ); ?>
					<h4 class="heading">
						<?php if ( $link['url'] !== '' ) { ?>
						<a class="link-secret" href="<?php echo esc_url( $link['url'] ); ?>"
							<?php if ( $link['target'] !== '' ): ?>
								target="<?php echo esc_attr( $link['target'] ); ?>"
							<?php endif; ?>
						>
							<?php } ?>

							<?php echo esc_html( $heading ); ?>

							<?php if ( $link['url'] !== '' ) { ?>
							<span class="ion-ios-arrow-forward"></span>
						</a>
					<?php } ?>

					</h4>
				<?php endif; ?>

				<?php if ( $phone_number !== '' ) : ?>
					<?php echo '<h6 class="phone-number">' . $phone_number . '</h6>'; ?>
				<?php endif; ?>

				<?php
				$list = (array) vc_param_group_parse_atts( $list );
				if ( count( $list ) > 1 ) { ?>
					<ul class="menu-list">
						<?php
						foreach ( $list as $item ) {
							?>
							<li class="menu-item">
								<div class="menu-header">
									<?php if ( isset( $item['title'] ) ) : ?>
										<div class="menu-title"><?php echo esc_html( $item['title'] ); ?></div>
									<?php endif; ?>

									<div class="separator"></div>

									<?php if ( isset( $item['sub_title'] ) ) : ?>
										<div class="menu-sub-title"><?php echo esc_html( $item['sub_title'] ); ?></div>
									<?php endif; ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>

				<?php if ( $text ) : ?>
					<?php echo '<div class="text">' . $text . '</div>'; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php else : ?>
		<div class="content-wrap">
			<div class="content">

				<div class="card-header">
					<div class="icon">
						<span class="<?php echo esc_attr( $icon_class ); ?>"></span>
					</div>

					<?php if ( $heading ) : ?>
						<?php $link = vc_build_link( $link ); ?>
						<h4 class="heading">
							<?php if ( $link['url'] !== '' ) { ?>
							<a class="link-secret" href="<?php echo esc_url( $link['url'] ); ?>"
								<?php if ( $link['target'] !== '' ): ?>
									target="<?php echo esc_attr( $link['target'] ); ?>"
								<?php endif; ?>
							>
								<?php } ?>

								<?php echo esc_html( $heading ); ?>

								<?php if ( $link['url'] !== '' ) { ?>
								<span class="ion-ios-arrow-forward"></span>
							</a>
						<?php } ?>

						</h4>
					<?php endif; ?>
				</div>

				<?php if ( $phone_number !== '' ) : ?>
					<?php echo '<h6 class="phone-number">' . $phone_number . '</h6>'; ?>
				<?php endif; ?>

				<?php
				$list = (array) vc_param_group_parse_atts( $list );
				if ( count( $list ) > 1 ) { ?>
					<ul class="menu-list">
						<?php
						foreach ( $list as $item ) {
							?>
							<li class="menu-item">
								<div class="menu-header">
									<?php if ( isset( $item['title'] ) ) : ?>
										<div class="menu-title"><?php echo esc_html( $item['title'] ); ?></div>
									<?php endif; ?>

									<div class="separator"></div>

									<?php if ( isset( $item['sub_title'] ) ) : ?>
										<div class="menu-sub-title"><?php echo esc_html( $item['sub_title'] ); ?></div>
									<?php endif; ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				<?php } ?>

				<?php if ( $text ) : ?>
					<?php echo '<div class="text">' . $text . '</div>'; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>


</div>

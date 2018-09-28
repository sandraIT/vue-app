<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<?php Businext_Templates::header_language_switcher(); ?>

							<?php Businext_Templates::header_social_networks( array(
								'tooltip_position' => 'bottom',
								'tooltip_skin'     => 'primary',
							) ); ?>

							<?php Businext_Templates::header_search_button(); ?>

							<?php Businext_Woo::render_mini_cart(); ?>

							<?php Businext_Templates::header_open_mobile_menu_button(); ?>

							<?php Businext_Templates::header_button(); ?>
						</div>

						<?php
						$info_text     = Businext::setting( 'header_style_17_info_text' );
						$info_sub_text = Businext::setting( 'header_style_17_info_sub_text' );
						?>

						<?php if ( $info_text !== '' || $info_sub_text !== '' ): ?>
							<div class="header-right-info">
								<div class="info-wrap">
									<?php if ( $info_text !== '' ): ?>
										<div class="info-text"><?php echo esc_html( $info_text ); ?></div>
									<?php endif; ?>

									<?php if ( $info_sub_text !== '' ): ?>
										<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text ); ?></h6>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<?php
						$info_text     = Businext::setting( 'header_style_19_info_text' );
						$info_sub_text = Businext::setting( 'header_style_19_info_sub_text' );
						$info_icon     = Businext::setting( 'header_style_19_info_icon' );
						?>

						<?php if ( $info_text !== '' || $info_sub_text !== '' ): ?>
							<div class="header-left-info">
								<div class="info-wrap">
									<?php if ( $info_icon !== '' ): ?>
										<div class="info-icon">
											<span class="<?php echo esc_attr( $info_icon ); ?>"></span>
										</div>
									<?php endif; ?>

									<div class="info-content">
										<?php if ( $info_text !== '' ): ?>
											<div class="info-text"><?php echo esc_html( $info_text ); ?></div>
										<?php endif; ?>

										<?php if ( $info_sub_text !== '' ): ?>
											<h6 class="info-sub-text"><?php echo esc_html( $info_sub_text ); ?></h6>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>

						<?php get_template_part( 'components/navigation' ); ?>

						<div class="header-right">
							<div class="header-right-wrap">
								<div class="header-right-above">
									<?php Businext_Templates::header_search_form(); ?>
								</div>
								<div class="header-right-below">
									<?php Businext_Templates::header_language_switcher(); ?>

									<?php Businext_Templates::header_social_networks( array(
										'tooltip_position' => 'bottom',
										'tooltip_skin'     => 'primary',
									) ); ?>

									<?php Businext_Woo::render_mini_cart(); ?>

									<?php Businext_Templates::header_search_button(); ?>

									<?php Businext_Templates::header_open_mobile_menu_button(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

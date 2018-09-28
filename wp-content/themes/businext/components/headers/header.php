<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="0">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="header-wrap">

						<?php get_template_part( 'components/branding' ); ?>

						<div class="header-right">
							<?php Businext_Templates::header_info_slider(); ?>

							<?php Businext_Templates::header_open_mobile_menu_button(); ?>
						</div>
					</div>

					<div class="header-below">
						<div class="header-below-left">
							<?php get_template_part( 'components/navigation' ); ?>
						</div>
						<div class="header-below-right">
							<?php Businext_Templates::header_language_switcher(); ?>

							<?php Businext_Templates::header_social_networks(); ?>

							<?php Businext_Templates::header_search_button(); ?>

							<?php Businext_Woo::render_mini_cart(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

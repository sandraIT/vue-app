<header id="page-header" <?php Businext::header_class(); ?>>
	<div id="page-header-inner" class="page-header-inner" data-sticky="1" data-header-position="left">
		<div class="header-wrap">
			<?php get_template_part( 'components/branding' ); ?>

			<?php get_template_part( 'components/navigation', 'vertical' ); ?>

			<div class="header-bottom">
				<?php Businext_Templates::header_social_networks( array(
					'tooltip_position' => 'top',
					'tooltip_enable'   => false,
				) ); ?>

				<?php Businext_Templates::header_text(); ?>

				<?php Businext_Templates::header_open_mobile_menu_button(); ?>
			</div>
		</div>
	</div>
</header>

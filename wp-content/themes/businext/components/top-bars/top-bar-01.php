<?php
$text = Businext::setting( 'top_bar_style_01_text' );
?>
<div <?php Businext::top_bar_class(); ?>>
	<div class="container">
		<div class="row row-eq-height">
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-left">
					<?php echo '<div class="top-bar-text-wrap"><div class="top-bar-text">' . $text . '</div></div>' ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="top-bar-wrap top-bar-right">
					<?php Businext_Templates::top_bar_social_networks(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

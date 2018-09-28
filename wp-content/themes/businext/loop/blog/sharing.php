<?php
$social_sharing = Businext::setting( 'social_sharing_item_enable' );
if ( ! empty( $social_sharing ) ) {
	?>
	<div class="post-share">
		<div class="post-share-toggle">
			<span class="ion-android-share-alt"></span>
			<div class="post-share-list">
				<?php Businext_Templates::get_sharing_list(); ?>
			</div>
		</div>
	</div>
	<?php
}

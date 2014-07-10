<h4><a href="#wpfp-settings"><?php _e( 'WP Fullpage Options', WPFP_DOMAIN ); ?></a></h4>

<div id="settingsbox">

	<div id="fullpage-options">

		<div class="inside">

			<div class="setting-panel">

				<ul class="fullpage-options">
					
					<!-- Title -->
					<li>

						<h5><?php _e( 'Fullpage.js Options', WPFP_DOMAIN );?></h5>

					</li>

					<!-- Slide Navigation Title -->
					<li>
				
						<label for="slidesNavTitle">
						 	<?php _e( 'Slide Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the slide navigation tooltip in case it is being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slidesNavTitle" name="<?php print WPFP_SLIDE_PT_SLIDE_OPTIONS; ?>[slidesNavTitle]" <?php WPFP_Helpers()->value( isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' ); ?> />
					
					</li>

				</ul>

			</div>

		</div>

	</div>

	<div class="clear"></div>
		
	<div class="reset settings-reset">

		<a href="#" id="wpfp_reset" class="button button-large"><?php _e( 'Reset datas to default', WPFP_DOMAIN ); ?></a>

	</div>

	<div class="clear"></div>

</div>
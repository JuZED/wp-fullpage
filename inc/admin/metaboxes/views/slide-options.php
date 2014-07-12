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
							
					<!-- Vertical Position -->
					<li>

						<label for="verticalPosition">
						 	<?php _e( 'Vertical Position', WPFP_DOMAIN ); ?>
						</label>

						<select id="verticalPosition" name="<?php print WPFP_SLIDE_PT_SLIDE_OPTIONS; ?>[verticalPosition]" <?php WPFP_Helpers()->default_setting( isset( $VERTICALPOSITION ) ? $VERTICALPOSITION : 'inherit', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $verticalPosition ) ? $verticalPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from Section', WPFP_DOMAIN ); ?></option>
							<option value="middle" <?php selected( isset( $verticalPosition ) ? $verticalPosition : '', 'middle' ); ?>><?php _e( 'Middle', WPFP_DOMAIN ); ?></option>
							<option value="top" <?php selected( isset( $verticalPosition ) ? $verticalPosition : '', 'top' ); ?>><?php _e( 'Top', WPFP_DOMAIN ); ?></option>
							<option value="bottom" <?php selected( isset( $verticalPosition ) ? $verticalPosition : '', 'bottom' ); ?>><?php _e( 'Bottom', WPFP_DOMAIN ); ?></option>

						</select>

						<span class="wpfp-tip" data-tip="<?php _e( 'Vertical position of the content within slide.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Horizontal Position -->
					<li>

						<label for="horizontalPosition">
						 	<?php _e( 'Horizontal Position', WPFP_DOMAIN ); ?>
						</label>

						<select id="horizontalPosition" name="<?php print WPFP_SLIDE_PT_SLIDE_OPTIONS; ?>[horizontalPosition]" <?php WPFP_Helpers()->default_setting( isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'inherit', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from Section', WPFP_DOMAIN ); ?></option>
							<option value="center" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'center' ); ?>><?php _e( 'Center', WPFP_DOMAIN ); ?></option>
							<option value="left" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'left' ); ?>><?php _e( 'Left', WPFP_DOMAIN ); ?></option>
							<option value="right" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'right' ); ?>><?php _e( 'Right', WPFP_DOMAIN ); ?></option>

						</select>

						<span class="wpfp-tip" data-tip="<?php _e( 'Horizontal position of the content within slide.', WPFP_DOMAIN ); ?>"></span>

					</li>

					<!-- Slide Navigation Title -->
					<li>
				
						<label for="slidesNavTitle">
						 	<?php _e( 'Slide Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the slide navigation tooltip in case it is being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slidesNavTitle" name="<?php print WPFP_SLIDE_PT_SLIDE_OPTIONS; ?>[slidesNavTitle]" <?php WPFP_Helpers()->value( isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' ); ?> />
					
					</li>
					
					<!-- Slide Color -->
					<li>
				
						<label for="slideColor">
						 	<?php _e( 'Slide Color', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Define the CSS background-color property for the slide.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slideColor" name="<?php print WPFP_SLIDE_PT_SLIDE_OPTIONS; ?>[slideColor]" <?php WPFP_Helpers()->value( isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' ); ?> />
					
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
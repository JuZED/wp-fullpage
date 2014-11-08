<?php

/**
 * Template for Slide Option Metabox
 * 
 * @package 	WP_Fullpage\Includes\Metaboxes\Views
 */

?>

<div id="settingsbox">

	<div id="slide-options">

		<div class="inside">

			<div class="setting-panel">
				
				<?php WPFP_Helpers()->table_start( '', 'slide-options form-table' ); ?>
					
					<?php WPFP_Helpers()->caption( __( 'WP Fullpage Slide Options', WPFP_DOMAIN ) ); ?>
							
					<!-- Styling toggler -->
					<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

							<?php

								WPFP_Helpers()->label( __( 'Styling', WPFP_DOMAIN ) );

							?>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
							
					<!-- Styling container -->
					<?php WPFP_Helpers()->tr_start(); ?>
						
						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
				
							<div class="accordion-container">

								<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
											
									<!-- Vertical Position -->
									<?php WPFP_Helpers()->tr_start(); ?>
									
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Vertical Position', WPFP_DOMAIN ), 'verticalPosition' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Vertical position of the content within slide.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SLIDE_PT_SLIDE_OPTIONS, 'verticalPosition', array(
													'inherit' => __( 'Inherit from Section', WPFP_DOMAIN ),
													'middle' => __( 'Middle', WPFP_DOMAIN ),
													'top'    => __( 'Top', WPFP_DOMAIN ),
													'bottom' => __( 'Bottom', WPFP_DOMAIN ),
												), isset( $verticalPosition ) ? $verticalPosition : 'middle', isset( $VERTICALPOSITION ) ? $VERTICALPOSITION : 'middle' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
									
									<!-- Horizontal Position -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Horizontal Position', WPFP_DOMAIN ), 'horizontalPosition' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Horizontal position of the content within slide.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SLIDE_PT_SLIDE_OPTIONS, 'horizontalPosition', array(
													'inherit' => __( 'Inherit from Section', WPFP_DOMAIN ),
													'center' => __( 'Center', WPFP_DOMAIN ),
													'left'   => __( 'Left', WPFP_DOMAIN ),
													'right'  => __( 'Right', WPFP_DOMAIN ),
												), isset( $horizontalPosition ) ? $horizontalPosition : 'center', isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'center' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
							
									<!-- Slides Color -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Slide Color', WPFP_DOMAIN ), 'slideColor' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Define the CSS background-color property for the slide. If empty, will use the section option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_SLIDE_PT_SLIDE_OPTIONS, 'slideColor', isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>

								<?php WPFP_Helpers()->table_end(); ?>

							</div>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
										
					<!-- Navigation toggler -->
					<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

							<?php

								WPFP_Helpers()->label( __( 'Navigation', WPFP_DOMAIN ) );

							?>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
							
					<!-- Navigation container -->
					<?php WPFP_Helpers()->tr_start(); ?>
						
						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
				
							<div class="accordion-container">

								<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
							
									<!-- Slides Navigation Title -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Slides Navigation Title', WPFP_DOMAIN ), 'slidesNavTitle' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will use the FullPage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_SLIDE_PT_SLIDE_OPTIONS, 'slidesNavTitle', isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
									
								<?php WPFP_Helpers()->table_end(); ?>

							</div>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>

				<?php WPFP_Helpers()->table_end(); ?>

			</div>

		</div>

	</div>

	<div class="clear"></div>
		
	<div class="reset settings-reset">

		<a href="#" id="wpfp_reset" class="button button-large"><?php _e( 'Reset datas to default', WPFP_DOMAIN ); ?></a>

	</div>

	<div class="clear"></div>

</div>
<?php

/**
 * Template for Fullpage Settings Page
 * 
 * @package 	WP_Fullpage\Includes\Settings\Views
 */

?>

<div class="wrap wpfp-wrap">

	<div class="icon32" id="icon-options-general"><br /></div>

	<h2><a href="#wpfp-settings"><?php _e( 'WP Fullpage Settings', WPFP_DOMAIN ); ?></a></h2>

	<form method="post" action="options.php">

		<?php settings_fields( 'wpfp_settings-group' );?>

		<div id="settingsbox">

			<div id="fullpage-options">

				<div class="inside">

					<div class="setting-panel">
						
						<?php WPFP_Helpers()->table_start( '', 'sections-options form-table' ); ?>
									
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
									
											<!-- Resize -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php WPFP_Helpers()->span_label( __( 'Resize', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Whether you want to resize the text when the window is resized.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'resize', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $resize ) ? $resize : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
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

														WPFP_Helpers()->select( WPFP_SETTINGS_SLIDES_OPTIONS, 'verticalPosition', array(
															'middle' => __( 'Middle', WPFP_DOMAIN ),
															'top'    => __( 'Top', WPFP_DOMAIN ),
															'bottom' => __( 'Bottom', WPFP_DOMAIN ),
														), isset( $verticalPosition ) ? $verticalPosition : 'middle', 'middle' );

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

														WPFP_Helpers()->select( WPFP_SETTINGS_SLIDES_OPTIONS, 'horizontalPosition', array(
															'center' => __( 'Center', WPFP_DOMAIN ),
															'left'   => __( 'Left', WPFP_DOMAIN ),
															'right'  => __( 'Right', WPFP_DOMAIN ),
														), isset( $horizontalPosition ) ? $horizontalPosition : 'center', 'center' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Padding Top -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Padding Top', WPFP_DOMAIN ), 'paddingTop' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the top padding for each section with a numerical value and its measure (paddingTop: \'10px\', paddingTop: &apos;10em&apos;...) Useful in case of using a fixed header.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'paddingTop', isset( $orderByMetaValueKey ) ? $paddingTop : '0', '0' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Padding Bottom -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Padding Bottom', WPFP_DOMAIN ), 'paddingBottom' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the bottom padding for each section with a numerical value and its measure (paddingBottom: \'10px\', paddingBottom: &apos;10em&apos;...). Useful in case of using a fixed footer.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'paddingBottom', isset( $paddingBottom ) ? $paddingBottom : '0', '0' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Slides Color -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

													<?php

														WPFP_Helpers()->label( __( 'Slides Color', WPFP_DOMAIN ), 'slideColor' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Define the CSS background-color property for slides. Example : "#f2f2f2", "#4BBFC3", "#7BAABE", "whitesmoke", "#000".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_SECTIONS_OPTIONS, 'slideColor', isset( $slideColor ) ? $slideColor : '', '' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Fixed Elements -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Fixed Elements', WPFP_DOMAIN ), 'fixedElements' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines which elements will be taken off the scrolling structure of the plugin which is necesary when using the css3 option to keep them fixed. It requires a string with the jQuery selectors for those elements. (For example: &apos;#element1, .element2&apos;)', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'fixedElements', isset( $fixedElements ) ? $fixedElements : '', '' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Responsive -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Responsive', WPFP_DOMAIN ), 'fixedElements' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'A normal scroll (Auto Scrolling:false) will be used under the defined width in pixels. A class fp-responsive is added to the plugin&apos;s container in case the user wants to use it for his own responsive CSS. For example, if set to 900, whenver the browser&apos;s width is less than 900 the plugin will scroll like a normal site.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
										
													<?php

														WPFP_Helpers()->number( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'responsive', isset( $responsive ) ? $responsive : 0, 0, 0, 10, 'small-text' );

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
									
											<!-- Navigation -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php WPFP_Helpers()->span_label( __( 'Navigation', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'If set to true, it will show a navigation bar made up of small circles.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'navigation', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $navigation ) ? $navigation : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Navigation Position -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'Navigation Position', WPFP_DOMAIN ), 'navigationPosition' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'It can be set to left or right and defines which position the navigation bar will be shown (if using one).', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'navigationPosition', array(
															'left'  => __( 'Left', WPFP_DOMAIN ),
															'right' => __( 'Right', WPFP_DOMAIN ),
														), isset( $navigationPosition ) ? $navigationPosition : 'left', 'left' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
											
											<!-- Navigation Title -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

													<?php

														WPFP_Helpers()->label( __( 'Navigation Title', WPFP_DOMAIN ), 'navTitle' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_SECTIONS_OPTIONS, 'navTitle', isset( $navTitle ) ? $navTitle : '', '' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Slides Navigation -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php WPFP_Helpers()->span_label( __( 'Slides Navigation', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'If set to true it will show a navigation bar made up of small circles for each landscape slider on the site.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'slidesNavigation', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $slidesNavigation ) ? $slidesNavigation : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Slides Nav Position -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
														
													<?php

														WPFP_Helpers()->label( __( 'Slides Nav Position', WPFP_DOMAIN ), 'slidesNavPosition' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the position for the landscape navigation bar for sliders. Admits top and bottom as values. You may want to modify the CSS styles to determine the distance from the top or bottom as well as any other style such as color.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'slidesNavPosition', array(
															'top'    => __( 'Top', WPFP_DOMAIN ),
															'bottom' => __( 'Bottom', WPFP_DOMAIN ),
														), isset( $slidesNavPosition ) ? $slidesNavPosition : 'top', 'top' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Slides Navigation Title -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

													<?php

														WPFP_Helpers()->label( __( 'Slides Navigation Title', WPFP_DOMAIN ), 'slidesNavTitle' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_SLIDES_OPTIONS, 'slidesNavTitle', isset( $slidesNavTitle ) ? $slidesNavTitle : '', '' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
											
										<?php WPFP_Helpers()->table_end(); ?>

									</div>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Scrolling toggler -->
							<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

									<?php

										WPFP_Helpers()->label( __( 'Scrolling', WPFP_DOMAIN ) );

									?>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Scrolling container -->
							<?php WPFP_Helpers()->tr_start(); ?>
								
								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
						
									<div class="accordion-container">

										<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
													
											<!-- CSS 3 -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'CSS 3', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether to use JavaScript or CSS3 transforms to scroll within sections and slides. Useful to speed up the movement in tablet and mobile devices with browsers supporting CSS3. If this option is set to true and the browser doesn&apos;t support CSS3, a jQuery fallback will be used instead.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'css3', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $css3 ) ? $css3 : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
											
											<!-- Parallax -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Parallax', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( "Defines whether to add a Parallax effects to your FullPage or not. Does not work in CSS3 mode.", WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'parallax', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $parallax ) ? $parallax : 'no', 'no' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Scrolling Speed -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'Scrolling Speed', WPFP_DOMAIN ), 'scrollingSpeed' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Speed in miliseconds for the scrolling transitions.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
										
													<?php

														WPFP_Helpers()->number( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'scrollingSpeed', isset( $scrollingSpeed ) ? $scrollingSpeed : 700, 700, 0, 10, 'small-text' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Transition effect -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'Transition effect', WPFP_DOMAIN ), 'easing' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the transition effect to use for the vertical and horizontal scrolling.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'easing', array(
															'linear'           => __( 'Linear', WPFP_DOMAIN ),
															'swing'            => __( 'Swing', WPFP_DOMAIN ),
															'easeInSine'       => __( 'Ease In Sine', WPFP_DOMAIN ),
															'easeOutSine'      => __( 'Ease Out Sine', WPFP_DOMAIN ),
															'easeInOutSine'    => __( 'Ease In Out Sine', WPFP_DOMAIN ),
															'easeInCirc'       => __( 'Ease In Circ', WPFP_DOMAIN ),
															'easeOutCirc'      => __( 'Ease Out Circ', WPFP_DOMAIN ),
															'easeInOutCirc'    => __( 'Ease In Out Circ', WPFP_DOMAIN ),
															'easeInQuad'       => __( 'Ease In Quad', WPFP_DOMAIN ),
															'easeOutQuad'      => __( 'Ease Out Quad', WPFP_DOMAIN ),
															'easeInOutQuad'    => __( 'Ease In Out Quad', WPFP_DOMAIN ),
															'easeInCubic'      => __( 'Ease In Cubic', WPFP_DOMAIN ),
															'easeOutCubic'     => __( 'Ease Out Cubic', WPFP_DOMAIN ),
															'easeInOutCubic'   => __( 'Ease In Out Cubic', WPFP_DOMAIN ),
															'easeInQuart'      => __( 'Ease In Quart', WPFP_DOMAIN ),
															'easeOutQuart'     => __( 'Ease Out Quart', WPFP_DOMAIN ),
															'easeInOutQuart'   => __( 'Ease In Out Quart', WPFP_DOMAIN ),
															'easeInQuint'      => __( 'Ease In Quint', WPFP_DOMAIN ),
															'easeOutQuint'     => __( 'Ease Out Quint', WPFP_DOMAIN ),
															'easeInOutQuint'   => __( 'Ease In Out Quint', WPFP_DOMAIN ),
															'easeInExpo'       => __( 'Ease In Expo', WPFP_DOMAIN ),
															'easeOutExpo'      => __( 'Ease Out Expo', WPFP_DOMAIN ),
															'easeInOutExpo'    => __( 'Ease In Out Expo', WPFP_DOMAIN ),
															'easeInBack'       => __( 'Ease In Back', WPFP_DOMAIN ),
															'easeOutBack'      => __( 'Ease Out Back', WPFP_DOMAIN ),
															'easeInOutBack'    => __( 'Ease In Out Back', WPFP_DOMAIN ),
															'easeInElastic'    => __( 'Ease In Elastic', WPFP_DOMAIN ),
															'easeOutElastic'   => __( 'Ease Out Elastic', WPFP_DOMAIN ),
															'easeInOutElastic' => __( 'Ease In Out Elastic', WPFP_DOMAIN ),
															'easeInBounce'     => __( 'Ease In Bounce', WPFP_DOMAIN ),
															'easeOutBounce'    => __( 'Ease Out Bounce', WPFP_DOMAIN ),
															'easeInOutBounce'  => __( 'Ease In Out Bounce', WPFP_DOMAIN ),
														), isset( $easing ) ? $easing : 'easeInQuad', 'linear' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
							
											<!-- CSS3 Transition effect -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'CSS3 Transition effect', WPFP_DOMAIN ), 'easingCss3' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the transition effect to use for the vertical and horizontal scrolling in case of CSS3.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'easingCss3', array(
															'linear'                                    => __( 'Linear', WPFP_DOMAIN ),
															'ease'                                      => __( 'Ease', WPFP_DOMAIN ),
															'ease-in'                                   => __( 'Ease In', WPFP_DOMAIN ),
															'ease-out'                                  => __( 'Ease Out', WPFP_DOMAIN ),
															'ease-in-out'                               => __( 'Ease In Out', WPFP_DOMAIN ),
															'cubic-bezier(0.470, 0.000, 0.745, 0.715)'  => __( 'Ease In Sine', WPFP_DOMAIN ),
															'cubic-bezier(0.390, 0.575, 0.565, 1.000)'  => __( 'Ease Out Sine', WPFP_DOMAIN ),
															'cubic-bezier(0.445, 0.050, 0.550, 0.950)'  => __( 'Ease In Out Sine', WPFP_DOMAIN ),
															'cubic-bezier(0.600, 0.040, 0.980, 0.335)'  => __( 'Ease In Circ', WPFP_DOMAIN ),
															'cubic-bezier(0.075, 0.820, 0.165, 1.000)'  => __( 'Ease Out Circ', WPFP_DOMAIN ),
															'cubic-bezier(0.785, 0.135, 0.150, 0.860)'  => __( 'Ease In Out Circ', WPFP_DOMAIN ),
															'cubic-bezier(0.550, 0.085, 0.680, 0.530)'  => __( 'Ease In Quad', WPFP_DOMAIN ),
															'cubic-bezier(0.250, 0.460, 0.450, 0.940)'  => __( 'Ease Out Quad', WPFP_DOMAIN ),
															'cubic-bezier(0.455, 0.030, 0.515, 0.955)'  => __( 'Ease In Out Quad', WPFP_DOMAIN ),
															'cubic-bezier(0.550, 0.055, 0.675, 0.190)'  => __( 'Ease In Cubic', WPFP_DOMAIN ),
															'cubic-bezier(0.215, 0.610, 0.355, 1.000)'  => __( 'Ease Out Cubic', WPFP_DOMAIN ),
															'cubic-bezier(0.645, 0.045, 0.355, 1.000)'  => __( 'Ease In Out Cubic', WPFP_DOMAIN ),
															'cubic-bezier(0.895, 0.030, 0.685, 0.220)'  => __( 'Ease In Quart', WPFP_DOMAIN ),
															'cubic-bezier(0.165, 0.840, 0.440, 1.000)'  => __( 'Ease Out Quart', WPFP_DOMAIN ),
															'cubic-bezier(0.770, 0.000, 0.175, 1.000)'  => __( 'Ease In Out Quart', WPFP_DOMAIN ),
															'cubic-bezier(0.755, 0.050, 0.855, 0.060)'  => __( 'Ease In Quint', WPFP_DOMAIN ),
															'cubic-bezier(0.230, 1.000, 0.320, 1.000)'  => __( 'Ease Out Quint', WPFP_DOMAIN ),
															'cubic-bezier(0.860, 0.000, 0.070, 1.000)'  => __( 'Ease In Out Quint', WPFP_DOMAIN ),
															'cubic-bezier(0.950, 0.050, 0.795, 0.035)'  => __( 'Ease In Expo', WPFP_DOMAIN ),
															'cubic-bezier(0.190, 1.000, 0.220, 1.000)'  => __( 'Ease Out Expo', WPFP_DOMAIN ),
															'cubic-bezier(1.000, 0.000, 0.000, 1.000)'  => __( 'Ease In Out Expo', WPFP_DOMAIN ),
															'cubic-bezier(0.600, -0.280, 0.735, 0.045)' => __( 'Ease In Back', WPFP_DOMAIN ),
															'cubic-bezier(0.175, 0.885, 0.320, 1.275)'  => __( 'Ease Out Back', WPFP_DOMAIN ),
															'cubic-bezier(0.680, 0, 0.265, 1.550)'      => __( 'Ease In Out Back', WPFP_DOMAIN ),
														), isset( $easingCss3 ) ? $easingCss3 : 'linear', 'linear' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Loop Bottom -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
														
													<?php WPFP_Helpers()->span_label( __( 'Loop Bottom', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether scrolling down in the last section should scroll to the first one or not.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'loopBottom', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $loopBottom ) ? $loopBottom : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Loop Top -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
														
													<?php WPFP_Helpers()->span_label( __( 'Loop Top', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether scrolling up in the first section should scroll to the last one or not.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'loopTop', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $loopTop ) ? $loopTop : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Loop Horizontal -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Loop Horizontal', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether horizontal sliders will loop after reaching the last or previous slide or not.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
													
													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'loopHorizontal', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $loopHorizontal ) ? $loopHorizontal : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Auto Scrolling -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Auto Scrolling', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether to use the "automatic" scrolling or the "normal" one. It also has affects the way the sections fit in the browser/device window in tablets and mobile phones.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'autoScrolling', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $autoScrolling ) ? $autoScrolling : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Scroll Overflow -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Scroll Overflow', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether or not to create a scroll for the section in case its content is bigger than the height of it.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
													
													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'scrollOverflow', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $scrollOverflow ) ? $scrollOverflow : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Normal Scroll Elements -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Normal Scroll Elements', WPFP_DOMAIN ), 'normalScrollElements' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'If you want to avoid the auto scroll when scrolling over some elements, this is the option you need to use. (useful for maps, scrolling divs etc.) It requires a string with the jQuery selectors for those elements. (For example: "#element1, .element2")', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'normalScrollElements', isset( $normalScrollElements ) ? $normalScrollElements : '', '' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Normal Scroll Element Touch Threshold -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Normal Scroll Element Touch Threshold', WPFP_DOMAIN ), 'normalScrollElementTouchThreshold' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines the threshold for the number of hops up the html node tree Fullpage will test to see if normalScrollElements is a match to allow scrolling functionality on divs on a touch device.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
															
													<?php

														WPFP_Helpers()->number( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'normalScrollElementTouchThreshold', isset( $normalScrollElementTouchThreshold ) ? $normalScrollElementTouchThreshold : 5, 5, 0, 1, 'small-text' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Continuous Vertical -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Continuous Vertical', WPFP_DOMAIN ) ); ?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether scrolling down in the last section should scroll down to the first one or not, and if scrolling up in the first section should scroll up to the last one or not. Not compatible with loopTop or loopBottom.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'continuousVertical', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $continuousVertical ) ? $continuousVertical : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Touch Sensitivity -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php

														WPFP_Helpers()->label( __( 'Touch Sensitivity', WPFP_DOMAIN ), 'touchSensitivity' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines a percentage of the browsers window width/height, and how far a swipe must measure for navigating to the next section / slide.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
															
													<?php

														WPFP_Helpers()->number( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'touchSensitivity', isset( $touchSensitivity ) ? $touchSensitivity : 15, 15, 1, 1, 'small-text' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
											
										<?php WPFP_Helpers()->table_end(); ?>

									</div>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Accessibility toggler -->
							<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

									<?php

										WPFP_Helpers()->label( __( 'Accessibility', WPFP_DOMAIN ) );

									?>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Accessibility container -->
							<?php WPFP_Helpers()->tr_start(); ?>
								
								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
						
									<div class="accordion-container">

										<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
									
											<!-- keyboard Scrolling -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'keyboard Scrolling', WPFP_DOMAIN ) ); ?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines if the content can be navigated using the keyboard.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'keyboardScrolling', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $keyboardScrolling ) ? $keyboardScrolling : 'yes', 'yes' );

													?>
																
												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Animate Anchor -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
												
													<?php WPFP_Helpers()->span_label( __( 'Animate Anchor', WPFP_DOMAIN ) ); ?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Defines whether the load of the site when given an anchor (#) will scroll with animation to its destination or will directly load on the given section.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'animateAnchor', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $animateAnchor ) ? $animateAnchor : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
											
										<?php WPFP_Helpers()->table_end(); ?>

									</div>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Events toggler -->
							<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

									<?php

										WPFP_Helpers()->label( __( 'Events', WPFP_DOMAIN ) );

									?>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Events container -->
							<?php WPFP_Helpers()->tr_start(); ?>
								
								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
						
									<div class="accordion-container">

										<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
									
											<!-- On Leave -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'On Leave', WPFP_DOMAIN ), 'onLeave' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'This callback is fired once the user leaves a section, in the transition to the new section. Use your own javascript code or customize the function "fullpageOnLeave" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#onleave-index-nextindex-direction', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'onLeave', isset( $onLeave ) ? $onLeave : 'fullpageOnLeave( index, nextIndex, direction );', 'fullpageOnLeave( index, nextIndex, direction );' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- After Load -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'After Load', WPFP_DOMAIN ), 'afterLoad' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'Callback fired once the sections have been loaded, after the scrolling has ended. Use your own javascript code or customize the function "fullpageAfterLoad" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#afterload-anchorlink-index', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'afterLoad', isset( $afterLoad ) ? $afterLoad : 'fullpageAfterLoad( anchorLink, index );', 'fullpageAfterLoad( anchorLink, index );' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- After Render -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'After Render', WPFP_DOMAIN ), 'afterRender' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'This callback is fired just after the structure of the page is generated. This is the callback you want to use to initialize other plugins or fire any code which requires the document to be ready (as this plugin modifies the DOM to create the resulting structure). Use your own javascript code or customize the function "fullpageAfterRender" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#afterrender', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'afterRender', isset( $afterRender ) ? $afterRender : 'fullpageAfterRender();', 'fullpageAfterRender();' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- After Resize -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'After Resize', WPFP_DOMAIN ), 'afterResize' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'This callback is fired after resizing the browser\'s window. Just after the sections are resized. Use your own javascript code or customize the function "fullpageAfterResize" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#afterresize', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
													
													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'afterResize', isset( $afterResize ) ? $afterResize : 'fullpageAfterResize();', 'fullpageAfterResize();' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
								
											<!-- After Slide Load -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'After Slide Load', WPFP_DOMAIN ), 'afterSlideLoad' );

													?>
														
													<?php

														WPFP_Helpers()->tooltip( __( 'Callback fired once the slide of a section have been loaded, after the scrolling has ended. Use your own javascript code or customize the function "fullpageAfterSlideLoad" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#afterslideload-anchorlink-index-slideanchor-slideindex', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
													
													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'afterSlideLoad', isset( $afterSlideLoad ) ? $afterSlideLoad : 'fullpageAfterSlideLoad( anchorLink, index, slideAnchor, slideIndex );', 'fullpageAfterSlideLoad( anchorLink, index, slideAnchor, slideIndex );' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
								
											<!-- On Slide Leave -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'On Slide Leave', WPFP_DOMAIN ), 'onSlideLeave' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'This callback is fired once the user leaves an slide to go to another, in the transition to the new slide. Use your own javascript code or customize the function "fullpageSlideLeave" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

													<?php

														WPFP_Helpers()->goto_tip( __( 'Go to callback definition.', WPFP_DOMAIN ), 'https://github.com/alvarotrigo/fullPage.js#onslideleave-anchorlink-index-slideindex-direction', 'wpfp-goto tabs-tip' );

													?>


												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
														
													<?php

														WPFP_Helpers()->textarea( WPFP_SETTINGS_FULLPAGE_OPTIONS, 'onSlideLeave', isset( $onSlideLeave ) ? $onSlideLeave : 'fullpageSlideLeave( anchorLink, index, slideIndex, direction );', 'fullpageSlideLeave( anchorLink, index, slideIndex, direction );' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>

										<?php WPFP_Helpers()->table_end(); ?>

									</div>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Query toggler -->
							<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

									<?php

										WPFP_Helpers()->label( __( 'Query', WPFP_DOMAIN ) );

									?>

								<?php WPFP_Helpers()->td_end(); ?>

							<?php WPFP_Helpers()->tr_end(); ?>
									
							<!-- Query container -->
							<?php WPFP_Helpers()->tr_start(); ?>
								
								<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
						
									<div class="accordion-container">

										<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
									
											<!-- Teaser -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php WPFP_Helpers()->span_label( __( 'Teaser', WPFP_DOMAIN ) ); ?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'Select yes if you want to display the teaser.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->radio( WPFP_SETTINGS_CUSTOM_OPTIONS, 'teaserDisplay', array(
															'yes' => __( 'yes', WPFP_DOMAIN ),
															'no'  => __( 'no', WPFP_DOMAIN ),
														), isset( $teaserDisplay ) ? $teaserDisplay : 'yes', 'yes' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Teaser Length -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'Teaser Length', WPFP_DOMAIN ), 'teaserLength' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'How many characters do you want to display in the teaser. If set to "0", it will take the default value af your theme.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
										
													<?php

														WPFP_Helpers()->number( WPFP_SETTINGS_CUSTOM_OPTIONS, 'teaserLength', isset( $teaserLength ) ? $teaserLength : 100, 100, 0, 10, 'small-text' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
									
											<!-- Count -->
											<?php WPFP_Helpers()->tr_start(); ?>
												
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
													
													<?php

														WPFP_Helpers()->label( __( 'Count', WPFP_DOMAIN ), 'countPosts' );

													?>
																
													<?php

														WPFP_Helpers()->tooltip( __( 'What do you want to order the list with.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>
										
													<?php

														WPFP_Helpers()->number( WPFP_SETTINGS_CUSTOM_OPTIONS, 'countPosts', isset( $countPosts ) ? $countPosts : get_option( 'posts_per_page' ), get_option( 'posts_per_page' ), 1, 1, 'small-text' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>
													
											<!-- Order By -->
											<?php WPFP_Helpers()->tr_start(); ?>
											
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

													<?php

														WPFP_Helpers()->label( __( 'Order By', WPFP_DOMAIN ), 'orderBy' );

													?>

													<?php

														WPFP_Helpers()->tooltip( __( 'What do you want to order the list with.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_CUSTOM_OPTIONS, 'orderBy', array(
															'date'          => __( 'Date', WPFP_DOMAIN ),
															'post__in'      => __( 'Include Order', WPFP_DOMAIN ),
															'ID'            => __( 'Post ID', WPFP_DOMAIN ),
															'author'        => __( 'Author', WPFP_DOMAIN ),
															'title'         => __( 'Author', WPFP_DOMAIN ),
															'name'          => __( 'Post Name (slug)', WPFP_DOMAIN ),
															'modified'      => __( 'Modified date', WPFP_DOMAIN ),
															'parent'        => __( 'Parent', WPFP_DOMAIN ),
															'rand'          => __( 'Random', WPFP_DOMAIN ),
															'comment_count' => __( 'Comment count', WPFP_DOMAIN ),
															'meta_value'    => __( 'Meta Value', WPFP_DOMAIN ),
														), isset( $orderBy ) ? $orderBy : 'date', 'date' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>

											<!-- Order By Meta Value Key -->
											<?php WPFP_Helpers()->tr_start( 'orderByMetaValueKey-container' ); ?>
									
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
										
													<?php

														WPFP_Helpers()->label( __( 'Order By Meta Value Key', WPFP_DOMAIN ), 'orderByMetaValueKey' );

													?>
											
													<?php

														WPFP_Helpers()->tooltip( __( 'which meta key do you want to use to order the list.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->text( WPFP_SETTINGS_CUSTOM_OPTIONS, 'orderByMetaValueKey', isset( $orderByMetaValueKey ) ? $orderByMetaValueKey : '', '' );

													?>

												<?php WPFP_Helpers()->td_end(); ?>

											<?php WPFP_Helpers()->tr_end(); ?>

											<!-- Order -->
											<?php WPFP_Helpers()->tr_start(); ?>
									
												<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
										
													<?php

														WPFP_Helpers()->label( __( 'Order', WPFP_DOMAIN ), 'order' );

													?>
											
													<?php

														WPFP_Helpers()->tooltip( __( 'How do you want to order the list.', WPFP_DOMAIN ), 'wpfp-tip' );

													?>

												<?php WPFP_Helpers()->th_end(); ?>

												<?php WPFP_Helpers()->td_start(); ?>

													<?php

														WPFP_Helpers()->select( WPFP_SETTINGS_CUSTOM_OPTIONS, 'order', array(
															'ASC'  => __( 'ASC', WPFP_DOMAIN ),
															'DESC' => __( 'DESC', WPFP_DOMAIN ),
														), isset( $order ) ? $order : 'ASC', 'ASC' );

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

				<a href="#" id="reset" class="button button-large"><?php _e( 'Reset datas to default', WPFP_DOMAIN ); ?></a>

			</div>
			
			<div class="submit settings-submit">

				<input type="submit" class="button-primary" value="<?php _e( 'Save settings', WPFP_DOMAIN ); ?>" />

			</div>

			<div class="clear"></div>

		</div>

	</form>

</div>
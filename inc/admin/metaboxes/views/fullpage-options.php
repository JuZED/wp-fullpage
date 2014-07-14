<?php

/**
 * Template for Fullpage Option Metabox
 * 
 * @package 	WP_Fullpage\Includes\Metaboxes\Views
 */

?>

<h4><a href="#wpfp-settings"><?php _e( 'WP Fullpage Options', WPFP_DOMAIN ); ?></a></h4>

<div id="settingsbox">

	<ul id="settings-tabs">
		<li>
			<a href="#fullpage-options">
				<?php _e( 'Fullpage Options', WPFP_DOMAIN );?>
			</a>
			<a class="wpfp-goto" title="<?php _e( 'Read full Fullpage.js documentation on GitHub.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#introduction"></a>
		</li>
		<li>
			<a href="#sections-options">
				<?php _e( 'Sections Options', WPFP_DOMAIN );?>
			</a>
			<span class="wpfp-tip tabs-tip" data-tip='<?php _e( 'Options for sections of a post type or a taxonomy.', WPFP_DOMAIN ); ?>'></span>
		</li>
	</ul>

	<div id="fullpage-options">

		<div class="inside">

			<div class="setting-panel">

				<ul class="fullpage-options">
					
					<!-- Title -->
					<li>

						<h5><?php _e( 'Fullpage.js Options', WPFP_DOMAIN );?></h5>

					</li>
					
					<!-- Title -->
					<li>

						<h5><?php _e( 'Slides Options', WPFP_DOMAIN );?></h5>

					</li>
							
					<!-- Vertical Position -->
					<li>

						<label for="verticalPosition">
						 	<?php _e( 'Vertical Position', WPFP_DOMAIN ); ?>
						</label>

						<select id="verticalPosition" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[verticalPosition]" <?php WPFP_Helpers()->default_setting( isset( $VERTICALPOSITION ) ? $VERTICALPOSITION : 'inherit', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $verticalPosition ) ? $verticalPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from Fullpage', WPFP_DOMAIN ); ?></option>
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

						<select id="horizontalPosition" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[horizontalPosition]" <?php WPFP_Helpers()->default_setting( isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'inherit', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from Fullpage', WPFP_DOMAIN ); ?></option>
							<option value="center" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'center' ); ?>><?php _e( 'Center', WPFP_DOMAIN ); ?></option>
							<option value="left" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'left' ); ?>><?php _e( 'Left', WPFP_DOMAIN ); ?></option>
							<option value="right" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'right' ); ?>><?php _e( 'Right', WPFP_DOMAIN ); ?></option>

						</select>

						<span class="wpfp-tip" data-tip="<?php _e( 'Horizontal position of the content within slide.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Resize -->
					<li>

						<span class="label">
						 	<?php _e( 'Resize', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">

							<input type="radio" id="resize-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[resize]" value="yes" <?php WPFP_Helpers()->checked( isset( $resize ) ? $resize : 'no', isset( $RESIZE ) ? $RESIZE : 'no', 'yes' ); ?> />
							<label for="resize-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="resize-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[resize]" value="no" <?php WPFP_Helpers()->checked( isset( $resize ) ? $resize : 'no', isset( $RESIZE ) ? $RESIZE : 'no', 'no' ); ?> />
							<label for="resize-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Whether you want to resize the text when the window is resized.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Scrolling Speed -->
					<li>

						<label for="scrollingSpeed">
						 	<?php _e( 'Scrolling Speed', WPFP_DOMAIN ); ?>
						</label>
						<input type="number" id="scrollingSpeed" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[scrollingSpeed]" step="10" min="0" class="small-text" <?php WPFP_Helpers()->value( isset( $scrollingSpeed ) ? $scrollingSpeed : '', isset( $SCROLLINGSPEED ) ? $SCROLLINGSPEED : '' ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Speed in miliseconds for the scrolling transitions.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Easing -->
					<li>

						<label for="easing">
						 	<?php _e( 'Easing', WPFP_DOMAIN ); ?>
						</label>
						<select id="easing" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[easing]" <?php WPFP_Helpers()->default_setting( isset( $EASING ) ? $EASING : 'easeInQuad', true ); ?>>
							
							<option value="easeInQuad" <?php selected( isset( $easing ) ? $easing : '', 'easeInQuad' ); ?>><?php _e( 'Ease In Quad', WPFP_DOMAIN ); ?></option>
							<option value="easeOutQuad" <?php selected( isset( $easing ) ? $easing : '', 'easeOutQuad' ); ?>><?php _e( 'Ease Out Quad', WPFP_DOMAIN ); ?></option>
							<option value="easeInOutQuad" <?php selected( isset( $easing ) ? $easing : '', 'easeInOutQuad' ); ?>><?php _e( 'Ease In Out Quad', WPFP_DOMAIN ); ?></option>
							
							<option value="easeInCubic" <?php selected( isset( $easing ) ? $easing : '', 'easeInCubic' ); ?>><?php _e( 'Ease In Cubic', WPFP_DOMAIN ); ?></option>
							<option value="easeOutCubic" <?php selected( isset( $easing ) ? $easing : '', 'easeOutCubic' ); ?>><?php _e( 'Ease Out Cubic', WPFP_DOMAIN ); ?></option>
							<option value="easeInOutCubic" <?php selected( isset( $easing ) ? $easing : '', 'easeInOutCubic' ); ?>><?php _e( 'Ease In Out Cubic', WPFP_DOMAIN ); ?></option>
							
							<option value="easeInQuart" <?php selected( isset( $easing ) ? $easing : '', 'easeInQuart' ); ?>><?php _e( 'Ease In Quart', WPFP_DOMAIN ); ?></option>
							<option value="easeOutQuart" <?php selected( isset( $easing ) ? $easing : '', 'easeOutQuart' ); ?>><?php _e( 'Ease Out Quart', WPFP_DOMAIN ); ?></option>
							<option value="easeInOutQuart" <?php selected( isset( $easing ) ? $easing : '', 'easeInOutQuart' ); ?>><?php _e( 'Ease In Out Quart', WPFP_DOMAIN ); ?></option>
							
							<option value="easeInQuint" <?php selected( isset( $easing ) ? $easing : '', 'easeInQuint' ); ?>><?php _e( 'Ease In Quint', WPFP_DOMAIN ); ?></option>
							<option value="easeOutQuint" <?php selected( isset( $easing ) ? $easing : '', 'easeOutQuint' ); ?>><?php _e( 'Ease Out Quint', WPFP_DOMAIN ); ?></option>
							<option value="easeInOutQuint" <?php selected( isset( $easing ) ? $easing : '', 'easeInOutQuint' ); ?>><?php _e( 'Ease In Out Quint', WPFP_DOMAIN ); ?></option>
							
							<option value="easeInExpo" <?php selected( isset( $easing ) ? $easing : '', 'easeInExpo' ); ?>><?php _e( 'Ease In Expo', WPFP_DOMAIN ); ?></option>
							<option value="easeOutExpo" <?php selected( isset( $easing ) ? $easing : '', 'easeOutExpo' ); ?>><?php _e( 'Ease Out Expo', WPFP_DOMAIN ); ?></option>
							<option value="easeInOutExpo" <?php selected( isset( $easing ) ? $easing : '', 'easeInOutExpo' ); ?>><?php _e( 'Ease In Out Expo', WPFP_DOMAIN ); ?></option>

						</select>
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the transition effect to use for the vertical and horizontal scrolling.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Navigation -->
					<li>

						<span class="label">
						 	<?php _e( 'Navigation', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">

							<input type="radio" id="navigation-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[navigation]" value="yes" <?php WPFP_Helpers()->checked( isset( $navigation ) ? $navigation : 'no', isset( $NAVIGATION ) ? $NAVIGATION : 'no', 'yes' ); ?> />
							<label for="navigation-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="navigation-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[navigation]" value="no" <?php WPFP_Helpers()->checked( isset( $navigation ) ? $navigation : 'no', isset( $NAVIGATION ) ? $NAVIGATION : 'no', 'no' ); ?> />
							<label for="navigation-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'If set to true, it will show a navigation bar made up of small circles.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Navigation Position -->
					<li>

						<label for="navigationPosition">
						 	<?php _e( 'Navigation Position', WPFP_DOMAIN ); ?>
						</label>
						<select id="navigationPosition" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[navigationPosition]" <?php WPFP_Helpers()->default_setting( isset( $NAVIGATIONPOSITION ) ? $NAVIGATIONPOSITION : 'none', true ); ?>>
							
							<option value="left" <?php selected( isset( $navigationPosition ) ? $navigationPosition : '', 'left' ); ?>><?php _e( 'Left', WPFP_DOMAIN ); ?></option>
							<option value="right" <?php selected( isset( $navigationPosition ) ? $navigationPosition : '', 'right' ); ?>><?php _e( 'Right', WPFP_DOMAIN ); ?></option>

						</select>
						<span class="wpfp-tip" data-tip="<?php _e( 'It can be set to left or right and defines which position the navigation bar will be shown (if using one).', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Slides Navigation -->
					<li>

						<span class="label">
						 	<?php _e( 'Slides Navigation', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">

							<input type="radio" id="slidesNavigation-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[slidesNavigation]" value="yes" <?php WPFP_Helpers()->checked( isset( $slidesNavigation ) ? $slidesNavigation : 'no', isset( $SLIDESNAVIGATION ) ? $SLIDESNAVIGATION : 'no', 'yes' ); ?> />
							<label for="slidesNavigation-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="slidesNavigation-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[slidesNavigation]" value="no" <?php WPFP_Helpers()->checked( isset( $slidesNavigation ) ? $slidesNavigation : 'no', isset( $SLIDESNAVIGATION ) ? $SLIDESNAVIGATION : 'no', 'no' ); ?> />
							<label for="slidesNavigation-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'If set to true it will show a navigation bar made up of small circles for each landscape slider on the site.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Slides Nav Position -->
					<li>

						<label for="slidesNavPosition">
						 	<?php _e( 'Slides Nav Position', WPFP_DOMAIN ); ?>
						</label>
						<select id="slidesNavPosition" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[slidesNavPosition]" <?php WPFP_Helpers()->default_setting( isset( $SLIDESNAVPOSITION ) ? $SLIDESNAVPOSITION : 'top', true ); ?>>
							
							<option value="top" <?php selected( isset( $slidesNavPosition ) ? $slidesNavPosition : '', 'top' ); ?>><?php _e( 'Top', WPFP_DOMAIN ); ?></option>
							<option value="bottom" <?php selected( isset( $slidesNavPosition ) ? $slidesNavPosition : '', 'bottom' ); ?>><?php _e( 'Bottom', WPFP_DOMAIN ); ?></option>

						</select>
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the position for the landscape navigation bar for sliders. Admits top and bottom as values. You may want to modify the CSS styles to determine the distance from the top or bottom as well as any other style such as color.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Loop Bottom -->
					<li>

						<span class="label">
						 	<?php _e( 'Loop Bottom', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
						
							<input type="radio" id="loopBottom-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopBottom]" value="yes" <?php WPFP_Helpers()->checked( isset( $loopBottom ) ? $loopBottom : 'no', isset( $LOOPBOTTOM ) ? $LOOPBOTTOM : 'no', 'yes' ); ?> />
							<label for="loopBottom-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="loopBottom-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopBottom]" value="no" <?php WPFP_Helpers()->checked( isset( $loopBottom ) ? $loopBottom : 'no', isset( $LOOPBOTTOM ) ? $LOOPBOTTOM : 'no', 'no' ); ?> />
							<label for="loopBottom-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether scrolling down in the last section should scroll to the first one or not.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Loop Top -->
					<li>

						<span class="label">
						 	<?php _e( 'Loop Top', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="loopTop-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopTop]" value="yes" <?php WPFP_Helpers()->checked( isset( $loopTop ) ? $loopTop : 'no', isset( $LOOPTOP ) ? $LOOPTOP : 'no', 'yes' ); ?> />
							<label for="loopTop-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="loopTop-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopTop]" value="no" <?php WPFP_Helpers()->checked( isset( $loopTop ) ? $loopTop : 'no', isset( $LOOPTOP ) ? $LOOPTOP : 'no', 'no' ); ?> />
							<label for="loopTop-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>
						
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether scrolling up in the first section should scroll to the last one or not.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Loop Horizontal -->
					<li>

						<span class="label">
						 	<?php _e( 'Loop Horizontal', WPFP_DOMAIN ); ?>
						</span>
						
						<div class="radio">
							
							<input type="radio" id="loopHorizontal-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopHorizontal]" value="yes" <?php WPFP_Helpers()->checked( isset( $loopHorizontal ) ? $loopHorizontal : 'no', isset( $LOOPHORIZONTAL ) ? $LOOPHORIZONTAL : 'no', 'yes' ); ?> />
							<label for="loopHorizontal-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="loopHorizontal-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[loopHorizontal]" value="no" <?php WPFP_Helpers()->checked( isset( $loopHorizontal ) ? $loopHorizontal : 'no', isset( $LOOPHORIZONTAL ) ? $LOOPHORIZONTAL : 'no', 'no' ); ?> />
							<label for="loopHorizontal-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>
						
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether horizontal sliders will loop after reaching the last or previous slide or not.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Auto Scrolling -->
					<li>

						<span class="label">
						 	<?php _e( 'Auto Scrolling', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="autoScrolling-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[autoScrolling]" value="yes" <?php WPFP_Helpers()->checked( isset( $autoScrolling ) ? $autoScrolling : 'no', isset( $AUTOSCROLLING ) ? $AUTOSCROLLING : 'no', 'yes' ); ?> />
							<label for="autoScrolling-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="autoScrolling-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[autoScrolling]" value="no" <?php WPFP_Helpers()->checked( isset( $autoScrolling ) ? $autoScrolling : 'no', isset( $AUTOSCROLLING ) ? $AUTOSCROLLING : 'no', 'no' ); ?> />
							<label for="autoScrolling-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip='<?php _e( 'Defines whether to use the "automatic" scrolling or the "normal" one. It also has affects the way the sections fit in the browser/device window in tablets and mobile phones.', WPFP_DOMAIN ); ?>'></span>
					
					</li>
					
					<!-- Scroll Overflow -->
					<li>

						<span class="label">
						 	<?php _e( 'Scroll Overflow', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="scrollOverflow-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[scrollOverflow]" value="yes" <?php WPFP_Helpers()->checked( isset( $scrollOverflow ) ? $scrollOverflow : 'no', isset( $SCROLLOVERFLOW ) ? $SCROLLOVERFLOW : 'no', 'yes' ); ?> />
							<label for="scrollOverflow-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="scrollOverflow-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[scrollOverflow]" value="no" <?php WPFP_Helpers()->checked( isset( $scrollOverflow ) ? $scrollOverflow : 'no', isset( $SCROLLOVERFLOW ) ? $SCROLLOVERFLOW : 'no', 'no' ); ?> />
							<label for="scrollOverflow-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether or not to create a scroll for the section in case its content is bigger than the height of it.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- CSS 3 -->
					<li>

						<span class="label">
						 	<?php _e( 'CSS 3', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">

							<input type="radio" id="css3-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[css3]" value="yes" <?php WPFP_Helpers()->checked( isset( $css3 ) ? $css3 : 'no', isset( $CSS3 ) ? $CSS3 : 'no', 'yes' ); ?> />
							<label for="css3-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="css3-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[css3]" value="no" <?php WPFP_Helpers()->checked( isset( $css3 ) ? $css3 : 'no', isset( $CSS3 ) ? $CSS3 : 'no', 'no' ); ?> />
							<label for="css3-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines wheter to use JavaScript or CSS3 transforms to scroll within sections and slides. Useful to speed up the movement in tablet and mobile devices with browsers supporting CSS3. If this option is set to true and the browser doesn\'t support CSS3, a jQuery fallback will be used instead.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Padding Top -->
					<li>

						<label for="paddingTop">
						 	<?php _e( 'Padding Top', WPFP_DOMAIN ); ?>
						</label>
						<input type="text" id="paddingTop" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[paddingTop]" <?php WPFP_Helpers()->value( isset( $paddingTop ) ? $paddingTop : '', isset( $PADDINGTOP ) ? $PADDINGTOP : '' ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the top padding for each section with a numerical value and its measure (paddingTop: \'10px\', paddingTop: \'10em\'...) Useful in case of using a fixed header.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Padding Bottom -->
					<li>

						<label for="paddingBottom">
						 	<?php _e( 'Padding Bottom', WPFP_DOMAIN ); ?>
						</label>
						<input type="text" id="paddingBottom" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[paddingBottom]" <?php WPFP_Helpers()->value( isset( $paddingBottom ) ? $paddingBottom : '', isset( $PADDINGBOTTOM ) ? $PADDINGBOTTOM : '' ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the bottom padding for each section with a numerical value and its measure (paddingBottom: \'10px\', paddingBottom: \'10em\'...). Useful in case of using a fixed footer.', WPFP_DOMAIN ); ?>"></span>

					</li>
							
					<!-- Fixed Elements -->
					<li>

						<label for="fixedElements">
						 	<?php _e( 'Fixed Elements', WPFP_DOMAIN ); ?>
						</label>
						<input type="text" id="fixedElements" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[fixedElements]" <?php WPFP_Helpers()->value( isset( $fixedElements ) ? $fixedElements : '', isset( $FIXEDELEMENTS ) ? $FIXEDELEMENTS : '' ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines which elements will be taken off the scrolling structure of the plugin which is necesary when using the css3 option to keep them fixed. It requires a string with the jQuery selectors for those elements. (For example: \'#element1, .element2\')', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Normal Scroll Element -->
					<li>

						<label for="normalScrollElements">
						 	<?php _e( 'Normal Scroll Element', WPFP_DOMAIN ); ?>
						</label>
						<input type="text" id="normalScrollElements" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[normalScrollElements]" <?php WPFP_Helpers()->value( isset( $normalScrollElements ) ? $normalScrollElements : '', isset( $NORMALSCROLLELEMENTS ) ? $NORMALSCROLLELEMENTS : '' ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'If you want to avoid the auto scroll when scrolling over some elements, this is the option you need to use. (useful for maps, scrolling divs etc.) It requires a string with the jQuery selectors for those elements. (For example: "#element1, .element2")', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Normal Scroll Element Touch Threshold -->
					<li>

						<label for="normalScrollElementTouchThreshold">
						 	<?php _e( 'Normal Scroll Element Touch Threshold', WPFP_DOMAIN ); ?>
						</label>
						<input type="number" id="normalScrollElementTouchThreshold" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[normalScrollElementTouchThreshold]" step="1" min="0" class="small-text" <?php WPFP_Helpers()->value( isset( $normalScrollElementTouchThreshold ) ? $normalScrollElementTouchThreshold : 5, isset( $NORMALSCROLLELEMENTTOUCHTHRESHOLD ) ? $NORMALSCROLLELEMENTTOUCHTHRESHOLD : 5 ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the threshold for the number of hops up the html node tree Fullpage will test to see if normalScrollElements is a match to allow scrolling functionality on divs on a touch device. (For example: normalScrollElementTouchThreshold: 3).', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- keyboard Scrolling -->
					<li>

						<span class="label">
						 	<?php _e( 'keyboard Scrolling', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="keyboardScrolling-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[keyboardScrolling]" value="yes" <?php WPFP_Helpers()->checked( isset( $keyboardScrolling ) ? $keyboardScrolling : 'no', isset( $KEYBOARDSCROLLING ) ? $KEYBOARDSCROLLING : 'no', 'yes' ); ?> />
							<label for="keyboardScrolling-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="keyboardScrolling-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[keyboardScrolling]" value="no" <?php WPFP_Helpers()->checked( isset( $keyboardScrolling ) ? $keyboardScrolling : 'no', isset( $KEYBOARDSCROLLING ) ? $KEYBOARDSCROLLING : 'no', 'no' ); ?> />
							<label for="keyboardScrolling-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>
						
						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines if the content can be navigated using the keyboard.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Touch Sensitivity -->
					<li>

						<label for="touchSensitivity">
						 	<?php _e( 'Touch Sensitivity', WPFP_DOMAIN ); ?>
						</label>
						<input type="number" id="touchSensitivity" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[touchSensitivity]" step="1" min="1" class="small-text" <?php WPFP_Helpers()->value( isset( $touchSensitivity ) ? $touchSensitivity : 15, isset( $TOUCHSENSITIVITY ) ? $TOUCHSENSITIVITY : 15 ); ?> />
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines a percentage of the browsers window width/height, and how far a swipe must measure for navigating to the next section / slide.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Continuous Vertical -->
					<li>

						<span class="label">
						 	<?php _e( 'Continuous Vertical', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="continuousVertical-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[continuousVertical]" value="yes" <?php WPFP_Helpers()->checked( isset( $continuousVertical ) ? $continuousVertical : 'no', isset( $CONTINUOUSVERTICAL ) ? $CONTINUOUSVERTICAL : 'no', 'yes' ); ?> />
							<label for="continuousVertical-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="continuousVertical-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[continuousVertical]" value="no" <?php WPFP_Helpers()->checked( isset( $continuousVertical ) ? $continuousVertical : 'no', isset( $CONTINUOUSVERTICAL ) ? $CONTINUOUSVERTICAL : 'no', 'no' ); ?> />
							<label for="continuousVertical-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether scrolling down in the last section should scroll down to the first one or not, and if scrolling up in the first section should scroll up to the last one or not. Not compatible with loopTop or loopBottom.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Animate Anchor -->
					<li>

						<span class="label">
						 	<?php _e( 'Animate Anchor', WPFP_DOMAIN ); ?>
						</span>

						<div class="radio">
							
							<input type="radio" id="animateAnchor-yes" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[animateAnchor]" value="yes" <?php WPFP_Helpers()->checked( isset( $animateAnchor ) ? $animateAnchor : 'no', isset( $ANIMATEANCHOR ) ? $ANIMATEANCHOR : 'no', 'yes' ); ?> />
							<label for="animateAnchor-yes">
							 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
							</label>
							<input type="radio" id="animateAnchor-no" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[animateAnchor]" value="no" <?php WPFP_Helpers()->checked( isset( $animateAnchor ) ? $animateAnchor : 'no', isset( $ANIMATEANCHOR ) ? $ANIMATEANCHOR : 'no', 'no' ); ?> />
							<label for="animateAnchor-no">
							 	<?php _e( 'no', WPFP_DOMAIN ); ?>
							</label>

						</div>

						<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether the load of the site when given an anchor (#) will scroll with animation to its destination or will directly load on the given section.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- On Leave -->
					<li>

						<label for="onLeave">
						 	<?php _e( 'On Leave', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="onLeave" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[onLeave]" <?php WPFP_Helpers()->default_setting( isset( $ONLEAVE ) ? $ONLEAVE : '', true ); ?>><?php print isset( $onLeave ) ? $onLeave : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'This callback is fired once the user leaves a section, in the transition to the new section. Use your own javascript code or customize the function "fullpageOnLeave" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#onleave-index-nextindex-direction"></a>

					</li>
					
					<!-- After Load -->
					<li>

						<label for="afterLoad">
						 	<?php _e( 'After Load', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="afterLoad" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[afterLoad]" <?php WPFP_Helpers()->default_setting( isset( $AFTERLOAD ) ? $AFTERLOAD : '', true ); ?>><?php print isset( $afterLoad ) ? $afterLoad : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'Callback fired once the sections have been loaded, after the scrolling has ended. Use your own javascript code or customize the function "fullpageAfterLoad" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#afterload-anchorlink-index"></a>

					</li>
					
					<!-- After Render -->
					<li>

						<label for="afterRender">
						 	<?php _e( 'After Render', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="afterRender" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[afterRender]" <?php WPFP_Helpers()->default_setting( isset( $AFTERRENDER ) ? $AFTERRENDER : '', true ); ?>><?php print isset( $afterRender ) ? $afterRender : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'This callback is fired just after the structure of the page is generated. This is the callback you want to use to initialize other plugins or fire any code which requires the document to be ready (as this plugin modifies the DOM to create the resulting structure). Use your own javascript code or customize the function "fullpageAfterRender" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#afterrender"></a>

					</li>
					
					<!-- After Resize -->
					<li>

						<label for="afterResize">
						 	<?php _e( 'After Resize', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="afterResize" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[afterResize]" <?php WPFP_Helpers()->default_setting( isset( $AFTERRESIZE ) ? $AFTERRESIZE : '', true ); ?>><?php print isset( $afterResize ) ? $afterResize : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'This callback is fired after resizing the browser\'s window. Just after the sections are resized. Use your own javascript code or customize the function "fullpageAfterResize" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#afterresize"></a>

					</li>
					
					<!-- After Slide Load -->
					<li>

						<label for="afterSlideLoad">
						 	<?php _e( 'After Slide Load', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="afterSlideLoad" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[afterSlideLoad]" <?php WPFP_Helpers()->default_setting( isset( $AFTERSLIDELOAD ) ? $AFTERSLIDELOAD : '', true ); ?>><?php print isset( $afterSlideLoad ) ? $afterSlideLoad : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'Callback fired once the slide of a section have been loaded, after the scrolling has ended. Use your own javascript code or customize the function "fullpageAfterSlideLoad" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#afterslideload-anchorlink-index-slideanchor-slideindex"></a>

					</li>
					
					<!-- On Slide Leave -->
					<li>

						<label for="onSlideLeave">
						 	<?php _e( 'On Slide Leave', WPFP_DOMAIN ); ?>
						</label>
						<textarea cols="40" id="onSlideLeave" name="<?php print WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS; ?>[onSlideLeave]" <?php WPFP_Helpers()->default_setting( isset( $ONSLIDELEAVE ) ? $ONSLIDELEAVE : '', true ); ?>><?php print isset( $onSlideLeave ) ? $onSlideLeave : ''; ?></textarea>
						<span class="wpfp-tip" data-tip='<?php _e( 'This callback is fired once the user leaves an slide to go to another, in the transition to the new slide. Use your own javascript code or customize the function "fullpageSlideLeave" in "your-theme/wp-fullpage/js/jquery.fullpage.custom.js".', WPFP_DOMAIN ); ?>'></span><a class="wpfp-goto" title="<?php _e( 'Go to callback definition.', WPFP_DOMAIN ); ?>" target="_blank" href="https://github.com/alvarotrigo/fullPage.js#onslideleave-anchorlink-index-slideindex-direction"></a>

					</li>

				</ul>

			</div>

		</div>

	</div>

	<div id="sections-options">

		<div class="inside">

			<div class="setting-panel">

				<ul class="sections-options">
					
					<!-- Title -->
					<li>

						<h5><?php _e( 'Sections Options', WPFP_DOMAIN );?></h5>

					</li>
							
					<!-- Vertical Position -->
					<li>

						<label for="verticalPosition">
						 	<?php _e( 'Vertical Position', WPFP_DOMAIN ); ?>
						</label>

						<select id="verticalPosition" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[verticalPosition]" <?php WPFP_Helpers()->default_setting( isset( $VERTICALPOSITION ) ? $VERTICALPOSITION : 'middle', true ); ?>>
							
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

						<select id="horizontalPosition" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[horizontalPosition]" <?php WPFP_Helpers()->default_setting( isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'center', true ); ?>>
							
							<option value="center" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'center' ); ?>><?php _e( 'Center', WPFP_DOMAIN ); ?></option>
							<option value="left" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'left' ); ?>><?php _e( 'Left', WPFP_DOMAIN ); ?></option>
							<option value="right" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'right' ); ?>><?php _e( 'Right', WPFP_DOMAIN ); ?></option>

						</select>

						<span class="wpfp-tip" data-tip="<?php _e( 'Horizontal position of the content within slide.', WPFP_DOMAIN ); ?>"></span>

					</li>

					<li>
				
						<label for="navTitle">
						 	<?php _e( 'Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="navTitle" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[navTitle]" <?php WPFP_Helpers()->value( isset( $navTitle ) ? $navTitle : '', isset( $NAVTITLE ) ? $NAVTITLE : '' ); ?> />
					
					</li>
			
					<!-- Slides Color -->
					<li>
				
						<label for="slideColor">
						 	<?php _e( 'Slides Color', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Define the CSS background-color property for slides. Example : "#f2f2f2", "#4BBFC3", "#7BAABE", "whitesmoke", "#000".', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slideColor" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[slideColor]" <?php WPFP_Helpers()->value( isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' ); ?> />
					
					</li>
			
					<!-- Slides Navigation Title -->
					<li>
				
						<label for="slidesNavTitle">
						 	<?php _e( 'Slides Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slidesNavTitle" name="<?php print WPFP_FULLPAGE_PT_SLIDES_OPTIONS; ?>[slidesNavTitle]" <?php WPFP_Helpers()->value( isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' ); ?> />
					
					</li>

					<!-- Section Type -->
					<li>

						<label for="sectionsType">
						 	<?php _e( 'Sections Type', WPFP_DOMAIN ); ?>
						</label>

						<select id="sectionsType" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[sectionsType]">
							
							<option value="sections" <?php selected( isset( $sectionsType ) ? $sectionsType : '', 'sections' ); ?>><?php _e( 'Sections', WPFP_DOMAIN ); ?></option>
							<option value="post-taxonomies" <?php selected( isset( $sectionsType ) ? $sectionsType : '', 'post-taxonomies' ); ?>><?php _e( 'Post Taxonomies', WPFP_DOMAIN ); ?></option>
							<option value="post-types" <?php selected( isset( $sectionsType ) ? $sectionsType : '', 'post-types' ); ?>><?php _e( 'Post Types', WPFP_DOMAIN ); ?></option>
							<!--<option value="custom" <?php selected( isset( $sectionsType ) ? $sectionsType : '', 'custom' ); ?>><?php _e( 'Custom', WPFP_DOMAIN ); ?></option>-->

						</select>
						
						<span class="wpfp-tip" data-tip="<?php _e( 'Which type of sections do you want to display for this Fullpage.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Sections -->
					<li id="sections-wrapper" class="wpfp-slide-wrapper sub-options">

						<ul class="sub-options">

							<li>
								<h6><?php _e( 'Sections', WPFP_DOMAIN ); ?></h6>
							</li>

							<li>

								<label for="bbm-sections-list-launcher">
								 	<?php _e( 'Sections', WPFP_DOMAIN ); ?>

								 	<span class="wpfp-tip" data-tip="<?php _e( 'Add and reorder some sections to your Fullpage.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<ul id="sortableSections"></ul>
								
								<input type="hidden" id="sections-list" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[sections]" value="<?php print esc_attr( isset( $sections ) ? $sections : '' ); ?>" />
								
								<?php

									$datas = array(
										'postType' => WPFP_FULLPAGE_SECTION_PT,
									);
								
								?>

								<input type="button" class="button button-large" id="bbm-sections-list-launcher" value="<?php _e( 'Add sections' , WPFP_DOMAIN ) ?>" data-datas='<?php print json_encode( $datas ); ?>' />
								
								<div class="clear"></div>
							
							</li>

						</ul>

					</li>
					
					<!-- Post Taxonomies or Types -->
					<li id="post-taxonomies-or-types-wrapper" class="wpfp-slide-wrapper sub-options">
						
						<ul class="sub-options">

							<li class="post-taxonomies-wrapper">
								<h6><?php _e( 'Post taxonomies', WPFP_DOMAIN ); ?></h6>
							</li>

							<li class="post-types-wrapper">
								<h6><?php _e( 'Post types', WPFP_DOMAIN ); ?></h6>
							</li>

							<li>

								<span class="label">
								 	<?php _e( 'Teaser', WPFP_DOMAIN ); ?>
									<span class="wpfp-tip" data-tip='<?php _e( 'Choose yes if you want to display the teaser.', WPFP_DOMAIN ); ?>'></span>
								</span>

								<div class="radio">
									
									<input type="radio" id="teaserDisplay-yes" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[teaserDisplay]" value="yes" <?php WPFP_Helpers()->checked( isset( $teaserDisplay ) ? $teaserDisplay : 'no', isset( $TEASERDISPLAY ) ? $TEASERDISPLAY : 'no', 'yes' ); ?> />
									<label for="teaserDisplay-yes">
									 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
									</label>
									<input type="radio" id="teaserDisplay-no" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[teaserDisplay]" value="no" <?php WPFP_Helpers()->checked( isset( $teaserDisplay ) ? $teaserDisplay : 'no', isset( $TEASERDISPLAY ) ? $TEASERDISPLAY : 'no', 'no' ); ?> />
									<label for="teaserDisplay-no">
									 	<?php _e( 'no', WPFP_DOMAIN ); ?>
									</label>

								</div>

								<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether the load of the site when given an anchor (#) will scroll with animation to its destination or will directly load on the given section.', WPFP_DOMAIN ); ?>"></span>

							</li>

							<li id="teaserLength-container">
						
								<label for="teaserLength">
								 	<?php _e( 'Teaser Length', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip='<?php _e( 'How many characters do you want to display in the teaser. If set to "0", it will take the default value af your theme.', WPFP_DOMAIN ); ?>'></span>
								</label>
								
								<input type="number" id="teaserLength" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[teaserLength]" class="small-text" step="10" min="0" <?php WPFP_Helpers()->value( isset( $teaserLength ) ? $teaserLength : 100, isset( $TEASERLENGTH ) ? $TEASERLENGTH : 100 ); ?> />
							
							</li>

							<li>
						
								<label for="countPosts">
								 	<?php _e( 'Count', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'How many posts do you want to display.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<input type="number" id="countPosts" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[countPosts]" step="1" min="1" class="small-text" <?php WPFP_Helpers()->value( isset( $countPosts ) ? $countPosts : get_option( 'posts_per_page' ), isset( $COUNTPOSTS ) ? $COUNTPOSTS : get_option( 'posts_per_page' ) ); ?> />
							
							</li>

							<li>
						
								<label for="orderBy">
								 	<?php _e( 'Order By', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'What do you want to order the list with.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select id="orderBy" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[orderBy]" <?php WPFP_Helpers()->default_setting( isset( $ORDERBY ) ? $ORDERBY : 'date', true ); ?>>
									
									<option value="date" <?php selected( isset( $orderBy ) ? $orderBy : '', 'date' ); ?>><?php _e( 'Date', WPFP_DOMAIN ); ?></option>
									<option value="post__in" <?php selected( isset( $orderBy ) ? $orderBy : '', 'post__in' ); ?>><?php _e( 'Include Order', WPFP_DOMAIN ); ?></option>
									<option value="ID" <?php selected( isset( $orderBy ) ? $orderBy : '', 'ID' ); ?>><?php _e( 'Post ID', WPFP_DOMAIN ); ?></option>
									<option value="author" <?php selected( isset( $orderBy ) ? $orderBy : '', 'author' ); ?>><?php _e( 'Author', WPFP_DOMAIN ); ?></option>
									<option value="title" <?php selected( isset( $orderBy ) ? $orderBy : '', 'title' ); ?>><?php _e( 'Title', WPFP_DOMAIN ); ?></option>
									<option value="name" <?php selected( isset( $orderBy ) ? $orderBy : '', 'name' ); ?>><?php _e( 'Post Name (slug)', WPFP_DOMAIN ); ?></option>
									<option value="modified" <?php selected( isset( $orderBy ) ? $orderBy : '', 'modified' ); ?>><?php _e( 'Modified date', WPFP_DOMAIN ); ?></option>
									<option value="parent" <?php selected( isset( $orderBy ) ? $orderBy : '', 'parent' ); ?>><?php _e( 'Parent', WPFP_DOMAIN ); ?></option>
									<option value="rand" <?php selected( isset( $orderBy ) ? $orderBy : '', 'rand' ); ?>><?php _e( 'Random', WPFP_DOMAIN ); ?></option>
									<option value="comment_count" <?php selected( isset( $orderBy ) ? $orderBy : '', 'comment_count' ); ?>><?php _e( 'Comment count', WPFP_DOMAIN ); ?></option>
									<option value="meta_value" <?php selected( isset( $orderBy ) ? $orderBy : '', 'meta_value' ); ?>><?php _e( 'Meta Value', WPFP_DOMAIN ); ?></option>

								</select>
							
							</li>

							<li id="orderByMetaValueKey-container">
						
								<label for="orderByMetaValueKey">
								 	<?php _e( 'Order By Meta Value Key', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'which meta key do you want to use to order the list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<input type="text" id="orderByMetaValueKey" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[orderByMetaValueKey]" <?php WPFP_Helpers()->value( isset( $orderByMetaValueKey ) ? $orderByMetaValueKey : '', isset( $ORDERBYMETAVALUEKEY ) ? $ORDERBYMETAVALUEKEY : '' ); ?> />
							
							</li>

							<li>
						
								<label for="order">
								 	<?php _e( 'Order', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'How do you want to order the list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select id="order" name="<?php print WPFP_FULLPAGE_PT_CUSTOM_OPTIONS; ?>[order]" <?php WPFP_Helpers()->default_setting( isset( $ORDER ) ? $ORDER : 'ASC', true ); ?>>
									
									<option value="ASC" <?php selected( isset( $order ) ? $order : '', 'ASC' ); ?>><?php _e( 'ASC', WPFP_DOMAIN ); ?></option>
									<option value="DESC" <?php selected( isset( $order ) ? $order : '', 'DESC' ); ?>><?php _e( 'DESC', WPFP_DOMAIN ); ?></option>

								</select>
							
							</li>

							<li class="post-taxonomies-wrapper">
						
								<label for="taxonomy">
								 	<?php _e( 'Taxonomy', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'Which taxonomy do you want to list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select data-placeholder="<?php _e( 'Choose a Taxonomy', WPFP_DOMAIN ); ?>" class="taxonomy chzn-select" id="taxonomy" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[taxonomy]">
									
									<?php

										foreach ( $taxonomies as $_taxonomy ) :
											
											?>
												<option value="<?php print $_taxonomy->name; ?>" <?php selected( isset( $taxonomy ) ? $taxonomy : '', $_taxonomy->name ); ?>><?php print $_taxonomy->label; ?></option>
											<?php

										endforeach;

									?>

								</select>
							
							</li>

							<li class="post-taxonomies-wrapper">
						
								<label>
								 	<?php _e( 'Term of the taxonomy', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'Which term of the taxonomy do you want to list.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<input type="hidden" id="term" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[term]" value="<?php print esc_attr( isset( $term ) ? $term : '' ); ?>" />

								<?php

									foreach ( $terms as $_taxonomy => $_terms ) :

								?>

									<select data-placeholder="<?php _e( 'Choose a Taxonomy Term', WPFP_DOMAIN ); ?>" id="<?php print $_taxonomy; ?>-term" class="term chzn-select">
											
										<?php

											foreach ( $_terms as $_term ) :
												
												?>
													<option class="term <?php print $_taxonomy; ?>" value="<?php print $_term->term_id; ?>" <?php selected( isset( $term ) ? $term : '', $_term->term_id ); ?>><?php print $_term->name; ?></option>
												<?php

											endforeach;
									
										?>

									</select>

								<?php

									endforeach;

								?>
							
							</li>

							<li class="post-taxonomies-wrapper">
						
								<label>
								 	<?php _e( 'Include Children', WPFP_DOMAIN ); ?>
								</label>

								<div class="radio">
									
									<input type="radio" id="includeChildren-yes" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[includeChildren]" value="yes" <?php WPFP_Helpers()->checked( isset( $includeChildren ) ? $includeChildren : 'no', isset( $INCLUDECHILDREN ) ? $INCLUDECHILDREN : 'no', 'yes' ); ?> />
									<label for="includeChildren-yes">
									 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
									</label>
									<input type="radio" id="includeChildren-no" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[includeChildren]" value="no" <?php WPFP_Helpers()->checked( isset( $includeChildren ) ? $includeChildren : 'no', isset( $INCLUDECHILDREN ) ? $INCLUDECHILDREN : 'no', 'no' ); ?> />
									<label for="includeChildren-no">
									 	<?php _e( 'no', WPFP_DOMAIN ); ?>
									</label>

								</div>
									
								<span class="wpfp-tip" data-tip="<?php _e( 'Do you want to include children of the term?', WPFP_DOMAIN ); ?>"></span>
							
							</li>

							<li class="post-types-wrapper">
						
								<label for="postType">
								 	<?php _e( 'Post Type', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'Which post type do you want to list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select data-placeholder="<?php _e( 'Choose a Post Type', WPFP_DOMAIN ); ?>" class="postType chzn-select" id="postType" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[postType]">
									
									<?php

										foreach ( $post_types as $__post_type => $__post_type_object ) :

											?>
												<option value="<?php print $__post_type; ?>" <?php selected( isset( $postType ) ? $postType : '', $__post_type ); ?>><?php print $__post_type_object->labels->singular_name; ?></option>
											<?php

										endforeach;

									?>

								</select>
							
							</li>

							<li>

								<label for="bbm-included-posts-launcher">
								 	<?php _e( 'Included Posts', WPFP_DOMAIN ); ?>

								 	<span class="wpfp-tip" data-tip="<?php _e( 'The posts to include.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<ul id="sortableIncludedPosts"></ul>
								
								<input type="hidden" id="included-posts" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[includedPosts]" value="<?php print esc_attr( isset( $includedPosts ) ? $includedPosts : '' ); ?>" />

								<div class="post-taxonomies-wrapper">

									<?php

										foreach ( $terms as $_taxonomy => $_terms ) :

									?>
												
										<?php

											foreach ( $_terms as $_term ) :
												
												$datas = array(
													'taxonomy' => $_taxonomy,
													'termID' => $_term->term_id,
												);

												$dataKey = 'includedPosts' . ucfirst( $_taxonomy ) . $_term->term_id;

												?>

													<input type="hidden" id="included-posts-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[includedPosts<?php print ucfirst( $_taxonomy ); ?><?php print $_term->term_id; ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

													<input type="button" class="button button-large bbm-included-posts-of-term-launcher" id="bbm-included-posts-of-term-launcher-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" value='<?php printf( __( 'Include posts of term "%1s"' , WPFP_DOMAIN ), $_term->name ); ?>' data-datas='<?php print json_encode( $datas ) ?>' />
												
												<?php

											endforeach;
									
										?>

									<?php

										endforeach;

									?>
								
								</div>

								<div class="post-types-wrapper">

									<?php

										foreach ( $post_types as $__post_type => $__post_type_object ) :
											
											$datas = array(
												'postType' => $__post_type,
											);

											$dataKey = 'includedPosts' . ucfirst( $__post_type );

											?>

												<input type="hidden" id="included-posts-<?php print $__post_type ?>" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[includedPosts<?php print ucfirst( $__post_type ); ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

												<input type="button" class="button button-large bbm-included-posts-of-type-launcher" id="bbm-included-posts-of-type-launcher-<?php print $__post_type ?>" value='<?php printf( __( 'Include posts of type "%1s"' , WPFP_DOMAIN ), $__post_type_object->labels->singular_name ); ?>' data-datas='<?php print json_encode( $datas ) ?>' />
											
											<?php

										endforeach;

									?>

								</div>
							
							</li>

							<li>

								<label for="bbm-excluded-posts-launcher">
								 	<?php _e( 'Excluded Posts', WPFP_DOMAIN ); ?>

								 	<span class="wpfp-tip" data-tip="<?php _e( 'The posts to exclude.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<ul id="sortableExcludedPosts"></ul>
								
								<input type="hidden" id="excluded-posts" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[excludedPosts]" value="<?php print esc_attr( isset( $excludedPosts ) ? $excludedPosts : '' ); ?>" />

								<div class="post-taxonomies-wrapper">

									<?php

										foreach ( $terms as $_taxonomy => $_terms ) :

									?>
												
										<?php

											foreach ( $_terms as $_term ) :
												
												$datas = array(
													'taxonomy' => $_taxonomy,
													'termID' => $_term->term_id,
												);

												$dataKey = 'excludedPosts' . ucfirst( $_taxonomy ) . $_term->term_id;

												?>

													<input type="hidden" id="excluded-posts-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[excludedPosts<?php print ucfirst( $_taxonomy ); ?><?php print $_term->term_id; ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

													<input type="button" class="button button-large bbm-excluded-posts-of-term-launcher" id="bbm-excluded-posts-of-term-launcher-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" value='<?php printf( __( 'Exclude posts of term "%1s"' , WPFP_DOMAIN ), $_term->name ); ?>' data-datas='<?php print json_encode( $datas ) ?>' />
												
												<?php

											endforeach;
									
										?>

									<?php

										endforeach;

									?>

								</div>

								<div class="post-types-wrapper">

									<?php

										foreach ( $post_types as $__post_type => $__post_type_object ) :
											
											$datas = array(
												'postType' => $__post_type,
											);

											$dataKey = 'excludedPosts' . ucfirst( $__post_type );

											?>

												<input type="hidden" id="excluded-posts-<?php print $__post_type ?>" name="<?php print WPFP_FULLPAGE_PT_SECTIONS_OPTIONS; ?>[excludedPosts<?php print ucfirst( $__post_type ); ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

												<input type="button" class="button button-large bbm-excluded-posts-of-type-launcher" id="bbm-excluded-posts-of-type-launcher-<?php print $__post_type ?>" value='<?php printf( __( 'Exclude posts of type "%1s"' , WPFP_DOMAIN ), $__post_type_object->labels->singular_name ); ?>' data-datas='<?php print json_encode( $datas ) ?>' />
											
											<?php

										endforeach;

									?>
									
								</div>
							
							</li>

						</ul>

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
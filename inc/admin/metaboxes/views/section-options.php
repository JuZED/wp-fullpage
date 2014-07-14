<?php

/**
 * Template for Section Option Metabox
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
			<a href="#slides-options">
				<?php _e( 'Slides Options', WPFP_DOMAIN );?>
			</a>
			<span class="wpfp-tip tabs-tip" data-tip='<?php _e( 'Options for slides of a post type or a taxonomy.', WPFP_DOMAIN ); ?>'></span>
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
					
					<!-- Navigation Tilte -->
					<li>
				
						<label for="navTitle">
						 	<?php _e( 'Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the navigation tooltip in case it is being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will use the FullPage option.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="navTitle" name="<?php print WPFP_SECTION_PT_SECTION_OPTIONS; ?>[navTitle]" <?php WPFP_Helpers()->value( isset( $navTitle ) ? $navTitle : '', isset( $NAVTITLE ) ? $NAVTITLE : '' ); ?> />
					
					</li>
					
					<!-- Slides Navigation -->
					<li>

						<label for="slidesNavigation">
						 	<?php _e( 'Slides Navigation', WPFP_DOMAIN ); ?>
						</label>
						<select id="slidesNavigation" name="<?php print WPFP_SECTION_PT_FULLPAGE_OPTIONS; ?>[slidesNavigation]" <?php WPFP_Helpers()->default_setting( isset( $SLIDESNAVIGATION ) ? $SLIDESNAVIGATION : 'top', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $slidesNavigation ) ? $slidesNavigation : '', 'inherit' ); ?>><?php _e( 'Inherit from FullPage', WPFP_DOMAIN ); ?></option>
							<option value="yes" <?php selected( isset( $slidesNavigation ) ? $slidesNavigation : '', 'yes' ); ?>><?php _e( 'Yes', WPFP_DOMAIN ); ?></option>
							<option value="no" <?php selected( isset( $slidesNavigation ) ? $slidesNavigation : '', 'no' ); ?>><?php _e( 'No', WPFP_DOMAIN ); ?></option>

						</select>
						<span class="wpfp-tip" data-tip="<?php _e( 'If set to true it will show a navigation bar made up of small circles for each landscape slider on the site. Choose Inherit to use Fullpage option.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Slides Nav Position -->
					<li>

						<label for="slidesNavPosition">
						 	<?php _e( 'Slides Nav Position', WPFP_DOMAIN ); ?>
						</label>
						<select id="slidesNavPosition" name="<?php print WPFP_SECTION_PT_FULLPAGE_OPTIONS; ?>[slidesNavPosition]" <?php WPFP_Helpers()->default_setting( isset( $SLIDESNAVPOSITION ) ? $SLIDESNAVPOSITION : 'top', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $slidesNavPosition ) ? $slidesNavPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from FullPage', WPFP_DOMAIN ); ?></option>
							<option value="top" <?php selected( isset( $slidesNavPosition ) ? $slidesNavPosition : '', 'top' ); ?>><?php _e( 'Top', WPFP_DOMAIN ); ?></option>
							<option value="bottom" <?php selected( isset( $slidesNavPosition ) ? $slidesNavPosition : '', 'bottom' ); ?>><?php _e( 'Bottom', WPFP_DOMAIN ); ?></option>

						</select>
						<span class="wpfp-tip" data-tip="<?php _e( 'Defines the position for the landscape navigation bar for sliders. Admits top and bottom as values. Choose Inherit to use Fullpage option.', WPFP_DOMAIN ); ?>"></span>

					</li>

				</ul>

			</div>

		</div>

	</div>

	<div id="slides-options">

		<div class="inside">

			<div class="setting-panel">

				<ul class="slides-options">
					
					<!-- Title -->
					<li>

						<h5><?php _e( 'Slides Options', WPFP_DOMAIN );?></h5>

					</li>
							
					<!-- Vertical Position -->
					<li>

						<label for="verticalPosition">
						 	<?php _e( 'Vertical Position', WPFP_DOMAIN ); ?>
						</label>

						<select id="verticalPosition" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[verticalPosition]" <?php WPFP_Helpers()->default_setting( isset( $VERTICALPOSITION ) ? $VERTICALPOSITION : 'inherit', true ); ?>>
							
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

						<select id="horizontalPosition" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[horizontalPosition]" <?php WPFP_Helpers()->default_setting( isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'inherit', true ); ?>>
							
							<option value="inherit" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'inherit' ); ?>><?php _e( 'Inherit from Fullpage', WPFP_DOMAIN ); ?></option>
							<option value="center" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'center' ); ?>><?php _e( 'Center', WPFP_DOMAIN ); ?></option>
							<option value="left" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'left' ); ?>><?php _e( 'Left', WPFP_DOMAIN ); ?></option>
							<option value="right" <?php selected( isset( $horizontalPosition ) ? $horizontalPosition : '', 'right' ); ?>><?php _e( 'Right', WPFP_DOMAIN ); ?></option>

						</select>

						<span class="wpfp-tip" data-tip="<?php _e( 'Horizontal position of the content within slide.', WPFP_DOMAIN ); ?>"></span>

					</li>

					<li>
				
						<label for="slidesNavTitle">
						 	<?php _e( 'Slides Navigation Title', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will use the FullPage option.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slidesNavTitle" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[slidesNavTitle]" <?php WPFP_Helpers()->value( isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' ); ?> />
					
					</li>
					
					<!-- Slides Color -->
					<li>
				
						<label for="slideColor">
						 	<?php _e( 'Slides Color', WPFP_DOMAIN ); ?>
							
							<span class="wpfp-tip" data-tip='<?php _e( 'Define the CSS background-color property for the slides. If empty, it will use the FullPage option.', WPFP_DOMAIN ); ?>'></span>
						</label>
						
						<input type="text" id="slideColor" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[slideColor]" <?php WPFP_Helpers()->value( isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' ); ?> />
					
					</li>

					<!-- Section Type -->
					<li>

						<label for="slidesType">
						 	<?php _e( 'Slides Type', WPFP_DOMAIN ); ?>
						</label>

						<select id="slidesType" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[slidesType]">
							
							<option value="section" <?php selected( isset( $slidesType ) ? $slidesType : '', 'section' ); ?>><?php _e( 'Simple Section', WPFP_DOMAIN ); ?></option>
							<option value="slides" <?php selected( isset( $slidesType ) ? $slidesType : '', 'slides' ); ?>><?php _e( 'Slides', WPFP_DOMAIN ); ?></option>
							<option value="post-taxonomies" <?php selected( isset( $slidesType ) ? $slidesType : '', 'post-taxonomies' ); ?>><?php _e( 'Post Taxonomies', WPFP_DOMAIN ); ?></option>
							<option value="post-types" <?php selected( isset( $slidesType ) ? $slidesType : '', 'post-types' ); ?>><?php _e( 'Post Types', WPFP_DOMAIN ); ?></option>
							<!--<option value="custom" <?php selected( isset( $slidesType ) ? $slidesType : '', 'custom' ); ?>><?php _e( 'Custom', WPFP_DOMAIN ); ?></option>-->

						</select>
						
						<span class="wpfp-tip" data-tip="<?php _e( 'Which type of slides do you want to display for this Section.', WPFP_DOMAIN ); ?>"></span>

					</li>
					
					<!-- Slides -->
					<li id="slides-wrapper" class="wpfp-slide-wrapper sub-options">

						<ul class="sub-options">

							<li>
								<h6><?php _e( 'Slides', WPFP_DOMAIN ); ?></h6>
							</li>

							<li>

								<label for="bbm-slides-list-launcher">
								 	<?php _e( 'Slides', WPFP_DOMAIN ); ?>

								 	<span class="wpfp-tip" data-tip="<?php _e( 'Add and reorder some slides to your Section.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<ul id="sortableSlides"></ul>
								
								<input type="hidden" id="slides-list" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[slides]" value="<?php print esc_attr( isset( $slides ) ? $slides : '' ); ?>" />
								
								<?php

									$datas = array(
										'postType' => WPFP_FULLPAGE_SLIDE_PT,
									);
								
								?>

								<input type="button" class="button button-large" id="bbm-slides-list-launcher" value="<?php _e( 'Add slides' , WPFP_DOMAIN ) ?>" data-datas='<?php print json_encode( $datas ); ?>' />
								
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
									<span class="wpfp-tip" data-tip='<?php _e( 'Choose yesf you want to display the teaser.', WPFP_DOMAIN ); ?>'></span>
								</span>

								<div class="radio">
									
									<input type="radio" id="teaserDisplay-yes" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[teaserDisplay]" value="yes" <?php WPFP_Helpers()->checked( isset( $teaserDisplay ) ? $teaserDisplay : 'no', isset( $TEASERDISPLAY ) ? $TEASERDISPLAY : 'no', 'yes' ); ?> />
									<label for="teaserDisplay-yes">
									 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
									</label>
									<input type="radio" id="teaserDisplay-no" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[teaserDisplay]" value="no" <?php WPFP_Helpers()->checked( isset( $teaserDisplay ) ? $teaserDisplay : 'no', isset( $TEASERDISPLAY ) ? $TEASERDISPLAY : 'no', 'no' ); ?> />
									<label for="teaserDisplay-no">
									 	<?php _e( 'no', WPFP_DOMAIN ); ?>
									</label>

								</div>

								<span class="wpfp-tip" data-tip="<?php _e( 'Defines whether scrolling down in the last section should scroll down to the first one or not, and if scrolling up in the first section should scroll up to the last one or not. Not compatible with loopTop or loopBottom.', WPFP_DOMAIN ); ?>"></span>

							</li>

							<li id="teaserLength-container">
						
								<label for="teaserLength">
								 	<?php _e( 'Teaser Length', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip='<?php _e( 'How many characters do you want to display in the teaser. If set to "0", it will take the default value af your theme.', WPFP_DOMAIN ); ?>'></span>
								</label>
								
								<input type="number" id="teaserLength" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[teaserLength]" class="small-text" step="10" min="0" <?php WPFP_Helpers()->value( isset( $teaserLength ) ? $teaserLength : 100, isset( $TEASERLENGTH ) ? $TEASERLENGTH : 100 ); ?> />
							
							</li>

							<li>
						
								<label for="countPosts">
								 	<?php _e( 'Count', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'How many posts do you want to display.', WPFP_DOMAIN ); ?>"></span>
								</label>

								<input type="number" id="countPosts" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[countPosts]" step="1" min="1" class="small-text" <?php WPFP_Helpers()->value( isset( $countPosts ) ? $countPosts : get_option( 'posts_per_page' ), isset( $COUNTPOSTS ) ? $COUNTPOSTS : get_option( 'posts_per_page' ) ); ?> />
							
							</li>

							<li>
						
								<label for="orderBy">
								 	<?php _e( 'Order By', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'What do you want to order the list with.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select data-placeholder='<?php _e( 'Choose an "Order By" method', WPFP_DOMAIN ); ?>' id="orderBy" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[orderBy]" <?php WPFP_Helpers()->default_setting( isset( $ORDERBY ) ? $ORDERBY : '', true ); ?>>
									
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
								
								<input type="text" id="orderByMetaValueKey" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[orderByMetaValueKey]" <?php WPFP_Helpers()->value( isset( $orderByMetaValueKey ) ? $orderByMetaValueKey : '', isset( $ORDERBYMETAVALUEKEY ) ? $ORDERBYMETAVALUEKEY : '' ); ?> />
							
							</li>

							<li>
						
								<label for="order">
								 	<?php _e( 'Order', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'How do you want to order the list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select data-placeholder="<?php _e( 'Choose an order', WPFP_DOMAIN ); ?>" id="order" name="<?php print WPFP_SECTION_PT_CUSTOM_OPTIONS; ?>[order]" <?php WPFP_Helpers()->default_setting( isset( $ORDER ) ? $ORDER : '', true ); ?>>
									
									<option value="ASC" <?php selected( isset( $order ) ? $order : '', 'ASC' ); ?>><?php _e( 'ASC', WPFP_DOMAIN ); ?></option>
									<option value="DESC" <?php selected( isset( $order ) ? $order : '', 'DESC' ); ?>><?php _e( 'DESC', WPFP_DOMAIN ); ?></option>

								</select>
							
							</li>

							<li class="post-taxonomies-wrapper">
						
								<label for="taxonomy">
								 	<?php _e( 'Taxonomy', WPFP_DOMAIN ); ?>
									
									<span class="wpfp-tip" data-tip="<?php _e( 'Which taxonomy do you want to list.', WPFP_DOMAIN ); ?>"></span>
								</label>
								
								<select data-placeholder="<?php _e( 'Choose a Taxonomy', WPFP_DOMAIN ); ?>" class="taxonomy chzn-select" id="taxonomy" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[taxonomy]">
									
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

								<input type="hidden" id="term" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[term]" value="<?php print esc_attr( isset( $term ) ? $term : '' ); ?>" />

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
									
									<input type="radio" id="includeChildren-yes" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[includeChildren]" value="yes" <?php WPFP_Helpers()->checked( isset( $includeChildren ) ? $includeChildren : 'no', isset( $INCLUDECHILDREN ) ? $INCLUDECHILDREN : 'no', 'yes' ); ?> />
									<label for="includeChildren-yes">
									 	<?php _e( 'yes', WPFP_DOMAIN ); ?>
									</label>
									<input type="radio" id="includeChildren-no" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[includeChildren]" value="no" <?php WPFP_Helpers()->checked( isset( $includeChildren ) ? $includeChildren : 'no', isset( $INCLUDECHILDREN ) ? $INCLUDECHILDREN : 'no', 'no' ); ?> />
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
								
								<select data-placeholder="<?php _e( 'Choose a Post Type', WPFP_DOMAIN ); ?>" class="postType chzn-select" id="postType" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[postType]">
									
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
								
								<input type="hidden" id="included-posts" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[includedPosts]" value="<?php print esc_attr( isset( $includedPosts ) ? $includedPosts : '' ); ?>" />

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

													<input type="hidden" id="included-posts-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[includedPosts<?php print ucfirst( $_taxonomy ); ?><?php print $_term->term_id; ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

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

												<input type="hidden" id="included-posts-<?php print $__post_type ?>" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[includedPosts<?php print ucfirst( $__post_type ); ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

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
								
								<input type="hidden" id="excluded-posts" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[excludedPosts]" value="<?php print esc_attr( isset( $excludedPosts ) ? $excludedPosts : '' ); ?>" />

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

													<input type="hidden" id="excluded-posts-<?php print $_taxonomy ?>-<?php print $_term->term_id ?>" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[excludedPosts<?php print ucfirst( $_taxonomy ); ?><?php print $_term->term_id; ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

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

												<input type="hidden" id="excluded-posts-<?php print $__post_type ?>" name="<?php print WPFP_SECTION_PT_SLIDES_OPTIONS; ?>[excludedPosts<?php print ucfirst( $__post_type ); ?>]" value="<?php print esc_attr( isset( $$dataKey ) ? $$dataKey : '' ); ?>" />

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
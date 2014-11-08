<?php

/**
 * Template for Section Option Metabox
 * 
 * @package 	WP_Fullpage\Includes\Metaboxes\Views
 */

?>

<div id="settingsbox">

	<div id="slides-options">

		<div class="inside">

			<div class="setting-panel">
				
				<?php WPFP_Helpers()->table_start( '', 'slides-options form-table' ); ?>
					
					<?php WPFP_Helpers()->caption( __( 'WP Fullpage Section Options', WPFP_DOMAIN ) ); ?>
							
					<!-- Slides Content toggler -->
					<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

							<?php

								WPFP_Helpers()->label( __( 'Slides Content', WPFP_DOMAIN ) );

							?>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
							
					<!-- Slides Content -->
					<?php WPFP_Helpers()->tr_start(); ?>
						
						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
				
							<div class="accordion-container">

								<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
					
									<!-- Section Type -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'SLides Type', WPFP_DOMAIN ), 'slidesType' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Which type of slides do you want to display for this Section.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SECTION_PT_SLIDES_OPTIONS, 'slidesType', array(
													'section'        => __( 'Simple Section', WPFP_DOMAIN ),
													'slides'        => __( 'Slides', WPFP_DOMAIN ),
													'post-taxonomies' => __( 'Post Taxonomies', WPFP_DOMAIN ),
													'post-types'      => __( 'Post Types', WPFP_DOMAIN ),
												), isset( $slidesType ) ? $slidesType : '', '', 'no-reset' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
									
									<!-- Slides -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
								
											<?php WPFP_Helpers()->table_start( 'slides-wrapper', 'wpfp-slide-wrapper sub-options form-table' ); ?>
												
												<?php WPFP_Helpers()->caption( __( 'Slides', WPFP_DOMAIN ) ); ?>
														
												<!-- Slides -->
												<?php WPFP_Helpers()->tr_start(); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

														<?php

															WPFP_Helpers()->label( __( 'Slides', WPFP_DOMAIN ), 'bbm-slides-list-launcher' );

														?>

														<?php

															WPFP_Helpers()->tooltip( __( 'Add and reorder some slides to your Section.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>

														<ul id="sortableSlides"></ul>
														
														<?php

															WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[slides]', 'slides-list', isset( $slides ) ? $slides : '' );

														?>
														
														<?php

															$datas = array(
																'postType' => WPFP_FULLPAGE_SLIDE_PT,
															);
														
														?>

														<?php

															WPFP_Helpers()->button( 'bbm-slides-list-launcher', __( 'Add slides' , WPFP_DOMAIN ), $datas, 'button button-large' );

														?>

														<div class="clear"></div>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

											<?php WPFP_Helpers()->table_end(); ?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
									
									<!-- Post Taxonomies or Types -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
								
											<?php WPFP_Helpers()->table_start( 'post-taxonomies-or-types-wrapper', 'wpfp-slide-wrapper sub-options form-table' ); ?>
												
												<?php WPFP_Helpers()->caption( __( 'Post taxonomies', WPFP_DOMAIN ), 'post-taxonomies-wrapper' ); ?>
												
												<?php WPFP_Helpers()->caption( __( 'Post types', WPFP_DOMAIN ), 'post-types-wrapper' ); ?>
														
												<!-- Teaser -->
												<?php WPFP_Helpers()->tr_start(); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php WPFP_Helpers()->span_label( __( 'Teaser', WPFP_DOMAIN ) ); ?>

														<?php

															WPFP_Helpers()->tooltip( __( 'Choose yes if you want to display the teaser.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>

														<?php

															WPFP_Helpers()->radio( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'teaserDisplay', array(
																'yes' => __( 'yes', WPFP_DOMAIN ),
																'no'  => __( 'no', WPFP_DOMAIN ),
															), isset( $teaserDisplay ) ? $teaserDisplay : 'yes', isset( $TEASERDISPLAY ) ? $TEASERDISPLAY : 'yes' );

														?>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>
														
												<!-- Teaser Length -->
												<?php WPFP_Helpers()->tr_start( 'teaserLength-container' ); ?>
										
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

															WPFP_Helpers()->number( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'teaserLength', isset( $teaserLength ) ? $teaserLength : 100, isset( $TEASERLENGTH ) ? $TEASERLENGTH : 100, 0, 10, 'small-text' );

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

															WPFP_Helpers()->tooltip( __( 'How many posts do you want to display.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>

														<?php

															WPFP_Helpers()->number( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'countPosts', isset( $teaserLength ) ? $countPosts : get_option( 'posts_per_page' ), isset( $COUNTPOSTS ) ? $COUNTPOSTS : get_option( 'posts_per_page' ), 1, 1, 'small-text' );

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

															WPFP_Helpers()->select( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'orderBy', array(
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
															), isset( $orderBy ) ? $orderBy : 'date', isset( $ORDERBY ) ? $ORDERBY : 'date' );

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

															WPFP_Helpers()->text( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'orderByMetaValueKey', isset( $orderByMetaValueKey ) ? $orderByMetaValueKey : '', isset( $ORDERBYMETAVALUEKEY ) ? $ORDERBYMETAVALUEKEY : '' );

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

															WPFP_Helpers()->select( WPFP_SECTION_PT_CUSTOM_OPTIONS, 'order', array(
																'ASC'  => __( 'ASC', WPFP_DOMAIN ),
																'DESC' => __( 'DESC', WPFP_DOMAIN ),
															), isset( $order ) ? $order : 'ASC', isset( $ORDER ) ? $ORDER : 'ASC' );

														?>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Taxonomy -->
												<?php WPFP_Helpers()->tr_start( '', 'post-taxonomies-wrapper' ); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Taxonomy', WPFP_DOMAIN ), 'taxonomy' );

														?>
												
														<?php

															WPFP_Helpers()->tooltip( __( 'Which taxonomy do you want to list.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<?php

															$_taxonomies = array();

															foreach ( $taxonomies as $_taxonomy )
																$_taxonomies[$_taxonomy->name] = $_taxonomy->label;

															WPFP_Helpers()->select( WPFP_SECTION_PT_SLIDES_OPTIONS, 'taxonomy', $_taxonomies, isset( $taxonomy ) ? $taxonomy : '', '', 'taxonomy chzn-select no-reset' );

														?>	

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Term of the taxonomy -->
												<?php WPFP_Helpers()->tr_start( '', 'post-taxonomies-wrapper' ); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Term of the taxonomy', WPFP_DOMAIN ), '' );

														?>
												
														<?php

															WPFP_Helpers()->tooltip( __( 'Which term of the taxonomy do you want to list.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<?php

															WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[term]', 'term', isset( $term ) ? $term : '' );

														?>

														<?php

															foreach ( $terms as $_taxonomy => $_terms ) :

																$__terms = array();

																foreach ( $_terms as $_term )
																	$__terms[$_term->term_id] = $_term->name;

																WPFP_Helpers()->select( '', $_taxonomy . '-term', $__terms, isset( $term ) ? $term : '', '', 'term chzn-select no-reset' );


															endforeach;

														?>	

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Include Children -->
												<?php WPFP_Helpers()->tr_start( '', 'post-taxonomies-wrapper' ); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Include Children', WPFP_DOMAIN ), '' );

														?>

														<?php

															WPFP_Helpers()->tooltip( __( 'Do you want to include children of the term?', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<?php

															WPFP_Helpers()->radio( WPFP_SECTION_PT_SLIDES_OPTIONS, 'includeChildren', array(
																'yes' => __( 'yes', WPFP_DOMAIN ),
																'no'  => __( 'no', WPFP_DOMAIN ),
															), isset( $includeChildren ) ? $includeChildren : 'no', isset( $INCLUDECHILDREN ) ? $INCLUDECHILDREN : 'no' );

														?>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Post Type -->
												<?php WPFP_Helpers()->tr_start( '', 'post-types-wrapper' ); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Post Type', WPFP_DOMAIN ), 'postType' );

														?>
												
														<?php

															WPFP_Helpers()->tooltip( __( 'Which post type do you want to list.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<?php

															$___post_types = array();

															foreach ( $post_types as $__post_type => $__post_type_object )
																$___post_types[$__post_type] = $__post_type_object->labels->singular_name;

															WPFP_Helpers()->select( WPFP_SECTION_PT_SLIDES_OPTIONS, 'postType', $___post_types, isset( $postType ) ? $postType : '', '', 'postType chzn-select no-reset' );

														?>	

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Included Posts -->
												<?php WPFP_Helpers()->tr_start(); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Included Posts', WPFP_DOMAIN ), 'bbm-included-posts-launcher' );

														?>

														<?php

															WPFP_Helpers()->tooltip( __( 'The posts to include.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<ul id="sortableIncludedPosts"></ul>

														<?php

															WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[includedPosts]', 'included-posts', isset( $includedPosts ) ? $includedPosts : '' );

														?>	
														
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

																			<?php

																				WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[' . $dataKey . ']', 'included-posts-' . $_taxonomy . '-' . $_term->term_id, isset( $$dataKey ) ? $$dataKey : '' );

																			?>

																			<?php

																				WPFP_Helpers()->button( 'bbm-included-posts-of-term-launcher-' . $_taxonomy . '-' . $_term->term_id, sprintf( __( 'Include posts of term "%1s"' , WPFP_DOMAIN ), $_term->name ), $datas, 'button button-large bbm-included-posts-of-term-launcher' );

																			?>
																		
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

																		<?php

																			WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[' . $dataKey . ']', 'included-posts-' . $__post_type, isset( $$dataKey ) ? $$dataKey : '' );

																		?>

																		<?php

																			WPFP_Helpers()->button( 'bbm-included-posts-of-type-launcher-' . $__post_type, sprintf( __( 'Include posts of type "%1s"' , WPFP_DOMAIN ), $__post_type_object->labels->singular_name ), $datas, 'button button-large bbm-included-posts-of-type-launcher' );

																		?>
																	
																	<?php

																endforeach;

															?>

														</div>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

												<!-- Excluded Posts -->
												<?php WPFP_Helpers()->tr_start(); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
														<?php

															WPFP_Helpers()->label( __( 'Excluded Posts', WPFP_DOMAIN ), 'bbm-excluded-posts-launcher' );

														?>

														<?php

															WPFP_Helpers()->tooltip( __( 'The posts to exclude.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>
														
														<ul id="sortableExcludedPosts"></ul>

														<?php

															WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[excludedPosts]', 'excluded-posts', isset( $excludedPosts ) ? $excludedPosts : '' );

														?>

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

																			<?php

																				WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[' . $dataKey . ']', 'excluded-posts-' . $_taxonomy . '-' . $_term->term_id, isset( $$dataKey ) ? $$dataKey : '' );

																			?>

																			<?php

																				WPFP_Helpers()->button( 'bbm-excluded-posts-of-term-launcher-' . $_taxonomy . '-' . $_term->term_id, sprintf( __( 'Exclude posts of term "%1s"' , WPFP_DOMAIN ), $_term->name ), $datas, 'button button-large bbm-excluded-posts-of-term-launcher' );

																			?>
																		
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

																		<?php

																			WPFP_Helpers()->hidden( WPFP_SECTION_PT_SLIDES_OPTIONS . '[' . $dataKey . ']', 'excluded-posts-' . $__post_type, isset( $$dataKey ) ? $$dataKey : '' );

																		?>

																		<?php

																			WPFP_Helpers()->button( 'bbm-excluded-posts-of-type-launcher-' . $__post_type, sprintf( __( 'Exclude posts of type "%1s"' , WPFP_DOMAIN ), $__post_type_object->labels->singular_name ), $datas, 'button button-large bbm-excluded-posts-of-type-launcher' );

																		?>
																	
																	<?php

																endforeach;

															?>
															
														</div>

													<?php WPFP_Helpers()->td_end(); ?>

												<?php WPFP_Helpers()->tr_end(); ?>

											<?php WPFP_Helpers()->table_end(); ?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>

								<?php WPFP_Helpers()->table_end(); ?>

							</div>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
							
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

												WPFP_Helpers()->select( WPFP_SECTION_PT_SLIDES_OPTIONS, 'verticalPosition', array(
													'inherit' => __( 'Inherit from Fullpage', WPFP_DOMAIN ),
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

												WPFP_Helpers()->select( WPFP_SECTION_PT_SLIDES_OPTIONS, 'horizontalPosition', array(
													'inherit' => __( 'Inherit from Fullpage', WPFP_DOMAIN ),
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

												WPFP_Helpers()->label( __( 'Slides Color', WPFP_DOMAIN ), 'slideColor' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Define the CSS background-color property for the slides. If empty, it will use the FullPage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_SECTION_PT_SLIDES_OPTIONS, 'slideColor', isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' );

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
							
									<!-- CSS3 Transition effect -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
											<?php

												WPFP_Helpers()->label( __( 'Horizontal CSS3 Transition effect', WPFP_DOMAIN ), 'easingCss3' );

											?>
														
											<?php

												WPFP_Helpers()->tooltip( __( 'Defines the transition effect to use for the horizontal scrolling in case of CSS3.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SECTION_PT_FULLPAGE_OPTIONS, 'easingCss3', array(
													'inherit'           => __( 'Inherit from FullPage', WPFP_DOMAIN ),
													'linear'            => __( 'Linear', WPFP_DOMAIN ),
													'ease'              => __( 'Ease', WPFP_DOMAIN ),
													'ease-in'           => __( 'Ease In', WPFP_DOMAIN ),
													'ease-out'          => __( 'Ease Out', WPFP_DOMAIN ),
													'ease-in-out'       => __( 'Ease In Out', WPFP_DOMAIN ),
													'ease-in-sine'      => __( 'Ease In Sine', WPFP_DOMAIN ),
													'ease-out-sine'     => __( 'Ease Out Sine', WPFP_DOMAIN ),
													'ease-in-out-sine'  => __( 'Ease In Out Sine', WPFP_DOMAIN ),
													'ease-in-circ'      => __( 'Ease In Circ', WPFP_DOMAIN ),
													'ease-out-circ'     => __( 'Ease Out Circ', WPFP_DOMAIN ),
													'ease-in-out-circ'  => __( 'Ease In Out Circ', WPFP_DOMAIN ),
													'ease-in-quad'      => __( 'Ease In Quad', WPFP_DOMAIN ),
													'ease-out-quad'     => __( 'Ease Out Quad', WPFP_DOMAIN ),
													'ease-in-out-quad'  => __( 'Ease In Out Quad', WPFP_DOMAIN ),
													'ease-in-cubic'     => __( 'Ease In Cubic', WPFP_DOMAIN ),
													'ease-out-cubic'    => __( 'Ease Out Cubic', WPFP_DOMAIN ),
													'ease-in-out-cubic' => __( 'Ease In Out Cubic', WPFP_DOMAIN ),
													'ease-in-quart'     => __( 'Ease In Quart', WPFP_DOMAIN ),
													'ease-out-quart'    => __( 'Ease Out Quart', WPFP_DOMAIN ),
													'ease-in-out-quart' => __( 'Ease In Out Quart', WPFP_DOMAIN ),
													'ease-in-quint'     => __( 'Ease In Quint', WPFP_DOMAIN ),
													'ease-out-quint'    => __( 'Ease Out Quint', WPFP_DOMAIN ),
													'ease-in-out-quint' => __( 'Ease In Out Quint', WPFP_DOMAIN ),
													'ease-in-expo'      => __( 'Ease In Expo', WPFP_DOMAIN ),
													'ease-out-expo'     => __( 'Ease Out Expo', WPFP_DOMAIN ),
													'ease-in-out-expo'  => __( 'Ease In Out Expo', WPFP_DOMAIN ),
													'ease-in-back'      => __( 'Ease In Back', WPFP_DOMAIN ),
													'ease-out-back'     => __( 'Ease Out Back', WPFP_DOMAIN ),
													'ease-in-out-back'  => __( 'Ease In Out Back', WPFP_DOMAIN ),
												), isset( $easingCss3 ) ? $easingCss3 : 'linear', isset( $EASINGCSS3 ) ? $EASINGCSS3 : 'linear' );

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
									
									<!-- Navigation Title -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Navigation Title', WPFP_DOMAIN ), 'navTitle' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the navigation tooltip in case it is being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will use the FullPage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_SECTION_PT_SECTION_OPTIONS, 'navTitle', isset( $navTitle ) ? $navTitle : '', isset( $NAVTITLE ) ? $NAVTITLE : '' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
											
									<!-- Slides Navigation -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>
											
											<?php WPFP_Helpers()->span_label( __( 'Slides Navigation', WPFP_DOMAIN ) ); ?>
														
											<?php

												WPFP_Helpers()->tooltip( __( 'If set to true it will show a navigation bar made up of small circles for each landscape slider on the site. Choose Inherit to use Fullpage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SECTION_PT_FULLPAGE_OPTIONS, 'slidesNavigation', array(
													'inherit' => __( 'Inherit from FullPage', WPFP_DOMAIN ),
													'yes'     => __( 'yes', WPFP_DOMAIN ),
													'no'      => __( 'no', WPFP_DOMAIN ),
												), isset( $slidesNavigation ) ? $slidesNavigation : 'yes', isset( $SLIDESNAVIGATION ) ? $SLIDESNAVIGATION : 'yes' );

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

												WPFP_Helpers()->tooltip( __( 'Defines the position for the landscape navigation bar for sliders. Admits top and bottom as values. Choose Inherit to use Fullpage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_SECTION_PT_FULLPAGE_OPTIONS, 'slidesNavPosition', array(
													'inherit' => __( 'Inherit from FullPage', WPFP_DOMAIN ),
													'top'     => __( 'Top', WPFP_DOMAIN ),
													'bottom'  => __( 'Bottom', WPFP_DOMAIN ),
												), isset( $slidesNavPosition ) ? $slidesNavPosition : 'top', isset( $SLIDESNAVPOSITION ) ? $SLIDESNAVPOSITION : 'top' );

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

												WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will use the FullPage option.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_SECTION_PT_FULLPAGE_OPTIONS, 'slidesNavTitle', isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' );

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

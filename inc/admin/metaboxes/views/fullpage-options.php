<?php

/**
 * Template for Fullpage Option Metabox
 * 
 * @package 	WP_Fullpage\Includes\Metaboxes\Views
 */

?>

<div id="settingsbox">

	<div id="sections-options">

		<div class="inside">

			<div class="setting-panel">
				
				<?php WPFP_Helpers()->table_start( '', 'sections-options form-table' ); ?>
					
					<?php WPFP_Helpers()->caption( __( 'WP Fullpage Options', WPFP_DOMAIN ) ); ?>
							
					<!-- Sections Content toggler -->
					<?php WPFP_Helpers()->tr_start( '', 'accordion-toggler' ); ?>

						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>

							<?php

								WPFP_Helpers()->label( __( 'Sections Content', WPFP_DOMAIN ) );

							?>

						<?php WPFP_Helpers()->td_end(); ?>

					<?php WPFP_Helpers()->tr_end(); ?>
							
					<!-- Sections Content -->
					<?php WPFP_Helpers()->tr_start(); ?>
						
						<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
				
							<div class="accordion-container">

								<?php WPFP_Helpers()->table_start( '', 'form-table' ); ?>
					
									<!-- Section Type -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

											<?php

												WPFP_Helpers()->label( __( 'Sections Type', WPFP_DOMAIN ), 'sectionsType' );

											?>

											<?php

												WPFP_Helpers()->tooltip( __( 'Which type of sections do you want to display for this Fullpage.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, 'sectionsType', array(
													'sections'        => __( 'Sections', WPFP_DOMAIN ),
													'post-taxonomies' => __( 'Post Taxonomies', WPFP_DOMAIN ),
													'post-types'      => __( 'Post Types', WPFP_DOMAIN ),
												), isset( $sectionsType ) ? $sectionsType : '', '', 'no-reset' );

											?>

										<?php WPFP_Helpers()->td_end(); ?>

									<?php WPFP_Helpers()->tr_end(); ?>
									
									<!-- Sections -->
									<?php WPFP_Helpers()->tr_start(); ?>
										
										<?php WPFP_Helpers()->td_start( '', '', 2 ); ?>
								
											<?php WPFP_Helpers()->table_start( 'sections-wrapper', 'wpfp-slide-wrapper sub-options form-table' ); ?>
												
												<?php WPFP_Helpers()->caption( __( 'Sections', WPFP_DOMAIN ) ); ?>
														
												<!-- Sections -->
												<?php WPFP_Helpers()->tr_start(); ?>
										
													<?php WPFP_Helpers()->th_start( 'row', '', 'title-desc' ); ?>

														<?php

															WPFP_Helpers()->label( __( 'Sections', WPFP_DOMAIN ), 'bbm-sections-list-launcher' );

														?>

														<?php

															WPFP_Helpers()->tooltip( __( 'Add and reorder some sections to your Fullpage.', WPFP_DOMAIN ), 'wpfp-tip' );

														?>

													<?php WPFP_Helpers()->th_end(); ?>

													<?php WPFP_Helpers()->td_start(); ?>

														<ul id="sortableSections"></ul>
														
														<?php

															WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[sections]', 'sections-list', isset( $sections ) ? $sections : '' );

														?>
														
														<?php

															$datas = array(
																'postType' => WPFP_FULLPAGE_SECTION_PT,
															);
														
														?>

														<?php

															WPFP_Helpers()->button( 'bbm-sections-list-launcher', __( 'Add sections' , WPFP_DOMAIN ), $datas, 'button button-large' );

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

															WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'teaserDisplay', array(
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

															WPFP_Helpers()->number( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'teaserLength', isset( $teaserLength ) ? $teaserLength : 100, isset( $TEASERLENGTH ) ? $TEASERLENGTH : 100, 0, 10, 'small-text' );

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

															WPFP_Helpers()->number( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'countPosts', isset( $teaserLength ) ? $countPosts : get_option( 'posts_per_page' ), isset( $COUNTPOSTS ) ? $COUNTPOSTS : get_option( 'posts_per_page' ), 1, 1, 'small-text' );

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

															WPFP_Helpers()->select( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'orderBy', array(
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

															WPFP_Helpers()->text( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'orderByMetaValueKey', isset( $orderByMetaValueKey ) ? $orderByMetaValueKey : '', isset( $ORDERBYMETAVALUEKEY ) ? $ORDERBYMETAVALUEKEY : '' );

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

															WPFP_Helpers()->select( WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, 'order', array(
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

															WPFP_Helpers()->select( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, 'taxonomy', $_taxonomies, isset( $taxonomy ) ? $taxonomy : '', '', 'taxonomy chzn-select no-reset' );

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

															WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[term]', 'term', isset( $term ) ? $term : '' );

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

															WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, 'includeChildren', array(
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

															WPFP_Helpers()->select( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, 'postType', $___post_types, isset( $postType ) ? $postType : '', '', 'postType chzn-select no-reset' );

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

															WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[includedPosts]', 'included-posts', isset( $includedPosts ) ? $includedPosts : '' );

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

																				WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[' . $dataKey . ']', 'included-posts-' . $_taxonomy . '-' . $_term->term_id, isset( $$dataKey ) ? $$dataKey : '' );

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

																			WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[' . $dataKey . ']', 'included-posts-' . $__post_type, isset( $$dataKey ) ? $$dataKey : '' );

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

															WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[excludedPosts]', 'excluded-posts', isset( $excludedPosts ) ? $excludedPosts : '' );

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

																				WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[' . $dataKey . ']', 'excluded-posts-' . $_taxonomy . '-' . $_term->term_id, isset( $$dataKey ) ? $$dataKey : '' );

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

																			WPFP_Helpers()->hidden( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS . '[' . $dataKey . ']', 'excluded-posts-' . $__post_type, isset( $$dataKey ) ? $$dataKey : '' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'resize', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $resize ) ? $resize : 'yes', isset( $RESIZE ) ? $RESIZE : 'yes' );

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

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_SLIDES_OPTIONS, 'verticalPosition', array(
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

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_SLIDES_OPTIONS, 'horizontalPosition', array(
													'center' => __( 'Center', WPFP_DOMAIN ),
													'left'   => __( 'Left', WPFP_DOMAIN ),
													'right'  => __( 'Right', WPFP_DOMAIN ),
												), isset( $horizontalPosition ) ? $horizontalPosition : 'center', isset( $HORIZONTALPOSITION ) ? $HORIZONTALPOSITION : 'center' );

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

												WPFP_Helpers()->tooltip( __( 'Defines the top padding for each section with a numerical value and its measure (paddingTop: &apos;10px&apos;, paddingTop: &apos;10em&apos;...) Useful in case of using a fixed header.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'paddingTop', isset( $orderByMetaValueKey ) ? $paddingTop : '0', isset( $PADDINGTOP ) ? $PADDINGTOP : '0' );

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

												WPFP_Helpers()->tooltip( __( 'Defines the bottom padding for each section with a numerical value and its measure (paddingBottom: &apos;10px&apos;, paddingBottom: &apos;10em&apos;...). Useful in case of using a fixed footer.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'paddingBottom', isset( $paddingBottom ) ? $paddingBottom : '0', isset( $PADDINGBOTTOM ) ? $PADDINGBOTTOM : '0' );

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

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_SLIDES_OPTIONS, 'slideColor', isset( $slideColor ) ? $slideColor : '', isset( $SLIDECOLOR ) ? $SLIDECOLOR : '' );

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

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'fixedElements', isset( $fixedElements ) ? $fixedElements : '', isset( $FIXEDELEMENTS ) ? $FIXEDELEMENTS : '' );

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

												WPFP_Helpers()->number( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'responsive', isset( $responsive ) ? $responsive : 0, isset( $RESPONSIVE ) ? $RESPONSIVE : 0, 0, 10, 'small-text' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'navigation', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $navigation ) ? $navigation : 'yes', isset( $NAVIGATION ) ? $NAVIGATION : 'yes' );

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

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'navigationPosition', array(
													'left'  => __( 'Left', WPFP_DOMAIN ),
													'right' => __( 'Right', WPFP_DOMAIN ),
												), isset( $navigationPosition ) ? $navigationPosition : 'left', isset( $NAVIGATIONPOSITION ) ? $NAVIGATIONPOSITION : 'left' );

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

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, 'navTitle', isset( $navTitle ) ? $navTitle : '', isset( $NAVTITLE ) ? $NAVTITLE : '' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'slidesNavigation', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
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

												WPFP_Helpers()->tooltip( __( 'Defines the position for the landscape navigation bar for sliders. Admits top and bottom as values. You may want to modify the CSS styles to determine the distance from the top or bottom as well as any other style such as color.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'slidesNavPosition', array(
													'top'  => __( 'Top', WPFP_DOMAIN ),
													'bottom' => __( 'Bottom', WPFP_DOMAIN ),
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

												WPFP_Helpers()->tooltip( __( 'Which metadata do you want to use for the slides navigation tooltips in case they are being used. If the metadata is empty or does not exists, it will display the title instead. If empty, it will display post title.', WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_SLIDES_OPTIONS, 'slidesNavTitle', isset( $slidesNavTitle ) ? $slidesNavTitle : '', isset( $SLIDESNAVTITLE ) ? $SLIDESNAVTITLE : '' );

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

												WPFP_Helpers()->tooltip( __( "Defines whether to use JavaScript or CSS3 transforms to scroll within sections and slides. Useful to speed up the movement in tablet and mobile devices with browsers supporting CSS3. If this option is set to true and the browser doesn&apos;t support CSS3, a jQuery fallback will be used instead.", WPFP_DOMAIN ), 'wpfp-tip' );

											?>

										<?php WPFP_Helpers()->th_end(); ?>

										<?php WPFP_Helpers()->td_start(); ?>

											<?php

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'css3', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $css3 ) ? $css3 : 'yes', isset( $CSS3 ) ? $CSS3 : 'yes' );

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
												), isset( $parallax ) ? $parallax : 'no', isset( $PARALLAX ) ? $PARALLAX : 'no' );

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

												WPFP_Helpers()->number( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'scrollingSpeed', isset( $scrollingSpeed ) ? $scrollingSpeed : 700, isset( $SCROLLINGSPEED ) ? $SCROLLINGSPEED : 700, 0, 10, 'small-text' );

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

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'easing', array(
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
												), isset( $easing ) ? $easing : 'easeInQuad', isset( $EASING ) ? $EASING : 'linear' );

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

												WPFP_Helpers()->select( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'easingCss3', array(
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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'loopBottom', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $loopBottom ) ? $loopBottom : 'yes', isset( $LOOPBOTTOM ) ? $LOOPBOTTOM : 'yes' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'loopTop', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $loopTop ) ? $loopTop : 'yes', isset( $LOOPTOP ) ? $LOOPTOP : 'yes' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'loopHorizontal', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $loopHorizontal ) ? $loopHorizontal : 'yes', isset( $LOOPHORIZONTAL ) ? $LOOPHORIZONTAL : 'yes' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'autoScrolling', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $autoScrolling ) ? $autoScrolling : 'yes', isset( $AUTOSCROLLING ) ? $AUTOSCROLLING : 'yes' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'scrollOverflow', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $scrollOverflow ) ? $scrollOverflow : 'yes', isset( $SCROLLOVERFLOW ) ? $SCROLLOVERFLOW : 'yes' );

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

												WPFP_Helpers()->text( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'normalScrollElements', isset( $normalScrollElements ) ? $normalScrollElements : '', isset( $NORMALSCROLLELEMENTS ) ? $NORMALSCROLLELEMENTS : '' );

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

												WPFP_Helpers()->number( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'normalScrollElementTouchThreshold', isset( $normalScrollElementTouchThreshold ) ? $normalScrollElementTouchThreshold : 5, isset( $NORMALSCROLLELEMENTTOUCHTHRESHOLD ) ? $NORMALSCROLLELEMENTTOUCHTHRESHOLD : 5, 0, 1, 'small-text' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'continuousVertical', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $continuousVertical ) ? $continuousVertical : 'yes', isset( $CONTINUOUSVERTICAL ) ? $CONTINUOUSVERTICAL : 'yes' );

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

												WPFP_Helpers()->number( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'touchSensitivity', isset( $touchSensitivity ) ? $touchSensitivity : 15, isset( $TOUCHSENSITIVITY ) ? $TOUCHSENSITIVITY : 15, 1, 1, 'small-text' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'keyboardScrolling', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $keyboardScrolling ) ? $keyboardScrolling : 'yes', isset( $KEYBOARDSCROLLING ) ? $KEYBOARDSCROLLING : 'yes' );

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

												WPFP_Helpers()->radio( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'animateAnchor', array(
													'yes' => __( 'yes', WPFP_DOMAIN ),
													'no'  => __( 'no', WPFP_DOMAIN ),
												), isset( $animateAnchor ) ? $animateAnchor : 'yes', isset( $ANIMATEANCHOR ) ? $ANIMATEANCHOR : 'yes' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'onLeave', isset( $onLeave ) ? $onLeave : 'fullpageOnLeave( index, nextIndex, direction );', isset( $ONLEAVE ) ? $ONLEAVE : 'fullpageOnLeave( index, nextIndex, direction );' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'afterLoad', isset( $afterLoad ) ? $afterLoad : 'fullpageAfterLoad( anchorLink, index );', isset( $AFTERLOAD ) ? $AFTERLOAD : 'fullpageAfterLoad( anchorLink, index );' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'afterRender', isset( $afterRender ) ? $afterRender : 'fullpageAfterRender();', isset( $AFTERRENDER ) ? $AFTERRENDER : 'fullpageAfterRender();' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'afterResize', isset( $afterResize ) ? $afterResize : 'fullpageAfterResize();', isset( $AFTERRESIZE ) ? $AFTERRESIZE : 'fullpageAfterResize();' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'afterSlideLoad', isset( $afterSlideLoad ) ? $afterSlideLoad : 'fullpageAfterSlideLoad( anchorLink, index, slideAnchor, slideIndex );', isset( $AFTERSLIDELOAD ) ? $AFTERSLIDELOAD : 'fullpageAfterSlideLoad( anchorLink, index, slideAnchor, slideIndex );' );

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

												WPFP_Helpers()->textarea( WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, 'onSlideLeave', isset( $onSlideLeave ) ? $onSlideLeave : 'fullpageSlideLeave( anchorLink, index, slideIndex, direction );', isset( $ONSLIDELEAVE ) ? $ONSLIDELEAVE : 'fullpageSlideLeave( anchorLink, index, slideIndex, direction );' );

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
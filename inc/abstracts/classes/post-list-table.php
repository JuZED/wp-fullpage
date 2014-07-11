<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-posts-list-table.php' );

/**
 * Fullpage Posts List Table class.
 */
abstract class WP_Fullpage_Posts_List_Table extends WP_Posts_List_Table {

	/**
	 * Ajax Params
	 *
	 * @var  array
	 */
	public $ajax_params = array();

	/**
	 * Construct the Fullpage Posts List Table Class object
	 */
	public function __construct( $args = array() ) {

		extract( $args );

		parent::__construct( array(
			'plural' => 'posts',
			'screen' => $screen,
		) );

	} // END public function __construct

	/**
	 * Prepare Items to list
	 *
	 * @return  void
	 */
	public function prepare_items() {

		global $avail_post_stati, $wp_query, $per_page, $mode;

		$avail_post_stati           = wp_edit_posts_query();

		// Unset Trash status
		foreach( $avail_post_stati as $key => $post_status )
			if( 'trash' === $post_status )
				unset( $avail_post_stati[ $key ] );

		$this->hierarchical_display = ( is_post_type_hierarchical( $this->screen->post_type ) && 'menu_order title' == $wp_query->query['orderby'] );
		$total_items                = $this->hierarchical_display ? $wp_query->post_count : $wp_query->found_posts;
		$post_type                  = $this->screen->post_type;
		$per_page                   = $this->get_items_per_page( 'edit_' . $post_type . '_per_page' );

		/** This filter is documented in wp-admin/includes/post.php */
 		$per_page = apply_filters( 'edit_posts_per_page', $per_page, $post_type );

		if ( $this->hierarchical_display )
			$total_pages = ceil( $total_items / $per_page );
		else
			$total_pages = $wp_query->max_num_pages;

		$mode = empty( $_REQUEST['mode'] ) ? 'list' : $_REQUEST['mode'];

		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'total_pages' => $total_pages,
			'per_page'    => $per_page
		) );

	} // END public function prepare_items

	/**
	 * Get Views
	 *
	 * @return  array  the status links
	 */
	public function get_views() {
		
		global $locked_post_status, $avail_post_stati;

		$post_type = $this->screen->post_type;

		if ( !empty($locked_post_status) )
			return array();
		
		$status_links         = array();
		$base_classes         = array( WPFP_BBM_LOADS_CONTENT );
		$num_posts            = wp_count_posts( $post_type, 'readable' );
		$classes              = $base_classes;
		$current_user_id      = get_current_user_id();
		$ajax_params          = $this->ajax_params;
		$ajax_params['s']     = '';
		$ajax_params['m']     = '';
		$ajax_params['cat']   = '';
		$ajax_params['paged'] = '';

		if ( $this->user_posts_count ) {

			if ( isset( $_GET['author'] ) && ( $_GET['author'] == $current_user_id ) )
				$classes[] = 'current';

			$ajax_params['author'] = $current_user_id;

			$status_links['mine']    = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'Mine <span class="count">(%s)</span>', 'Mine <span class="count">(%s)</span>', $this->user_posts_count, 'posts' ), number_format_i18n( $this->user_posts_count ) ) . '</a>';
			$ajax_params['allposts'] = 1;

		}

		$total_posts = array_sum( (array) $num_posts );

		// Subtract post types that are not included in the admin all list.
		foreach ( get_post_stati( array('show_in_admin_all_list' => false) ) as $state )
			$total_posts -= $num_posts->$state;

		if( count( $classes ) === 1 && empty( $_REQUEST['post_status'] ) && empty( $_REQUEST['show_sticky'] ) )
			$classes[] = 'current';

		$ajax_params['post_status'] = '';

		$status_links['all'] = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'All <span class="count">(%s)</span>', 'All <span class="count">(%s)</span>', $total_posts, 'posts' ), number_format_i18n( $total_posts ) ) . '</a>';

		foreach ( get_post_stati(array('show_in_admin_status_list' => true), 'objects') as $status ) {
			
			$classes = $base_classes;

			$status_name = $status->name;

			if ( !in_array( $status_name, $avail_post_stati ) )
				continue;

			if ( empty( $num_posts->$status_name ) )
				continue;

			if ( isset($_REQUEST['post_status']) && $status_name == $_REQUEST['post_status'] )
				$classes[] = 'current';

			$ajax_params['post_status'] = $status_name;

			$status_links[$status_name] = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( translate_nooped_plural( $status->label_count, $num_posts->$status_name ), number_format_i18n( $num_posts->$status_name ) ) . '</a>';
		
		}

		if ( ! empty( $this->sticky_posts_count ) ) {
			
			if( ! empty( $_REQUEST['show_sticky'] ) )
				$classes[] = 'current';

			$ajax_params['show_sticky'] = 1;

			$sticky_link = array( 'sticky' => "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'Sticky <span class="count">(%s)</span>', 'Sticky <span class="count">(%s)</span>', $this->sticky_posts_count, 'posts' ), number_format_i18n( $this->sticky_posts_count ) ) . '</a>' );

			// Sticky comes after Publish, or if not listed, after All.
			$split        = 1 + array_search( ( isset( $status_links['publish'] ) ? 'publish' : 'all' ), array_keys( $status_links ) );
			$status_links = array_merge( array_slice( $status_links, 0, $split ), $sticky_link, array_slice( $status_links, $split ) );
		
		}

		return $status_links;

	} // END public function get_views

	/**
	 * Print column headers, accounting for hidden and sortable columns.
	 *
	 * @param   bool $with_id Whether to set the id attribute or not
	 *
	 * @return  void
	 */
	public function print_column_headers( $with_id = true ) {
		
		list( $columns, $hidden, $sortable ) = $this->get_column_info();

		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url = remove_query_arg( 'paged', $current_url );

		$ajax_params = $this->ajax_params;

		if ( isset( $ajax_params['orderby'] ) )
			$current_orderby = $ajax_params['orderby'];
		else
			$current_orderby = '';

		if ( $ajax_params['order'] && 'desc' == $ajax_params['order'] )
			$current_order = 'desc';
		else
			$current_order = 'asc';

		if ( ! empty( $columns['cb'] ) ) {

			static $cb_counter = 1;
			$columns['cb']     = '<label class="screen-reader-text" for="cb-select-all-' . $cb_counter . '">' . __( 'Select All' ) . '</label>'
				. '<input id="cb-select-all-' . $cb_counter . '" type="checkbox" class="' . WPFP_BBM_SELECT_ALL . '" />';
			
			$cb_counter++;

		}

		foreach ( $columns as $column_key => $column_display_name ) {
			
			$class = array( 'manage-column', "column-$column_key" );
			$style = '';

			if ( in_array( $column_key, $hidden ) )
				$style = 'display:none;';

			$style = ' style="' . $style . '"';

			if ( 'cb' == $column_key )
				$class[] = 'check-column';
			elseif ( in_array( $column_key, array( 'posts', 'comments', 'links' ) ) )
				$class[] = 'num';

			if ( isset( $sortable[$column_key] ) ) {
				
				list( $ajax_params['orderby'], $desc_first ) = $sortable[ $column_key ];

				if ( $current_orderby == $ajax_params['orderby'] ) {
					$ajax_params['order'] = 'asc' == $current_order ? 'desc' : 'asc';
					$class[]              = 'sorted';
					$class[]              = $current_order;
				} else {
					$ajax_params['order'] = $desc_first ? 'desc' : 'asc';
					$class[]              = 'sortable';
					$class[]              = $desc_first ? 'asc' : 'desc';
				}

				$column_display_name = "<a data-params='" . json_encode( $ajax_params ) . "' href='#'' class='" . WPFP_BBM_LOADS_CONTENT . "'><span>" . $column_display_name . '</span><span class="sorting-indicator"></span></a>';
			
			}

			$id = $with_id ? "id='$column_key'" : '';

			if ( !empty( $class ) )
				$class = "class='" . join( ' ', $class ) . "'";

			print "<th scope='col' $id $class $style>$column_display_name</th>";

		}

	} // END public function print_column_headers

	/**
	 * Display the table
	 *
	 * @return  void
	 */
	public function display() {
		
		extract( $this->_args );

		$this->display_tablenav( 'top' );

		?>
			<table class="wp-list-table <?php print implode( ' ', $this->get_table_classes() ); ?>">
				<thead>
					<tr>
						<?php $this->print_column_headers(); ?>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<?php $this->print_column_headers( false ); ?>
					</tr>
				</tfoot>

				<tbody id="the-list"<?php if ( $singular ) print " data-wp-lists='list:$singular'"; ?>>
					<?php $this->display_rows_or_placeholder(); ?>
				</tbody>
			</table>
		<?php

		$this->display_tablenav( 'bottom' );

	} // END public function display

	/**
	 * Display a single row
	 *
	 * @param   object   $post   the post object
	 * @param   integer  $level  the level
	 *
	 * @return  void
	 */
	public function single_row( $post, $level = 0 ) {
		
		global $mode;
		static $alternate;

		$global_post     = get_post();
		$GLOBALS['post'] = $post;

		setup_postdata( $post );

		$edit_link        = get_edit_post_link( $post->ID );
		$title            = _draft_or_post_title();
		$post_type_object = get_post_type_object( $post->post_type );
		$can_edit_post    = current_user_can( 'edit_post', $post->ID );

		$alternate = 'alternate' == $alternate ? '' : 'alternate';
		$classes   = $alternate . ' iedit author-' . ( get_current_user_id() == ( isset( $post->post_author ) ? $post->post_author : 0 ) ? 'self' : 'other' );

		$lock_holder = wp_check_post_lock( $post->ID );

		if ( $lock_holder ) {

			$classes     .= ' wp-locked';
			$lock_holder = get_userdata( $lock_holder );

		}

		if ( $post->post_parent ) {
		    
			$count   = count( get_post_ancestors( $post->ID ) );
			$classes .= ' level-'. $count;

		} else {

		    $classes .= ' level-0';

		}

		?>
			<tr id="post-<?php print $post->ID; ?>" class="<?php print implode( ' ', get_post_class( $classes, $post->ID ) ); ?>">
		<?php

		list( $columns, $hidden ) = $this->get_column_info();

		foreach ( $columns as $column_name => $column_display_name ) {

			$class = "class=\"$column_name column-$column_name\"";
			$style = '';

			if ( in_array( $column_name, $hidden ) )
				$style = ' style="display:none;"';

			$attributes = "$class$style";

			switch ( $column_name ) {

				case 'cb':
					?>
						<th scope="row" class="check-column">
							<?php
							
							if ( $can_edit_post ) {

								?>
									<label class="screen-reader-text" for="cb-select-<?php the_ID(); ?>"><?php printf( __( 'Select %s' ), $title ); ?></label>
									<input id="cb-select-<?php the_ID(); ?>" type="checkbox" name="post[]" value="<?php the_ID(); ?>" />
									<div class="locked-indicator"></div>
								<?php

							}

							?>
						</th>
					<?php

				break;

				case 'title':
					$attributes = 'class="post-title page-title column-title"' . $style;
					
					if ( $this->hierarchical_display ) {
						
						if ( 0 == $level && (int) $post->post_parent > 0 ) {
							
							//sent level 0 by accident, by default, or because we don't know the actual level
							$find_main_page = (int) $post->post_parent;

							while ( $find_main_page > 0 ) {
								$parent = get_post( $find_main_page );

								if ( is_null( $parent ) )
									break;

								$level++;
								$find_main_page = (int) $parent->post_parent;

								if ( !isset( $parent_name ) ) {
									/** This filter is documented in wp-includes/post-template.php */
									$parent_name = apply_filters( 'the_title', $parent->post_title, $parent->ID );
								}

							}

						}

					}

					$pad = str_repeat( '&#8212; ', $level );

					print "<td $attributes><strong>";

					if ( $format = get_post_format( $post->ID ) ) {
						
						$label = get_post_format_string( $format );

						print '<a href="' . esc_url( add_query_arg( array( 'post_format' => $format, 'post_type' => $post->post_type ), 'edit.php' ) ) . '" class="post-state-format post-format-icon post-format-' . $format . '" title="' . $label . '">' . $label . ":</a> ";
					
					}

					if ( $can_edit_post && $post->post_status != 'trash' ) {

						print '<a class="row-title" href="' . $edit_link . '" title="' . esc_attr( sprintf( __( 'Edit &#8220;%s&#8221;' ), $title ) ) . '">' . $pad . $title . '</a>';
					
					} else {

						print $pad . $title;

					}

					_post_states( $post );

					if ( isset( $parent_name ) )
						print ' | ' . $post_type_object->labels->parent_item_colon . ' ' . esc_html( $parent_name );

					print "</strong>\n";

					if ( $can_edit_post && $post->post_status != 'trash' ) {
						
						if ( $lock_holder ) {
							
							$locked_avatar = get_avatar( $lock_holder->ID, 18 );
							$locked_text   = esc_html( sprintf( __( '%s is currently editing' ), $lock_holder->display_name ) );
						
						} else {

							$locked_avatar = $locked_text = '';
						
						}

						print '<div class="locked-info"><span class="locked-avatar">' . $locked_avatar . '</span> <span class="locked-text">' . $locked_text . "</span></div>\n";
					
					}

					if ( ! $this->hierarchical_display && 'excerpt' == $mode && current_user_can( 'read_post', $post->ID ) )
							the_excerpt();

					$actions = array();

					if ( $can_edit_post && 'trash' != $post->post_status ) {
						
						$actions['edit'] = '<a href="' . get_edit_post_link( $post->ID, true ) . '" title="' . esc_attr( __( 'Edit this item' ) ) . '">' . __( 'Edit' ) . '</a>';
					
					}

					if ( $post_type_object->public ) {
						
						if ( in_array( $post->post_status, array( 'pending', 'draft', 'future' ) ) ) {
							
							if ( $can_edit_post ) {

								/** This filter is documented in wp-admin/includes/meta-boxes.php */
								$actions['view'] = '<a href="' . esc_url( apply_filters( 'preview_post_link', set_url_scheme( add_query_arg( 'preview', 'true', get_permalink( $post->ID ) ) ) ) ) . '" title="' . esc_attr( sprintf( __( 'Preview &#8220;%s&#8221;' ), $title ) ) . '" rel="permalink">' . __( 'Preview' ) . '</a>';
							
							}

						} elseif ( 'trash' != $post->post_status ) {
							
							$actions['view'] = '<a href="' . get_permalink( $post->ID ) . '" title="' . esc_attr( sprintf( __( 'View &#8220;%s&#8221;' ), $title ) ) . '" rel="permalink">' . __( 'View' ) . '</a>';
						
						}
					}

					if ( is_post_type_hierarchical( $post->post_type ) ) {

						/**
						 * Filter the array of row action links on the Pages list table.
						 *
						 * The filter is evaluated only for hierarchical post types.
						 *
						 * @since 2.8.0
						 *
						 * @param array   $actions An array of row action links. Defaults are
						 *                         'Edit', 'Quick Edit', 'Restore, 'Trash',
						 *                         'Delete Permanently', 'Preview', and 'View'.
						 * @param WP_Post $post    The post object.
						 */
						$actions = apply_filters( 'page_row_actions', $actions, $post );

					} else {

						/**
						 * Filter the array of row action links on the Posts list table.
						 *
						 * The filter is evaluated only for non-hierarchical post types.
						 *
						 * @since 2.8.0
						 *
						 * @param array   $actions An array of row action links. Defaults are
						 *                         'Edit', 'Quick Edit', 'Restore, 'Trash',
						 *                         'Delete Permanently', 'Preview', and 'View'.
						 * @param WP_Post $post    The post object.
						 */
						$actions = apply_filters( 'post_row_actions', $actions, $post );

					}

					print $this->row_actions( $actions );

					get_inline_data( $post );
					print '</td>';

				break;

				case 'date':
					if ( '0000-00-00 00:00:00' == $post->post_date ) {
						
						$t_time    = $h_time = __( 'Unpublished' );
						$time_diff = 0;

					} else {

						$t_time    = get_the_time( __( 'Y/m/d g:i:s A' ) );
						$m_time    = $post->post_date;
						$time      = get_post_time( 'G', true, $post );
						$time_diff = time() - $time;

						if ( $time_diff > 0 && $time_diff < DAY_IN_SECONDS )
							$h_time = sprintf( __( '%s ago' ), human_time_diff( $time ) );
						else
							$h_time = mysql2date( __( 'Y/m/d' ), $m_time );

					}

					print '<td ' . $attributes . '>';

					if ( 'excerpt' == $mode ) {

						/**
						 * Filter the published time of the post.
						 *
						 * If $mode equals 'excerpt', the published time and date are both displayed.
						 * If $mode equals 'list' (default), the publish date is displayed, with the
						 * time and date together available as an abbreviation definition.
						 *
						 * @since 2.5.1
						 *
						 * @param array   $t_time      The published time.
						 * @param WP_Post $post        Post object.
						 * @param string  $column_name The column name.
						 * @param string  $mode        The list display mode ('excerpt' or 'list').
						 */
						print apply_filters( 'post_date_column_time', $t_time, $post, $column_name, $mode );

					} else {

						/** This filter is documented in wp-admin/includes/class-wp-posts-list-table.php */
						print '<abbr title="' . $t_time . '">' . apply_filters( 'post_date_column_time', $h_time, $post, $column_name, $mode ) . '</abbr>';
					
					}

					print '<br />';

					if ( 'publish' == $post->post_status ) {
						
						_e( 'Published' );

					} elseif ( 'future' == $post->post_status ) {
						
						if ( $time_diff > 0 )
							print '<strong class="attention">' . __( 'Missed schedule' ) . '</strong>';
						else
							_e( 'Scheduled' );

					} else {

						_e( 'Last Modified' );

					}

					print '</td>';
				break;

				case 'comments':
					?>
						<td <?php print $attributes ?>>
							<div class="post-com-count-wrapper">
								<?php
									$pending_comments = isset( $this->comment_pending_count[$post->ID] ) ? $this->comment_pending_count[$post->ID] : 0;

									$this->comments_bubble( $post->ID, $pending_comments );
								?>
							</div>
						</td>
					<?php
				break;

				case 'author':
					?>
						<td <?php print $attributes ?>>
							<?php
								$author_id = get_the_author_meta( 'ID' );

								if( ! empty( $author_id ) )
									printf( '<a href="%s">%s</a>',
										esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'author' => $author_id ), 'edit.php' )),
										get_the_author()
									);
							?>
						</td>
					<?php
				break;

				default:
					if ( 'categories' == $column_name )
						$taxonomy = 'category';
					elseif ( 'tags' == $column_name )
						$taxonomy = 'post_tag';
					elseif ( 0 === strpos( $column_name, 'taxonomy-' ) )
						$taxonomy = substr( $column_name, 9 );
					else
						$taxonomy = false;

					if ( $taxonomy ) {

						$taxonomy_object = get_taxonomy( $taxonomy );
						print '<td ' . $attributes . '>';

						if ( $terms = get_the_terms( $post->ID, $taxonomy ) ) {
							
							$out = array();
							
							foreach ( $terms as $t ) {
								
								$posts_in_term_qv = array();
								
								if ( 'post' != $post->post_type )
									$posts_in_term_qv['post_type'] = $post->post_type;
								
								if ( $taxonomy_object->query_var ) {
									
									$posts_in_term_qv[ $taxonomy_object->query_var ] = $t->slug;
								
								} else {
									
									$posts_in_term_qv['taxonomy'] = $taxonomy;
									$posts_in_term_qv['term']     = $t->slug;

								}

								$out[] = sprintf( '<a href="%s">%s</a>',
									esc_url( add_query_arg( $posts_in_term_qv, 'edit.php' ) ),
									esc_html( sanitize_term_field( 'name', $t->name, $t->term_id, $taxonomy, 'display' ) )
								);

							}

							/* translators: used between list items, there is a space after the comma */
							print join( __( ', ' ), $out );

						} else {

							print '&#8212;';

						}

						print '</td>';
						
						break;
					}

					?>
						<td <?php print $attributes ?>>
							<?php
								if ( is_post_type_hierarchical( $post->post_type ) ) {

									/**
									 * Fires in each custom column on the Posts list table.
									 *
									 * This hook only fires if the current post type is hierarchical,
									 * such as pages.
									 *
									 * @since 2.5.0
									 *
									 * @param string $column_name The name of the column to display.
									 * @param int    $post_id     The current post ID.
									 */
									do_action( 'manage_pages_custom_column', $column_name, $post->ID );

								} else {

									/**
									 * Fires in each custom column in the Posts list table.
									 *
									 * This hook only fires if the current post type is non-hierarchical,
									 * such as posts.
									 *
									 * @since 1.5.0
									 *
									 * @param string $column_name The name of the column to display.
									 * @param int    $post_id     The current post ID.
									 */
									do_action( 'manage_posts_custom_column', $column_name, $post->ID );

								}

								/**
								 * Fires for each custom column of a specific post type in the Posts list table.
								 *
								 * The dynamic portion of the hook name, $post->post_type, refers to the post type.
								 *
								 * @since 3.1.0
								 *
								 * @param string $column_name The name of the column to display.
								 * @param int    $post_id     The current post ID.
								 */
								do_action( "manage_{$post->post_type}_posts_custom_column", $column_name, $post->ID );

							?>
						</td>
					<?php
				break;

			}
		}

		?>
			</tr>
		<?php

		$GLOBALS['post'] = $global_post;

	} // END public function single_row

	/**
	 * Display the search box.
	 *
	 * @param  string $text The search button text
	 * @param  string $input_id The search input id
	 *
	 * @return void 
	 */
	public function search_box( $text, $input_id ) {
		
		$ajax_params = $this->ajax_params;

		if ( empty( $ajax_params['s'] ) && !$this->has_items() )
			return;

		$input_id = $input_id . '-search-input';

		?>
			<p class="search-box">
				<label class="screen-reader-text" for="<?php print $input_id ?>"><?php print $text; ?>:</label>
				<input type="search" class="<?php print WPFP_BBM_SEARCH_INPUT; ?>" id="<?php print $input_id ?>" name="s" value="<?php _admin_search_query(); ?>" />
				<a href="#" data-params='<?php print json_encode( $ajax_params ); ?>' class="button button-large <?php print WPFP_BBM_LOADS_CONTENT; ?>"><?php print $text; ?></a>
			</p>
		<?php

	} // END public function search_box

	/**
	 * Display the pagination.
	 *
	 * @param   string  $which  top or bottom
	 *
	 * @return  void
	 */
	public function pagination( $which ) {

		if ( empty( $this->_pagination_args ) )
			return;

		extract( $this->_pagination_args, EXTR_SKIP );
		
		$ajax_params   = $this->ajax_params;
		$output        = '<span class="displaying-num">' . sprintf( _n( '1 item', '%s items', $total_items ), number_format_i18n( $total_items ) ) . '</span>';
		$current       = $this->get_pagenum();
		$current_url   = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url   = remove_query_arg( array( 'hotkeys_highlight_last', 'hotkeys_highlight_first' ), $current_url );
		$page_links    = array();
		$disable_first = $disable_last = '';

		if ( $current == 1 )
			$disable_first = ' disabled';
		if ( $current == $total_pages )
			$disable_last = ' disabled';

		$ajax_params['paged'] = 1;

		$page_links[] = sprintf( "<a data-params='%s' class='%s' title='%s' href='#'>%s</a>",
			json_encode( $ajax_params ),
			'first-page' . $disable_first . ' ' . WPFP_BBM_LOADS_CONTENT,
			esc_attr__( 'Go to the first page' ),
			'&laquo;'
		);
		
		$ajax_params['paged'] = max( 1, $current-1 );

		$page_links[] = sprintf( "<a data-params='%s' class='%s' title='%s' href='#'>%s</a>",
			json_encode( $ajax_params ),
			'prev-page' . $disable_first . ' ' . WPFP_BBM_LOADS_CONTENT,
			esc_attr__( 'Go to the previous page' ),
			'&lsaquo;'
		);
		
		$ajax_params['paged'] = $current;

		if ( 'bottom' == $which )
			$html_current_page = $current;
		else
			$html_current_page = sprintf( "<input data-params='%s' class='current-page %s' title='%s' type='text' name='paged' value='%s' size='%d' />",
				json_encode( $ajax_params ),
				WPFP_BBM_PAGE_INPUT,
				esc_attr__( 'Current page' ),
				$current,
				strlen( $total_pages )
			);

		$html_total_pages = sprintf( "<span class='total-pages'>%s</span>", number_format_i18n( $total_pages ) );
		$page_links[]     = '<span class="paging-input">' . sprintf( _x( '%1$s of %2$s', 'paging' ), $html_current_page, $html_total_pages ) . '</span>';
		
		$ajax_params['paged'] = min( $total_pages, $current+1 );

		$page_links[] = sprintf( "<a data-params='%s' class='%s' title='%s' href='#'>%s</a>",
			json_encode( $ajax_params ),
			'next-page' . $disable_last . ' ' . WPFP_BBM_LOADS_CONTENT,
			esc_attr__( 'Go to the next page' ),
			'&rsaquo;'
		);
		
		$ajax_params['paged'] = $total_pages;

		$page_links[] = sprintf( "<a data-params='%s' class='%s' title='%s' href='#'>%s</a>",
			json_encode( $ajax_params ),
			'last-page' . $disable_last . ' ' . WPFP_BBM_LOADS_CONTENT,
			esc_attr__( 'Go to the last page' ),
			'&raquo;'
		);

		$pagination_links_class = 'pagination-links';

		if ( ! empty( $infinite_scroll ) )
			$pagination_links_class = ' hide-if-js';
		
		$output .= "\n<span class='$pagination_links_class'>" . join( "\n", $page_links ) . '</span>';

		if ( $total_pages )
			$page_class = $total_pages < 2 ? ' one-page' : '';
		else
			$page_class = ' no-pages';

		$this->_pagination = "<div class='tablenav-pages{$page_class}'>$output</div>";

		print $this->_pagination;

	} // END public function pagination

	/**
	 * Generate the table navigation above or below the table
	 *
	 * @param   string  $which  top or bottom
	 *
	 * @return  void
	 */
	public function display_tablenav( $which ) {
		
		if ( 'top' == $which )
			wp_nonce_field( 'bulk-' . $this->_args['plural'] );
		
		?>
			<div class="tablenav <?php echo esc_attr( $which ); ?>">

				<?php
				
				$this->extra_tablenav( $which );
				$this->pagination( $which );

				?>

				<br class="clear" />
			</div>
		<?php

	} // END public function display_tablenav

	/**
	 * Extra controls to be displayed between bulk actions and pagination
	 *
	 * @param   string  $which  top or bottom
	 *
	 * @return  void
	 */
	public function extra_tablenav( $which ) {
		
		$ajax_params = $this->ajax_params;

		?>
			<div class="alignleft actions">
		<?php

		if ( 'top' == $which && !is_singular() ) {

			$this->months_dropdown( $this->screen->post_type );

			if ( is_object_in_taxonomy( $this->screen->post_type, 'category' ) ) {
				
				$dropdown_options = array(
					'show_option_all' => __( 'View all categories' ),
					'hide_empty'      => 0,
					'hierarchical'    => 1,
					'show_count'      => 0,
					'orderby'         => 'name',
					'selected'        => $ajax_params['cat'],
					'class'           => WPFP_BBM_CAT_SELECT,
				);

				wp_dropdown_categories( $dropdown_options );

			}

			/**
			 * Fires before the Filter button on the Posts and Pages list tables.
			 *
			 * The Filter button allows sorting by date and/or category on the
			 * Posts list table, and sorting by date on the Pages list table.
			 *
			 * @since 2.1.0
			 */
			do_action( 'restrict_manage_posts' );

			?>
				<a href="#" data-params='<?php print json_encode( $ajax_params ); ?>' class="button button-large <?php print WPFP_BBM_LOADS_CONTENT; ?>"><?php _e( 'Filter' ); ?></a>
			<?php

		}

		?>
			</div>
		<?php

	} // END public function extra_tablenav

	/**
	 * Display a monthly dropdown for filtering items
	 *
	 * @param   string  $post_type  the post type
	 *
	 * @return  void
	 */
	public function months_dropdown( $post_type ) {
		
		global $wpdb, $wp_locale;

		$ajax_params = $this->ajax_params;

		$months = $wpdb->get_results( $wpdb->prepare( "
			SELECT DISTINCT YEAR( post_date ) AS year, MONTH( post_date ) AS month
			FROM $wpdb->posts
			WHERE post_type = %s
			ORDER BY post_date DESC
		", $post_type ) );

		/**
		 * Filter the 'Months' drop-down results.
		 *
		 * @since 3.7.0
		 *
		 * @param object $months    The months drop-down query results.
		 * @param string $post_type The post type.
		 */
		$months = apply_filters( 'months_dropdown_results', $months, $post_type );

		$month_count = count( $months );

		if ( !$month_count || ( 1 == $month_count && 0 == $months[0]->month ) )
			return;
		
		?>
			<select class="<?php print WPFP_BBM_DATE_SELECT; ?>" name='m'>
				<option<?php selected( $ajax_params['m'], 0 ); ?> value='0'><?php _e( 'All dates' ); ?></option>
				
				<?php
					
					foreach ( $months as $arc_row ) {
						if ( 0 == $arc_row->year )
							continue;

						$month = zeroise( $arc_row->month, 2 );
						$year = $arc_row->year;

						printf( "<option %s value='%s'>%s</option>\n",
							selected( $ajax_params['m'], $year . $month, false ),
							esc_attr( $arc_row->year . $month ),
							/* translators: 1: month name, 2: 4-digit year */
							sprintf( __( '%1$s %2$d' ), $wp_locale->get_month( $month ), $year )
						);
					}

				?>

			</select>
		<?php

	} // END public function months_dropdown

	/**
	 * Get sortable columns
	 *
	 * @return  array  an array of sortable columns
	 */
	public function get_sortable_columns() {

		return array(
			'title' => 'title',
			'date'  => array( 'date', true )
		);

	} // END public function get_sortable_columns

} // END abstract class WP_Fullpage_Posts_List_Table extends WP_Posts_List_Table

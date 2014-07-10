<?php

/**
 * Posts of Term List Table class.
 */
class WP_Fullpage_Posts_Of_Term_List_Table extends WP_Fullpage_Posts_List_Table {

	/**
	 * Count the number of posts for the current Query
	 *
	 * @var  int
	 */
	private $counts = 0;

	/**
	 * Construct the Relation List Table Class object
	 */
	public function __construct( $args = array() ) {

		extract( $args );

		$this->ajax_params = array(
			'post_type'   => $post_type,
			'paged'       => $paged,
			'post_status' => $post_status,
			's'           => $s,
			'm'           => $m,
			'taxonomy'    => $taxonomy,
			'term_id'     => $term_id,
			'author'      => '',
			'allposts'    => 0,
			'show_sticky' => 0,
			'orderby'     => $orderby,
			'order'       => $order,
		);

		$this->count_posts( $args );

		parent::__construct( array(
			'screen' => 'post',
		) );

	} // END public function __construct

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
		
		$status_links       = array();
		$base_classes       = array( WPFP_BBM_LOADS_CONTENT );
		$num_posts          = $this->counts;
		$classes            = $base_classes;
		$current_user_id    = get_current_user_id();
		$ajax_params        = $this->ajax_params;
		$ajax_params['s']   = '';
		$ajax_params['m']   = '';
		$ajax_params['cat'] = '';

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

		return $status_links;

	} // END public function get_views

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
	 * Get Columns
	 *
	 * @return  array  the post colmuns
	 */
	public function get_columns() {
		
		$posts_columns = array();

		$posts_columns['cb'] = '<input type="checkbox" />';

		/* translators: manage posts column name */
		$posts_columns['title'] = _x( 'Title', 'column name' );

		$posts_columns['author'] = __( 'Author' );

		$posts_columns['date'] = __( 'Date' );

		return $posts_columns;

	} // END public function get_columns

	/**
	 * Count number of posts for the current query.
	 *
	 * @param  array  $args the args of the query.
	 * 
	 * @return object Number of posts for each status
	 */
	public function count_posts( $args = array() ) {

		$args['posts_per_page'] = -1;
		$args['s']              = '';
		$args['post_status']    = 'any';
		$args['m']    			= '';

		$posts = get_posts( $args );

		$this->counts = array_fill_keys( get_post_stati(), 0 );

		foreach ( $posts as $post )
			$this->counts[ $post->post_status ]++;

		$this->counts = (object) $this->counts;

	} // END public function count_posts

} // END class WP_Fullpage_Posts_Of_Term_List_Table extends WP_Fullpage_Posts_List_Table

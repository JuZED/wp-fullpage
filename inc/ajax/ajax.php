<?php

/**
 * The Fullpage Ajax Class
 * 
 * @package 	WP_Fullpage\Includes\Ajax
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Ajax extends WP_Fullpage_Base {

	/**
	 * Init Settings Page Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {

		parent::init( __DIR__, __FILE__ );
		
		// Add actions and filters
		$this->actions_filters();

	} // END public function init

	/**
	 * Register Actions and Filters
	 *
	 * @return  void
	 */
	private function actions_filters() {

		// Ajax action to get fullpage sections list
		add_action( 'wp_ajax_wpfp_get_fullpage_sections', array( &$this, 'get_fullpage_sections' ) );

		// Ajax action to get section slides list
		add_action( 'wp_ajax_wpfp_get_section_slides', array( &$this, 'get_section_slides' ) );

		// Ajax action to get posts of a term list
		add_action( 'wp_ajax_wpfp_get_posts_of_term', array( &$this, 'get_posts_of_term' ) );

		// Ajax action to get posts of a type list
		add_action( 'wp_ajax_wpfp_get_posts_of_type', array( &$this, 'get_posts_of_type' ) );

		// Ajax action to get posts of a term list
		add_action( 'wp_ajax_wpfp_get_posts_of_term_or_type_sortables', array( &$this, 'get_posts_of_term_or_type_sortables' ) );

		// Ajax action to get fullpage sections list sortables
		add_action( 'wp_ajax_wpfp_get_fullpage_sections_sortables', array( &$this, 'get_fullpage_sections_sortables' ) );

		// Ajax action to get fullpage slides list sortables
		add_action( 'wp_ajax_wpfp_get_fullpage_slides_sortables', array( &$this, 'get_fullpage_slides_sortables' ) );

	} // END private function actions_filters

	/**
	 * Display the fullpage section post type list
	 * 
	 * @return  void
	 */
	public function get_fullpage_sections() {
		
		check_ajax_referer( WPFP_GET_FULLPAGE_SECTIONS_ACTION, 'security' );

		$post_type        = $_REQUEST['post_type'];
		$paged            = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;
		$orderby          = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : '';
		$order            = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : '';
		$post_status      = isset( $_REQUEST['post_status'] ) ? $_REQUEST['post_status'] : '';
		$search           = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		$date             = isset( $_REQUEST['m'] ) ? (int) $_REQUEST['m'] : 0;
		$cat              = isset( $_REQUEST['cat'] ) ? $_REQUEST['cat'] : '';
		$post_type_object = get_post_type_object( $post_type );

		if ( ! $post_type_object )
			wp_die( __( 'Invalid post type' ) );

		$title = $post_type_object->labels->name;

		$args = array(
			'post_type_object' => $post_type_object,
			'post_type'        => $post_type,
			'paged'            => $paged,
			'post_status'      => $post_status,
			's'                => $search,
			'm'                => $date,
			'cat'              => $cat,
			'orderby'          => $orderby,
			'order'            => $order,
		);
		
		$this->get_posts_list( $args, $post_type_object, $title );

	} // END public function get_fullpage_sections

	/**
	 * Display the fullpage slide post type list
	 * 
	 * @return  void
	 */
	public function get_section_slides() {
		
		check_ajax_referer( WPFP_GET_SECTION_SLIDES_ACTION, 'security' );

		$post_type        = $_REQUEST['post_type'];
		$paged            = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;
		$orderby          = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : '';
		$order            = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : '';
		$post_status      = isset( $_REQUEST['post_status'] ) ? $_REQUEST['post_status'] : '';
		$search           = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		$date             = isset( $_REQUEST['m'] ) ? (int) $_REQUEST['m'] : 0;
		$cat              = isset( $_REQUEST['cat'] ) ? $_REQUEST['cat'] : '';
		$post_type_object = get_post_type_object( $post_type );

		if ( ! $post_type_object )
			wp_die( __( 'Invalid post type' ) );

		$title = $post_type_object->labels->name;

		$args = array(
			'post_type_object' => $post_type_object,
			'post_type'        => $post_type,
			'paged'            => $paged,
			'post_status'      => $post_status,
			's'                => $search,
			'm'                => $date,
			'cat'              => $cat,
			'orderby'          => $orderby,
			'order'            => $order,
		);
		
		$this->get_posts_list( $args, $post_type_object, $title );

	} // END public function get_section_slides

	/**
	 * Display the posts of a term list
	 * 
	 * @return  void
	 */
	public function get_posts_of_term() {
		
		check_ajax_referer( WPFP_GET_POSTS_OF_TERM_ACTION, 'security' );

		$paged       = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;
		$orderby     = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : '';
		$order       = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : '';
		$post_status = isset( $_REQUEST['post_status'] ) ? $_REQUEST['post_status'] : '';
		$search      = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		$date        = isset( $_REQUEST['m'] ) ? (int) $_REQUEST['m'] : 0;
		$taxonomy    = isset( $_REQUEST['taxonomy'] ) ? $_REQUEST['taxonomy'] : '';
		$term_id     = isset( $_REQUEST['term_id'] ) ? $_REQUEST['term_id'] : 0;

		$term  = get_term( $term_id, $taxonomy );
		$title = $term->name;

		if ( ! $term )
			wp_die( __( 'Term does not exists', WPFP_DOMAIN ) );

		$args = array(
			'post_type'   => 'any',
			'paged'       => $paged,
			'post_status' => $post_status,
			's'           => $search,
			'm'           => $date,
			'taxonomy'    => $taxonomy,
			'term_id'     => $term->term_id,
			'tax_query'   => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'id',
					'terms'    => array( $term->term_id ),
				),
			),
			'orderby' => $orderby,
			'order'   => $order,
		);
		
		$this->get_posts_of_term_list( $args, $title );

	} // END public function get_posts_of_term

	/**
	 * Display the posts of a type list
	 * 
	 * @return  void
	 */
	public function get_posts_of_type() {
		
		check_ajax_referer( WPFP_GET_POSTS_OF_TYPE_ACTION, 'security' );

		$post_type        = $_REQUEST['post_type'];
		$paged            = isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1;
		$orderby          = isset( $_REQUEST['orderby'] ) ? $_REQUEST['orderby'] : '';
		$order            = isset( $_REQUEST['order'] ) ? $_REQUEST['order'] : '';
		$post_status      = isset( $_REQUEST['post_status'] ) ? $_REQUEST['post_status'] : '';
		$search           = isset( $_REQUEST['s'] ) ? $_REQUEST['s'] : '';
		$date             = isset( $_REQUEST['m'] ) ? (int) $_REQUEST['m'] : 0;
		$cat              = isset( $_REQUEST['cat'] ) ? $_REQUEST['cat'] : '';
		$post_type_object = get_post_type_object( $post_type );

		if ( ! $post_type_object )
			wp_die( __( 'Invalid post type' ) );

		$title = $post_type_object->labels->name;

		$args = array(
			'post_type_object' => $post_type_object,
			'post_type'        => $post_type,
			'paged'            => $paged,
			'post_status'      => $post_status,
			's'                => $search,
			'm'                => $date,
			'cat'              => $cat,
			'orderby'          => $orderby,
			'order'            => $order,
		);
		
		$this->get_posts_list( $args, $post_type_object, $title );

	} // END public function get_posts_of_type

	/**
	 * Display the fullpage section post type list
	 * 
	 * @return  void
	 */
	public function get_fullpage_sections_sortables() {
		
		check_ajax_referer( WPFP_GET_FULLPAGE_SECTIONS_SORTABLES_ACTION, 'security' );
		
		$posts       = $_REQUEST['posts'];
		$post_type   = $_REQUEST['post_type'];
		$sortable_id = $_REQUEST['sortableID'];
		$empty_text  = __( 'Add some Fullpage Sections.', WPFP_DOMAIN );

		$posts = explode( ',', $posts );

		if( empty( $posts ) )
			die;

		$args = array(
			'post__in'       => $posts,
			'post_type'      => $post_type,
			'posts_per_page' => -1,
			'orderby'        => 'post__in',
			'order'          => 'ASC',
		);
		
		$this->get_posts_sortables( $args, $sortable_id, $empty_text );

	} // END public function get_fullpage_sections_sortables

	/**
	 * Display the fullpage slide post type list
	 * 
	 * @return  void
	 */
	public function get_fullpage_slides_sortables() {
		
		check_ajax_referer( WPFP_GET_SECTION_SLIDES_SORTABLES_ACTION, 'security' );
		
		$posts       = $_REQUEST['posts'];
		$post_type   = $_REQUEST['post_type'];
		$sortable_id = $_REQUEST['sortableID'];
		$empty_text  = __( 'Add some Fullpage Slides.', WPFP_DOMAIN );

		$posts = explode( ',', $posts );

		if( empty( $posts ) )
			die;

		$args = array(
			'post__in'       => $posts,
			'post_type'      => $post_type,
			'posts_per_page' => -1,
			'orderby'        => 'post__in',
			'order'          => 'ASC',
		);
		
		$this->get_posts_sortables( $args, $sortable_id, $empty_text );

	} // END public function get_fullpage_slides_sortables

	/**
	 * Display the fullpage section post type list
	 * 
	 * @return  void
	 */
	public function get_posts_of_term_or_type_sortables() {
		
		check_ajax_referer( WPFP_GET_POSTS_OF_TERM_OR_TYPE_SORTABLES_ACTION, 'security' );
		
		$posts       = $_REQUEST['posts'];
		$sortable_id = $_REQUEST['sortableID'];
		$empty_text  = $_REQUEST['emptyText'];

		$posts = explode( ',', $posts );

		if( empty( $posts ) )
			die;

		$args = array(
			'post__in'       => $posts,
			'post_type'      => 'any',
			'posts_per_page' => -1,
			'orderby'        => 'post__in',
			'order'          => 'ASC',
		);
		
		$this->get_posts_sortables( $args, $sortable_id, $empty_text );

	} // END public function get_fullpage_sections

	/**
	 * Display the post type list
	 *
	 * @param   array    $args   			 the arguments for the query
	 * @param   string   $post_type_object   the post type object
	 * @param   string   $title  			 the title to display
	 *
	 * @return  void
	 */
	 private function get_posts_list( $args, $post_type_object, $title ) {

		query_posts( $args );

		$wp_list_table = new WP_Fullpage_Posts_Of_Type_List_Table( $args );

		$pagenum = $wp_list_table->get_pagenum();

		$post_status = 'publish';

		$wp_list_table->prepare_items();

		include( $this->rel_path . 'views/posts-list.php' );
		
		wp_reset_query();

		die;

	} // END private function get_posts_list

	/**
	 * Display the posts of a term list
	 *
	 * @param   array    $args   the arguments for the query
	 * @param   string   $title  the title to display
	 *
	 * @return  void
	 */
	 private function get_posts_of_term_list( $args, $title ) {

		query_posts( $args );

		$wp_list_table = new WP_Fullpage_Posts_Of_Term_List_Table( $args );

		$pagenum = $wp_list_table->get_pagenum();

		$post_status = 'publish';

		$wp_list_table->prepare_items();

		include( $this->rel_path . 'views/posts-of-term-list.php' );
		
		wp_reset_query();

		die;

	} // END private function get_posts_of_term_list

	/**
	 * Display the sortable post type list
	 *
	 * @param   array    $args         the arguments for the query
	 * @param   string   $sortable_id  sortable id
	 * @param   string   $empty_text   the empty text
	 *
	 * @return  void
	 */
	 private function get_posts_sortables( $args, $sortable_id, $empty_text ) {

		query_posts( $args );

		include( $this->rel_path . 'views/posts-sortables-list.php' );

		wp_reset_query();

		die;

	} // END private function get_posts_sortables

} // END class WP_Fullpage_Ajax

// instantiate the Ajax class
$WP_Fullpage_Ajax = new WP_Fullpage_Ajax();

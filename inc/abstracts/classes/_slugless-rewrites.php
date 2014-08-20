<?php

/**
 * Strip the slug out of a custom post type
 * 
 * @package     WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Slugless_Rewrites {
 
	/**
	 * Rules
	 *
	 * @var  array
	 */
	public $rules;
	
	/**
	 * Post Type
	 *
	 * @var  string
	 */
	public $post_type;
 
	/**
	 * Query Var
	 *
	 * @var  string
	 */
	public $query_var;
 
	/**
	 * Hierarchical
	 *
	 * @var  bool;
	 */
	public $hierarchical;
 
	/**
	 * Has Archive
	 *
	 * @var  bool
	 */
	public $has_archive;
 
	/**
	 * Archive Feeds
	 *
	 * @var  bool
	 */
	public $archive_feeds;
 
	/**
	 * Construct the Class object
	 * 
	 * @param  string  $post_type
	 * @param  array   $args
	 */
	public function __construct( $post_type, $args = array() ) {
		
		$this->post_type = $post_type;
 
		add_permastruct( $this->post_type, '%postname%/' );
  
		add_action( 'init', array( $this, 'add_rewrites' ), 15 );
		add_action( 'parse_query', array( $this, 'parse_cpt_query' ) );
		// add_filter( 'request',  array( $this, 'check_rewrite_conflicts' ) );
		// add_filter( "{$this->post_type}_rewrite_rules", array( $this, 'strip_rules' ) );
		// add_filter( 'rewrite_rules_array', array( $this, 'inject_rules' ) );
		// add_action( 'pre_get_posts', array( &$this, 'pre_get_posts' ) );
		add_filter( 'post_type_link', array( &$this, 'remove_slug' ), 10, 2 );

	} // END public function __construct
	
	/**
	 * Make the permalink work by setting post types when none are given
	 */
	public function parse_cpt_query( $query ) {
		
		$post_name = $query->get( 'name' );
		$post_type = $query->get( 'post_type' );
		
		if( ! empty( $post_name ) && empty( $post_type ) )
			$query->set( 'post_type', array( 'post', 'page', $this->post_type ) );	

	} // END public function parse_cpt_query

	/**
	 * Add Rewrites
	 *
	 * @return  void
	 */
	public function add_rewrites() {

		add_rewrite_rule('(.*?)$', 'index.php?' . $this->post_type . '=$matches[1]', 'top');

	} // END public function add_rewrites
 
 
	/**
	 * Add Archive Rules
	 *
	 * @return  void
	 */
	public function add_archive_rules() {

		global $wp_rewrite;
 
		$archive_slug = $this->has_archive === true ? $this->post_type : $this->has_archive;
 
		add_rewrite_rule( "{$archive_slug}/?$", "index.php?post_type={$this->post_type}", 'top' );

		if ( $this->archive_feeds && $wp_rewrite->feeds ) {

			$feeds = '(' . trim( implode( '|', $wp_rewrite->feeds ) ) . ')';
			
			add_rewrite_rule( "{$archive_slug}/feed/$feeds/?$", "index.php?post_type={$this->post_type}" . '&feed=$matches[1]', 'top' );
			add_rewrite_rule( "{$archive_slug}/$feeds/?$", "index.php?post_type={$this->post_type}" . '&feed=$matches[1]', 'top' );
		
		}

		add_rewrite_rule( "{$archive_slug}/{$wp_rewrite->pagination_base}/([0-9]{1,})/?$", "index.php?post_type={$this->post_type}" . '&paged=$matches[1]', 'top' );
	} // END public function add_archive_rules
 
	/**
	 * Check Rewrite Conflicts
	 *
	 * @param   array   $qv
	 *
	 * @return  array
	 */
	public function check_rewrite_conflicts( $qv ) {
		
		if ( isset( $qv[ $this->query_var ] ) )
			if ( get_page_by_path( $qv[ $this->query_var ] ) ) {
				
				$qv['pagename'] = $qv[ $this->query_var ];
				unset( $qv[ $this->query_var ], $qv['post_type'], $qv['name'] );
			
			}

		return $qv;

	} // END public function check_rewrite_conflicts
	
	/**
	 * Strip Rules
	 *
	 * @param   array  $rules
	 *
	 * @return  array
	 */
	public function strip_rules( $rules ) {

		$this->rules = $rules;

		// We no longer need the attachment rules, so strip them out
		foreach ( $this->rules as $regex => $value )
			if ( strpos( $value, 'attachment' ) )
				unset( $this->rules[ $regex ] );

		return array();

	} // END public function strip_rules
 
	/**
	 * Inject Rules
	 *
	 * @param   array   $rules
	 *
	 * @return  array
	 */
	public function inject_rules( $rules ) {
		
		// This is the first 'page' rule
		$offset      = array_search( '(.?.+?)/trackback/?$', array_keys( $rules ) );
		$page_rules  = array_slice( $rules, $offset, null, true );
		$other_rules = array_slice( $rules, 0, $offset, true );

		return array_merge( $other_rules, $this->rules, $page_rules );

	} // END public function inject_rules
	
	/**
	 * Pre Get Posts for fullpage post type
	 *
	 * @param   Wp_Query  $query  [description]
	 *
	 * @return  void
	 */
	public function pre_get_posts( $query ) {
		
		// Only noop the main query
		if ( ! $query->is_main_query() )
			return;
	 
		// Only noop our very specific rewrite rule match
		if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) )
			return;
	 
		// 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
		if ( ! empty( $query->query['name'] ) )
			$query->set( 'post_type', array( 'post', $this->post_type, 'page' ) );

	} // END public function pre_get_posts

	/**
	 * Remove the slug from published post permalinks.
	 *
	 * @param   string   $post_link
	 * @param   WP_Post  $post       
	 *
	 * @return  string              
	 */
	public function remove_slug( $post_link, $post ) {
	 
		if ( $this->post_type != $post->post_type || 'publish' != $post->post_status )
			return $post_link;
	 
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	 
		return $post_link;

	} // END public function remove_slug

} // END class WP_Fullpage_Slugless_Rewrites
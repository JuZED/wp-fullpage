<?php

/**
 * The Fullpage Filters Class
 * 
 * @package 	WP_Fullpage\Includes\Actions_Filters
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Filters extends WP_Fullpage_Base {

	/**
	 * Init Filters Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Add filters
		$this->filters();

	} // END public function init

	/**
	 * Register Filters
	 *
	 * @return  void
	 */
	public function filters() {

		// Add Fullpage to dropdown
		add_filter( 'get_pages', array( &$this, 'add_fullpage_to_dropdown' ), 10, 2 );

	} // END public function filters
	
	/**
	 * Add Fullpage to dropdown
	 *
	 * @param   array   $pages  
	 * @param   array   $r      
	 *
	 * @return  array              
	 */
	public function add_fullpage_to_dropdown( $pages, $r ) {

		if( ! empty( $r['name'] ) && ( 'page_on_front' == $r['name'] || '_customize-dropdown-pages-page_on_front' == $r['name'] ) ) {
			
			$args = array(
				'post_type' => 'fullpage'
			);

			$items = get_posts( $args );
			$pages = array_merge( $pages, $items );

		}

		return $pages;

	} // END public function add_fullpage_to_dropdown

} // END class WP_Fullpage_Filters

// instantiate the Filters class
$WP_Fullpage_Filters = new WP_Fullpage_Filters();
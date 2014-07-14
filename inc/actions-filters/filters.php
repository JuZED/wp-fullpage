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

	} // END public function filters

} // END class WP_Fullpage_Filters

// instantiate the Filters class
$WP_Fullpage_Filters = new WP_Fullpage_Filters();

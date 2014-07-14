<?php

/**
 * The Fullpage Actions and Filters Class
 * 
 * @package 	WP_Fullpage\Includes\Actions_Filters
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Actions_Filters extends WP_Fullpage_Base {

	/**
	 * Init Actions and Filters Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Base Init
		parent::init( $dir, $file );

		// Include files
		$this->includes();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {
		
		// The Actions
		require_once( $this->rel_path . 'actions.php' );
		
		// The Filters
		require_once( $this->rel_path . 'filters.php' );

	} // END private function includes

} // END class WP_Fullpage_Actions_Filters

// instantiate the Actions and Filters class
$WP_Fullpage_Actions_Filters = new WP_Fullpage_Actions_Filters();

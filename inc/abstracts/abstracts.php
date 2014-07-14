<?php

/**
 * WP Fullpage Abstracts Classes Init
 * 
 * @package WP_Fullpage\Includes\Absctract
 */
class WP_Fullpage_Abstracts {

	/**
	 * The Absctracts Relative Class Path
	 *
	 * @var  string
	 */
	private $abstract_class_path;

	/**
	 * Construct the Class object
	 */
	public function __construct() {
		
		$this->init();

	} // END public function __construct
	
	/**
	 * Abstracts Classes Init
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		$this->abstract_class_path = plugin_dir_path( __FILE__ ) . 'classes/';

		// Include files
		$this->includes();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {
		
		// Fullpage Base Class
		require_once( $this->abstract_class_path . 'base.php' );
		
		// Fullpage Posts List Table Class.
		require_once( $this->abstract_class_path . 'post-list-table.php' );
		
		// Fullpage Metabox Class
		require_once( $this->abstract_class_path . 'metabox.php' );

	} // END private function includes

} // END class WP_Fullpage_Abstracts

// instantiate the Abstracts class
$WP_Fullpage_Abstracts = new WP_Fullpage_Abstracts();

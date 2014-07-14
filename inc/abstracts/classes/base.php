<?php

/**
 * The Abstract Fullpage Class
 * 
 * @package WP_Fullpage\Includes\Absctract\Classes
 */
abstract class WP_Fullpage_Base {
	
	/**
	 * The Assets URL relative to the Class
	 *
	 * @var  string
	 */
	public $assets_url;
	
	/**
	 * The Relative Path relative to the Class
	 *
	 * @var  string
	 */
	public $rel_path;

	/**
	 * Construct the Class object
	 */
	public function __construct() {
		
		$this->init();

	} // END public function __construct
	
	/**
	 * Init Class
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Initializing class properties
		WPFP_Helpers()->define_properties( $this, $dir, $file );

	} // END public function init

} // END abstract class WP_Fullpage_Base

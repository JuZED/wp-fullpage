<?php

/**
 * WP Fullpage List Tables Classes
 * 
 * @package 	WP_Fullpage\Includes\Admin\List_Tables
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_List_Tables extends WP_Fullpage_Base {
	
	/**
	 * The class path relative to the Class
	 *
	 * @var  string
	 */
	private $class_path;
	
	/**
	 * Init plugin
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Base Init
		parent::init( $dir, $file );
		
		// The include path
		$this->class_path = $this->rel_path . 'classes/';

		// Include files
		$this->includes();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {

		// The List Table Classes
		require_once( $this->class_path . 'posts-of-type-list-table.php' );
		require_once( $this->class_path . 'posts-of-term-list-table.php' );

	} // END private function includes

} // END class WP_Fullpage_List_Tables

// instantiate the Init class
$WP_Fullpage_List_Tables = new WP_Fullpage_List_Tables();

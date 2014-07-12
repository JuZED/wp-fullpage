<?php

/**
 * Init WP Fullpage
 * 
 * @package 	WP_Fullpage\Includes
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Init extends WP_Fullpage_Base {

	/**
	 * The plugin Include Path
	 *
	 * @var  string
	 */
	private $plugin_inc_path;

	/**
	 * The plugin Admin Include Path
	 *
	 * @var  string
	 */
	private $plugin_admin_inc_path;
	
	/**
	 * Init plugin
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Base Init
		parent::init( $dir, $file );
		
		// The include path
		$this->plugin_inc_path = plugin_dir_path( $file );
		
		// The admin include path
		$this->plugin_admin_inc_path = $this->plugin_inc_path . 'admin/';

		// Include files
		$this->includes();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {
		
		// The Fullpage Post Types
		require_once( $this->plugin_inc_path . 'post-types/post-types.php' );
		
		// The actions and filters
		require_once( $this->plugin_inc_path . 'actions-filters/actions-filters.php' );
		
		// Ajax Actions
		require_once( $this->plugin_inc_path . 'ajax/ajax.php' );
		
		if( is_admin() ) {
			
			// The Javascript handler
			require_once( $this->plugin_admin_inc_path . 'js-handlers/js-handlers.php' );

			// The List Table Classes
			require_once( $this->plugin_admin_inc_path . 'list-tables/list-tables.php' );
			
			// The Settings Page
			require_once( $this->plugin_admin_inc_path . 'settings/settings.php' );
			
			// The Fullpage Post Types Metaboxes
			require_once( $this->plugin_admin_inc_path . 'metaboxes/metaboxes.php' );
		
		}	
		
		if( ! is_admin() ) {

			// Init Fullpage.js
			require_once( $this->plugin_inc_path . 'fullpage/fullpage.php' );

		}

	} // END private function includes

} // END class WP_Fullpage_Init

// instantiate the Init class
$WP_Fullpage_Init = new WP_Fullpage_Init();

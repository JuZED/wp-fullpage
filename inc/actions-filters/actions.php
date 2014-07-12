<?php

/**
 * @package 	WP_Fullpage\Includes\Actions_Filters
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */

/**
 * The Fullpage Actions Class
 * 
 * @package 	WP_Fullpage\Includes\Actions_Filters
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Actions extends WP_Fullpage_Base {

	/**
	 * Init Actions Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Add actions
		$this->actions();

	} // END public function init

	/**
	 * Register Actions
	 *
	 * @return  void
	 */
	public function actions() {

		// Init Text Domain
		add_action( 'plugins_loaded', array( &$this, 'init_textdomain' ) );

		// Flush rules on after switch theme
		add_action( 'after_switch_theme', array( &$this, 'flush_rules' ) );

	} // END public function actions

	/**
	 * Init textdomain
	 * 
	 * @return  void
	 */
	public function init_textdomain() {
		
		load_plugin_textdomain( WPFP_DOMAIN, false, WPFP_REL_PATH . 'lang' );
		
	} // END public function init_textdomain

	/**
	 * Flush rules
	 * 
	 * @return  void
	 */
	public function flush_rules() {
		
		flush_rewrite_rules();
		
	} // END public function flush_rules

} // END class WP_Fullpage_Actions

// instantiate the Actions class
$WP_Fullpage_Actions = new WP_Fullpage_Actions();

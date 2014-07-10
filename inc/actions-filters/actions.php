<?php

/**
 * The Fullpage Actions Class
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
		add_action( 'after_switch_theme', array( &$this, 'rewrite_flush' ) );

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
	public function rewrite_flush() {
		
		flush_rewrite_rules();
		
	} // END public function rewrite_flush

} // END class WP_Fullpage_Actions

// instantiate the Actions class
$WP_Fullpage_Actions = new WP_Fullpage_Actions();

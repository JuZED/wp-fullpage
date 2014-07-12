<?php 

/** 
 * Plugin Name: WP Fullpage
 * Plugin URI: http://www.juzed.fr/
 * Description: Change your WordPress website to a Fullscreen Scrolling one using FullPage.js
 * Version: 1.0 
 * Author: Julien Zerbib
 * Author URI: http://www.juzed.fr/
 * 
 * 
 * 		Copyright 2013  Julien Zerbib  ( email : contact@juzed.fr )
 * 
 * 		This program is free software; you can redistribute it and/or modify
 * 	 	it under the terms of the GNU General Public License, version 2, as 
 * 	 	published by the Free Software Foundation.
 * 
 * 		This program is distributed in the hope that it will be useful,
 * 	 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 	  	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 	   	GNU General Public License for more details.
 * 
 * 		You should have received a copy of the GNU General Public License
 * 	 	along with this program; if not, write to the Free Software
 * 	  	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 	  	
 * 
 * @package WP_Fullpage
 */

/**
 * The Fullpage Launcher Class
 * 
 * @package WP_Fullpage
 */
class WP_Fullpage_Launcher {

	/**
	 * Construct the plugin object
	 */
	public function __construct() {

		// Config file
		require_once( dirname( __FILE__ ) . '/config.php' );
		
		// Abstract Classes
		require_once( dirname( __FILE__ ) . '/inc/abstracts/abstracts.php' );
		
		// Some Helpers
		require_once( dirname( __FILE__ ) . '/inc/helpers/helpers.php' );

		// Init plugin
		require_once( dirname( __FILE__ ) . '/inc/init.php' );

	} // END public function __construct
	
	/**
	 * Activate the plugin
	 *
	 * @return  void
	 */
	public static function activate() {

		// First, we "add" the custom post type via the above written function.
		// Note: "add" is written with quotes, as CPTs don't get added to the DB,
		// They are only referenced in the post_type column with a post entry, 
		// when you add a post of this CPT.
		require_once( dirname( __FILE__ ) . '/inc/post-types/post-types.php' );
		$WP_Fullpage_Post_Types = new WP_Fullpage_Post_Types();
		$WP_Fullpage_Post_Types->post_types_register();

		// ATTENTION: This is *only* done during plugin activation hook in this example!
		// You should *NEVER EVER* do this on every page load!!
		flush_rewrite_rules();

	} // END public static function activate

	/**
	 * Deactivate the plugin
	 *
	 * @return  void
	 */
	public static function deactivate() {

		// Do nothing
 
	} // END public static function deactivate

} // END class WP_Fullpage_Launcher

// Plugin Activation and Deactivation hooks
register_activation_hook( __FILE__, array( 'WP_Fullpage_Launcher', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'WP_Fullpage_Launcher', 'deactivate' ) );

// instantiate the plugin class
$WP_Fullpage_Launcher_Plugin = new WP_Fullpage_Launcher();

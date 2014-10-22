<?php

/**
 * The Metabox Class
 * 
 * @package 	WP_Fullpage\Includes\Admin\Metaboxes
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Metaboxes extends WP_Fullpage_Metabox_Base {
	
	/**
	 * Init Metaboxes Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {

		parent::init( __DIR__, __FILE__ );
		
		// Include files
		$this->includes();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {

		// limit meta box to fullpage post types
		$post_types = array( 'page', WPFP_FULLPAGE_PT, WPFP_FULLPAGE_SECTION_PT, WPFP_FULLPAGE_SLIDE_PT );

		foreach( $post_types as $post_type ) {

			include( $this->rel_path . $post_type . '.php' );

		}

	} // END private function includes

} // END class WP_Fullpage_Metaboxes

// instantiate the Settings class
$WP_Fullpage_Metaboxes = new WP_Fullpage_Metaboxes();

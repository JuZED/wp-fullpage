<?php

/**
 * The Abstract Fullpage Metabox Class
 * 
 * @package WP_Fullpage\Includes\Absctract\Classes
 */
abstract class WP_Fullpage_Metabox_Base extends WP_Fullpage_Base {
	
	/**
	 * The Post Type
	 *
	 * @var  string
	 */
	private $post_type;
	
	/**
	 * Is it Safe to save metabox data
	 *
	 * @param   int      $post_id        the post id
	 * @param   string   $data           the name of the data
	 * @param   string   $metabox        the name of the metabox
	 * @param   string   $metabox_nonce  the nonce of the metabox
	 *
	 * @return  boolean                  true if it safe to save the data, false if else
	 */
	public function is_it_safe( $post_id, $data, $metabox, $metabox_nonce  ) {

		// Check if our nonce is set.
		if ( ! isset( $_POST[ $metabox_nonce ] ) )
			return false;

		$nonce = $_POST[ $metabox_nonce ];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, $metabox ) )
			return false;

		// If this is an autosave, our form has not been submitted,
		// so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return false;

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return false;

		// Check if the data exists
		if( ! isset( $_POST[ $data ] ) )
			return false;

		/* OK, its safe for us to save the data now. */

		return true;

	} // END public function is_it_safe

} // END abstract class WP_Fullpage_Metabox_Base

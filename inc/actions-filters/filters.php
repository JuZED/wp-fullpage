<?php

/**
 * The Fullpage Filters Class
 * 
 * @package 	WP_Fullpage\Includes\Actions_Filters
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Filters extends WP_Fullpage_Base {

	/**
	 * Init Filters Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		// Add filters
		$this->filters();

	} // END public function init

	/**
	 * Register Filters
	 *
	 * @return  void
	 */
	public function filters() {

		add_filter( 'wp_dropdown_pages', array( &$this, 'wp_dropdown_pages' ) );

	} // END public function filters

	/**
	 * Dropdown Pages Filter to add Fullpage Post Type pages to "Settings / Reading" Page
	 *
	 * @param   string  $output  
	 *
	 * @return  string           
	 */
	public function wp_dropdown_pages( $output ) {
		
		// Avoid other option than "page_on_front" in "Settings / Reading" to be modified
		if( ! strpos( $output, "name='page_on_front'" ) )
			return $output;

		$fullpages = get_posts( array(
			'post_type'      => 'fullpage',
			'posts_per_page' => -1,
			'orderBy'        => 'title',
			'order'          => 'ASC',
		) );

		$args = array(
			'child_of' => 0,
			'selected' => get_option( 'page_on_front' ),
			'echo'     => 0,
		);

		extract( $args, EXTR_SKIP );

		return str_replace( '</select>', walk_page_dropdown_tree( $fullpages, 0, $args ) . '</select>', $output );
		
	} // END public function init_textdomain

} // END class WP_Fullpage_Filters

// instantiate the Filters class
$WP_Fullpage_Filters = new WP_Fullpage_Filters();

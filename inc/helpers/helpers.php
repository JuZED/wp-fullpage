<?php

/**
 * The Fullpage Helpers Class
 */
class WP_Fullpage_Helpers {

	/**
	 * @var  WP_Fullpage_Helpers The single instance of the class
	 */
	protected static $_instance = null;
	
	/**
	 * The Output Buffering Stack
	 *
	 * @var  array
	 */
	public $ob_stack = array();

	/**
	 * Main WP_Fullpage_Helpers Instance
	 *
	 * Ensures only one instance of WP_Fullpage_Helpers is loaded or can be loaded.
	 *
	 * @see 	WPFP_Helpers()
	 * 
	 * @return  WP_Fullpage_Helpers - Main instance
	 */
	public static function instance() {
		
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	} // END public static function instance

	/**
	 * Output Buffering Handler
	 *
	 * @param   string  $str  
	 *
	 * @return  string       
	 */
	public function ob_handler( $str ) {
		
		end( $this->ob_stack );
		$this->ob_stack[ key( $this->ob_stack ) ] .= $str;

		return '';

	} // END public function ob_handler

	/**
	 * Output buffering Start
	 *
	 * @return  void
	 */
	public function ob_start() {
		
		array_push( $this->ob_stack, '' );
		ob_start( array( &$this, 'ob_handler' ) );

	} // END public function ob_start

	/**
	 * Output buffering Clean
	 *
	 * @example
	 * 		WPFP_Helpers()->ob_start();
	 * 			?>
	 * 				<some HTML>
	 *   	 	<?php
	 *      return WPFP_Helpers()->ob_get_clean()
	 *
	 * @return  string  the content
	 */
	public function ob_get_clean() {
		
		ob_end_flush();

		return array_pop( $this->ob_stack );

	} // END public function ob_get_clean

	/**
	 * Define Properties of a Class
	 *
	 * @example 
	 * 		WPFP_Helpers()->define_properties( $this, __DIR__, __FILE__ );
	 * 		
	 *   	Define the assets url of the Class : $this->assets_url
	 *    	Define the relative path to the Class : $this->rel_path
	 *
	 * 		$assets_url and $rel_path must be difined in the Class as 'public'
	 *
	 * @param   object  $class   the class 
	 * @param   string  $dir   	 the name of directory of the Class file
	 * @param   string  $file    the relative Path to the Class file
	 *
	 * @return  void             
	 */
	public function define_properties( &$class, $dir, $file ) {
		
		$class_url         = plugins_url( trailingslashit( basename( $dir ) ), dirname( $file ) );
		$class->assets_url = $class_url . 'assets/';
		$class->rel_path   = plugin_dir_path( $file );

	} // END public function define_properties

	/**
	 * Outputs the html checked attribute and define the default settings value.
	 *
	 * @example 
	 * 		WPFP_Helpers()->checked( $theDataValue, $theSettingsValue, 'yes' );
	 *
	 * @param   string  $data_value    		the data value 
	 * @param   string  $settings_value   	the settings default value of the data
	 * @param   string  $current      		the current value to check for
	 *
	 * @return  void             
	 */
	public function checked( $data_value, $settings_value, $current ) {
		
		$checked         = checked( $data_value, $current, false );
		$default_setting = $this->default_setting( $settings_value );

		printf( '%1s %2s', $checked, $default_setting );

	} // END public function checked

	/**
	 * Outputs the html value attribute and define the default settings value.
	 *
	 * @example 
	 * 		WPFP_Helpers()->value( $theDataValue, $theSettingsValue );
	 *
	 * @param   string  $data_value    		the name of the value 
	 * @param   string  $settings_value   	the settings default value of the data
	 *
	 * @return  void             
	 */
	public function value( $data_value, $settings_value ) {
		
		$this->ob_start();

		?>value='<?php print esc_attr( $data_value ); ?>'<?php
		
		$value           = $this->ob_get_clean();
		$default_setting = $this->default_setting( $settings_value );

		printf( '%1s %2s', $value, $default_setting );

	} // END public function checked

	/**
	 * Define the default settings value.
	 *
	 * @param   string  $settings_value   	the settings default value 
	 * @param   bool    $echo   			echo the data-default html, default to false
	 *
	 * @return  string               		the data-default html
	 */
	public function default_setting( $settings_value, $echo = false ) {

		$this->ob_start();

		?>data-default='<?php print $settings_value ?>'<?php
		
		$data_default = $this->ob_get_clean();

		if( $echo )
			print $data_default;

		return $data_default;

	} // END public function default_setting

} // END class WP_Fullpage_Helpers

/**
 * Returns the main instance of WP_Fullpage_Helpers to prevent the need to use globals.
 *
 * @example WPFP_Helpers()->my_method() 
 *
 * @return 	WP_Fullpage_Helpers
 */
function WPFP_Helpers() {

	return WP_Fullpage_Helpers::instance();

}


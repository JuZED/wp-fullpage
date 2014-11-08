<?php

/**
 * The Fullpage Helpers Class
 * 
 * @package 	WP_Fullpage\Includes\Helpers
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
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
	 * Outputs an html radio button.
	 *
	 * 		WPFP_Helpers()->radio( $option_group, $option_name, $values, $current_value, $settings_value );
	 *
	 * @param   string  $option_group   	the option group 
	 * @param   string  $option_name   		the option name
	 * @param   array   $values   			the values for the input
	 * @param   string  $current_value   	the current value
	 * @param   string  $settings_value   	the settings value
	 *
	 * @return  void             
	 */
	public function radio( $option_group, $option_name, $values, $current_value, $settings_value ) {
		
		$this->ob_start();

		?>

			<div class="radio">

		<?php

		foreach( $values as $key => $value ) :
			
			?>
				<input type="radio" id="<?php print $option_name; ?>-<?php print $key; ?>" name="<?php print $option_group; ?>[<?php print $option_name; ?>]" value="<?php print $key; ?>" <?php WPFP_Helpers()->checked( $key, $settings_value, $current_value ); ?> />
				<label for="<?php print $option_name; ?>-<?php print $key; ?>">
				 	<?php print $value; ?>
				</label>

			<?php

		endforeach;

		?>

			</div>

		<?php

		print $this->ob_get_clean();

	} // END public function radio

	/**
	 * Outputs an html select box.
	 *
	 * 		WPFP_Helpers()->select( $option_group, $option_name, $values, $current_value, $settings_value, $class );
	 *
	 * @param   string  $option_group   	the option group 
	 * @param   string  $option_name   		the option name
	 * @param   array   $values   			the values for the input
	 * @param   string  $current_value   	the current value
	 * @param   string  $settings_value   	the settings value
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function select( $option_group, $option_name, $values, $current_value, $settings_value, $class = '' ) {
		
		$this->ob_start();

		?>

			<select class="<?php print $class; ?>" id="<?php print $option_name; ?>" name="<?php print $option_group; ?>[<?php print $option_name; ?>]" <?php WPFP_Helpers()->default_setting( $settings_value, true ); ?>>

				<?php

				foreach( $values as $key => $value ) :
					
					?>
							
						<option value="<?php print $key; ?>" <?php selected( $current_value , $key ); ?>><?php print $value; ?></option>

					<?php

				endforeach;

				?>

			</select>

		<?php
		
		print $this->ob_get_clean();

	} // END public function select

	/**
	 * Outputs an html input text.
	 *
	 * 		WPFP_Helpers()->text( $option_group, $option_name, $current_value, $settings_value, $class );
	 *
	 * @param   string  $option_group   	the option group 
	 * @param   string  $option_name   		the option name
	 * @param   string  $current_value   	the current value
	 * @param   string  $settings_value   	the settings value
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function text( $option_group, $option_name, $current_value, $settings_value, $class = '' ) {
		
		$this->ob_start();

		?>

			<input class="<?php print $class; ?>" type="text" id="<?php print $option_name; ?>" name="<?php print $option_group; ?>[<?php print $option_name; ?>]" <?php WPFP_Helpers()->value( $current_value, $settings_value ); ?> />

		<?php
		
		print $this->ob_get_clean();

	} // END public function text

	/**
	 * Outputs an html input hidden.
	 *
	 * 		WPFP_Helpers()->hidden( $option_name, $id, $current_value, $class );
	 *
	 * @param   string  $option_name   		the option name
	 * @param   string  $id   				the input id
	 * @param   string  $current_value   	the current value
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function hidden( $option_name, $id, $current_value, $class = '' ) {
		
		$this->ob_start();

		?>
							
			<input class="<?php print $class; ?>" type="hidden" id="<?php print $id; ?>" name="<?php print $option_name; ?>" value="<?php print esc_attr( $current_value ); ?>" />

		<?php
		
		print $this->ob_get_clean();

	} // END public function hidden

	/**
	 * Outputs an html input button.
	 *
	 * 		WPFP_Helpers()->button( $id, $current_value, $datas, $class );
	 *
	 * @param   string  $id   				the input id
	 * @param   string  $current_value   	the current value
	 * @param   array  	$datas   			the datas
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function button( $id, $current_value, $datas, $class = '' ) {
		
		$this->ob_start();

		?>		
			
			<input type="button" class="<?php print $class; ?>" id="<?php print $id; ?>" value='<?php print $current_value; ?>' data-datas='<?php print json_encode( $datas ); ?>' />

		<?php
		
		print $this->ob_get_clean();

	} // END public function button

	/**
	 * Outputs an html input number.
	 *
	 * 		WPFP_Helpers()->number( $option_name, $id, $current_value, $settings_value, $min, $step, $class );
	 *
	 * @param   string  $option_name   		the option name
	 * @param   string  $id   				the input id
	 * @param   string  $current_value   	the current value
	 * @param   string  $settings_value   	the settings value
	 * @param   int  	$min   				the input min
	 * @param   int  	$step  				the input step
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function number( $option_name, $id, $current_value, $settings_value, $min, $step, $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<input type="number" id="<?php print $id; ?>" name="<?php print $option_name; ?>[<?php print $id; ?>]" class="<?php print $class; ?>" step="<?php print $step; ?>" min="<?php print $min; ?>" <?php WPFP_Helpers()->value( $current_value, $settings_value ); ?> />

		<?php
		
		print $this->ob_get_clean();

	} // END public function number

	/**
	 * Outputs an html textarea.
	 *
	 * 		WPFP_Helpers()->textarea( $option_name, $id, $current_value, $settings_value, $class );
	 *
	 * @param   string  $option_name   		the option name
	 * @param   string  $id   				the input id
	 * @param   string  $current_value   	the current value
	 * @param   string  $settings_value   	the settings value
	 * @param   string  $class   			the class of the input
	 *
	 * @return  void             
	 */
	public function textarea( $option_name, $id, $current_value, $settings_value, $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<textarea cols="40" id="<?php print $id; ?>" name="<?php print $option_name; ?>[<?php print $id; ?>]" <?php WPFP_Helpers()->default_setting( $settings_value ); ?>><?php print $current_value; ?></textarea>

		<?php
		
		print $this->ob_get_clean();

	} // END public function textarea

	/**
	 * Outputs an html tooltip.
	 *
	 * 		WPFP_Helpers()->tooltip( $tip, $class );
	 *
	 * @param   string  $tip   		the tip
	 * @param   string  $class   	the class of the tip
	 *
	 * @return  void             
	 */
	public function tooltip( $tip, $class ) {
		
		$this->ob_start();

		?>		
									
			<span class="<?php print $class; ?>" data-tip='<?php print $tip; ?>'></span>

		<?php
		
		print $this->ob_get_clean();

	} // END public function tooltip

	/**
	 * Outputs an html goto.
	 *
	 * 		WPFP_Helpers()->goto_tip( $tip, $url, $class );
	 *
	 * @param   string  $tip   		the tip
	 * @param   string  $url   		the goto url
	 * @param   string  $class   	the class of the tip
	 *
	 * @return  void             
	 */
	public function goto_tip( $tip, $url, $class ) {
		
		$this->ob_start();

		?>		
									
			<a class="<?php print $class; ?>" title="<?php print $tip; ?>" target="_blank" href="<?php print $url; ?>"></a>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function goto

	/**
	 * Outputs an html label.
	 *
	 * 		WPFP_Helpers()->label( $label, $for );
	 *
	 * @param   string  $label   	the label
	 * @param   string  $for   		the for attribute
	 *
	 * @return  void             
	 */
	public function label( $label, $for = '' ) {
		
		$this->ob_start();

		?>		
									
			<label for="<?php print $for ?>">
			 	
			 	<?php print $label ?>
			
			</label>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function label

	/**
	 * Outputs an html span label.
	 *
	 * 		WPFP_Helpers()->span_label( $label );
	 *
	 * @param   string  $label   	the label
	 *
	 * @return  void             
	 */
	public function span_label( $label ) {
		
		$this->ob_start();

		?>		
									
			<span class="label"><?php print $label; ?></span>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function span_label

	/**
	 * Outputs an html table start.
	 *
	 * 		WPFP_Helpers()->table_start( $id, $class );
	 *
	 * @param   string  $id   		the id
	 * @param   string  $class   	the class
	 *
	 * @return  void             
	 */
	public function table_start( $id = '', $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<table id="<?php print $id; ?>" class="<?php print $class; ?>">
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function table_start

	/**
	 * Outputs an html table end.
	 *
	 * 		WPFP_Helpers()->table_end();
	 *
	 * @return  void             
	 */
	public function table_end() {
		
		$this->ob_start();

		?>		
									
			</table>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function table_end

	/**
	 * Outputs an html table caption.
	 *
	 * 		WPFP_Helpers()->caption( $label );
	 *
	 * @param   string  $label   	the label
	 * @param   string  $class   	the class
	 *
	 * @return  void             
	 */
	public function caption( $label, $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<caption class="<?php print $class; ?>">

				<?php print $label; ?>

			</caption>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function caption

	/**
	 * Outputs an html tr start.
	 *
	 * 		WPFP_Helpers()->tr_start( $id, $class );
	 *
	 * @param   string  $id   		the id
	 * @param   string  $class   	the class
	 *
	 * @return  void             
	 */
	public function tr_start( $id = '', $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<tr id="<?php print $id; ?>" class="<?php print $class; ?>">
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function tr_start

	/**
	 * Outputs an html tr end.
	 *
	 * 		WPFP_Helpers()->tr_end();
	 *
	 * @return  void             
	 */
	public function tr_end() {
		
		$this->ob_start();

		?>		
									
			</tr>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function tr_end

	/**
	 * Outputs an html th start.
	 *
	 * 		WPFP_Helpers()->th_start( $scope, $id, $class );
	 *
	 * @param   string  $scope   	the scope
	 * @param   string  $id   		the id
	 * @param   string  $class   	the class
	 *
	 * @return  void             
	 */
	public function th_start( $scope = 'row', $id = '', $class = '' ) {
		
		$this->ob_start();

		?>		
									
			<th scope="<?php print $scope; ?>" id="<?php print $id; ?>" class="<?php print $class; ?>">
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function th_start

	/**
	 * Outputs an html th end.
	 *
	 * 		WPFP_Helpers()->th_end();
	 *
	 * @return  void             
	 */
	public function th_end() {
		
		$this->ob_start();

		?>		
									
			</th>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function th_end

	/**
	 * Outputs an html td start.
	 *
	 * 		WPFP_Helpers()->td_start( $id, $class, $colspan );
	 *
	 * @param   string  $id   		the id
	 * @param   string  $class   	the class
	 * @param   string  $colspan   	colspan
	 *
	 * @return  void             
	 */
	public function td_start( $id = '', $class = '', $colspan = 1 ) {
		
		$this->ob_start();

		?>		
									
			<td colspan="<?php print $colspan; ?>" id="<?php print $id; ?>" class="<?php print $class; ?>">
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function td_start

	/**
	 * Outputs an html td end.
	 *
	 * 		WPFP_Helpers()->th_end();
	 *
	 * @return  void             
	 */
	public function td_end() {
		
		$this->ob_start();

		?>		
									
			</td>
		
		<?php
		
		print $this->ob_get_clean();

	} // END public function td_end

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
 * @package 	WP_Fullpage\Includes\Helpers
 *
 * @return 		WP_Fullpage_Helpers
 */
function WPFP_Helpers() {

	return WP_Fullpage_Helpers::instance();

}


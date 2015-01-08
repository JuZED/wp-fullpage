<?php

/**
 * WP Fullpage.
 *
 * The WP Fullpage Class and a function to access it.
 *
 * @author Julien Zerbib <contact@juzed.fr>
 */

/**
 * Main WP Fullpage Class.
 *
 * The WP Fullpage Object and some Helpers to access it.
 * 
 * @package 	WP_Fullpage
 */
final class WP_Fullpage extends WP_Fullpage_Base {

	/**
	 * @var  WP_Fullpage The single instance of the class
	 */
	protected static $_instance = null;

	/**
	 * Main WP_Fullpage Instance
	 *
	 * Ensures only one instance of WP_Fullpage is loaded or can be loaded.
	 *
	 * @see 	WPFP()			The function to simply use the class methods
	 * 
	 * @return  WP_Fullpage 	Main instance
	 */
	public static function instance() {
		
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	} // END public static function instance

	/**
	 * Init WP Fullpage
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {
		
		parent::init( __DIR__, __FILE__ );

		// Include files
		$this->includes();
		
		// Add actions and filters
		$this->actions_filters();

	} // END public function init

	/** 
	 * Includes
	 * 
	 * @return  void
	 */
	private function includes() {
		
		// The Fullpage Query
		require_once( $this->rel_path . 'fullpage-query.php' );

	} // END private function includes

	/**
	 * Register Actions and Filters
	 * 
	 * @return  void
	 */
	private function actions_filters() {

		// The template include Filter
		add_filter( 'template_include', array( &$this, 'fullpage_template_include' ) );

		// Add Fullpage.js Scripts and Styles on Front
		add_filter( 'wp_enqueue_scripts', array( &$this, 'scripts_styles' ) );

	} // END private function actions_filters

	/**
	 * Is it a fullpage
	 * 
	 * @return  bool
	 */
	private function is_fullpage() {

		$is_fullpage = 'no';

		if( is_page() ) {

			$fullpage_options = get_post_meta( get_queried_object_id(), WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, true );
			$is_fullpage      = ! empty( $fullpage_options['isItFullpage'] ) ? $fullpage_options['isItFullpage'] : 'no' ;
		
		}

		if ( WPFP_FULLPAGE_PT === get_query_var( 'post_type' ) || 'yes' === $is_fullpage )
			return true;
		else
			return false;

	} // END private function is_fullpage

	/**
	 * The template include Filter to fullpage post type
	 *
	 * @param   string  $template  the template filename to locate
	 *
	 * @return  string             The template filename if one is located.
	 */
	public function fullpage_template_include( $template ) {

		if ( $this->is_fullpage() ) {
			
			global $post;
			
			$fullpage_template = $this->locate_template( 
				array(
					"fullpage-{$post->post_name}.php",
					'fullpage.php',
				)
			);
						
			if ( $fullpage_template )	
				return apply_filters( 'wpfp_fullpage_template', $fullpage_template, $post );

		}

		return $template;
		
	} // END public function fullpage_template_include

	/**
	 * Add Fullpage.js Scripts and Styles on Front
	 * 
	 * @return  void
	 */
	public function scripts_styles() {
		
		if( $this->is_fullpage() ) {

			// Add Fullpage Scripts
			wp_enqueue_script( 'jquery-slimscroll', $this->assets_url . '/js/jquery.slimscroll.min.js', array( 'jquery' ), WPFP_VERSION );
			wp_enqueue_script( 'jquery-easings', $this->assets_url . '/js/jquery.easings.min.js', array( 'jquery' ), WPFP_VERSION );
			wp_enqueue_script( 'jquery-pseudo', $this->assets_url . '/js/jquery.pseudo.js', array( 'jquery' ), WPFP_VERSION );
			wp_enqueue_script( 'jquery-fullpage', $this->assets_url . '/js/jquery.fullPage.min.js', array( 'jquery-slimscroll', 'jquery-easings' ), WPFP_VERSION );
			
			// Get the path to 'jquery.fullpage.custom.js'.
			// See if the file exists in the theme
			$fullpage_custom_script_path = $this->locate_template(
				trailingslashit( $this->script_path() ) . 'jquery.fullpage.custom.js'
			);

			// Convert the previous script path to an URL
			$fullpage_custom_script_url = str_replace( 
				array(
					get_stylesheet_directory(),
					get_template_directory(),
					WPFP_REL_PATH,
				), 
				array(
					get_stylesheet_directory_uri(),
					get_template_directory_uri(),
					WPFP_URL,
				),
				$fullpage_custom_script_path
			);

			wp_enqueue_script( 'jquery-fullpage-custom', $fullpage_custom_script_url, array( 'jquery-fullpage', 'jquery-pseudo' ), WPFP_VERSION );
			wp_enqueue_script( 'jquery-fullpage-init', $this->assets_url . '/js/jquery.fullPage.init.js', array( 'jquery-fullpage-custom' ), WPFP_VERSION );

			// Init Fullpage Params
			$params = $this->init_fullpage_params();

			// Fullpage params are added to the custom events script so they are available for fullpage init too
			wp_localize_script( 'jquery-fullpage-custom', 'fullPageParams', $params );
			
			// Add Fullpage Styles
			wp_enqueue_style( 'dashicons' );
			wp_enqueue_style( 'jquery-fullPage', $this->assets_url . '/css/jquery.fullPage.css', array(), WPFP_VERSION );
			
			// Get the path to 'jquery.fullpage.custom.css'.
			// See if the file exists in the theme
			$fullpage_custom_style_path = $this->locate_template(
				trailingslashit( $this->style_path() ) . 'jquery.fullpage.custom.css'
			);

			// Convert the previous style path to an URL
			$fullpage_custom_style_url = str_replace( 
				array(
					get_stylesheet_directory(),
					get_template_directory(),
					WPFP_REL_PATH,
				), 
				array(
					get_stylesheet_directory_uri(),
					get_template_directory_uri(),
					WPFP_URL,
				),
				$fullpage_custom_style_path
			);
			
			wp_enqueue_style( 'jquery-fullPage-custom', $fullpage_custom_style_url, array( 'jquery-fullPage', 'dashicons' ), WPFP_VERSION );

		}
		
	} // END public function scripts_styles

	/**
	 * Init Fullpage.js params
	 * 
	 * @return  array	an array of fullpage params
	 */
	public function init_fullpage_params() {

		// Init Fullpage Params
		$params = WPFP_Query()->fullpage->fullpage_options;

		$params['anchors'] = array();

		// Get the sections Fullpage params
		foreach( WPFP_Query()->sections as $key => $section ) {

			$params['anchors'][] = $section->post_name;

		}

		return apply_filters( 'wpfp_fullpage_params', $params );
		
	} // END public function init_fullpage_params

	/**
	 * Wp Fullpage Helpers
	 */

	/**
	 * Get template part.
	 *
	 * This is the load order:
	 *
	 *      yourtheme       /   $this->template_path()  /   $slug-$name.php
	 *      yourtheme       /   $slug-$name.php
	 *      WPFP_REL_PATH   /   templates  				/   $slug-$name.php
	 *      yourtheme       /   $this->template_path()  /   $slug.php
	 *      yourtheme       /   $slug.php
	 *      WPFP_REL_PATH   /   templates  				/   $slug.php
	 *
	 * @param   string  $slug
	 * @param   string  $name  default is ''
	 *
	 * @return  void
	 */
	public function get_template_part( $slug, $name = '' ) {
		
		$template = '';

		// Look in yourtheme/slug-name.php and yourtheme/wp-fullpage/slug-name.php
		if ( $name )
			$template = locate_template( array( $this->template_path() . "{$slug}-{$name}.php", "{$slug}-{$name}.php" ) );

		// Get default slug-name.php
		if ( ! $template && $name && file_exists( WPFP_REL_PATH . "templates/{$slug}-{$name}.php" ) )
			$template = WPFP_REL_PATH . "templates/{$slug}-{$name}.php";

		// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/wp-fullpage/slug.php
		if ( ! $template )
			$template = locate_template( array( $this->template_path() . "{$slug}.php", "{$slug}.php" ) );

		// Get default slug.php
		if ( ! $template && file_exists( WPFP_REL_PATH . "templates/{$slug}.php" ) )
			$template = WPFP_REL_PATH . "templates/{$slug}.php";

		// Allow 3rd party plugin filter template file from their plugin
		$template = apply_filters( 'wpfp_get_template_part', $template, $slug, $name );

		if ( $template )
			load_template( $template, false );

	} // END public function get_template_part

	/**
	 * Get templates passing attributes and including the file.
	 *
	 * @param  mixed   $template_name
	 * @param  array   $args 			default is array()
	 * @param  string  $template_path 	default is ''
	 * @param  string  $default_path 	default is ''
	 * 
	 * @return void
	 */
	public function get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
		
		if ( $args && is_array( $args ) )
			extract( $args );

		$located = $this->locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			
			_doing_it_wrong( __FUNCTION__, sprintf( __( '<code>%s</code> does not exist.', WPFP_DOMAIN ), $located ), WPFP_VERSION );
			
			return;

		}

		do_action( 'wpfp_before_template_part', $template_name, $template_path, $located, $args );

		include( $located );

		do_action( 'wpfp_after_template_part', $template_name, $template_path, $located, $args );

	} // END public function get_template

	/**
	 * Locate a template and return the path for inclusion.
	 *
	 * This is the load order:
	 *
	 *      yourtheme       /   $template_path  /   $template_name
	 *      yourtheme       /   $template_name
	 *      $default_path   /   $template_name
	 *
	 * @param   string|array    $template_names
	 * @param   string   		$template_path 	default is ''
	 * @param   string   		$default_path 		default is ''
	 * 
	 * @return  string
	 */
	public function locate_template( $template_names, $template_path = '', $default_path = '' ) {
	
		if ( ! $template_path )
			$template_path = $this->template_path();

		if ( ! $default_path )
			$default_path = WPFP_REL_PATH . 'templates/';
		
		$templates = array();

		foreach ( (array) $template_names as $template_name ) {
			
			if ( ! $template_name )
				continue;

			$templates[] = trailingslashit( $template_path ) . $template_name;
			$templates[] = $template_name;

		}

		// Look within passed path within the theme - this is priority
		$template = locate_template( $templates );

		// Get default template
		if ( ! $template )
			foreach ( (array) $template_names as $template_name ) {
				
				if ( ! $template_name )
					continue;

				if ( file_exists( $default_path . $template_name ) ) {
					$template = $default_path . $template_name;
					break;
				}

			}

		// Return what we found
		return apply_filters( 'wpfp_locate_template', $template, $template_name, $template_path );

	} // END public function locate_template

	/**
	 * Load Fullpage header template.
	 *
	 * Includes the fullpage header template for a theme or if a name is specified then a
	 * specialised header will be included.
	 *
	 * For the parameter, if the file is called "header-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_header( 'special' );
	 *
	 * @param    string   $name   		The name of the specialised fullpage header.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return   void
	 */
	public function get_header( $name = '', $post_type = 'fullpage' ) {
		
		$this->get_layout( 'header', $name, $post_type );
	
	} // END public function get_header

	/**
	 * Load Fullpage footer template.
	 *
	 * Includes the fullpage footer template for a theme or if a name is specified then a
	 * specialised footer will be included.
	 *
	 * For the parameter, if the file is called "footer-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_footer( 'special' );
	 *
	 * @param    string   $name   		The name of the specialised fullpage footer.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return   void
	 */
	public function get_footer( $name = '', $post_type = 'fullpage' ) {
		
		$this->get_layout( 'footer', $name, $post_type );
	
	} // END public function get_footer

	/**
	 * Load Fullpage navigation template.
	 *
	 * Includes the fullpage navigation template for a theme or if a name is specified then a
	 * specialised navigation will be included.
	 *
	 * For the parameter, if the file is called "navigation-special.php" then specify
	 * "special".
	 *
	 *WPFP()->get_navigation( 'special' );
	 *
	 * @param    string   $name   		The name of the specialised fullpage navigation.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return   void
	 */
	public function get_navigation( $name = '', $post_type = 'fullpage' ) {
		
		$this->get_layout( 'navigation', $name, $post_type );
	
	} // END public function get_navigation

	/**
	 * Load Fullpage slides navigation template.
	 *
	 * Includes the fullpage slides navigation template for a theme or if a name is specified then a
	 * specialised slides navigation will be included.
	 *
	 * For the parameter, if the file is called "slides-navigation-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_slides_navigation( 'special' );
	 *
	 * @param    string   $name   		The name of the specialised fullpage slides navigation.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return   void
	 */
	public function get_slides_navigation( $name = '', $post_type = 'section' ) {
		
		$this->get_layout( 'slides-navigation', $name, $post_type );
	
	} // END public function get_slides_navigation

	/**
	 * Load Fullpage sidebar template.
	 *
	 * Includes the fullpage sidebar template for a theme or if a name is specified then a
	 * specialised sidebar will be included.
	 *
	 * For the parameter, if the file is called "sidebar-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_sidebar( 'special' );
	 *
	 * @param    string   $name   		The name of the specialised fullpage sidebar.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return   void
	 */
	public function get_sidebar( $name = '', $post_type = 'fullpage' ) {
		
		$this->get_layout( 'sidebar', $name, $post_type );
	
	} // END public function get_sidebar

	/**
	 * Load a Fullpage layout template.
	 *
	 * Includes the fullpage sidebar template for a theme or if a name is specified then a
	 * specialised sidebar will be included.
	 *
	 * For the parameter, if the file is called "sidebar-special.php" then specify
	 * "sidebar" and "special".
	 *
	 * WPFP()->get_layout( 'my_type', 'special' );
	 *
	 * @param    string   $type   		can be 'header', 'footer', 'sidebar', 'navigation', 'slides-navigation' or whatever you want
	 * @param    string   $name   		The name of the specialised fullpage layout.
	 * @param    string   $post_type   	the type of the current post in the loop. Can be 'fullpage', 'section' or 'slide'
	 *
	 * @return void
	 */
	public function get_layout( $type, $name = '', $post_type = 'fullpage' ) {
		
		/**
		 * Fires before the layout template file is loaded.
		 *
		 * The hook allows a specific layout template file to be used in place of the
		 * default layout template file. If your file is called header-new.php,
		 * you would specify the filename in the hook as WPFP()->get_header( 'new' ).
		 */
		do_action( "get_{$type}", $name );

		$post_name   = WPFP_Query()->$post_type->post_name;
		$layout_path = $this->layout_path();
		$template    = false;
		
		$template = $this->locate_template(
			array(
				trailingslashit( $layout_path ) . "{$type}-{$name}-{$post_name}.php",
				trailingslashit( $layout_path ) . "{$type}-{$post_name}.php",
				trailingslashit( $layout_path ) . "{$type}-{$name}.php",
				trailingslashit( $layout_path ) . "{$type}.php",
			)
		);
	
		$template = apply_filters( 'wpfp_get_layout_template', $template, $type, $name );

		if( $template )
			load_template( $template, false );
	
	} // END public function get_layout

	/**
	 * Load Fullpage Sections loop.
	 *
	 * Includes the fullpage Sections loop template for a theme or if a name is specified then a
	 * specialised Sections loop will be included.
	 *
	 * For the parameter, if the file is called "sections-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_sections( 'special' );
	 *
	 * @param    string   $name   The name of the specialised fullpage sections loop.
	 *
	 * @return void
	 */
	public function get_sections( $name = '' ) {
		
		$this->get_loop( 'section', $name );
	
	} // END public function get_sections

	/**
	 * Load Fullpage Slides loop.
	 *
	 * Includes the fullpage Slides loop template for a theme or if a name is specified then a
	 * specialised Slides loop will be included.
	 *
	 * For the parameter, if the file is called "slides-special.php" then specify
	 * "special".
	 *
	 * WPFP()->get_slides( 'special' );
	 *
	 * @param    string   $name   The name of the specialised fullpage slides loop.
	 *
	 * @return void
	 */
	public function get_slides( $name = '' ) {

		$this->get_loop( 'slide', $name );
		
	} // END public function get_slides

	/**
	 * Load Fullpage loop.
	 *
	 * Includes the fullpage loop template for a theme or if a name is specified then a
	 * specialised loop will be included.
	 *
	 * For the parameters, if the file is called "section-special.php" then specify
	 * "section" and "special".
	 *
	 * The method is looking for "$type-$name-the_post_name.php" and "$type-the_post_name.php" first.
	 * So you can add a specific template for a section or a slide depending on its post_name.
	 *
	 * WPFP()->get_loop( 'section', 'special' );
	 *
	 * @param    string   $type   can be 'section' or 'slide'
	 * @param    string   $name   The name of the specialised fullpage loop.
	 *
	 * @return void
	 */
	public function get_loop( $type, $name = '' ) {
		
		/**
		 * Fires before the fullpage loop.
		 *
		 * The hook allows a specific loop template file to be used in place of the
		 * default loop template file. If your file is called fullpage-header-new.php,
		 * you would specify the filename in the hook as WPFP()->get_header( 'new' ).
		 */
		do_action( "get_{$type}s", $name );

		$loop_path  = $this->loop_path();
		$have_types = "have_{$type}s";
		$the_type   = "the_{$type}";

		while ( WPFP_Query()->$have_types() ) {

			WPFP_Query()->$the_type();

			$template  = false;
			$post_name = WPFP_Query()->$type->post_name;

			$template = $this->locate_template(
				array(
					trailingslashit( $loop_path ) . "{$type}-{$name}-{$post_name}.php",
					trailingslashit( $loop_path ) . "{$type}-{$post_name}.php",
					trailingslashit( $loop_path ) . "{$type}-{$name}.php",
					trailingslashit( $loop_path ) . "{$type}.php",
				)
			);

			$template = apply_filters( 'wpfp_get_loop_template', $template, $type, $name );
				
			if( $template )
				load_template( $template, false );

		}
	
	} // END public function get_loop

	/**
	 * Get the template path.
	 *
	 * @return  string
	 */
	private function template_path() {

		return apply_filters( 'wpfp_template_path', WPFP_TEMPLATE_PATH );
		
	} // END private function template_path

	/**
	 * Get the layout path.
	 *
	 * @return  string
	 */
	private function layout_path() {

		return apply_filters( 'wpfp_layout_path', WPFP_LAYOUT_PATH );
		
	} // END private function layout_path

	/**
	 * Get the script path.
	 *
	 * @return  string
	 */
	private function script_path() {

		return apply_filters( 'wpfp_script_path', WPFP_SCRIPT_PATH );
		
	} // END private function layout_path

	/**
	 * Get the style path.
	 *
	 * @return  string
	 */
	private function style_path() {

		return apply_filters( 'wpfp_style_path', WPFP_STYLE_PATH );
		
	} // END private function style_path

	/**
	 * Get the loop path.
	 *
	 * @return  string
	 */
	private function loop_path() {

		return apply_filters( 'wpfp_loop_path', WPFP_LOOP_PATH );
		
	} // END private function loop_path

	/**
	 * END Wp Fullpage Helpers
	 */

} // END class WP_Fullpage

/**
 * Returns the main instance of WP_Fullpage to prevent the need to use globals.
 *
 * WPFP()->my_method() 
 * 
 * @package 	WP_Fullpage
 *
 * @return 		WP_Fullpage
 */
function WPFP() {

	return WP_Fullpage::instance();

}

// instantiate the WP_Fullpage class
WPFP();



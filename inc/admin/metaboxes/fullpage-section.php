<?php

/**
 * The Fullpage Section Type Metabox Class
 */
class WP_Fullpage_Section_Type_Metabox extends WP_Fullpage_Metabox_Base {

	/**
	 * Init Metaboxes Object
	 *
	 * @return  void
	 */
	public function init( $dir = __DIR__, $file = __FILE__ ) {

		parent::init( __DIR__, __FILE__ );

		$this->post_type = WPFP_FULLPAGE_SECTION_PT;
		
		// Add actions and filters
		$this->actions_filters();

	} // END public function init

	/**
	 * Register Actions and Filters
	 *
	 * @return  void
	 */
	private function actions_filters() {

		// Add Some Metaboxes
		add_action( 'load-post.php', array( &$this, 'metaboxes_init' ) );
		add_action( 'load-post-new.php', array( &$this, 'metaboxes_init' ) );
		
		// Add some scripts
		add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );

	} // END private function actions_filters

	/**
	 * Metaboxes Init
	 *
	 * @return  void
	 */
	public function metaboxes_init() {

		// Add metaboxes
		add_action( 'add_meta_boxes', array( &$this, 'add_meta_box' ) );

		// Save Datas
		add_action( 'save_post', array( &$this, 'save' ) );

	} // END public function metaboxes_init
	
	/**
	 * Add some metaboxes
	 *
	 * @param  string  $post_type  the post type
	 *
	 * @return void
	 */
	public function add_meta_box( $post_type ) {
		
		if ( $this->post_type == $post_type ) {
			
			// Section Options
			$this->section_meta_box();
			
		}

	} // END public function add_meta_box
	
	/**
	 * Add Section Options Metabox
	 *
	 * @return void
	 */
	private function section_meta_box() {
		
		// Section Options Metabox
		add_meta_box(
			'wpfp_section_options',
			__( 'WP Fullpage Options', WPFP_DOMAIN ),
			array( &$this, 'render_section_options_content' ),
			$this->post_type,
			'advanced',
			'high'
		);

	} // END private function section_meta_box
	
	/**
	 * Render Section Options Meta Box content.
	 *
	 * @param  WP_Post $post The post object.
	 *
	 * @return void
	 */
	public function render_section_options_content( $post ) {
		
		// Section Options
		$section_options = $this->prepare_section_options( $post );

		extract( $section_options['options'] );
		extract( array_change_key_case( $section_options['default'], CASE_UPPER ) );
			
		// Slides Options
		$slides_options = $this->prepare_slides_options( $post );

		extract( $slides_options['options'] );
		extract( array_change_key_case( $slides_options['default'], CASE_UPPER ) );
		
		// Custom Options
		$custom_options = $this->prepare_custom_options( $post );

		extract( $custom_options['options'] );
		extract( array_change_key_case( $custom_options['default'], CASE_UPPER ) );

		// Render metabox
		include( $this->rel_path . 'views/section-options.php' );

	} // END public function render_section_options_content
	
	/**
	 * Prepare Custom Options.
	 *
	 * @param  WP_Post $post The post object.
	 *
	 * @return array         an array of params
	 *                          array(
	 *                          	options => the options,
	 *                          	default => the default option
	 *                          )
	 */
	private function prepare_section_options( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( WPFP_SECTION_PT_SECTION_OPTIONS, WPFP_SECTION_PT_SECTION_OPTIONS . '_nonce' );

		// Retrieving an existing value from the database.
		$section_options = (array) get_post_meta( $post->ID, WPFP_SECTION_PT_SECTION_OPTIONS, true );
		
		// restrieving default settings
		$default_fullpage_options = get_option( WPFP_SETTINGS_SECTIONS_OPTIONS, array() );
		
		// Parsing options with default from Settings
		$section_options = wp_parse_args( $section_options, $default_fullpage_options );

		return array(
			'options' => $section_options,
			'default' => $default_fullpage_options,
		);

	} // END private function prepare_section_options
	
	/**
	 * Prepare Slides Options.
	 *
	 * @param  WP_Post $post The post object.
	 *
	 * @return array         an array of params
	 *                          array(
	 *                          	options => the options,
	 *                          	default => the default option
	 *                          )
	 */
	private function prepare_slides_options( $post ) {
		
		// Add an nonce field so we can check for it later.
		wp_nonce_field( WPFP_SECTION_PT_SLIDES_OPTIONS, WPFP_SECTION_PT_SLIDES_OPTIONS . '_nonce' );

		// Retrieving an existing value from the database.
		$slides_options = (array) get_post_meta( $post->ID, WPFP_SECTION_PT_SLIDES_OPTIONS, true );
		
		// restrieving default settings
		$default_slides_options = get_option( WPFP_SETTINGS_SLIDES_OPTIONS, array() );
		
		// Parsing options with default from Settings
		$slides_options = wp_parse_args( $slides_options, $default_slides_options );

		// Retrieve registered Taxonomies 
		$args = array(
			'public' => true,
		);

		$_taxonomies = get_taxonomies( $args, 'objects', 'and' );
		
		$slides_options['taxonomies'] = array();
		$slides_options['terms']      = array();

		foreach( $_taxonomies as $key => $_taxonomy ) {

			$_terms = get_terms( array( $_taxonomy->name ), array( 'hide_empty' => false ) );

			// We keep only taxonomies with terms
			if( $_terms ) {
				$slides_options['taxonomies'][ $key ]        = $_taxonomy;
				$slides_options['terms'][ $_taxonomy->name ] = $_terms;
			}

		}
		
		// Retrieve registered Post types 
		$args = array(
			'public' => true,
		);

		$slides_options['post_types'] = get_post_types( $args, 'objects', 'and' );

		$post_types_to_remove = array(
			'attachment',
			'fullpage',
			'fullpage-section',
			'fullpage-slide',
		);

		foreach( $slides_options['post_types'] as $key => $post_type ) {

			if( in_array( $key, $post_types_to_remove ) )
				unset( $slides_options['post_types'][ $key ] );

		}

		return array(
			'options' => $slides_options,
			'default' => $default_slides_options,
		);

	} // END private function prepare_section_options
	
	/**
	 * Prepare Custom Options.
	 *
	 * @param  WP_Post $post The post object.
	 *
	 * @return array         an array of params
	 *                          array(
	 *                          	options => the options,
	 *                          	default => the default option
	 *                          )
	 */
	private function prepare_custom_options( $post ) {
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( WPFP_SECTION_PT_CUSTOM_OPTIONS, WPFP_SECTION_PT_CUSTOM_OPTIONS . '_nonce' );

		// Retrieving an existing value from the database.
		$custom_options = (array) get_post_meta( $post->ID, WPFP_SECTION_PT_CUSTOM_OPTIONS, true );
		
		// restrieving default settings
		$default_custom_options = get_option( WPFP_SETTINGS_CUSTOM_OPTIONS, array() );
		
		// Parsing options with default from Settings
		$custom_options = wp_parse_args( $custom_options, $default_custom_options );

		return array(
			'options' => $custom_options,
			'default' => $default_custom_options,
		);

	} // END private function prepare_custom_options

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param  int  $post_id  The ID of the post being saved.
	 *
	 * @return void
	 */
	public function save( $post_id ) {
		
		// Save Section Options
		$this->save_section_options( $post_id );

		// Save Slides Options
		$this->save_slides_options( $post_id );
		
		// Save Custom Options
		$this->save_custom_options( $post_id );

	} // public function save

	/**
	 * Save Section Options
	 *
	 * @param  int  $post_id  The ID of the post being saved.
	 *
	 * @return void
	 */
	private function save_section_options( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		if( ! $this->is_it_safe( $post_id, WPFP_SECTION_PT_SECTION_OPTIONS, WPFP_SECTION_PT_SECTION_OPTIONS, WPFP_SECTION_PT_SECTION_OPTIONS . '_nonce' ) )
			return $post_id;

		// Sanitize the user inputs.
		$section_options = $_POST[ WPFP_SECTION_PT_SECTION_OPTIONS ];

		// Update the meta field.
		update_post_meta( $post_id, WPFP_SECTION_PT_SECTION_OPTIONS, $section_options );

	} // private function save_section_options

	/**
	 * Save Slides Options
	 *
	 * @param  int  $post_id  The ID of the post being saved.
	 *
	 * @return void
	 */
	private function save_slides_options( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		if( ! $this->is_it_safe( $post_id, WPFP_SECTION_PT_SLIDES_OPTIONS, WPFP_SECTION_PT_SLIDES_OPTIONS, WPFP_SECTION_PT_SLIDES_OPTIONS . '_nonce' ) )
			return $post_id;

		// Sanitize the user inputs.
		$slides_options = $_POST[ WPFP_SECTION_PT_SLIDES_OPTIONS ];

		// Update the meta field.
		update_post_meta( $post_id, WPFP_SECTION_PT_SLIDES_OPTIONS, $slides_options );

	} // private function save_slides_options

	/**
	 * Save Custom Options
	 *
	 * @param  int  $post_id  The ID of the post being saved.
	 *
	 * @return void
	 */
	private function save_custom_options( $post_id ) {

		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */
		if( ! $this->is_it_safe( $post_id, WPFP_SECTION_PT_CUSTOM_OPTIONS, WPFP_SECTION_PT_CUSTOM_OPTIONS, WPFP_SECTION_PT_CUSTOM_OPTIONS . '_nonce' ) )
			return $post_id;

		// Sanitize the user inputs.
		$custom_options = $_POST[ WPFP_SECTION_PT_CUSTOM_OPTIONS ];

		// Update the meta field.
		update_post_meta( $post_id, WPFP_SECTION_PT_CUSTOM_OPTIONS, $custom_options );

	} // private function save_custom_options
	
	/**
	 * Add some scripts and styles to Section Post Type metabox.
	 *
	 * @param string $hook the current admin page
	 *
	 * @return void
	 */
	public function admin_enqueue_scripts( $hook ) {
		
		if( 'post.php' != $hook && 'post-new.php' != $hook )
			return;
		
		$dependencies = array();
		$post         = get_post();
		$post_type    = get_post_type( $post );
		
		if( $this->post_type != $post_type )
			return;

		$args = array(
			array(
				'launcherID' => 'bbm-slides-list-launcher',
				'inputID'    => 'slides-list',
				'ajaxAction' => 'wpfp_get_section_slides',
				'nonce'      => wp_create_nonce( WPFP_GET_SECTION_SLIDES_ACTION )
			),
		);

		WPFP_JS_Handlers()->backbone_modal_posts_list( $args, $dependencies );

		$args = array(
			array(
				'launcherClass' => 'bbm-included-posts-of-term-launcher',
				'inputID'       => 'included-posts',
				'ajaxAction'    => 'wpfp_get_posts_of_term',
				'nonce'         => wp_create_nonce( WPFP_GET_POSTS_OF_TERM_ACTION ),
			),
			array(
				'launcherClass' => 'bbm-excluded-posts-of-term-launcher',
				'inputID'       => 'excluded-posts',
				'ajaxAction'    => 'wpfp_get_posts_of_term',
				'nonce'         => wp_create_nonce( WPFP_GET_POSTS_OF_TERM_ACTION ),
			),
		);

		WPFP_JS_Handlers()->backbone_modal_posts_of_term_list( $args, $dependencies );

		$args = array(
			array(
				'launcherClass' => 'bbm-included-posts-of-type-launcher',
				'inputID'       => 'included-posts',
				'ajaxAction'    => 'wpfp_get_posts_of_type',
				'nonce'         => wp_create_nonce( WPFP_GET_POSTS_OF_TYPE_ACTION )
			),
			array(
				'launcherClass' => 'bbm-excluded-posts-of-type-launcher',
				'inputID'       => 'excluded-posts',
				'ajaxAction'    => 'wpfp_get_posts_of_type',
				'nonce'         => wp_create_nonce( WPFP_GET_POSTS_OF_TYPE_ACTION )
			),
		);

		WPFP_JS_Handlers()->backbone_modal_posts_of_type_list( $args, $dependencies );

		WPFP_JS_Handlers()->jquery_tooltip( $dependencies );

		$args = array(
			array(
				'ajaxAction' => 'wpfp_get_fullpage_slides_sortables',
				'nonce'      => wp_create_nonce( WPFP_GET_SECTION_SLIDES_SORTABLES_ACTION ),
				'sortableID' => 'sortableSlides',
				'inputID'    => 'slides-list',
				'postType'   => WPFP_FULLPAGE_SLIDE_PT,
				'sortable'   => true,
			),
			array(
				'ajaxAction' => 'wpfp_get_posts_of_term_or_type_sortables',
				'nonce'      => wp_create_nonce( WPFP_GET_POSTS_OF_TERM_OR_TYPE_SORTABLES_ACTION ),
				'sortableID' => 'sortableIncludedPosts',
				'emptyText'  => __( 'Add some posts to include.', WPFP_DOMAIN ),
				'inputID'    => 'included-posts',
				'postType'   => '',
				'sortable'   => true,
			),
			array(
				'ajaxAction' => 'wpfp_get_posts_of_term_or_type_sortables',
				'nonce'      => wp_create_nonce( WPFP_GET_POSTS_OF_TERM_OR_TYPE_SORTABLES_ACTION ),
				'sortableID' => 'sortableExcludedPosts',
				'emptyText'  => __( 'Add some posts to exclude.', WPFP_DOMAIN ),
				'inputID'    => 'excluded-posts',
				'postType'   => '',
				'sortable'   => false,
			),
		);

		WPFP_JS_Handlers()->jquery_sortables( $args, $dependencies );

		WPFP_JS_Handlers()->reset_form( '#wpfp_section_options', '#wpfp_reset', $dependencies );

		WPFP_JS_Handlers()->jquery_button( '.radio', $dependencies );

		WPFP_JS_Handlers()->jquery_chosen( $dependencies );

		wp_enqueue_style( 'section-options', $this->assets_url . 'css/section-options.css', $dependencies['css'], WPFP_VERSION );

		$args = array(
			'includedPostsOfTermLauncherClass' => 'bbm-included-posts-of-term-launcher',
			'includedPostsOfTypeLauncherClass' => 'bbm-included-posts-of-type-launcher',
			'includedPostsID'                  => 'included-posts',
			'excludedPostsOfTermLauncherClass' => 'bbm-excluded-posts-of-term-launcher',
			'excludedPostsOfTypeLauncherClass' => 'bbm-excluded-posts-of-type-launcher',
			'excludedPostsID'                  => 'excluded-posts',
		);

		WPFP_JS_Handlers()->jquery_ui_tabs( $dependencies );

		wp_enqueue_script( 'section-options-init', $this->assets_url . 'js/section-options.init.js', $dependencies['js'], WPFP_VERSION );
		wp_localize_script( 'section-options-init' , 'wpfpFPOParams' , $args );

	} // END public function admin_enqueue_scripts

} // END class WP_Fullpage_Section_Type_Metabox

// instantiate the Settings class
$WP_Fullpage_Section_Type_Metabox = new WP_Fullpage_Section_Type_Metabox();

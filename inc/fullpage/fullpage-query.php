<?php

/**
 * Main WP Fullpage Query Class
 */
final class WP_Fullpage_Query {

	/**
	 * @var  WP_Fullpage_Query The single instance of the class
	 */
	protected static $_instance = null;

	/**
	 * The FUllpage.
	 *
	 * @var array
	 */
	public $fullpage;

	/**
	 * List of sections.
	 *
	 * @var array
	 */
	public $sections;

	/**
	 * The current section.
	 *
	 * @var array
	 */
	public $section;

	/**
	 * The current slide.
	 *
	 * @var array
	 */
	public $slide;

	/**
	 * The amount of sections for the current fullpage.
	 * 
	 * @var int
	 */
	public $section_count = 0;

	/**
	 * Index of the current section in the loop.
	 *
	 * @var int
	 */
	public $current_section = -1;

	/**
	 * Whether the section loop has started and the caller is in the loop.
	 *
	 * @var bool
	 */
	public $in_the_section_loop = false;

	/**
	 * Main WP_Fullpage_Query Instance
	 *
	 * Ensures only one instance of WP_Fullpage_Query is loaded or can be loaded.
	 *
	 * @see 	WPFP()
	 * 
	 * @return  WP_Fullpage_Query - Main instance
	 */
	public static function instance() {
		
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;

	} // END public static function instance

	/**
	 * Construct the Class object
	 */
	public function __construct() {
		
		$this->init_fullpage();

	} // END public function __construct

	/**
	 * Init the Fullpage
	 *
	 * @return  void
	 */
	private function init_fullpage() {

		global $post;

		if( empty( $post ) || 'fullpage' != $post->post_type )
			return;

		$this->fullpage = $post;

		// Get Fullpage options
		$fullpage_options = get_post_meta( $post->ID, WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS, true );
		$sections_options = get_post_meta( $post->ID, WPFP_FULLPAGE_PT_SECTIONS_OPTIONS, true );
		$slides_options   = get_post_meta( $post->ID, WPFP_FULLPAGE_PT_SLIDES_OPTIONS, true );
		$custom_options   = get_post_meta( $post->ID, WPFP_FULLPAGE_PT_CUSTOM_OPTIONS, true );

		// Init Fullpage options
		$this->fullpage->fullpage_options = apply_filters( 'wpfp_fullpage_fullpage_option', $fullpage_options, $post->ID );
		$this->fullpage->sections_options = apply_filters( 'wpfp_fullpage_sections_option', $sections_options, $post->ID );
		$this->fullpage->slides_options   = apply_filters( 'wpfp_fullpage_slides_option', $slides_options, $post->ID );
		$this->fullpage->custom_options   = apply_filters( 'wpfp_fullpage_custom_option', $custom_options, $post->ID );

		$this->init_sections();

	} // END private function init_fullpage

	/**
	 * Init the Sections
	 *
	 * @return  void
	 */
	private function init_sections() {

		$args             = array();
		$sections_options = $this->fullpage->sections_options;
		$custom_options   = $this->fullpage->custom_options;

		if( empty( $sections_options ) )
			return;

		// Prepare Args for the query
		switch ( $sections_options['sectionsType'] ) {
			
			case 'sections':
				
				$args = array(
					'post_type' => WPFP_FULLPAGE_SECTION_PT,
					'post__in'  => explode( ',', $sections_options['sections'] ),					
					'orderby'   => 'post__in',
					'order'     => 'ASC',
				);

				break;

			case 'post-taxonomies':

				$args = array(
					'posts_per_page' => $custom_options['countPosts'],
					'post_type'      => 'any',
					'orderby'        => $custom_options['orderBy'],
					'order'          => $custom_options['order'],
					'tax_query'      => array(
						array(
							'taxonomy'         => $sections_options['taxonomy'],
							'field'            => 'id',
							'terms'            => array( $sections_options['term'] ),
							'include_children' => 'yes' == $sections_options['includeChildren'] ? true : false,
							'operator'         => 'IN'
						),
					),
				);

				if( ! empty( $sections_options['includedPosts'] ) )
					$args['post__in'] = explode( ',', $sections_options['includedPosts'] );

				if( ! empty( $sections_options['excludedPosts'] ) )
					$args['post__not_in'] = explode( ',', $sections_options['excludedPosts'] );

				break;

			case 'post-types':

				$args = array(
					'posts_per_page' => $custom_options['countPosts'],
					'post_type'      => $sections_options['postType'],
					'orderby'        => $custom_options['orderBy'],
					'order'          => $custom_options['order'],
				);

				if( ! empty( $sections_options['includedPosts'] ) )
					$args['post__in'] = explode( ',', $sections_options['includedPosts'] );

				if( ! empty( $sections_options['excludedPosts'] ) )
					$args['post__not_in'] = explode( ',', $sections_options['excludedPosts'] );

				break;

		}

		$args = apply_filters( 'wpfp_sections_query_args', $args, $this );

		if( empty( $args ) )
			return;

		$query = new WP_Query( $args );

		$this->sections      = apply_filters( 'wpfp_sections', $query->posts, $this );
		$sections            = &$this->sections;
		$this->section_count = count( $sections );

		if( 'sections' == $sections_options['sectionsType'] ) {

			foreach( $sections as $key => &$section ) {
				
					// The amount of slides for the current section.
					$section->slide_count = 0;

					// Index of the current slide in the loop.
					$section->current_slide = -1;

					// Whether the slide loop has started and the caller is in the loop.
					$section->in_the_slide_loop = false;

					// Get Section options
					$fullpage_options = get_post_meta( $section->ID, WPFP_SECTION_PT_FULLPAGE_OPTIONS, true );
					$section_options  = get_post_meta( $section->ID, WPFP_SECTION_PT_SECTION_OPTIONS, true );
					$slides_options   = get_post_meta( $section->ID, WPFP_SECTION_PT_SLIDES_OPTIONS, true );
					$custom_options   = get_post_meta( $section->ID, WPFP_SECTION_PT_CUSTOM_OPTIONS, true );

					// Init Section options
					$section->fullpage_options = apply_filters( 'wpfp_section_fullpage_options', $fullpage_options, $key, $this );
					$section->section_options  = apply_filters( 'wpfp_section_section_options', $section_options, $key, $this );
					$section->slides_options   = apply_filters( 'wpfp_section_slides_options', $slides_options, $key, $this );
					$section->custom_options   = apply_filters( 'wpfp_section_custom_options', $custom_options, $key, $this );

					$this->init_slides( $key );

			}

		}
		else {

			foreach( $sections as $key => &$section ) {

					// Index of the current slide in the loop.
					$section->current_slide = -1;

					// Whether the slide loop has started and the caller is in the loop.
					$section->in_the_slide_loop = false;

					// Init Section options with Fullpage options
					$section->section_options = apply_filters( 'wpfp_section_section_options', $this->fullpage->sections_options, $key, $this );
					$section->slides_options  = apply_filters( 'wpfp_section_slides_options', $this->fullpage->slides_options, $key, $this );
					$section->custom_options  = apply_filters( 'wpfp_section_custom_options', $this->fullpage->custom_options, $key, $this );
					
					$section->slides_options['slidesType'] = 'post-section';

					$this->init_slides( $key );

			}

		}

		wp_reset_postdata();

	} // END private function init_sections

	/**
	 * Init the Slides
	 *
	 * @param   int     $section_index
	 *
	 * @return  void
	 */
	private function init_slides( $section_index ) {

		$args           = array();
		$section        = &$this->sections[ $section_index ];
		$slides_options = $section->slides_options;
		$custom_options = $section->custom_options;

		if( empty( $slides_options ) || empty( $custom_options ) )
			return;

		switch ( $slides_options['slidesType'] ) {
			
			case 'post-section':
			case 'section':
				
				// No need to redo a query
				$section->slides      = array( clone $section );
				$section->slide_count = 1;

				return;
			
			case 'slides':
				
				$args = array(
					'post_type' => WPFP_FULLPAGE_SLIDE_PT,
					'post__in'  => explode( ',', $slides_options['slides'] ),					
					'orderby'   => 'post__in',
					'order'     => 'ASC',
				);

				break;

			case 'post-taxonomies':

				$args = array(
					'posts_per_page' => $custom_options['countPosts'],
					'post_type'      => 'any',
					'orderby'        => $custom_options['orderBy'],
					'order'          => $custom_options['order'],
					'tax_query'      => array(
						array(
							'taxonomy'         => $slides_options['taxonomy'],
							'field'            => 'id',
							'terms'            => array( $slides_options['term'] ),
							'include_children' => 'yes' == $slides_options['includeChildren'] ? true : false,
							'operator'         => 'IN'
						),
					),
				);

				if( ! empty( $slides_options['includedPosts'] ) )
					$args['post__in'] = explode( ',', $slides_options['includedPosts'] );

				if( ! empty( $slides_options['excludedPosts'] ) )
					$args['post__not_in'] = explode( ',', $slides_options['excludedPosts'] );

				break;

			case 'post-types':

				$args = array(
					'posts_per_page' => $custom_options['countPosts'],
					'post_type'      => $slides_options['postType'],
					'orderby'        => $custom_options['orderBy'],
					'order'          => $custom_options['order'],
				);

				if( ! empty( $slides_options['includedPosts'] ) )
					$args['post__in'] = explode( ',', $slides_options['includedPosts'] );

				if( ! empty( $slides_options['excludedPosts'] ) )
					$args['post__not_in'] = explode( ',', $slides_options['excludedPosts'] );

				break;

		}

		$args = apply_filters( 'wpfp_slides_query_args', $args, $section_index, $this );

		if( empty( $args ) )
			return;

		$query = new WP_Query( $args );

		$section->slides      = apply_filters( 'wpfp_slides', $query->posts, $section_index, $this );
		$section->slide_count = count( $query->posts );

		if( 'slides' === $slides_options['slidesType'] ) {

			foreach( $section->slides as $key => &$slide ) {
				
				// Get Slide options
				$slide_options = get_post_meta( $slide->ID, WPFP_SLIDE_PT_SLIDE_OPTIONS, true );
				
				// Init Slide options
				$slide->slide_options = apply_filters( 'wpfp_slide_slide_options', $slide_options, $key, $this );

			}

		}

		wp_reset_postdata();

	} // END private function init_slides

	/**
	 * Set up the next section and iterate current section index.
	 *
	 * @return  WP_Post  Next section.
	 */
	public function next_section() {

		$this->current_section++;

		$this->section = $this->sections[ $this->current_section ];
		
		return $this->section;

	} // END public function next_section

	/**
	 * Set up the next slide and iterate current slide index.
	 *
	 * @return  WP_Post  Next slide.
	 */
	public function next_slide() {

		$this->section->current_slide++;

		$this->slide = $this->section->slide = $this->section->slides[ $this->section->current_slide ];

		return $this->slide;

	} // END public function next_slide

	/**
	 * Sets up the current section.
	 *
	 * Retrieves the next section, sets up the section, sets the 'in the section loop'
	 * property to true.
	 *
	 * @return  void
	 */
	public function the_section() {

		$this->in_the_section_loop = true;

		// loop has just started
		if ( $this->current_section == -1 )
			do_action_ref_array( 'wpfp_section_loop_start', array( &$this ) );

		$this->section = $this->next_section();

	} // END public function the_section

	/**
	 * Sets up the current slide.
	 *
	 * Retrieves the next slide, sets up the slide, sets the 'in the slide loop'
	 * property to true.
	 *
	 * @return  void
	 */
	public function the_slide() {
		
		$this->section->in_the_slide_loop = true;

		// loop has just started
		if ( $this->section->current_slide == -1 )
			do_action_ref_array( 'wpfp_slide_loop_start', array( &$this ) );

		$this->slide = $this->section->slide = $this->next_slide();

	} // END public function the_slide

	/**
	 * Whether there are more sections available in the loop.
	 *
	 * Calls action 'sections_loop_end', when the loop is complete.
	 *
	 * @return bool True if sections are available, false if end of loop.
	 */
	public function have_sections() {

		if ( $this->current_section + 1 < $this->section_count ) {
			
			return true;

		} elseif ( $this->current_section + 1 == $this->section_count && $this->section_count > 0 ) {

			// loop has ended
			do_action_ref_array( 'wpfp_sections_loop_end', array( &$this ) );
			
			// Do some cleaning up after the loop
			$this->rewind_sections();

		}

		$this->in_the_section_loop = false;

		return false;

	} // END public function have_sections

	/**
	 * Whether there are more slides available in the loop.
	 *
	 * Calls action 'slides_loop_end', when the loop is complete.
	 *
	 * @return bool True if slides are available, false if end of loop.
	 */
	public function have_slides() {

		if ( $this->section->current_slide + 1 < $this->section->slide_count ) {
			
			return true;

		} elseif ( $this->section->current_slide + 1 == $this->section->slide_count && $this->section->slide_count > 0 ) {

			// loop has ended
			do_action_ref_array( 'wpfp_slides_loop_end', array( &$this ) );

			// Do some cleaning up after the loop
			$this->rewind_slides();

		}

		$this->section->in_the_slide_loop = false;

		return false;

	} // END public function have_slides

	/**
	 * Rewind the sections and reset section index.
	 *
	 * @return  void
	 */
	public function rewind_sections() {
		
		$this->current_section = -1;

		if ( $this->section_count > 0 )
			$this->section = $this->sections[0];

	} // END public function rewind_sections

	/**
	 * Rewind the slides and reset slide index.
	 *
	 * @param   int   $section_id	if not defined, will take the current section_id
	 *
	 * @return  void
	 */
	public function rewind_slides( $section_index = null ) {
		
		if( ! isset( $section_index ) )
			$section_index = $this->current_section;

		$this->sections[ $section_index ]->current_slide = -1;

		if ( $this->sections[ $section_index ]->slide_count > 0 )
			$this->slide = $this->sections[ $section_index ]->slide = $this->sections[ $section_index ]->slides[0];

	} // END public function rewind_slides

	/**
	 * Display or retrieve the ID of the current fullpage in the fullpage Loop.
	 *
	 * @param   boolean  $print  Optional, default to false. Whether to display or return.
	 *
	 * @return  int              the ID of the current fullpage
	 */
	public function get_fullpage_ID( $print = false ) {
		
		if( $print )
			print $this->fullpage->ID;

		return $this->fullpage->ID;

	} // END public function get_fullpage_ID

	/**
	 * Display or retrieve the ID of the section in the fullpage Loop.
	 *
	 * @param   int      $section_index  Optional. The section index. If empty, will take the current section.
	 * @param   boolean  $print  		 Optional, default to false. Whether to display or return.
	 *
	 * @return  int              		 the ID of the section
	 */
	public function get_section_ID( $section_index = -1, $print = false ) {
		
		if( -1 === $section_index )
			$section_index = $this->current_section;

		if( $print )
			print $this->sections[ $section_index ]->ID;

		return $this->sections[ $section_index ]->ID;

	} // END public function the_section_ID

	/**
	 * Display or retrieve the ID of the slide in the section Loop.
	 *
	 * @param   int      $section_index  Optional. The section index. If empty, will take the current section.
	 * @param   int      $slide_index    Optional. The section index. If empty, will take the current slide.
	 * @param   boolean  $print  		 Optional, default to false. Whether to display or return.
	 *
	 * @return  int              		 the ID of the slide
	 */
	public function get_slide_ID( $section_index = -1, $slide_index = -1, $print = false ) {
		
		if( -1 === $section_index )
			$section_index = $this->current_section;
		
		if( -1 === $slide_index )
			$slide_index = $this->sections[ $section_index ]->current_slide;

		if( $print )
			print $this->sections[ $section_index ]->slides[ $slide_index ]->ID;

		return $this->sections[ $section_index ]->slides[ $slide_index ]->ID;

	} // END public function the_slide_ID

	/**
	 * Display or retrieve the fullpage title with optional content.
	 *
	 * @param   int      	$fullpage_ID  Optional. The fullpage ID. If empty, will take the current fullpae.
	 * @param   string   	$before  	  Optional. Content to prepend to the title.
	 * @param   string   	$after   	  Optional. Content to append to the title.
	 * @param   boolean  	$print   	  Optional, default to true. Whether to display or return.
	 *
	 * @return  null|string 		 	  Null on no title. String if $print parameter is false.
	 */
	public function get_fullpage_title( $fullpage_ID = 0, $before = '', $after = '', $print = true ) {
			
		if( empty( $fullpage_ID ) )
			$fullpage_ID = $this->fullpage->ID;
		
		$title = $this->get_title( $fullpage_ID, $before, $after );

		if ( $print )
			print $title;
		
		return $title;

	} // END public function get_fullpage_title

	/**
	 * Display or retrieve the section title with optional content.
	 *
	 * @param   int      	$section_ID  Optional. The section ID. If empty, will take the current section.
	 * @param   string   	$before  	 Optional. Content to prepend to the title.
	 * @param   string   	$after   	 Optional. Content to append to the title.
	 * @param   boolean  	$print   	 Optional, default to true. Whether to display or return.
	 *
	 * @return  null|string 		 	 Null on no title. String if $print parameter is false.
	 */
	public function get_section_title( $section_ID = 0, $before = '', $after = '', $print = true ) {
			
		if( empty( $section_ID ) )
			$section_ID = $this->section->ID;
		
		$title = $this->get_title( $section_ID, $before, $after );

		if ( $print )
			print $title;
		
		return $title;

	} // END public function get_section_title

	/**
	 * Display or retrieve the slide title with optional content.
	 *
	 * @param   int      	$slide_ID    Optional. The slide ID. If empty, will take the current slide.
	 * @param   string   	$before  	 Optional. Content to prepend to the title.
	 * @param   string   	$after   	 Optional. Content to append to the title.
	 * @param   boolean  	$print   	 Optional, default to true. Whether to display or return.
	 *
	 * @return  null|string 		 	 Null on no title. String if $print parameter is false.
	 */
	public function get_slide_title( $slide_ID = 0, $before = '', $after = '', $print = true ) {
		
		if( empty( $slide_ID ) )
			$slide_ID = $this->section->slides[ $this->section->current_slide ]->ID;
		
		$title = $this->get_title( $slide_ID, $before, $after );

		if ( $print )
			print $title;
		
		return $title;

	} // END public function get_slide_title

	/**
	 * Retrieve the post title with optional content.
	 *
	 * @param   int      	$post_ID     The post ID.
	 * @param   string   	$before  	 Optional. Content to prepend to the title.
	 * @param   string   	$after   	 Optional. Content to append to the title.
	 *
	 * @return  null|string 		 	 Null on $post_ID empty or no title. String else.
	 */
	public function get_title( $post_ID, $before = '', $after = '' ) {
		
		if( empty( $post_ID ) )
			return;
		
		$title = get_the_title( $post_ID );

		if ( strlen( $title ) == 0 )
			return;

		$title = $before . $title . $after;
		
		return $title;

	} // END public function get_title

	/**
	 * Display or retrieve the date on which the fullpage was written.
	 *
	 * @param   int      	$fullpage_ID  	Optional. The fullpage ID. If empty, will take the current fullpage.
	 * @param   string      $d    			Optional. PHP date format defaults to the date_format option if not specified.
	 * @param   boolean  	$print   	 	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_fullpage_date( $fullpage_ID = 0, $d = '', $print = true ) {
			
		if( empty( $fullpage_ID ) )
			$fullpage_ID = $this->fullpage->ID;
		
		$date = $this->get_the_date( $fullpage_ID, $d );

		if ( $date )
			print $date;
		
		return $date;

	} // END public function get_fullpage_date

	/**
	 * Display or retrieve the date on which the section was written.
	 *
	 * @param   int      	$section_ID  	Optional. The section ID. If empty, will take the current section.
	 * @param   string      $d    			Optional. PHP date format defaults to the date_format option if not specified.
	 * @param   boolean  	$print   	 	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_section_date( $section_ID = 0, $d = '', $print = true ) {
			
		if( empty( $section_ID ) )
			$section_ID = $this->section->ID;
		
		$date = $this->get_the_date( $section_ID, $d );

		if ( $date )
			print $date;
		
		return $date;

	} // END public function get_section_date

	/**
	 * Display or retrieve the date on which the slide was written.
	 *
	 * @param   int      	$slide_ID  	Optional. The slide ID. If empty, will take the current slide.
	 * @param   string      $d    		Optional. PHP date format defaults to the date_format option if not specified.
	 * @param   boolean  	$print   	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_slide_date( $slide_ID = 0, $d = '', $print = true ) {
			
		if( empty( $slide_ID ) )
			$slide_ID = $this->slide->ID;
		
		$date = $this->get_the_date( $slide_ID, $d );

		if ( $date )
			print $date;
		
		return $date;

	} // END public function get_slide_date

	/**
	 * Retrieve the date on which the post was written.
	 *
	 * Modify output with 'get_the_date' filter.
	 *
	 * @param  int 			$post_ID 	Post ID
	 * @param  string      	$d    		Optional. PHP date format defaults to the date_format option if not specified.
	 * 
	 * @return string 				Date the current post was written.
	 */
	public function get_the_date( $post_ID, $d = '' ) {
		
		$post = get_post( $post_ID );

		if ( '' == $d )
			$the_date = mysql2date( get_option( 'date_format' ), $post->post_date );
		else
			$the_date = mysql2date( $d, $post->post_date );

		/**
		 * Filter the date a post was published.
		 *
		 * @param string      $the_date The formatted date.
		 * @param string      $d        PHP date format. Defaults to 'date_format' option if not specified.
		 * @param int|WP_Post $post     The post object or ID.
		 */
		return apply_filters( 'get_the_date', $the_date, $d, $post );

	} // END public function get_the_date

	/**
	 * Display or retrieve the author of the fullpage.
	 *
	 * @param   int      	$fullpage_ID  	Optional. The fullpage ID. If empty, will take the current fullpage.
	 * @param   boolean  	$print   	 	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_fullpage_author( $fullpage_ID = 0, $print = true ) {
			
		if( empty( $fullpage_ID ) )
			$fullpage_ID = $this->fullpage->ID;
		
		$author = $this->get_the_author( $fullpage_ID );

		if ( $author )
			print $author;
		
		return $author;

	} // END public function get_fullpage_author

	/**
	 * Display or retrieve the author of the section.
	 *
	 * @param   int      	$section_ID  	Optional. The section ID. If empty, will take the current section.
	 * @param   boolean  	$print   	 	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_section_author( $section_ID = 0, $print = true ) {
			
		if( empty( $section_ID ) )
			$section_ID = $this->section->ID;
		
		$author = $this->get_the_author( $section_ID );

		if ( $author )
			print $author;
		
		return $author;

	} // END public function get_section_author

	/**
	 * Display or retrieve the author of the slide.
	 *
	 * @param   int      	$slide_ID  	Optional. The slide ID. If empty, will take the current slide.
	 * @param   boolean  	$print   	Optional, default to true. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_slide_author( $slide_ID = 0, $print = true ) {
			
		if( empty( $slide_ID ) )
			$slide_ID = $this->slide->ID;
		
		$author = $this->get_the_author( $slide_ID );

		if ( $author )
			print $author;
		
		return $author;

	} // END public function get_slide_author

	/**
	 * Retrieve the author of the post.
	 *
	 * @param   int      	$post_ID  	The post ID.
	 *
	 * @return  string
	 */
	public function get_the_author( $post_ID ) {
		
		$post       = get_post( $post_ID );
		$user_id    = $post->post_author;
		$authordata = get_userdata( $user_id );

		/**
		 * Filter the display name of the post author.
		 *
		 * @param string $authordata->display_name The author's display name.
		 */
		return apply_filters( 'the_author', $authordata->display_name );

	} // END public function get_the_author

	/**
	 * Display or retrieve the section navigation title.
	 *
	 * @param   int      	$section_index  Optional. The section index. If empty, will take the current section.
	 * @param   boolean  	$print   	 	Optional, default to false. Whether to display or return.
	 *
	 * @return  null|string 		 	 Null on no title. String if $print parameter is false.
	 */
	public function get_section_nav_title( $section_index = -1, $print = false ) {
		
		if( -1 === $section_index )
			$section_index = $this->current_section;

		$section_ID       = $this->get_section_ID( $section_index );
		$section_options  = $this->sections[ $section_index ]->section_options;
		$sections_options = $this->fullpage->sections_options;

		// the navTitle option of the section
		if( ! empty( $section_options['navTitle'] ) )
			$nav_title = get_post_meta( $section_ID, $section_options['navTitle'], true );

		// the default fullpage navTitle
		if( empty( $nav_title ) && ! empty( $sections_options['navTitle'] ) )
			$nav_title = get_post_meta( $section_ID, $sections_options['navTitle'], true );

		// the section title
		if( empty( $nav_title ) )
			$nav_title = $this->get_section_title( $section_ID, '', '', false );

		if ( $print )
			print $nav_title;
		
		return $nav_title;

	} // END public function get_section_nav_title

	/**
	 * Display or retrieve the slide navigation title.
	 *
	 * @param   int      	$section_index  	Optional. The section index. If empty, will take the current section.
	 * @param   int      	$slide_index  		Optional. The slide index. If empty, will take the current slide.
	 * @param   boolean  	$print   	 		Optional, default to false. Whether to display or return.
	 *
	 * @return  null|string 		 	 		Null on no title. String if $print parameter is false.
	 */
	public function get_slide_nav_title( $section_index = -1, $slide_index = -1, $print = false ) {
		
		if( -1 === $section_index )
			$section_index = $this->section->current_section;
		
		if( -1 === $slide_index )
			$slide_index = $this->sections[ $section_index ]->current_slide;

		$slide_ID         = $this->get_slide_ID( $section_index, $slide_index );
		$slide_options    = $this->sections[ $section_index ]->slides[ $slide_index ]->slide_options;
		$section_options  = $this->sections[ $section_index ]->section_options;
		$sections_options = $this->fullpage->sections_options;

		// the navTitle option of the slide
		if( ! empty( $slide_options['navTitle'] ) )
			$nav_title = get_post_meta( $slide_ID, $slide_options['navTitle'], true );

		// the navTitle option of the section
		if( empty( $nav_title ) && ! empty( $section_options['navTitle'] ) )
			$nav_title = get_post_meta( $slide_ID, $section_options['navTitle'], true );

		// the default fullpage navTitle
		if( empty( $nav_title ) && ! empty( $sections_options['navTitle'] ) )
			$nav_title = get_post_meta( $slide_ID, $sections_options['navTitle'], true );

		// the slide title
		if( empty( $nav_title ) )
			$nav_title = $this->get_slide_title( $slide_ID, '', '', false );

		if ( $print )
			print $nav_title;
		
		return $nav_title;

	} // END public function get_slide_nav_title

	/**
	 * Display or retrieve the slide navigation position.
	 *
	 * @param   int      	$section_index  	Optional. The section index. If empty, will take the current section.
	 * @param   int      	$slide_index  		Optional. The slide index. If empty, will take the current slide.
	 * @param   boolean  	$print   	 		Optional, default to true. Whether to display or return.
	 *
	 * @return  string 		 	 				could be something like 'top center', 'middle left', ...
	 */
	public function get_slide_position( $section_index = -1, $slide_index = -1, $print = true ) {
		
		if( -1 === $section_index )
			$section_index = $this->section->current_section;
		
		if( -1 === $slide_index )
			$slide_index = $this->sections[ $section_index ]->current_slide;

		$slide_options   = $this->sections[ $section_index ]->slides[ $slide_index ]->slide_options;
		$section_options = $this->sections[ $section_index ]->slides_options;
		$fulpage_options = $this->fullpage->slides_options;

		// the position options of the slide
		$vertical_position   = $slide_options['verticalPosition'];
		$horizontal_position = $slide_options['horizontalPosition'];

		// the vertical position option of the section
		if( 'inherit' === $vertical_position )
			$vertical_position = $section_options['verticalPosition'];
		
		// the horizontal position option of the section
		if( 'inherit' === $horizontal_position )
			$horizontal_position = $section_options['horizontalPosition'];

		// the vertical position option of the fullpage
		if( 'inherit' === $vertical_position )
			$vertical_position = $fulpage_options['verticalPosition'];
		
		// the horizontal position option of the fullpage
		if( 'inherit' === $horizontal_position )
			$horizontal_position = $fulpage_options['horizontalPosition'];

		$position = sprintf( '%1s %2s', $vertical_position, $horizontal_position );

		if ( $print )
			print $position;
		
		return $position;

	} // END public function get_slide_position

	/**
	 * Display or retrieve the section color.
	 *
	 * @param   int      	$section_index  The section index.
	 * @param   boolean  	$print   	 	Optional, default to false. Whether to display or return.
	 *
	 * @return  null|string 		 	 Null on no title. String if $print parameter is false.
	 */
	public function get_section_color( $section_index, $print = false ) {

		$sections_option = $this->fullpage->sections_options;
		$section_option  = $this->sections[ $section_index ]->section_options;

		if( ! empty( $section_option['sectionColor'] ) )
			$section_color = $section_option['sectionColor'];
		else
			$section_color = $sections_option['sectionColor'];

		if ( $print )
			print $section_color;
		
		return $section_color;

	} // END public function get_section_color

	/**
	 * Display or retrieve the fullpage Unique Identifier (guid).
	 *
	 * The guid will appear to be a link, but should not be used as an link to the
	 * post. The reason you should not use it as a link, is because of moving the
	 * blog across domains.
	 *
	 * Url is escaped to make it xml safe if displayed
	 *
	 * @param   int      $fullpage_ID   Optional. The fullpage ID. If empty, will take the current fullpae.
	 * @param   boolean  $print  		Optional, default to false. Whether to display or return.
	 *
	 * @return  string
	 */
	public function get_fullpage_guid( $fullpage_ID = 0, $print = false ) {
			
		if( empty( $fullpage_ID ) )
			$fullpage_ID = $this->fullpage->ID;
		
		$guid = get_the_guid( $fullpage_ID );

		if( $print )
			print esc_url( $guid );

		return $guid;

	} // END public function get_fullpage_guid

	/**
	 * Display or retrieve the section Unique Identifier (guid).
	 *
	 * The guid will appear to be a link, but should not be used as an link to the
	 * post. The reason you should not use it as a link, is because of moving the
	 * blog across domains.
	 *
	 * Url is escaped to make it xml safe if displayed
	 *
	 * @param   int      $section_ID   Optional. The section ID. If empty, will take the current section.
	 * @param   boolean  $print  	   Optional, default to false. Whether to display or return.
	 * 
	 * @return  string
	 */
	public function get_section_guid( $section_ID = 0, $print = false ) {
				
		if( empty( $section_ID ) )
			$section_ID = $this->section->ID;
		
		$guid = get_the_guid( $section_ID );

		if( $print )
			print esc_url( $guid );

		return $guid;

	} // END public function get_section_guid

	/**
	 * Display or retrieve the slide Unique Identifier (guid).
	 *
	 * The guid will appear to be a link, but should not be used as an link to the
	 * post. The reason you should not use it as a link, is because of moving the
	 * blog across domains.
	 *
	 * Url is escaped to make it xml safe if displayed
	 *
	 * @param   int      $slide_ID   Optional. The slide ID. If empty, will take the current slide
	 * @param   boolean  $print  	 Optional, default to false. Whether to display or return.
	 * 
	 * @return  string
	 */
	public function get_slide_guid( $slide_ID = 0, $print = false ) {
		
		if( empty( $slide_ID ) )
			$slide_ID = $this->section->slides[ $this->section->current_slide ]->ID;
		
		$guid = get_the_guid( $slide_ID );

		if( $print )
			print esc_url( $guid );

		return $guid;

	} // END public function get_slide_guid

	/**
	 * Display or retrieve the fullpage background.
	 *
	 * @param   int      $fullpage_ID   Optional. The fullpage ID. If empty, will take the current fullpae.
	 * @param   boolean  $print   		Optional, default to false. Whether to display or return.
	 * 
	 * @return  string
	 */
	public function get_fullpage_bg( $fullpage_ID = 0, $print = false ) {
			
		if( empty( $fullpage_ID ) )
			$fullpage_ID = $this->fullpage->ID;
		
		$background_image = $this->get_bg( $fullpage_ID );

		if( $print )
			print $background_image;

		return $background_image;

	} // END public function get_section_bg

	/**
	 * Display or retrieve the section background.
	 *
	 * @param   int      $section_ID   Optional. The section ID. If empty, will take the current section.
	 * @param   boolean  $print  	   Optional, default to false. Whether to display or return.
	 * 
	 * @return  string
	 */
	public function get_section_bg( $section_ID = 0, $print = false ) {
				
		if( empty( $section_ID ) )
			$section_ID = $this->section->ID;
		
		$background_image = $this->get_bg( $section_ID );

		if( $print )
			print $background_image;

		return $background_image;

	} // END public function get_section_bg

	/**
	 * Display or retrieve the slide background.
	 *
	 * @param   int      $slide_ID   Optional. The slide ID. If empty, will take the current section.
	 * @param   boolean  $print  	 Optional, default to false. Whether to display or return.
	 * 
	 * @return  string
	 */
	public function get_slide_bg( $slide_ID = 0, $print = false ) {
				
		if( empty( $slide_ID ) )
			$slide_ID = $this->section->slides[ $this->section->current_slide ]->ID;
		
		$background_image = $this->get_bg( $slide_ID );

		if( $print )
			print $background_image;

		return $background_image;

	} // END public function get_slide_bg

	/**
	 * Retrieve the post background.
	 *
	 * @param   int      $post_ID   The post ID.
	 * 
	 * @return  string
	 */
	public function get_bg( $post_ID ) {
		
		$background_image = '';

		if( has_post_thumbnail( $post_ID ) ) {
			
			$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
			$post_thumbnail    = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
			$background_image  = $post_thumbnail[0];

		}

		return $background_image;

	} // END public function get_section_bg

	/**
	 * Display or retrieve the slide content of the slide.
	 *
	 * @param   int      $section_index  	Optional. The section index. If empty, will take the current section.
	 * @param   int      $slide_index    	Optional. The section index. If empty, will take the current slide.
	 * @param   boolean  $print  		 	Optional, default to true. Whether to display or return.
	 * @param   string   $more_link_text 	Optional. Content for when there is more text.
	 * @param   bool 						$strip_teaser Optional. Strip teaser content before the more text. Default is false.
	 *
	 * @return  string
	 */
	public function get_content( $section_index = -1, $slide_index = -1, $print = true, $more_link_text = null, $strip_teaser = false) {
		
		if( -1 === $section_index )
			$section_index = $this->current_section;
		
		if( -1 === $slide_index )
			$slide_index = $this->sections[ $section_index ]->current_slide;

		$slide_ID         = $this->sections[ $section_index ]->slides[ $slide_index ]->ID;
		$sections_options = $this->fullpage->sections_options;

		switch ( $sections_options['sectionsType'] ) {
			
			case 'sections':
				
				$section        = $this->sections[ $section_index ];
				$slides_options = $section->slides_options;
				$custom_options = $section->custom_options;

				switch ( $slides_options['slidesType'] ) {
					
					case 'section':
					case 'slides':
						
						$more = 1;

						break;

					case 'post-taxonomies':
					case 'post-types':

						$more = $custom_options['teaserDisplay'] === 'yes' ? 0 : 1;

						break;

				}

				break;

			case 'post-taxonomies':
			case 'post-types':
				
				$custom_options = $this->fullpage->custom_options;
				$more           = $custom_options['teaserDisplay'] === 'yes' ? 0 : 1;

				break;

		}

		$post    = get_post( $slide_ID );
		$content = $post->post_content;

		if ( null === $more_link_text )
			$more_link_text = __( '(more&hellip;)', WPFP_DOMAIN );

		$output = '';
		$has_teaser = false;

		// If post password required and it doesn't match the cookie.
		if ( post_password_required( $post ) )
			return get_the_password_form( $post );

		if ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {

			$content = explode( $matches[0], $content, 2 );

			if ( ! empty( $matches[1] ) && ! empty( $more_link_text ) )
				$more_link_text = strip_tags( wp_kses_no_null( trim( $matches[1] ) ) );

			$has_teaser = true;

		} else {

			$content = array( $content );

		}

		if ( false !== strpos( $post->post_content, '<!--noteaser-->' ) )
			$strip_teaser = true;

		$teaser = $content[0];

		if ( $more && $strip_teaser && $has_teaser )
			$teaser = '';

		$output .= $teaser;

		if ( count( $content ) > 1 ) {
			
			if ( $more ) {
				
				$output .= '<span id="more-' . $slide_ID . '"></span>' . $content[1];
			
			} else {
				
				if ( ! empty( $more_link_text ) )
					/**
					 * Filter the Read More link text.
					 *
					 * @since 2.8.0
					 *
					 * @param string $more_link_element Read More link element.
					 * @param string $more_link_text    Read More text.
					 */
					$output .= apply_filters( 'the_content_more_link', ' <a href="' . get_permalink( $slide_ID ) . "#more-{$slide_ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text );

				$output = force_balance_tags( $output );

			}
		}

		/**
		 * Filter the post content.
		 *
		 * @since 0.71
		 *
		 * @param string $content Content of the current post.
		 */
		$output = apply_filters( 'the_content', $output );
		$output = str_replace( ']]>', ']]&gt;', $output );

		if( $print )
			print $output;

		return $output;

	} // END public function get_content

} // END class WP_Fullpage_Query

/**
 * Returns the main instance of WP_Fullpage_Query to prevent the need to use globals.
 *
 * @example WPFP_Query()->my_method() 
 *
 * @return 	WP_Fullpage_Query
 */
function WPFP_Query() {

	return WP_Fullpage_Query::instance();

}


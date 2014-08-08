<?php	

/**
 * WP FullPage CONSTANTS
 * 
 * @package WP_Fullpage
 */

/**
 * The WP Fullpage Plugin Version
 */
define( 'WPFP_VERSION', '1.0' );

/**
 * The WP Fullpage Domain
 */
define( 'WPFP_DOMAIN', 'wpfp' );

/**
 * The WP Fullpage Relative Path
 */
define( 'WPFP_REL_PATH', plugin_dir_path( __FILE__ ) );

/**
 * The WP Fullpage URL
 */
define( 'WPFP_URL', plugins_url( trailingslashit( basename( __DIR__ ) ), dirname( __FILE__ ) ) );

/**
 * The WP Fullpage Assets URL
 */
define( 'WPFP_ASSETS_URL', WPFP_URL . 'assets/' );

/**
 * The WP Fullpage Templates Path
 */
define( 'WPFP_TEMPLATE_PATH', 'wp-fullpage/' );
define( 'WPFP_LAYOUT_PATH', 'layout/' );
define( 'WPFP_SCRIPT_PATH', 'js/' );
define( 'WPFP_STYLE_PATH', 'css/' );
define( 'WPFP_LOOP_PATH', 'loop/' );

/**
 * The WP Fullpage Post Types
 */
define( 'WPFP_FULLPAGE_PT', 'fullpage' );
define( 'WPFP_FULLPAGE_SECTION_PT', 'fullpage-section' );
define( 'WPFP_FULLPAGE_SLIDE_PT', 'fullpage-slide' );

/**
 * The Ajax Action URL
 */
define( 'WPFP_AJAX_ACTION_URL', admin_url( 'admin-ajax.php' ) );

/**
 * The WP Fullpage Actions
 */
define( 'WPFP_GET_FULLPAGE_SECTIONS_ACTION', 'wpfp-get-fullpage-sections' );
define( 'WPFP_GET_SECTION_SLIDES_ACTION', 'wpfp-get-section-slides' );
define( 'WPFP_GET_POSTS_OF_TERM_ACTION', 'wpfp-get-posts-of-term' );
define( 'WPFP_GET_POSTS_OF_TYPE_ACTION', 'wpfp-get-posts-of-type' );
define( 'WPFP_GET_FULLPAGE_SECTIONS_SORTABLES_ACTION', 'wpfp-get-fullpage-sections-sortables' );
define( 'WPFP_GET_SECTION_SLIDES_SORTABLES_ACTION', 'wpfp-get-section-slides-sortables' );
define( 'WPFP_GET_POSTS_OF_TERM_OR_TYPE_SORTABLES_ACTION', 'wpfp-get-posts-of-term-or-type-sortables' );

/**
 * The WP Fullpage Settings Options
 */
define( 'WPFP_SETTINGS_FULLPAGE_OPTIONS', 'wpfp_settings_fullpage_options' );
define( 'WPFP_SETTINGS_SECTIONS_OPTIONS', 'wpfp_settings_sections_options' );
define( 'WPFP_SETTINGS_SLIDES_OPTIONS', 'wpfp_settings_slides_options' );
define( 'WPFP_SETTINGS_CUSTOM_OPTIONS', 'wpfp_settings_custom_options' );

/**
 * The WP Fullpage Post Type Options
 */
define( 'WPFP_FULLPAGE_PT_FULLPAGE_OPTIONS', 'wpfp_fullpage_pt_fullpage_options' );
define( 'WPFP_FULLPAGE_PT_SECTIONS_OPTIONS', 'wpfp_fullpage_pt_sections_options' );
define( 'WPFP_FULLPAGE_PT_SLIDES_OPTIONS', 'wpfp_fullpage_pt_slides_options' );
define( 'WPFP_FULLPAGE_PT_CUSTOM_OPTIONS', 'wpfp_fullpage_pt_custom_options' );
define( 'WPFP_SECTION_PT_FULLPAGE_OPTIONS', 'wpfp_section_pt_fullpage_options' );
define( 'WPFP_SECTION_PT_SECTION_OPTIONS', 'wpfp_section_pt_section_options' );
define( 'WPFP_SECTION_PT_SLIDES_OPTIONS', 'wpfp_section_pt_slides_options' );
define( 'WPFP_SECTION_PT_CUSTOM_OPTIONS', 'wpfp_section_pt_custom_options' );
define( 'WPFP_SLIDE_PT_SLIDE_OPTIONS', 'wpfp_slide_pt_slide_options' );
		
/**
 * Define Backbone Constants
 */
define( 'WPFP_BBM_PREFIX', 'bbm' );	
define( 'WPFP_BBM_CLOSE_BUTTON', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'close-button' ) );	
define( 'WPFP_BBM_ADD_BUTTON', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'add-button' ) );	
define( 'WPFP_BBM_LOADS_CONTENT', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'loads-content' ) );	
define( 'WPFP_BBM_SEARCH_INPUT', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'search-input' ) );	
define( 'WPFP_BBM_PAGE_INPUT', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'page-input' ) );	
define( 'WPFP_BBM_DATE_SELECT', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'date-select' ) );	
define( 'WPFP_BBM_CAT_SELECT', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'cat-select' ) );	
define( 'WPFP_BBM_SELECT_ALL', sprintf( '%1s-%2s', WPFP_BBM_PREFIX, 'select-all' ) );	

<?php

/**
 * Fullpage Posts of type List Table class.
 * 
 * @package 	WP_Fullpage\Includes\Admin\List_Tables\Classes
 * @subpackage 	WP_Fullpage\Includes\Absctract\Classes
 */
class WP_Fullpage_Posts_Of_Type_List_Table extends WP_Fullpage_Posts_List_Table {

	/**
	 * Construct the Fullpage Posts of type List Table Class object
	 */
	public function __construct( $args = array() ) {

		extract( $args );

		$this->ajax_params = array(
			'post_type'   => $post_type,
			'paged'       => $paged,
			'post_status' => $post_status,
			's'           => $s,
			'm'           => $m,
			'cat'         => $cat,
			'author'      => '',
			'allposts'    => 0,
			'show_sticky' => 0,
			'orderby'     => $orderby,
			'order'       => $order,
		);

		parent::__construct( array(
			'screen' => $post_type,
		) );

		$this->user_posts_count = 0;

		if ( !current_user_can( $post_type_object->cap->edit_others_posts ) ) {
			
			$exclude_states         = get_post_stati( array( 'show_in_admin_all_list' => false ) );
			$this->user_posts_count = $wpdb->get_var( $wpdb->prepare( "
				SELECT COUNT( 1 ) FROM $wpdb->posts
				WHERE post_type = %s AND post_status NOT IN ( '" . implode( "','", $exclude_states ) . "' )
				AND post_author = %d
			", $post_type, get_current_user_id() ) );

			if ( $this->user_posts_count && empty( $_REQUEST['post_status'] ) && empty( $_REQUEST['all_posts'] ) && empty( $_REQUEST['author'] ) && empty( $_REQUEST['show_sticky'] ) )
				$_GET['author'] = get_current_user_id();

		}

		if ( 'post' == $post_type && $sticky_posts = get_option( 'sticky_posts' ) ) {
			
			$sticky_posts             = implode( ', ', array_map( 'absint', (array) $sticky_posts ) );
			$this->sticky_posts_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT( 1 ) FROM $wpdb->posts WHERE post_type = %s AND post_status NOT IN ('trash', 'auto-draft') AND ID IN ($sticky_posts)", $post_type ) );
		
		}

	} // END public function __construct

	/**
	 * Get Views
	 *
	 * @return  array  the status links
	 */
	public function get_views() {
		
		global $locked_post_status, $avail_post_stati;

		$post_type = $this->screen->post_type;

		if ( !empty($locked_post_status) )
			return array();
		
		$status_links         = array();
		$base_classes         = array( WPFP_BBM_LOADS_CONTENT );
		$num_posts            = wp_count_posts( $post_type, 'readable' );
		$classes              = $base_classes;
		$current_user_id      = get_current_user_id();
		$ajax_params          = $this->ajax_params;
		$ajax_params['s']     = '';
		$ajax_params['m']     = '';
		$ajax_params['cat']   = '';
		$ajax_params['paged'] = '';

		if ( $this->user_posts_count ) {

			if ( isset( $_GET['author'] ) && ( $_GET['author'] == $current_user_id ) )
				$classes[] = 'current';

			$ajax_params['author'] = $current_user_id;

			$status_links['mine']   = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'Mine <span class="count">(%s)</span>', 'Mine <span class="count">(%s)</span>', $this->user_posts_count, 'posts' ), number_format_i18n( $this->user_posts_count ) ) . '</a>';
			$ajax_params['allposts'] = 1;

		}

		$total_posts = array_sum( (array) $num_posts );

		// Subtract post types that are not included in the admin all list.
		foreach ( get_post_stati( array('show_in_admin_all_list' => false) ) as $state )
			$total_posts -= $num_posts->$state;

		if( count( $classes ) === 1 && empty( $_REQUEST['post_status'] ) && empty( $_REQUEST['show_sticky'] ) )
			$classes[] = 'current';

		$ajax_params['post_status'] = '';

		$status_links['all'] = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'All <span class="count">(%s)</span>', 'All <span class="count">(%s)</span>', $total_posts, 'posts' ), number_format_i18n( $total_posts ) ) . '</a>';

		foreach ( get_post_stati(array('show_in_admin_status_list' => true), 'objects') as $status ) {
			
			$classes = $base_classes;

			$status_name = $status->name;

			if ( !in_array( $status_name, $avail_post_stati ) )
				continue;

			if ( empty( $num_posts->$status_name ) )
				continue;

			if ( isset($_REQUEST['post_status']) && $status_name == $_REQUEST['post_status'] )
				$classes[] = 'current';

			$ajax_params['post_status'] = $status_name;

			$status_links[$status_name] = "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( translate_nooped_plural( $status->label_count, $num_posts->$status_name ), number_format_i18n( $num_posts->$status_name ) ) . '</a>';
		
		}

		if ( ! empty( $this->sticky_posts_count ) ) {
			
			if( ! empty( $_REQUEST['show_sticky'] ) )
				$classes[] = 'current';

			$ajax_params['show_sticky'] = 1;

			$sticky_link = array( 'sticky' => "<a data-params='" . json_encode( $ajax_params ) . "' href='#' class='" . implode( ' ', $classes ) . "'>" . sprintf( _nx( 'Sticky <span class="count">(%s)</span>', 'Sticky <span class="count">(%s)</span>', $this->sticky_posts_count, 'posts' ), number_format_i18n( $this->sticky_posts_count ) ) . '</a>' );

			// Sticky comes after Publish, or if not listed, after All.
			$split        = 1 + array_search( ( isset( $status_links['publish'] ) ? 'publish' : 'all' ), array_keys( $status_links ) );
			$status_links = array_merge( array_slice( $status_links, 0, $split ), $sticky_link, array_slice( $status_links, $split ) );
		
		}

		return $status_links;

	} // END public function get_views

} // END class WP_Fullpage_Posts_Of_Type_List_Table extends WP_Fullpage_Posts_List_Table

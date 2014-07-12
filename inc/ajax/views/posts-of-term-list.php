<?php

/**
 * @package 	WP_Fullpage\Includes\Ajax\Views
 */

?>

<div class="bbm-modal__topbar">
	<h2 class="bbm-modal__title">
		<?php
			print esc_html( $title );
			
			if ( ! empty( $_REQUEST['s'] ) )
				printf( ' <span class="subtitle">' . __( 'Search results for &#8220;%s&#8221;', WPFP_DOMAIN ) . '</span>', get_search_query() );
		?>
	</h2>
</div>

<div class="bbm-modal__section">

	<?php $wp_list_table->views(); ?>

	<?php $wp_list_table->search_box( __( 'Search posts for this term', WPFP_DOMAIN ), 'post' ); ?>

	<?php $wp_list_table->display(); ?>

	<br class="clear" />

</div>

<div class="bbm-modal__bottombar">
	<a href="#" class="button button-primary button-large <?php print WPFP_BBM_ADD_BUTTON; ?>"><?php _e( 'Add', WPFP_DOMAIN ); ?></a>
	<a href="#" class="button button-large <?php print WPFP_BBM_CLOSE_BUTTON; ?>"><?php _e( 'Close', WPFP_DOMAIN ); ?></a>
</div>

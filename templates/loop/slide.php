<?php
/**
 * The template for displaying all fullpages
 *
 * This is the template that displays all fullpages by default.
 * Please note that this is the WP Fullpage construct of fullpages and that
 * other 'pages' on your WordPress site will use a different template.
 */

?>

<?php
	
	$slide_count = WPFP_Query()->section->slide_count;
	
	if( 1 < $slide_count ) :

?>

<div class="slide" data-anchor="<?php print WPFP_Query()->slide->post_name; ?>" <?php print WPFP_Query()->get_slide_bg(); ?>>

<?php

	endif;

?>

	<article <?php post_class( '', WPFP_Query()->get_slide_ID() ); ?>>

		<?php

			printf( '<h2>%1s (%2s)</h2>', WPFP_Query()->get_slide_title(), WPFP_Query()->get_section_title() );

		?>

		<?php

			print WPFP_Query()->get_content();

		?>
	</article>

<?php

	if( 1 < $slide_count ) :

?>

</div><!-- .slide -->

<?php

	endif;

?>

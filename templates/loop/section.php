<?php
/**
 * The template for displaying all sections
 *
 * This is the template that displays all sections by default.
 * Please note that this is the WP Fullpage construct of sections and that
 * other 'pages' on your WordPress site will use a different template.
 * 
 * @package 	WP_Fullpage\Templates\Loop
 */
?>

<div class="section" data-bg="<?php print WPFP_Query()->get_section_bg(); ?>">

	<?php

		WPFP()->get_slides( WPFP_Query()->section->post_name );

	?>

	<?php

		$slide_navigation = WPFP_Query()->section->fullpage_options['slidesNavigation'];

		if( 'yes' === $slide_navigation )
			WPFP()->get_slides_navigation( WPFP_Query()->section->post_name );

	?>

</div><!-- .section -->

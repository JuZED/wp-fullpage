<?php
/**
 * The template for displaying all fullpages
 *
 * This is the template that displays all fullpages by default.
 * Please note that this is the WP Fullpage construct of fullpages and that
 * other 'pages' on your WordPress site will use a different template.
 */

WPFP()->get_header(); ?>

<div id="fullpage">

	<?php

		while ( have_posts() ) : the_post();

			// Start the sections Loop.
			WPFP()->get_sections();

		endwhile;

	?>

</div><!-- #fullpage -->


<?php
WPFP()->get_sidebar();
WPFP()->get_footer();

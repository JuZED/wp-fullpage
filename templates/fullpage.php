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
			WPFP()->get_sections( WPFP_Query()->fullpage->post_name );

		endwhile;

	?>

</div><!-- #fullpage -->

<?php

$navigation = WPFP_Query()->fullpage->fullpage_options['navigation'];

if( 'yes' === $navigation )
	WPFP()->get_navigation();

WPFP()->get_sidebar();
WPFP()->get_footer();

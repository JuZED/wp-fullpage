<?php
/**
 * The template for displaying all fullpages
 *
 * This is the template that displays all fullpages by default.
 * Please note that this is the WP Fullpage construct of fullpages and that
 * other 'pages' on your WordPress site will use a different template.
 */

?>

<div class="section" data-bg="<?php print WPFP_Query()->get_section_bg(); ?>">

	<?php

		WPFP()->get_slides();

	?>

</div><!-- .section -->

<?php
/**
 * The Sidebar containing the complete menu
 * 
 * @package 	WP_Fullpage\Templates\Layout
 */
?>

<ul id="wpfp-menu">

	<?php

	foreach( WPFP_Query()->sections as $key1 => $section ) :

	?>

		<li>

			<a href="#<?php print $section->post_name ?>" data-section="<?php print $key1 + 1; ?>" data-slide="0">
				<?php print WPFP_Query()->get_section_nav_title( $key1 ); ?>
			</a>

			<ul>

			<?php 

			if( 1 < count( $section->slides ) ) : 

				foreach( $section->slides as $key2 => $slide ) :

				?>

					<li>
						<a href="#<?php print $section->post_name ?>/<?php print $slide->post_name ?>" data-section="<?php print $key1 + 1; ?>" data-slide="<?php print $key2; ?>">
							<?php print WPFP_Query()->get_slide_nav_title( $key1, $key2 ); ?>
						</a>
					</li>

				<?php 

				endforeach; 

			endif;

			?>

			</ul>

		</li>

		<?php

	endforeach;

	?>

</ul>
<?php

/**
 * The template for displaying the Fullpage Navigation
 * 
 * @package 	WP_Fullpage\Templates\Layout
 */

?>

<?php

	if( WPFP_Query()->section_count > 1 ) :

?>

	<?php

		$position = WPFP_Query()->fullpage->fullpage_options['navigationPosition'];

	?>

	<div id="fp-nav" class="<?php print $position; ?>">
		<ul>
			<?php 

				foreach( WPFP_Query()->sections as $key => $section ) :

				?>

					<li class="<?php print $key === 0 ? 'active' : ''; ?>" data-menuanchor="<?php print $section->post_name ?>" data-tooltip="<?php print esc_html( WPFP_Query()->get_section_nav_title( $key ) ); ?>">
						<a href="#<?php print $section->post_name ?>">
							<span></span>
						</a>
					</li>

				<?php 

				endforeach;

			?>
		</ul>
	</div>

<?php

	endif;

?>
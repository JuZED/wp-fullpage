<?php

/**
 * The template for displaying the Fullpage Slides Navigation
 * 
 * @package 	WP_Fullpage\Templates\Layout
 */

?>

<?php

	if( WPFP_Query()->section->slide_count > 1 ) :

?>

	<?php

		$position = WPFP_Query()->section->fullpage_options['slidesNavPosition'];

	?>

	<div class="fp-slidesNav <?php print $position; ?>">
		<ul>
			<?php 

				foreach( WPFP_Query()->section->slides as $key => $slide ) :

				?>

					<li data-tooltip="<?php print esc_html( WPFP_Query()->get_slide_title( $slide->ID, '', '', false ) ); ?>">
						<a href="#">
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
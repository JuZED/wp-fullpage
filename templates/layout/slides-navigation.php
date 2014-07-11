<?php

/**
 * The template for displaying the Fullpage Slides Navigation
 */
?>

<?php

	if( WPFP_Query()->section->slide_count > 1 ) :

?>

	<?php

		$position = WPFP_Query()->fullpage->fullpage_options['slidesNavPosition'];

	?>

	<div class="fp-slidesNav <?php print $position; ?>">
		<ul>
			<?php 

				foreach( WPFP_Query()->section->slides as $key => $slide ) :

				?>

					<li class="<?php print $key === 0 ? 'active' : ''; ?>" data-tooltip="<?php print esc_html( WPFP_Query()->get_slide_title( $slide->ID, '', '', false ) ); ?>">
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
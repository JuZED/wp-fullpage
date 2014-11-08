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

					if( has_post_thumbnail( $section->ID ) )
						$bg = WPFP_Query()->get_section_bg( $section->ID, false, 'medium' );
					else
						$bg = get_template_directory_uri() . '/img/thumb-medium.png';

					?>

						<li class="<?php print $key === 0 ? 'active' : ''; ?>" data-menuanchor="<?php print $section->post_name ?>">
							<a href="#<?php print $section->post_name ?>" style="background-image: url(<?php print $bg; ?>);" alt="<?php print esc_attr( get_the_title( $section->ID ) ); ?>">
								<span><span><?php print esc_html( WPFP_Query()->get_section_nav_title( $key ) ); ?></span></span>
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
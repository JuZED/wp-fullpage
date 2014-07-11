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

		<header>
			
			<div class="entry-meta icon">
				<span class="section-link">
					<a href="#<?php print WPFP_Query()->section->post_name; ?>" title="<?php print esc_attr( WPFP_Query()->get_section_title( 0, '', '', false ) ); ?>">
						<?php WPFP_Query()->get_section_title(); ?>
					</a>
				</span>
			</div>

			<?php WPFP_Query()->get_slide_title( 0, '<h2 class="entry-title icon">', '</h2>' ); ?>
			
			<div class="entry-meta">
				<span class="entry-date">
					<time class="entry-date" datetime="<?php print esc_attr( WPFP_Query()->get_slide_date( 0, 'c' ) ); ?>">
						<?php WPFP_Query()->get_slide_date(); ?>
					</time>
				</span>&nbsp;
				<span class="entry-author vcard">
					<?php WPFP_Query()->get_slide_author(); ?>
				</span>&nbsp;
				<?php edit_post_link( __( 'Edit', WPFP_DOMAIN ), '<span class="edit-link">', '</span>', WPFP_Query()->get_slide_ID() ); ?>
			</div>

		</header>

		<div class="entry-content">
			<?php WPFP_Query()->get_content(); ?>
		</div>

	</article>

<?php

	if( 1 < $slide_count ) :

?>

</div><!-- .slide -->

<?php

	endif;

?>

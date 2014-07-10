	
<?php
	if( have_posts() ) :
?>

	<ul id="<?php print $sortable_id; ?>" class="wpfp-sortables">

		<?php
			while( have_posts() ) : the_post();
		?>

			<li class="wpfp-sortable-item" data-id="<?php the_ID(); ?>">
				<div>
					<span class="wpfp-sortable-item-title"><?php printf( '(%2s) %1s', get_the_ID(), get_the_title() ); ?></span>
					<a href="#" class="wpfp-remove-sortable-item"></a>
				</div>
			</li>
		
		<?php
			endwhile;
		?>

	</ul>

<?php
	else :
?>

	<div id="<?php print $sortable_id; ?>"><?php print $empty_text; ?></div>

<?php
	endif;
?>

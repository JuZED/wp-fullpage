
( function( $ ) {

	$( function(  ) {

		var accordionToggler;

		accordionToggler = function( e ) {

			$( this ).toggleClass( 'active' )
				.next()
				.find( '.accordion-container' )
				.slideToggle( 'slow' );

		}
		
		$( '#slide-options .accordion-toggler' ).click( accordionToggler );

	} );

} )( jQuery );
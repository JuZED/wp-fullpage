
( function( $ ) {

	$( function() {

		var orderByChange,
			accordionToggler;

		orderByChange = function( e ) {

			e.preventDefault();

			var orderByMetaValueKeyContainerEl = $( '#orderByMetaValueKey-container' );

			if( $( this ).val() == 'meta_value' )
				orderByMetaValueKeyContainerEl.show();
			else
				orderByMetaValueKeyContainerEl.hide();

		}

		accordionToggler = function( e ) {

			$( this ).toggleClass( 'active' )
				.next()
				.find( '.accordion-container' )
				.slideToggle( 'slow' );

		}

		$( '#orderBy' ).change( orderByChange )
			.trigger( 'change' );

		$( '.accordion-toggler' ).click( accordionToggler );

	} );

} )( jQuery );

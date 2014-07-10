
( function( $ ) {

	$( function() {

		var orderByChange;

		orderByChange = function( e ) {

			e.preventDefault();

			var orderByMetaValueKeyContainerEl = $( '#orderByMetaValueKey-container' );

			if( $( this ).val() == 'meta_value' )
				orderByMetaValueKeyContainerEl.show();
			else
				orderByMetaValueKeyContainerEl.hide();

		}

		$( '#orderBy' ).change( orderByChange )
			.trigger( 'change' );

		$( "#settingsbox" ).tabs()
			.addClass( "ui-tabs-vertical" );

	} );

} )( jQuery );

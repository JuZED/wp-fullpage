
( function( $ ) {

	$( function(  ) {
		
		var bbmPTermLInit, key;

		bbmPTermLInit = function ( typeParams ) {

			var launcherEl = '.' + typeParams.launcherClass;

			$( document ).on( 'click', launcherEl, function() {

				var params, ModalPostsOfTermList, launcherDatas;

				launcherDatas = $( this ).data( 'datas' );

				params = {
					ajaxUrl: wpfpBbmPOTermInitParams.ajaxUrl,
					datas: {
						action: typeParams.ajaxAction,
						security: typeParams.nonce,
						taxonomy: launcherDatas.taxonomy,
						term_id: launcherDatas.termID
					} 
				};

				// Create a ModalPostsOfTermList view class
				ModalPostsOfTermList = Backbone.ModalPostsOfTermList.extend( {
					inputID: typeParams.inputID,
					ajaxParams: params
				} );

				new ModalPostsOfTermList();

			} );

		}

		for( key in wpfpBbmPOTermInitParams.terms ) {

			bbmPTermLInit( wpfpBbmPOTermInitParams.terms[ key ] );

		}

	} );

} )( jQuery );
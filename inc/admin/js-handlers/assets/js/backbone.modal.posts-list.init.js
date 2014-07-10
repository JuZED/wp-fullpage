
( function( $ ) {

	$( function(  ) {

		var bbmPLInit, key;

		bbmPLInit = function ( postTypeParams ) {

			var launcherEl = '#' + postTypeParams.launcherID;

			$( document ).on( 'click', launcherEl, function() {

				var params, ModalPostsList, launcherDatas;

				launcherDatas = $( this ).data( 'datas' );

				params = {
					ajaxUrl: wpfpBbmPLInitParams.ajaxUrl,
					datas: {
						action: postTypeParams.ajaxAction,
						security: postTypeParams.nonce,
						post_type: launcherDatas.postType
					} 
				};

				// Create a ModalPostsList view class
				ModalPostsList = Backbone.ModalPostsList.extend( {
					inputID: postTypeParams.inputID,
					ajaxParams: params
				} );

				new ModalPostsList();

			} );

		}

		for( key in wpfpBbmPLInitParams.postTypes ) {

			bbmPLInit( wpfpBbmPLInitParams.postTypes[ key ] );

		}

	} );

} )( jQuery );
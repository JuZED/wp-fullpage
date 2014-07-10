
( function( $ ) {

	$( function(  ) {
		
		var bbmPTypeLInit, key;

		bbmPTypeLInit = function ( typeParams ) {

			var launcherEl = '.' + typeParams.launcherClass;

			$( document ).on( 'click', launcherEl, function() {

				var params, ModalPostsOfTypeList, launcherDatas;

				launcherDatas = $( this ).data( 'datas' );

				params = {
					ajaxUrl: wpfpBbmPOTypeInitParams.ajaxUrl,
					datas: {
						action: typeParams.ajaxAction,
						security: typeParams.nonce,
						post_type: launcherDatas.postType
					} 
				};

				// Create a ModalPostsOfTypeList view class
				ModalPostsOfTypeList = Backbone.ModalPostsOfTypeList.extend( {
					inputID: typeParams.inputID,
					ajaxParams: params
				} );

				new ModalPostsOfTypeList();

			} );

		}

		for( key in wpfpBbmPOTypeInitParams.postTypes ) {

			bbmPTypeLInit( wpfpBbmPOTypeInitParams.postTypes[ key ] );

		}

	} );

} )( jQuery );
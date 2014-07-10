
( function( $ ) {

	$( function() {

		var resetForm;

		resetForm = function( e ) {

			e.preventDefault();

			if ( confirm( wpfpResetFormParams.confirmText ) ) {

				$( 'input, select, textarea', wpfpResetFormParams.selectors ).not( '[type="radio"], [type="checkbox"], [type="submit"], [type="button"], [type="image"], [type="hidden"]' ).each( function() {

					var _this = $( this ),
						dataDefault = _this.data( 'default' );;

					if( dataDefault != undefined )
						_this.val( _this.data( 'default' ) );

					_this.trigger( 'change' );

				} );

				$( 'input[type="radio"], input[type="checkbox"]', wpfpResetFormParams.selectors ).each( function() {

					var _this = $( this ),
						dataDefault = _this.data( 'default' );

					if( dataDefault == _this.val() )
						_this.attr( 'checked', 'checked' );
					else if( dataDefault != undefined )
						_this.removeAttr( 'checked' );

					_this.trigger( 'change' );

				} );

			}

		}

		$( document ).on( 'click', wpfpResetFormParams.launcherSelector, resetForm );

	} );

} )( jQuery );

( function( $ ) {

	$( function() {

		var resetForm;

		resetForm = function( e ) {

			e.preventDefault();

			if ( confirm( wpfpResetFormParams.confirmText ) ) {

				var $form = $( this ).parents( '#settingsbox' ).first();

				$form.find( 'input, select, textarea' ).not( '.no-reset, [type="radio"], [type="checkbox"], [type="submit"], [type="button"], [type="image"], [type="hidden"]' ).each( function() {

					var _this = $( this ),
						dataDefault = _this.data( 'default' );

					if( dataDefault != undefined )
						_this.val( dataDefault );

					_this.trigger( 'change' );

				} );

				$form.find( 'input[type="radio"], input[type="checkbox"]' ).not( '.no-reset' ).each( function() {

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
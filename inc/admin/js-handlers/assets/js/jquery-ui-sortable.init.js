
( function( $ ) {

	$( function(  ) {
		
		var jquerySortablesUIInit = function ( sortablesParams ) {

			var inputEl    = '#' + sortablesParams.inputID,
				sortableEl = '#' + sortablesParams.sortableID,
				inputElChange,
				sortableElClick,
				key;

			inputElChange = function() {

				var datas, successAction;

				datas = {
					action: sortablesParams.ajaxAction,
					security: sortablesParams.nonce,
					posts: $( inputEl ).val(),
					sortableID: sortablesParams.sortableID,
					emptyText: sortablesParams.emptyText,
					post_type: sortablesParams.postType
				};

				successAction = function( response ) {

					var updateAction;

					updateAction = function( event, ui ) {

						var newValues = $( sortableEl, document ).sortable( 'toArray', { 'attribute': 'data-id' } );

						$( inputEl ).val( newValues.join( ',' ) );

					}

					$( sortableEl, document ).replaceWith( response );

					if( sortablesParams.sortable ) {

						$( sortableEl, document )
							.sortable( {
								placeholder: 'sortable-placeholder wpfp-sortable-item',
								update: updateAction
							} )
							.disableSelection()
							.find( 'li div' )
								.prepend( '<span class="wpfp-sortable-icon"></span>' );
					
					}

				}

				$.post( jquerySortablesUIInitParams.ajaxUrl, datas, successAction );

			}

			sortableElClick =  function( e ) {

				e.preventDefault();

				var sortableItem = $( this ).closest( '.wpfp-sortable-item' ),
					valToRemove  = sortableItem.data( 'id' ),
					inputValue   = $( inputEl ).val();

				sortableItem.remove();

				inputValue = inputValue.split( ',' );
				inputValue = inputValue.filter( function ( elem, index, arr ) {
					return elem != valToRemove;
				} );

				$( inputEl ).val( inputValue.join( ',' ) );

			}

			$( document ).on( 'change', inputEl, inputElChange );
			
			$( document ).on( 'click', sortableEl + ' .wpfp-remove-sortable-item', sortableElClick );

			$( inputEl ).trigger( 'change' );

		}

		for( key in jquerySortablesUIInitParams.sortables ) {

			jquerySortablesUIInit( jquerySortablesUIInitParams.sortables[ key ] );

		}

	} );

} )( jQuery );
var fullpageConsoleLog,
	fullpageOnLeave,
	fullpageAfterLoad,
	fullpageAfterRender,
	fullpageAfterResize,
	fullpageAfterSlideLoad,
	fullpageSlideLeave,
	fullpageSetBackground;

( function( $ ) {

	$( function() {

		/**
		 * Console Log
		 *
		 * @param   {string}  message
		 *
		 * @return  {void}
		 */
		fullpageConsoleLog = function( message ) {

			if( console && console.log )
				console.log( message );

		}

		/**
		 * On Section Leave
		 *
		 * @param   {int}     index      section index
		 * @param   {int}     nextIndex  next section index
		 * @param   {string}  direction
		 *
		 * @return  {void}
		 */
		fullpageOnLeave = function( index, nextIndex, direction ) {

			fullpageConsoleLog( 'fullpageOnLeave' );

		}

		/**
		 * After Section Load
		 *
		 * @param   {string}  anchorLink  section anchor
		 * @param   {int}     index       section index
		 *
		 * @return  {void}
		 */
		fullpageAfterLoad = function( anchorLink, index ) {

			var section = $( '.section' ).eq( index -1 );

			fullpageSetBackground( section );

			fullpageConsoleLog( 'fullpageAfterLoad' );

		}

		/**
		 * After Fullpage Render
		 *
		 * @return  {void}
		 */
		fullpageAfterRender = function() {

			fullpageSetBackground( $( '.section' ).first() );

			fullpageConsoleLog( 'fullpageAfterRender' );

		}

		/**
		 * After Screen Resize
		 *
		 * @return  {void}
		 */
		fullpageAfterResize = function() {

			fullpageConsoleLog( 'fullpageAfterResize' );

		}

		/**
		 * After Slide Load
		 *
		 * @param   {string}  anchorLink   section anchor
		 * @param   {int}     index        section index
		 * @param   {string}  slideAnchor  slide anchor
		 * @param   {int}     slideIndex   slide index
		 *
		 * @return  {void}
		 */
		fullpageAfterSlideLoad = function( anchorLink, index, slideAnchor, slideIndex ) {

			var slide = $( '.section' ).eq( index -1 ).find( '.slide' ).eq( slideIndex );

			fullpageSetBackground( slide );

			fullpageConsoleLog( 'fullpageAfterSlideLoad' );

		}

		/**
		 * On Slide Leave
		 *
		 * @param   {string}  anchorLink   section anchor
		 * @param   {int}     index        section index
		 * @param   {int}     slideIndex   slide index
		 * @param   {string}  direction
		 *
		 * @return  {void}
		 */
		fullpageSlideLeave = function ( anchorLink, index, slideIndex, direction ) {

			fullpageConsoleLog( 'fullpageSlideLeave' );

		}

		/**
		 * Background init
		 *
		 * @param   {jQuery}  elem
		 *
		 * @return  {void}
		 */
		fullpageSetBackground = function( elem ) {

			var background = elem.data( 'bg' );

			if( undefined != background && '' != background ) {
				
				elem.pseudoCss( ':before', {
					backgroundImage : 'url(' + background + ')',
					opacity: 1
				} );

				elem.data( 'bg', '' );

				fullpageConsoleLog( 'fullpageSetBackground' );

			}

		}

		// Slides Navigation tooltips
		$( document ).on( {

			mouseenter: function() {

				var tooltip  = $( this ).data( 'tooltip' ),
					position = $( this ).closest( '.fp-slidesNav' ).hasClass( 'top' ) ? 'top' : 'bottom';
				
				$( '<div class="fp-tooltip ' + position + '">' + tooltip + '</div>' ).hide()
					.appendTo( $( this ) )
					.fadeIn( 200 );

			},

			mouseleave: function() {
				
				$( this ).find( '.fp-tooltip' ).fadeOut().remove();

			}

		}, '.fp-slidesNav li' );

	} );

} )( jQuery );
	
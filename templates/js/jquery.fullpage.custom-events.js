var fullpageOnLeave,
	fullpageAfterLoad,
	fullpageAfterRender,
	fullpageAfterResize,
	fullpageAfterSlideLoad,
	fullpageSlideLeave,
	fullpageSetBackground/*,
	fullpageSectionDirection = false,
	fullpageSlideDirection = false*/;

( function( $ ) {

	$( function() {

		fullpageOnLeave = function( index, nextIndex, direction ) {

			// var section = $( '.section' ).eq( index -1 );;

			// section.removeClass( 'moveUp' ).removeClass( 'moveDown' );

			// fullpageSectionDirection = direction;

			console.log( 'fullpageOnLeave' );

		}

		fullpageAfterLoad = function( anchorLink, index ) {

			var section = $( '.section' ).eq( index -1 );

			// if ( fullpageSectionDirection == 'down' )
			// 	section.addClass( 'moveDown' );
			// else if ( fullpageSectionDirection == 'up' )
			// 	section.addClass( 'moveUp' );

			// fullpageSectionDirection = false;

			fullpageSetBackground( section );

			console.log( 'fullpageAfterLoad' );

		}

		fullpageAfterRender = function() {

			fullpageSetBackground( $( '.section' ).first() );

			console.log( 'fullpageAfterRender' );

		}

		fullpageAfterResize = function() {

			console.log( 'fullpageAfterResize' );

		}

		fullpageAfterSlideLoad = function( anchorLink, index, slideAnchor, slideIndex ) {

			var slide = $( '.section' ).eq( index -1 ).find( '.slide' ).eq( slideIndex );

			// if ( fullpageSlideDirection == 'left' )
			// 	slide.addClass( 'moveLeft' );
			// else if ( fullpageSlideDirection == 'right' )
			// 	slide.addClass( 'moveRight' );

			// fullpageSlideDirection = false;

			fullpageSetBackground( slide );

			console.log( 'fullpageAfterSlideLoad' );

		}

		fullpageSlideLeave = function ( anchorLink, index, slideIndex, direction ) {

			// var slide = $( '.section' ).eq( index -1 ).find( '.slide' ).eq( slideIndex );

			// slide.removeClass( 'moveRight' ).removeClass( 'moveLeft' );

			// fullpageSlideDirection = direction;

			console.log( 'fullpageSlideLeave' );

		}

		fullpageSetBackground = function( elem ) {

			var background = elem.data( 'bg' );

			if( undefined != background && '' != background ) {
				
				elem.pseudoCss( ':before', {
					backgroundImage : 'url(' + background + ')',
					opacity: 1
				} );

				elem.data( 'bg', '' );

			}

		}

	} );

} )( jQuery );
	
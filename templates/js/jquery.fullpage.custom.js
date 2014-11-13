var fullpageConsoleLog,
	fullpageOnLeave,
	fullpageAfterLoad,
	fullpageAfterRender,
	fullpageAfterResize,
	fullpageAfterSlideLoad,
	fullpageSlideLeave,
	fullpageSetBackground,
	fullpageParallaxInit,
	fullpageStartParallaxY,
	fullpageStartParallaxX,
	fullpageStopParallaxY,
	fullpageStopParallaxX,
	fullpageTranslateY,
	fullpageTranslateX,
	fullpageParallaxTimerY         = false,
	fullpageParallaxTimerX         = false;

( function( $ ) {

	$( function() {

		var fullpageEl            = $( '#fullpage' ),
			fullpageSectionsEl    = $( '.section' ),
			fullpageSectionsCount = fullpageSectionsEl.length,
			fullpageSlidesCount   = [],
			fullpageBackgroundImage,
			fullpageBackground,
			fullpageSectionBackgroundImage = [],
			fullpageSectionBackground      = [],
			fullpageSectionIndex           = -1,
			imageMaxTop,
			maxTop,
			imageMaxLeft = [],
			maxLeft      = [];

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

			if( 'yes' == fullPageParams.autoScrolling )
				fullpageStartParallaxY();

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

			fullpageStopParallaxY();

			var section = fullpageSectionsEl.eq( index -1 );

			fullpageSetBackground( section );

			fullpageConsoleLog( 'fullpageAfterLoad' );

		}

		/**
		 * After Fullpage Render
		 *
		 * @return  {void}
		 */
		fullpageAfterRender = function() {

			/**
			 * Init Parallax properties
			 */
			fullpageParallaxInit();

			/**
			 * If there is no Auto Scrolling
			 */
			if( 'no' == fullPageParams.autoScrolling )
				$( window ).scroll( fullpageTranslateY );

			/**
			 * Initialising Backgrounds
			 */
			fullpageEl.each( function() {

				fullpageSetBackground( $( this ), 'fullpage' );

				fullpageSectionsEl.each( function( index ) {

					fullpageSetBackground( $( this ), 'section', index );

					$( '.slide', this ).each( function() {

						fullpageSetBackground( $( this ) );
						
					} );

				} );

			} );

			fullpageConsoleLog( 'fullpageAfterRender' );

		}

		/**
		 * After Screen Resize
		 *
		 * @return  {void}
		 */
		fullpageAfterResize = function() {

			if( 'no' == fullPageParams.css3 && 'yes' == fullPageParams.parallax ) {
				
				fullpageParallaxInit();

				fullpageInitParallaxY( fullpageEl );

				fullpageTranslateY();

				fullpageSectionsEl.each( function( index ) {
					
					fullpageSectionIndex = index;

					fullpageInitParallaxX( $( this ), fullpageSectionIndex );

					fullpageTranslateX();

				} );

				fullpageSectionIndex = -1;

			}

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

			fullpageStopParallaxX();

			var slide = fullpageSectionsEl.eq( index -1 ).find( '.slide' ).eq( slideIndex );

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

			fullpageSectionIndex = index;

			fullpageStartParallaxX();

			fullpageConsoleLog( 'fullpageSlideLeave' );

		}

		/**
		 * Parallax X Init
		 *
		 * @param   {jQuery}  element
		 * @param   {int}     index            
		 * @param   {img}     backgroundImage  
		 * @param   {string}  background
		 *
		 * @return  {void}
		 */
		fullpageInitParallaxX = function ( element, index, backgroundImage, background ) {

			if( undefined == backgroundImage ) {
				backgroundImage = fullpageSectionBackgroundImage[ index ];
				background      = fullpageSectionBackground[ index ];
			} else {
				fullpageSectionBackgroundImage[ index ] = backgroundImage;
				fullpageSectionBackground[ index ]      = background;
			}

			if( undefined != fullpageSectionBackgroundImage[ index ] && 1 < fullpageSlidesCount[ index ] ) {
				
				var imageWidth   = parseInt( backgroundImage.width ),
					imageHeight  = parseInt( backgroundImage.height ),
					imageNewWidth,
					width;

				if( 'yes' == fullPageParams.autoScrolling )
					width = ( fullpageSlidesCount[ index ] * 100 ) + '%';
				else
					width = '100%';
				
				imageNewWidth         = windowHeight * imageWidth / imageHeight;
				imageMaxLeft[ index ] = windowWidth - imageNewWidth;

				if( '' != element.data( 'bg' ) )
					element.pseudoCss( ':before', {
						backgroundImage: 'url(' + background + ')',
						width: width,
						opacity: 1,
						backgroundSize: 'auto 100%',
						backgroundPosition: '0% 50%'
					} );

			} else if( undefined != fullpageSectionBackgroundImage[ index ] ) {

				element.pseudoCss( ':before', {
					backgroundImage : 'url(' + background + ')',
					opacity: 1
				} );

			}

		}

		/**
		 * Parallax Y Init
		 *
		 * @param   {jQuery}  element
		 * @param   {int}     index            
		 * @param   {img}     backgroundImage  
		 * @param   {string}  background
		 *
		 * @return  {void}
		 */
		fullpageInitParallaxY = function ( element, backgroundImage, background ) {

			if( undefined == backgroundImage ) {
				backgroundImage = fullpageBackgroundImage;
				background      = fullpageBackground;
			} else {
				fullpageBackgroundImage = backgroundImage ;
				fullpageBackground      = background;
			}

			if( undefined != fullpageBackgroundImage && 1 < fullpageSectionsCount ) {
				
				var imageWidth   = parseInt( backgroundImage.width ),
					imageHeight  = parseInt( backgroundImage.height ),
					imageNewHeight,
					height;

				if( 'yes' == fullPageParams.autoScrolling )
					height = ( fullpageSectionsCount * 100 ) + '%';
				else
					height = '100%';
				
				imageNewHeight = windowWidth * imageHeight / imageWidth;
				imageMaxTop    = fullpageSectionsCount * windowHeight - imageNewHeight;

				if( '' != element.data( 'bg' ) )
					element.pseudoCss( ':before', {
						backgroundImage: 'url(' + background + ')',
						height: height,
						opacity: 1,
						backgroundSize: '100% auto',
						backgroundPosition: '50% 0%'
					} );

			} else if( undefined != fullpageBackgroundImage ) {

				element.pseudoCss( ':before', {
					backgroundImage : 'url(' + background + ')',
					opacity: 1
				} );

			}

		}

		/**
		 * Init Background
		 *
		 * @param   {jQuery}  elem  
		 * @param   {string}  type  
		 * @param   {int}     index
		 *
		 * @return  {void}
		 */
		fullpageSetBackground = function( elem, type, index ) {

			var background = elem.data( 'bg' );

			if( undefined != background && '' != background ) {
				
				var backgroundImage = new Image();

				backgroundImage.onload = function() {

					if( 'no' == fullPageParams.css3 && 'yes' == fullPageParams.parallax && 'fullpage' == type ) {

						fullpageInitParallaxY( elem, backgroundImage, background );

					}
					else if( 'no' == fullPageParams.css3 && 'yes' == fullPageParams.parallax && 'section' == type ) {

						fullpageInitParallaxX( elem, index, backgroundImage, background );

					}
					else {

						elem.pseudoCss( ':before', {
							backgroundImage : 'url(' + background + ')',
							opacity: 1
						} );

					}

					elem.data( 'bg', '' );

					fullpageConsoleLog( 'fullpageSetBackground' );

				}

				backgroundImage.src = background;

			}

		}

		/**
		 * Init Parallax properties
		 *
		 * @return  {void}
		 */
		fullpageParallaxInit = function() {

			windowWidth  = parseInt( $( window ).width() );
			windowHeight = parseInt( $( window ).height() );
			maxTop       = ( fullpageSectionsCount - 1 ) * windowHeight;

			fullpageSectionsEl.each( function( index ) {

				var slides = $( '.slide', this );

				fullpageSlidesCount[ index ] = slides.length;
				
				maxLeft[ index ] = ( fullpageSlidesCount[ index ] - 1 ) * windowWidth;

			} );
			
		}

		/**
		 * Start Parallax Y
		 *
		 * @return  {void}
		 */
		fullpageStartParallaxY = function() {

			if( 'no' == fullPageParams.parallax || 'yes' == fullPageParams.css3 )
				return false;

			fullpageParallaxTimerY = setInterval( fullpageTranslateY, 13 );
			
		}

		/**
		 * Stop Parallax Y
		 *
		 * @return  {void}
		 */
		fullpageStopParallaxY = function() {

			if( 'no' == fullPageParams.parallax || 'yes' == fullPageParams.css3 )
				return false;
				
			clearInterval( fullpageParallaxTimerY );

			fullpageTranslateY();

		}

		/**
		 * Translate Y
		 *
		 * @return  {void}
		 */
		fullpageTranslateY = function() {

			var y;

			if( 'yes' == fullPageParams.autoScrolling )
				y = parseInt( fullpageEl.css( 'top' ) );
			else
				y = - parseInt( $( window ).scrollTop() );

			fullpageEl.pseudoCss( ':before', {
				backgroundPosition: '50% ' + ( -y * imageMaxTop / maxTop ) + 'px'
			} );

		}

		/**
		 * Start Parallax X
		 *
		 * @return  {void}
		 */
		fullpageStartParallaxX = function() {

			if( 'no' == fullPageParams.parallax || 'yes' == fullPageParams.css3 )
				return false;

			fullpageParallaxTimerX = setInterval( fullpageTranslateX, 13 );
			
		}

		/**
		 * Stop Parallax X
		 *
		 * @return  {void}
		 */
		fullpageStopParallaxX = function() {

			if( 'no' == fullPageParams.parallax || 'yes' == fullPageParams.css3 )
				return false;

			clearInterval( fullpageParallaxTimerX );

			fullpageTranslateX();

			fullpageSectionIndex = -1;

		}

		/**
		 * Translate X
		 *
		 * @return  {void}
		 */
		fullpageTranslateX = function() {

			var x,
				section = fullpageSectionsEl.eq( fullpageSectionIndex - 1 );

			x = parseInt( section.find( '.fp-slides' ).scrollLeft() );

			if( ! isNaN( x ) )
				section.pseudoCss( ':before', {
					backgroundPosition: ( x * imageMaxLeft[ fullpageSectionIndex - 1 ] / maxLeft[ fullpageSectionIndex - 1 ] ) + 'px 50%'
				} );

		}

		/**
		 * Slides Navigation tooltips
		 */
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
		
		/**
		 * Complete navigation Menu 
		 */
		$( '#wpfp-menu a' ).click( function(){

			var section = $( this ).data( 'section' );
			var slide   = $( this ).data( 'slide' );

			$( '#wpfp-menu li' ).removeClass( 'active' );

			$( this ).parents( 'li' ).addClass( 'active' );

			$.fn.fullpage.moveTo( section, slide );

		} );

		$( 'a[href="' + location.hash + '"]' ).parents( 'li' ).addClass( 'active' );

	} );

} )( jQuery );

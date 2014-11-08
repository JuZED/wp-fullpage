
( function( $ ) {

	$( function() {

		$( '#fullpage' ).fullpage( {
			
			// Navigation
			menu: '#fp-nav',
			anchors: fullPageParams.anchors,
			navigation: false,
			slidesNavigation: false,

			// Scrolling
			css3: fullPageParams.css3 == 'yes' ? true : false,
			scrollingSpeed: parseInt( fullPageParams.scrollingSpeed ),
			autoScrolling: fullPageParams.autoScrolling == 'yes' ? true : false,
			easing: fullPageParams.easing,
			easingcss3: fullPageParams.easingCss3,
			loopBottom: fullPageParams.loopBottom == 'yes' ? true : false,
			loopTop: fullPageParams.loopTop == 'yes' ? true : false,
			loopHorizontal: fullPageParams.loopHorizontal == 'yes' ? true : false,
			continuousVertical: fullPageParams.continuousVertical == 'yes' ? true : false,
			normalScrollElements: fullPageParams.normalScrollElements,
			scrollOverflow: fullPageParams.scrollOverflow == 'yes' ? true : false,
			touchSensitivity: parseInt( fullPageParams.touchSensitivity ),
			normalScrollElementTouchThreshold: fullPageParams.normalScrollElementTouchThreshold,

			// Accessibility
			keyboardScrolling: fullPageParams.keyboardScrolling == 'yes' ? true : false,
			animateAnchor: fullPageParams.animateAnchor == 'yes' ? true : false,

			// Design
			verticalCentered: false,
			resize : fullPageParams.resize == 'yes' ? true : false,
			paddingTop: fullPageParams.paddingTop,
			paddingBottom: fullPageParams.paddingBottom,
			fixedElements: fullPageParams.fixedElements,
			responsive: fullPageParams.responsive, // TODO			

			// Custom selectors
			sectionSelector: '.section',
			slideSelector: '.slide',

			// Events
			onLeave: function( index, nextIndex, direction ) {

				eval( fullPageParams.onLeave );

			},

			afterLoad: function( anchorLink, index ) {

				eval( fullPageParams.afterLoad );
				
			},

			afterRender: function() {

				eval( fullPageParams.afterRender );
				
			},

			afterResize: function() {

				eval( fullPageParams.afterResize );
				
			},

			afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex ) {

				eval( fullPageParams.afterSlideLoad );

			},

			onSlideLeave: function( anchorLink, index, slideIndex, direction ) {

				eval( fullPageParams.onSlideLeave );

			}

		} );

	} );

} )( jQuery );

( function( $ ) {

	$( function() {

		$( '#fullpage' ).fullpage( {

			verticalCentered: false,
			resize : fullPageParams.resize == 'yes' ? true : false,
			sectionsColor : fullPageParams.sectionsColor,
			anchors: fullPageParams.anchors,
			scrollingSpeed: parseInt( fullPageParams.scrollingSpeed ),
			easing: fullPageParams.easing,
			menu: '#fp-nav',
			navigation: false,
			slidesNavigation: false,
			loopBottom: fullPageParams.loopBottom == 'yes' ? true : false,
			loopTop: fullPageParams.loopTop == 'yes' ? true : false,
			loopHorizontal: fullPageParams.loopHorizontal == 'yes' ? true : false,
			autoScrolling: fullPageParams.autoScrolling == 'yes' ? true : false,
			scrollOverflow: fullPageParams.scrollOverflow == 'yes' ? true : false,
			css3: fullPageParams.css3 == 'yes' ? true : false,
			paddingTop: fullPageParams.paddingTop,
			paddingBottom: fullPageParams.paddingBottom,
			fixedElements: fullPageParams.fixedElements,
			normalScrollElements: fullPageParams.normalScrollElements,
			normalScrollElementTouchThreshold: fullPageParams.normalScrollElementTouchThreshold,
			keyboardScrolling: fullPageParams.keyboardScrolling == 'yes' ? true : false,
			touchSensitivity: parseInt( fullPageParams.touchSensitivity ),
			continuousVertical: fullPageParams.continuousVertical == 'yes' ? true : false,
			animateAnchor: fullPageParams.animateAnchor == 'yes' ? true : false,

			//events
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
	
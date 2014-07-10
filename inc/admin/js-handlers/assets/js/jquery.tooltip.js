
( function( $ ) {

	$( function() {

		var tipHover, 
			tipOut, 
			gotoHover, 
			gotoOut, 
			tooltipRemove, 
			tooltipMove,
			toolTipSelector = '.wpfp-tooltip',
			toolTipHTML = '<p class="wpfp-tooltip"></p>';

		tooltipRemove = function() {
				
			this.remove();
		
		}
		
		tipOut = function() {

			$( toolTipSelector ).fadeOut( 'fast', tooltipRemove );

		}

		gotoOut = function() {

			$( this ).attr( 'title', $( this ).data( 'tipText' ) );
			
			tipOut();

		}

		tooltipMove = function( e ) {

			var mousex = e.pageX + 20, //Get X coordinates
				mousey = e.pageY + 10; //Get Y coordinates
			
			$( toolTipSelector )
				.css( { top: mousey, left: mousex } )

		}

		tipHover = function(){
			
			// Hover over code	    
			$( toolTipHTML )
				.text( $( this ).data( 'tip' ) )
				.appendTo( 'body' )
				.fadeIn( 'slow' );

		}

		gotoHover = function( ){
			
			// Hover over code
			var title = $( this ).attr( 'title' );
			
			$( this ).data( 'tipText', title ).removeAttr( 'title' );
			
			$( toolTipHTML )
				.text( title )
				.appendTo( 'body' )
				.fadeIn( 'slow' );

		}

		$( '.wpfp-tip' ).hover( tipHover, tipOut )
			.mousemove( tooltipMove );

		$( '.wpfp-goto' ).hover( gotoHover, gotoOut )
			.mousemove( tooltipMove );

	} );

} )( jQuery );
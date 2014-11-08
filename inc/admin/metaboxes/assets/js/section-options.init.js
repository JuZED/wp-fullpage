
( function( $ ) {

	$( function(  ) {

		var chosen_term_suffix = '_term_chosen',
			includedPostsOfTermLauncherEl = $( '.' + wpfpFPOParams.includedPostsOfTermLauncherClass ),
			excludedPostsOfTermLauncherEl = $( '.' + wpfpFPOParams.excludedPostsOfTermLauncherClass ),
			includedPostsOfTypeLauncherEl = $( '.' + wpfpFPOParams.includedPostsOfTypeLauncherClass ),
			excludedPostsOfTypeLauncherEl = $( '.' + wpfpFPOParams.excludedPostsOfTypeLauncherClass ),
			taxonomyEl            = $( '#taxonomy' ),
			postTypeEl            = $( '#postType' ),
			globalIncludedPostsEl = $( '#' + wpfpFPOParams.includedPostsID ), 
			globalExcludedPostsEl = $( '#' + wpfpFPOParams.excludedPostsID ),
			toggleTaxonomyLaunchers,
			togglePostTypeLaunchers,
			taxonomyElChange,
			termChange,
			postTypeElChange,
			slidesTypeChange,
			orderByChange,
			accordionToggler,
			teaserDisplayChange;

		toggleTaxonomyLaunchers = function () {

			var selectedTaxonomy, selectedTermID, includedPostsEl, excludedPostsEl;
			
			selectedTaxonomy = $( '.taxonomy.chzn-select' ).val();
			selectedTermID   = $( '#' + selectedTaxonomy + '-term' ).val();
			includedPostsEl  = $( '#' + wpfpFPOParams.includedPostsID + '-' + selectedTaxonomy + '-' + selectedTermID );
			excludedPostsEl  = $( '#' + wpfpFPOParams.excludedPostsID + '-' + selectedTaxonomy + '-' + selectedTermID );

			includedPostsOfTermLauncherEl.hide();
			excludedPostsOfTermLauncherEl.hide();
			$( '#' + wpfpFPOParams.includedPostsOfTermLauncherClass + '-' + selectedTaxonomy + '-' + selectedTermID ).show();
			$( '#' + wpfpFPOParams.excludedPostsOfTermLauncherClass + '-' + selectedTaxonomy + '-' + selectedTermID ).show();

			globalIncludedPostsEl.val( includedPostsEl.val() ).trigger( 'change' );
			globalExcludedPostsEl.val( excludedPostsEl.val() ).trigger( 'change' );

		}

		togglePostTypeLaunchers = function () {

			var selectedPostType, includedPostsEl, excludedPostsEl;
			
			selectedPostType = $( '.postType.chzn-select' ).val();
			includedPostsEl  = $( '#' + wpfpFPOParams.includedPostsID + '-' + selectedPostType );
			excludedPostsEl  = $( '#' + wpfpFPOParams.excludedPostsID + '-' + selectedPostType );

			includedPostsOfTypeLauncherEl.hide();
			excludedPostsOfTypeLauncherEl.hide();
			$( '#' + wpfpFPOParams.includedPostsOfTypeLauncherClass + '-' + selectedPostType ).show();
			$( '#' + wpfpFPOParams.excludedPostsOfTypeLauncherClass + '-' + selectedPostType ).show();

			globalIncludedPostsEl.val( includedPostsEl.val() ).trigger( 'change' );
			globalExcludedPostsEl.val( excludedPostsEl.val() ).trigger( 'change' );

		}

		taxonomyElChange = function( e ) {

			e.preventDefault();

			$( '[id$="' + chosen_term_suffix + '"]' ).hide();
			
			$( '#' + $( this ).val().replace( '-', '_' ) + chosen_term_suffix ).show();

			toggleTaxonomyLaunchers();

		}

		termChange = function( e ) {

			$( '#term' ).val( $( this ).val() );

			toggleTaxonomyLaunchers();

		}

		postTypeElChange = function( e ) {

			togglePostTypeLaunchers();

		}

		slidesTypeChange = function( e ) {

			e.preventDefault();

			var slideWrapperEl          = $( '.wpfp-slide-wrapper' ),
				postTaxonomiesWrapperEl = $( '.post-taxonomies-wrapper' ),
				postTypesWrapperEl      = $( '.post-types-wrapper' );

			switch( $( this ).val() ) {

				case 'section':
					slideWrapperEl.slideUp( 'fast' )
					break;

				case 'slides':
					slideWrapperEl.not( '#slides-wrapper' ).slideUp( 'fast' )
					$( '#slides-wrapper' ).slideDown();
					break;

				case 'post-taxonomies':
					slideWrapperEl.not( '#post-taxonomies-or-types-wrapper' ).slideUp( 'fast' )
					$( '#post-taxonomies-or-types-wrapper' ).slideDown();
					postTaxonomiesWrapperEl.show();
					postTypesWrapperEl.hide();
					taxonomyEl.trigger( 'change' );
					break;

				case 'post-types':
					slideWrapperEl.not( '#post-taxonomies-or-types-wrapper' ).slideUp( 'fast' )
					$( '#post-taxonomies-or-types-wrapper' ).slideDown();
					postTypesWrapperEl.show();
					postTaxonomiesWrapperEl.hide();
					postTypeEl.trigger( 'change' );
					break;

				// case 'custom':
				// 	slideWrapperEl.not( '#custom-wrapper' ).slideUp( 'fast' )
				// 	$( '#custom-wrapper' ).slideDown();
				// 	break;
			}

		}

		orderByChange = function( e ) {

			e.preventDefault();

			var orderByMetaValueKeyContainerEl = $( '#orderByMetaValueKey-container' );

			if( $( this ).val() == 'meta_value' )
				orderByMetaValueKeyContainerEl.show();
			else
				orderByMetaValueKeyContainerEl.hide();

		}

		teaserDisplayChange = function( e ) {

			e.preventDefault();

			var teaserLengthContainerEl = $( '#teaserLength-container' );

			if( $( this ).is( ':checked' ) )
				teaserLengthContainerEl.show();
			else
				teaserLengthContainerEl.hide();

		}

		accordionToggler = function( e ) {

			$( this ).toggleClass( 'active' )
				.next()
				.find( '.accordion-container' )
				.slideToggle( 'slow' );

		}

		$( '.chzn-select' ).chosen();
		
		$( '[id$="' + chosen_term_suffix + '"]' ).hide();

		taxonomyEl.change( taxonomyElChange );

		$( '.term.chzn-select' ).change( termChange );

		postTypeEl.change( postTypeElChange );

		$( '.wpfp-slide-wrapper' ).hide();

		$( '#slidesType' ).change( slidesTypeChange )
			.trigger( 'change' );

		$( '#orderBy' ).change( orderByChange )
			.trigger( 'change' );

		$( '#teaserDisplay' ).change( teaserDisplayChange )
			.trigger( 'change' );
		
		$( "#settingsbox" ).tabs()
			.addClass( "ui-tabs-vertical" );
		
		$( '#slides-options .accordion-toggler' ).click( accordionToggler );

	} );

} )( jQuery );
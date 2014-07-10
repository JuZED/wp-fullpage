( function() {
	
	var __bind = function( fn, me ){ return function(){ return fn.apply( me, arguments ); }; },
		__hasProp  = {}.hasOwnProperty,
		__extends  = function( child, parent ) { for ( var key in parent ) { if ( __hasProp.call( parent, key ) ) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
		__indexOf  = [].indexOf || function( item ) { for ( var i = 0, l = this.length; i < l; i++ ) { if ( i in this && this[i] === item ) return i; } return -1; };

	Backbone.ModalPostsList = ( function( _super ) {
		
		__extends( ModalPostsList, _super );

		function ModalPostsList() {
		
			this.cancelEl        = '.' + wpfpBbmPLParams.cancelClass;
			this.submitEl        = '.' + wpfpBbmPLParams.submitClass;
			this.loadsContentEl  = '.' + wpfpBbmPLParams.loadsContentClass;
			this.searchContentEl = '.' + wpfpBbmPLParams.searchContentClass;
			this.pageContentEl   = '.' + wpfpBbmPLParams.pageContentClass;
			this.dateContentEl   = '.' + wpfpBbmPLParams.dateContentClass;
			this.catContentEl    = '.' + wpfpBbmPLParams.catContentClass;
			this.selectAllEl     = '.' + wpfpBbmPLParams.selectAllClass;
			this.inputEl         = '#' + this.inputID;

			this.template = _.template( '' );

			this.triggerLoadsContent   = __bind( this.triggerLoadsContent, this );
			this.triggerSearchChange   = __bind( this.triggerSearchChange, this );
			this.triggerSearchKeyEnter = __bind( this.triggerSearchKeyEnter, this );
			this.triggerPageKeyEnter   = __bind( this.triggerPageKeyEnter, this );
			this.triggerDateChange     = __bind( this.triggerDateChange, this );
			this.triggerCatChange      = __bind( this.triggerCatChange, this );
			this.triggerSelectAll      = __bind( this.triggerSelectAll, this );

			this.args = Array.prototype.slice.apply( arguments );

			Backbone.Modal.prototype.constructor.apply( this, this.args );

			this.ajaxGetContent( this.ajaxParams );

		};

		ModalPostsList.prototype.ajaxGetContent = function( ajaxParams ) {
			
			var _this = this;

			Backbone.$.post( ajaxParams.ajaxUrl, ajaxParams.datas, function( response ) {

				_this.displayContent( response );

			} );

		};

		ModalPostsList.prototype.displayContent = function( content ) {
			
			this.template = _.template( content );

			if( Backbone.$( '#' + this.prefix ).length > 0 )
				Backbone.$( '#' + this.prefix ).replaceWith( this.render().el );
			else
				Backbone.$( 'body' ).append( this.render().el );

		};

		ModalPostsList.prototype.delegateModalEvents = function() {
			
			var key, match, selector, trigger, _results;
			
			this.active = true;
			
			if ( this.submitEl )
				this.$el.on( 'click', this.submitEl, this.triggerSubmit );

			if ( this.cancelEl )
				this.$el.on( 'click', this.cancelEl, this.triggerCancel );

			if ( this.loadsContentEl )
				this.$el.on( 'click', this.loadsContentEl, this.triggerLoadsContent );

			if ( this.searchContentEl ) {
				this.$el.on( 'change', this.searchContentEl, this.triggerSearchChange );
				this.$el.on( 'keyup', this.searchContentEl, this.triggerSearchKeyEnter );
			}

			if ( this.pageContentEl )
				this.$el.on( 'keyup', this.pageContentEl, this.triggerPageKeyEnter );

			if ( this.dateContentEl )
				this.$el.on( 'change', this.dateContentEl, this.triggerDateChange );

			if ( this.catContentEl )
				this.$el.on( 'change', this.catContentEl, this.triggerCatChange );

			if ( this.selectAllEl )
				this.$el.on( 'click', this.selectAllEl, this.triggerSelectAll );

			_results = [];

			for ( key in this.views ) {
				
				if ( key !== 'length' ) {
					
					match    = key.match( /^( \S+ )\s*( .* )$/ );
					trigger  = match[1];
					selector = match[2];

					_results.push( this.$el.on( trigger, selector, this.views[key], this.triggerView ) );

				} else {

					_results.push( void 0 );

				}
			}

			return _results;

		};

		ModalPostsList.prototype.undelegateModalEvents = function() {
			
			var key, match, selector, trigger, _results;
			
			this.active = false;
			
			if ( this.submitEl )
				this.$el.off( 'click', this.submitEl, this.triggerSubmit );

			if ( this.cancelEl )
				this.$el.off( 'click', this.cancelEl, this.triggerCancel );

			if ( this.loadsContentEl )
				this.$el.off( 'click', this.loadsContentEl, this.triggerLoadsContent );

			if ( this.searchContentEl ) {
				this.$el.off( 'change', this.searchContentEl, this.triggerSearchChange );
				this.$el.off( 'keyup', this.searchContentEl, this.triggerSearchKeyEnter );
			}

			if ( this.pageContentEl )
				this.$el.off( 'keyup', this.pageContentEl, this.triggerPageKeyEnter );

			if ( this.dateContentEl )
				this.$el.off( 'change', this.dateContentEl, this.triggerDateChange );

			if ( this.catContentEl )
				this.$el.off( 'change', this.catContentEl, this.triggerCatChange );

			if ( this.selectAllEl )
				this.$el.off( 'click', this.selectAllEl, this.triggerSelectAll );

			_results = [];

			for ( key in this.views ) {
				
				if ( key !== 'length' ) {
					
					match    = key.match( /^( \S+ )\s*( .* )$/ );
					trigger  = match[1];
					selector = match[2];

					_results.push( this.$el.off( trigger, selector, this.views[key], this.triggerView ) );

				} else {

					_results.push( void 0 );

				}

			}

			return _results;

		};

		ModalPostsList.prototype.triggerLoadsContent = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if ( typeof this.loadsContent === "function" )
				this.loadsContent( e );

		};

		ModalPostsList.prototype.triggerSearchChange = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if ( typeof this.searchChange === "function" )
				this.searchChange( e.target, false );

		};

		ModalPostsList.prototype.triggerDateChange = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if ( typeof this.dateChange === "function" )
				this.dateChange( e.target );

		};

		ModalPostsList.prototype.triggerCatChange = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if ( typeof this.catChange === "function" )
				this.catChange( e.target );

		};

		ModalPostsList.prototype.triggerSelectAll = function( e ) {
			
			if ( ! e )
				return;

			if ( typeof this.selectAll === "function" )
				this.selectAll( e.target );

		};

		ModalPostsList.prototype.triggerSearchKeyEnter = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if( e.keyCode != 13 )
				return;

			if ( typeof this.pageChange === "function" )
				this.searchChange( e.target, true );

		};

		ModalPostsList.prototype.triggerPageKeyEnter = function( e ) {
			
			if ( ! e )
				return;

			if ( e != null )
				e.preventDefault();

			if( e.keyCode != 13 )
				return;

			if ( typeof this.pageChange === "function" )
				this.pageChange( e.target );

		};

		ModalPostsList.prototype.checkKey = function( e ) {
			
			if ( this.active ) {
				
				switch ( e.keyCode ) {

					case 27:
						return this.triggerCancel();
					
					case 13:
						return this.triggerSubmit();

				}

			}

		};

		ModalPostsList.prototype.submit = function() {
			
			var _this = this;
			var posts = [];

			_this.viewContainerEl.find( '[name="post[]"]:checked' ).each( function( index ) {
				
				posts.push( Backbone.$( this ).val() );

			} );

			_this.updateNewPosts( posts );

		};

		ModalPostsList.prototype.updateNewPosts = function( newValues ) {

			var input      = Backbone.$( this.inputEl );
			var inputValue = input.val();

			inputValue = inputValue.split( ',' );
			inputValue = inputValue.concat( newValues );
			inputValue = inputValue.filter( function ( elem, index, arr ) {
				return arr.lastIndexOf( elem ) === index && elem !== '';
			} );

			input.val( inputValue.join( ',' ) ).trigger( 'change' );

		};

		ModalPostsList.prototype.loadsContent = function( event ) {

			var params = Backbone.$( event.target ).closest( this.loadsContentEl ).data( 'params' );
			
			if ( ! params )
				return;

			var ajaxParams = Backbone.$.extend( {}, this.ajaxParams );

			Backbone.$.extend( ajaxParams.datas, this.ajaxParams.datas, params );

			this.ajaxGetContent( ajaxParams );

		};

		ModalPostsList.prototype.searchChange = function( target, search ) {

			var _this      = this;
			var thisSearch = Backbone.$( target ).closest( _this.searchContentEl );
			var loadsLink  = thisSearch.nextAll( _this.loadsContentEl );
			var params     = loadsLink.data( 'params' );
			
			if ( ! params )
				return;

			params.s = thisSearch.val();

			Backbone.$( _this.searchContentEl ).each( function() {
				
				Backbone.$( this ).nextAll( _this.loadsContentEl ).data( 'params', params );	
			
			} );

			if( ! search )
				return;

			var ajaxParams = Backbone.$.extend( {}, this.ajaxParams );

			Backbone.$.extend( ajaxParams.datas, this.ajaxParams.datas, params );

			this.ajaxGetContent( ajaxParams );	

		};

		ModalPostsList.prototype.dateChange = function( target ) {

			var _this      = this;
			var thisDate   = Backbone.$( target );
			var loadsLink  = thisDate.nextAll( _this.loadsContentEl );
			var params     = loadsLink.data( 'params' );
			
			if ( ! params )
				return;

			params.m = thisDate.val();

			Backbone.$( _this.dateContentEl ).each( function() {
				
				Backbone.$( this ).nextAll( _this.loadsContentEl ).data( 'params', params );	
			
			} );

		};

		ModalPostsList.prototype.catChange = function( target ) {

			var _this     = this;
			var thisCat   = Backbone.$( target );
			var loadsLink = thisCat.nextAll( _this.loadsContentEl );
			var params    = loadsLink.data( 'params' );
			
			if ( ! params )
				return;

			params.cat = thisCat.val();

			Backbone.$( _this.catContentEl ).each( function() {
				
				Backbone.$( this ).nextAll( _this.loadsContentEl ).data( 'params', params );	
			
			} );

		};

		ModalPostsList.prototype.pageChange = function( target ) {

			var thisPage = Backbone.$( target );
			var params   = thisPage.data( 'params' );
			
			if ( ! params )
				return;

			params.paged = thisPage.val();

			var ajaxParams = Backbone.$.extend( {}, this.ajaxParams );

			Backbone.$.extend( ajaxParams.datas, this.ajaxParams.datas, params );

			this.ajaxGetContent( ajaxParams );	

		};

		ModalPostsList.prototype.selectAll = function( target ) {

			if( Backbone.$( target ).attr( 'checked' ) ) {
				this.viewContainerEl.find( '[name="post[]"]' ).attr( 'checked', 'checked' );
				Backbone.$( this.selectAllEl ).not( target ).attr( 'checked', 'checked' );
			} else {
				this.viewContainerEl.find( '[name="post[]"]' ).removeAttr( 'checked' );
				Backbone.$( this.selectAllEl ).not( target ).removeAttr( 'checked' );
			}

		};

		return ModalPostsList;

	} )( Backbone.Modal );

} ).call( this );

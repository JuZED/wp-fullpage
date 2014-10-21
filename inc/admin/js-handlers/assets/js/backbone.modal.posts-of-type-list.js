( function() {
	
	var __bind = function( fn, me ){ return function(){ return fn.apply( me, arguments ); }; },
		__hasProp  = {}.hasOwnProperty,
		__extends  = function( child, parent ) { for ( var key in parent ) { if ( __hasProp.call( parent, key ) ) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; },
		__indexOf  = [].indexOf || function( item ) { for ( var i = 0, l = this.length; i < l; i++ ) { if ( i in this && this[i] === item ) return i; } return -1; };

	Backbone.ModalPostsOfTypeList = ( function( _super ) {
		
		__extends( ModalPostsOfTypeList, _super );

		function ModalPostsOfTypeList() {
		
			this.cancelEl        = '.' + wpfpBbmPOTypeParams.cancelClass;
			this.submitEl        = '.' + wpfpBbmPOTypeParams.submitClass;
			this.loadsContentEl  = '.' + wpfpBbmPOTypeParams.loadsContentClass;
			this.searchContentEl = '.' + wpfpBbmPOTypeParams.searchContentClass;
			this.pageContentEl   = '.' + wpfpBbmPOTypeParams.pageContentClass;
			this.dateContentEl   = '.' + wpfpBbmPOTypeParams.dateContentClass;
			this.selectAllEl     = '.' + wpfpBbmPOTypeParams.selectAllClass;
			this.inputEl         = '#' + this.inputID;

			this.template = _.template( '' );

			this.triggerLoadsContent   = __bind( this.triggerLoadsContent, this );
			this.triggerSearchChange   = __bind( this.triggerSearchChange, this );
			this.triggerSearchKeyEnter = __bind( this.triggerSearchKeyEnter, this );
			this.triggerPageKeyEnter   = __bind( this.triggerPageKeyEnter, this );
			this.triggerDateChange     = __bind( this.triggerDateChange, this );
			this.triggerSelectAll      = __bind( this.triggerSelectAll, this );

			this.args = Array.prototype.slice.apply( arguments );

			Backbone.ModalPostsList.prototype.constructor.apply( this, this.args );

		};

		ModalPostsOfTypeList.prototype.updateNewPosts = function( newValues ) {

			var globalInput = Backbone.$( this.inputEl );
			var input       = Backbone.$( this.inputEl + '-' + this.ajaxParams.datas.post_type );
			var inputValue  = input.val();

			inputValue = inputValue.split( ',' );
			inputValue = inputValue.concat( newValues );
			inputValue = inputValue.filter( function ( elem, index, arr ) {
				return arr.lastIndexOf( elem ) === index && elem !== '';
			} );

			globalInput.val( inputValue.join( ',' ) ).trigger( 'change' );
			input.val( inputValue.join( ',' ) );

		};

		return ModalPostsOfTypeList;

	} )( Backbone.ModalPostsList );

} ).call( this );

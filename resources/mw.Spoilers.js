( function () {
	'use strict';

	mw.Spoilers = function () {
		// eslint-disable-next-line no-jquery/no-global-selector
		var $spoilerButton = $( '.spoilers-button' );
		$spoilerButton.each( function () {
			var $parent = $( this ).parent();
			$parent.children( '.spoilers-button' ).text( $parent.data( 'showtext' ) || mw.msg( 'spoilers_show_default' ) );
			$parent.data( 'shown', false );
		} );
		$spoilerButton.on( 'click', function () {
			var $parent = $( this ).parent(),
				shown = $parent.data( 'shown' ),
				showMsg = $parent.data( 'showtext' ) || mw.msg( 'spoilers_show_default' ),
				hideMsg = $parent.data( 'hidetext' ) || mw.msg( 'spoilers_hide_default' );
			$parent.data( 'shown', !shown );
			$parent.children( '.spoilers-button' ).text( shown ? showMsg : hideMsg );
			// eslint-disable-next-line no-jquery/no-slide
			$parent.children( '.spoilers-body' ).slideToggle();
		} );
	};

	$( function () {
		mw.Spoilers();
	} );
}() );

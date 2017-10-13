( function( mw, $ ) {
	'use strict';

	mw.Spoilers = function ( ) {
		var $spoilerButton = $( '.spoilers-button' );
		$spoilerButton.each( function() {
			var $parent = $( this ).parent();
			$parent.children( '.spoilers-button' ).text( $parent.data( 'showtext' ) || mw.msg( 'spoilers_show_default' ) );
		});
		$spoilerButton.click( function() {
			var $parent = $( this ).parent(),
				shown = $parent.data( 'shown' ),
				showMsg = $parent.data( 'showtext' ) || mw.msg( 'spoilers_show_default' ),
				hideMsg = $parent.data( 'hidetext' ) || mw.msg( 'spoilers_hide_default' );
			$parent.children( '.spoilers-button' ).text( shown ? hideMsg : showMsg );
			$parent.children( '.spoilers-body' ).slideToggle();
			$parent.data('shown', !shown);
		});
	};

	$( function () {
		mw.Spoilers();
	} );
}( mediaWiki, jQuery ) );
( function( mw, $ ) {
	'use strict';

	mw.Spoilers = function ( ) {
		var $spoilerButton = $( '.spoilers-button' );
		$spoilerButton.each( function() {
			var $parent = $( this ).parent();
			$parent.children( '.spoilers-button' ).text( $parent.attr( 'data-hidetext' ) || mw.msg( 'spoilers_hide_default' ) );
		});
		$spoilerButton.click( function() {
			var $parent = $( this ).parent(),
				shown = $parent.attr( 'data-shown' ),
				showMsg = $parent.attr( 'data-showtext' ) || mw.msg( 'spoilers_show_default' ),
				hideMsg = $parent.attr( 'data-hidetext' ) || mw.msg( 'spoilers_hide_default' );
			$parent.children( '.spoilers-button' ).text( shown ? hideMsg : showMsg );
			$parent.children( '.spoilers-body' ).attr('data-shown', !shown).slideToggle();
		});
	};

	$( function () {
		mw.Spoilers();
	} );
}( mediaWiki, jQuery ) );
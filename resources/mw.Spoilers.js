( function( mw, $ ) {
	'use strict';

	mw.Spoilers = function ( ) {
		$( '.spoilers-button' ).click( function() {
			var $parent = $( this ).parent(),
				showMsg = $parent.attr( 'data-showtext' ) || mw.msg( 'spoilers_show_default' ),
				hideMsg = $parent.attr( 'data-hidetext' ) || mw.msg( 'spoilers_hide_default' );
			$parent.children( '.spoilers-button' ).text( $parent.children( '.spoilers-body:visible' ).length ? hideMsg : showMsg );
			$parent.children( '.spoilers-body' ).slideToggle();
		});
	};

	$( function () {
		mw.Spoilers();
	} );
}( mediaWiki, jQuery ) );

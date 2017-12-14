/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {


	// Site Name
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-name' ).text( newval );
		} );
	} );


	// Dark Mode
	wp.customize( 'davis_dark_mode', function( value ) {
		value.bind( function( newval ) {
			if ( newval == true ) {
				$( 'body' ).addClass( 'dark-mode' );
			} else {
				$( 'body' ).removeClass( 'dark-mode' );
			}
		} );
	} );
	
	
} )( jQuery );
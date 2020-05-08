// ======================================================================= Namespace
var davis = davis || {},
	$ = jQuery;


// =======================================================================  Menu
davis.menu = {

	init: function() {

		// Make sub menus accessible via keyboard navigation
		davis.menu.focusableSubMenus();

	},

	focusableSubMenus: function() {

		$( '.menu a' ).on( 'focus', function() {
			if ( $( this ).parent( 'li' ).hasClass( 'menu-item-has-children' ) ) {
				$( this ).next( 'ul' ).addClass( 'focusable' );
			} else {
				$( this ).closest( 'ul' ).find( 'ul' ).removeClass( 'focusable' );
			}
		} );

	},

} // davis.menu


// =======================================================================  Resize videos
davis.intrinsicRatioEmbeds = {

	init: function() {

		// Resize videos after their container
		var vidSelector = 'iframe, object, video';
		var resizeVideo = function( sSel ) {
			$( sSel ).each( function() {
				var $video = $( this ),
					$container = $video.parent(),
					iTargetWidth = $container.width();

				if ( ! $video.attr( 'data-origwidth' ) ) {
					$video.attr( 'data-origwidth', $video.attr( 'width' ) );
					$video.attr( 'data-origheight', $video.attr( 'height' ) );
				}

				var ratio = iTargetWidth / $video.attr( 'data-origwidth' );

				$video.css( 'width', iTargetWidth + 'px' );
				$video.css( 'height', ( $video.attr( 'data-origheight' ) * ratio ) + 'px' );
			});
		};

		resizeVideo( vidSelector );

		$( window ).resize( function() {
			resizeVideo( vidSelector );
		} );

	},

} // davis.intrinsicRatioEmbeds


// ======================================================================= Function calls
$( document ).ready( function( ) {
	davis.menu.init();						// Menus
	davis.intrinsicRatioEmbeds.init();		// Embed resizing
} );

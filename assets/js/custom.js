/**
 * Custom functionality required for the The Ball v2 design.
 *
 * @since 1.0
 */

/**
 * Since this Javascript is added at the top of the page, let's hide the search
 * form immediately.
 */
document.write( '<style type="text/css" media="screen">#the-ball-v2-search{display:none;}</style>' );

/**
 * Define what happens when the page is ready.
 *
 * @since 1.0
 */
jQuery(document).ready( function($) {

	/**
	 * Add a class to the News Item when mouse is over it.
	 *
	 * @since 1.0
	 */
	$('#page').on( 'mouseover', '#news .post, #blog .post', function( event ) {
		$(this).addClass('newsblock-in');
	});

	/**
	 * Remove class from the textblock when mouse moves out of it.
	 *
	 * @since 1.0
	 */
	$('#page').on( 'mouseout', '#news .post, #blog .post', function( event ) {
		$(this).removeClass('newsblock-in');
	});

	/**
	 * Act on clicks by going to permalink.
	 *
	 * @since 1.0
	 */
	$('#page').on( 'click', '#news .post, #blog .post', function( event ) {
		var url = $('.entry-title a', this).prop( 'href' );
		document.location.href = url;
	});

	/**
	 * Act on page menu clicks by scrolling to permalink.
	 *
	 * @since 1.4.4
	 */
	$('#page').on( 'click', '.the-ball-v2-page-menu a', function( event ) {

		var scroll_offset = 0;

		// disable native behaviour
		if ( event.preventDefault ) {
			event.preventDefault();
		}

		// get offset
		if ( $('#wpadminbar').length > 0 ) {
			scroll_offset = $('#wpadminbar').height();
		}

		// scroll to target
		$(window).stop(true).scrollTo(
			$(this).attr( 'href' ),
			{ duration: 1200, axis: 'y', offset: 0 - scroll_offset }
		);

	});

	/**
	 * Act on clicks on the search link.
	 *
	 * @since 1.4.8
	 */
	$('#page').on( 'click', '.the-ball-v2-search-trigger', function( event ) {
		event.preventDefault();
		$('#the-ball-v2-search').show().find('input.search-field').focus();
	});

	/**
	 * Hide search form when mask is clicked.
	 *
	 * @since 1.4.8
	 */
	$('#page').on( 'click', '#the-ball-v2-search', function( event ) {
		$(this).hide();
		$('.the-ball-v2-search-trigger').focus();
	});

	/**
	 * Prevent search form clicks from propagating.
	 *
	 * @since 1.4.8
	 */
	$('#page').on( 'click', '#the-ball-v2-search form', function( event ) {
		event.stopPropagation();
	});

});

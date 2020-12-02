/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, menu, links, i, len;

	container_top = document.getElementById( 'top-bar-left-navigation' );

	if ( container_top ) {
		menu_top = container_top.getElementsByTagName( 'ul' )[0];
		links_top    = menu_top.getElementsByTagName( 'a' );
		for ( i = 0, len = links_top.length; i < len; i++ ) {
			links_top[i].addEventListener( 'focus', toggleFocus, true );
			links_top[i].addEventListener( 'blur', toggleFocus, true );
		}
	}

	container = document.getElementById( 'site-navigation' );

	if ( ! container ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}


	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

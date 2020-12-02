<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EightyDays
 */

add_filter( 'excerpt_more', 'eightydays_excerpt_more' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function eightydays_excerpt_more() {
	return '&hellip;';
}

add_filter( 'excerpt_length', 'eightydays_excerpt_length' );

/**
 * Change excerpt length
 * @return int
 */
function eightydays_excerpt_length() {
	return 25;
}

/**
 * Add No-JS Class.
 * If we're missing JavaScript support, the HTML element will have a no-js class.
 */
function eightydays_no_js_class() {
	if ( eightydays_is_amp() ) {
		return;
	}
	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}
add_action( 'wp_head', 'eightydays_no_js_class' );

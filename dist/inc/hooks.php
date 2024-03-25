<?php
/**
 * Custom hooks
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_site_info' ) ) {
	/**
	 * Add site info hook to WP hook library.
	 */
	function understrap_site_info() {
		do_action( 'understrap_site_info' );
	}
}

add_action( 'understrap_site_info', 'understrap_add_site_info' );
if ( ! function_exists( 'understrap_add_site_info' ) ) {
	/**
	 * Add site info content.
	 */
	function understrap_add_site_info() {
		$externalLink_1 = 'https://ridekola.com.au/';
		$externalLink_2 = 'https://www.goodcycles.org.au/';

		$site_info = sprintf(
			'<div class="site-info container">&copy; ' . date( 'Y' ) . ' eBike Hub • A joint initiative between <a href="' . $externalLink_1 . '" target="_blank">RideKola</a> and <a href="' . $externalLink_2 . '" target="_blank">Good Cycles</a>.</div>'
		);

		// Check if customizer site info has value.
		if ( get_theme_mod( 'understrap_site_info_override' ) ) {
			$site_info = get_theme_mod( 'understrap_site_info_override' );
		}

		echo apply_filters( 'understrap_site_info_content', $site_info ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

<?php
/**
 * Autoload bootstrap file.
 *
 * This file is used to autoload classes and functions necessary for the theme
 * to run. Classes utilize the PSR-4 autoloader in Composer and is defined in
 * `composer.json`.
 *
 * @package Photon
 */

namespace Photon;

/**
 * Autoload classes.
 */
spl_autoload_register(
	function ( $class_name ) {
		$namespace = 'Photon';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/includes/classes';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
);

/**
 * Autoload template tag functions.
 * These should be placed within the `includes/template-tags` directory.
 * Ideally, group them by functionality.
 */
foreach ( glob( get_stylesheet_directory() . '/includes/template-tags/*.php' ) as $filename ) {
	include_once $filename;
}

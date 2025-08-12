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
 * Run the Composer autoloader.
 *
 * Auto-load any projects via the Composer autoloader. Be sure to check if the
 * file exists in case someone's using Composer to load their dependencies in
 * a different directory. This also autoloads our theme's classes.
 */
spl_autoload_register(
	function ( $class_name ) {
		// Handle child theme classes (Photon namespace)
		$namespace = 'Photon';
		if ( strpos( $class_name, $namespace . '\\' ) === 0 ) {
			$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );
			$path = get_stylesheet_directory() . '/includes/classes';
			foreach ( $parts as $part ) {
				$path .= '/' . $part;
			}
			$path .= '.php';

			if ( file_exists( $path ) ) {
				require_once $path;
				return true;
			}
		}

		// Handle parent theme classes (Pulsar namespace)
		// $parent_namespace = 'Pulsar';
		// if ( strpos( $class_name, $parent_namespace . '\\' ) === 0 ) {
		// 	$parts = explode( '\\', substr( $class_name, strlen( $parent_namespace . '\\' ) ) );
		// 	$path = get_template_directory() . '/includes/classes';
		// 	foreach ( $parts as $part ) {
		// 		$path .= '/' . $part;
		// 	}
		// 	$path .= '.php';

		// 	if ( file_exists( $path ) ) {
		// 		require_once $path;
		// 		return true;
		// 	}
		// }

		return false;
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

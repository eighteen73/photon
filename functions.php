<?php
/**
 * Child theme functions file.
 *
 * This file is used to bootstrap the child theme.
 * WordPress will automatically load the parent theme's functions.php after this.
 *
 * @package Photon
 */

/**
 * Load child theme autoloader.
 *
 * This sets up autoloading for child theme classes.
 * Parent theme autoloading will be handled when parent functions.php loads.
 */
if ( file_exists( get_stylesheet_directory() . '/includes/autoload.php' ) ) {
    require_once get_stylesheet_directory() . '/includes/autoload.php';
}

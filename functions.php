<?php
/**
 * Theme functions and definitions
 *
 * @package We
 */

namespace We;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme version.
 *
 * @var string
 */
define( 'WE_VERSION', '1.0.0' );

/**
 * Theme path.
 *
 * @var string
 */
define( 'WE_PATH', get_template_directory() );

/**
 * Theme URI.
 *
 * @var string
 */
define( 'WE_URI', get_template_directory_uri() );

/**
 * Stylesheet URI.
 *
 * @var string
 */
define( 'WE_STYLESHEET_URI', get_stylesheet_uri() );

/**
 * Autoloads classes from the /includes directory.
 *
 * @param string $class_name The name of the class to load.
 */
spl_autoload_register(
	function ( $class_name ) {
		if ( strpos( $class_name, __NAMESPACE__ . '\\' ) === 0 ) {
			$class_name = str_replace( __NAMESPACE__ . '\\', '', $class_name );

			// Get the name of the file from the class name.
			$file = WE_PATH . '/includes/class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';

			// Check if the file exists.
			if ( file_exists( $file ) ) {
				require_once $file;
			}
		}
	}
);

Init::get_instance();

<?php
/**
 * The WP Filesystem Utility class file
 *
 * This file registers the WP Filesystem Utility class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - WP Filesystem Utility Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Utilities
 * @author  Your Name <your-name@site.tld>
 */

/**
 * Declare strict typing
 *
 * @see https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict
 */
declare( strict_types = 1 );

/**
 * Declare the namespace
 *
 * @see https://www.php.net/manual/en/language.namespaces.php
 */
namespace Company\Plugins\PluginName\Utilities;

use WP_Filesystem_Direct;
use base64_encode;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The WP Filesystem Utility Class
 *
 * Provides a wrapper for the WP Filesystem.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Utilities
 * @author  Your Name <your-name@site.tld>
 */
class WP_Filesystem_Utility {

	/**
	 * Filesystem object
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $filesystem The WP Filesystem Object.
	 */
	private static ?object $filesystem = null;

	/**
	 * Get WP Filesystem
	 *
	 * Instantiates the WP Filesystem and returns it with direct access.
	 *
	 * @since 1.0.0 Introduced 2023-10-08 16:18
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @access public
	 * @return object $self::filesystem The WP Filesystem object
	 */
	public static function get_filesystem(): object {

		if ( null === self::$filesystem ) {

			WP_Filesystem();
			self::$filesystem = new WP_Filesystem_Direct( true );
		}

		return self::$filesystem;
	}

	/**
	 * Get a base64 encoded SVG File content
	 *
	 * Helper function to base64 encode the contents of a (svg) file.
	 * Useful for example when setting custom SCG Icons in the WP admin.
	 *
	 * phpcs: Usage of base64_encode internal only.
	 * reviewers: phpcs:ignore is used deterministically because GitHub WPCS Workflow fails otherwise.
	 *
	 * @since 1.0.0 Introduced 2023-10-08 16:55
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  string $path The full path to the file.
	 * @return string
	 */
	public function get_base64_encoded_contents( string $path = '' ): string {
		$this->get_filesystem();
		// phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.obfuscation_base64_encode
		return base64_encode( self::$filesystem->get_contents( $path ) );
	}
}

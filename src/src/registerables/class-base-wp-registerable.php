<?php
/**
 * The Base WP Registerable class file
 *
 * This file registers the Base WP Registerable class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Base WP Registerable Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables
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
namespace Company\Plugins\PluginName\Registerables;

use Company\Plugins\PluginName\Core\Config;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Base WP Registerable Class
 *
 * Provides an abstract for all registerables in this plugin.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables
 * @author  Your Name <your-name@site.tld>
 */
abstract class Base_WP_Registerable {

	/**
	 * Key of the registerable
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $key Key of the registerable (Post Type, taxonomy, metabox.. key).
	 */
	protected string $key = '';

	/**
	 * Set the registerable key
	 *
	 * Abstract to set a registerable's key.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	abstract protected function set_key(): void;

	/**
	 * Validate the key
	 *
	 * Validate $key for get_key().
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @throws \LengthException If the key length validation fails.
	 * @throws \UnexpectedValueException If the key sanitization fails.
	 * @return string The validated string.
	 */
	abstract protected function validate_key(): string;

	/**
	 * Register the registerable
	 *
	 * Abstract to register a registerable.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	abstract public function register(): void;

	/**
	 * Retrieve the validated key
	 *
	 * Retrieves a validated $key after the user provided it with set_key().
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @throws \LengthException If the key length validation fails.
	 * @throws \UnexpectedValueException If the key sanitization fails.
	 * @return string The validated string.
	 */
	protected function get_key(): string {
		return $this->validate_key();
	}

	/**
	 * Sanitize the key
	 *
	 * Sanitize $key for validate_key().
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @throws \UnexpectedValueException If the key sanitization fails.
	 * @return void
	 */
	protected function sanitize_key() {
		if ( sanitize_key( $this->key ) !== $this->key ) {
			throw new \UnexpectedValueException(
				wp_kses_post( "The key \"{$this->key}\" is not valid. It must match the result of sanitize_key()." )
			);
		}
	}
}

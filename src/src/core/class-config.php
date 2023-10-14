<?php
/**
 * The main plugin file
 *
 * This file registers the configuration class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Configuration Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Core
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
namespace Company\Plugins\PluginName\Core;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Configuaration Class
 *
 * Defines an immutable configuration object.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Core
 * @author  Your Name <your-name@site.tld>
 */
final class Config {

	/**
	 * Configuration Container
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $container The configuration Container.
	 */
	private static $container = array();

	/**
	 * Private constructor to prevent instantiation
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 */
	private function __construct() {}

	/**
	 * Initialise the configuration
	 *
	 * This method allows to initialise a configuration container.
	 * The configuration takes an array, of any contents and lenght.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @param array $container The Configuration array.
	 * @access public
	 * @return void
	 */
	public static function init( array $container ): void {

		if ( empty( self::$container ) ) {
			self::$container = $container;
		}
	}

	/**
	 * Get configuration settings
	 *
	 * This method allows to get a configuration setting.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @param string $name The Configuration Setting name.
	 * @throws \InvalidArgumentException Throws exception.
	 * @access public
	 * @return mixed self::$container[ $name ] The requested configuration setting
	 */
	public static function get( string $name ) {

		if ( ! isset( self::$container[ $name ] ) ) {
				throw new \InvalidArgumentException( esc_html( "Configuration key {$name} not found." ) );
		}

		return self::$container[ $name ];
	}
}

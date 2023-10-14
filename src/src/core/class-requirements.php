<?php
/**
 * The Requirements file
 *
 * This file registers the Requirements class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Requirements Class Declaration
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
declare(strict_types=1);

/**
 * Declare the namespace and import global functions
 *
 * @see https://www.php.net/manual/en/language.namespaces.php
 * @see https://www.php.net/manual/en/language.namespaces.importing.php
 */
namespace Company\Plugins\PluginName\Core;

use function get_bloginfo;
use function get_option;
use function get_site_option;
use function get_template;
use function is_multisite;
use function is_plugin_active;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Requirements Class
 *
 * Defines the callbacks for Requirements checks
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Core
 * @author  Your Name <your-name@site.tld>
 */
class Requirements {

	/**
	 * If requirements are met
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @access protected
	 * @var bool $met If the requirements are met or not.
	 */
	protected $met;

	/**
	 * Initialise Class
	 *
	 * Initialises th Requirements Class.
	 * Sets the $met property to true, sinece by default, there are no problems.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 */
	public function __construct() {

		$this->met = true;
	}

	/**
	 * Get $met property
	 *
	 * Public method to get the $met property value.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return bool
	 */
	public function met(): bool {

		return $this->met;
	}

	/**
	 * Check PHP Version
	 *
	 * Checks on the PHP requirements.
	 * Sets the $met property accordingly.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  string $min_version The minimum PHP Version required.
	 * @return self
	 */
	public function php( string $min_version ): self {

		$this->met = $this->met && version_compare( PHP_VERSION, $min_version, '>=' );

		return $this;
	}

	/**
	 * Check OS
	 *
	 * Checks on the OS requirements.
	 * Sets the $met property accordingly.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  array $min_versions The minimum OS Version required, passed as associative array.
	 * @return self
	 */
	public function os( array $min_versions ): self {

		$wp        = version_compare( get_bloginfo( 'version' ), $min_versions['wp'], '>=' );
		$cp        = function_exists( 'classicpress_version' ) && version_compare(
			classicpress_version(),
			$min_versions['cp'],
			'>='
		);
		$this->met = $this->met && ( $wp || $cp );

		return $this;
	}

	/**
	 * Check Multisite
	 *
	 * Checks on the Multisite requirements.
	 * Sets the $met property accordingly.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  bool $required If multisite is required.
	 * @return self
	 */
	public function multisite( bool $required ): self {

		$this->met = $this->met && ( ! $required || is_multisite() );

		return $this;
	}

	/**
	 * Check Plugin Requirements
	 *
	 * Checks on the required Plugins.
	 * Sets the $met property accordingly.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  array $plugins The required Plugins. An array of plugin-names.
	 * @return self
	 */
	public function plugins( array $plugins ): self {

		$this->met = $this->met && array_reduce(
			$plugins,
			function ( bool $active, string $plugin ): bool {
				return $active && is_plugin_active( $plugin );
			},
			true
		);

		return $this;
	}

	/**
	 * Check Theme Requirements
	 *
	 * Checks on the required Theme.
	 * Sets the $met property accordingly.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  string $parent_theme The Required Parent Theme.
	 * @return self
	 */
	public function theme( string $parent_theme ): self {

		$this->met = $this->met && ( get_template() === $parent_theme || ! $parent_theme );

		return $this;
	}
}

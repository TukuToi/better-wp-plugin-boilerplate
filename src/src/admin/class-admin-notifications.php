<?php
/**
 * The Plugin Admin Notifications file
 *
 * This file registers the admin_notifications class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Admin_Notifications Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Vendor
 * @author  Your Name <your-name@site.tld>
 */

/**
 * Declare strict typing
 *
 * @see https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict
 */
declare( strict_types = 1 );

/**
 * Declare the namespace and import global functions
 *
 * @see https://www.php.net/manual/en/language.namespaces.php
 * @see https://www.php.net/manual/en/language.namespaces.importing.php
 */
namespace Company\Plugins\PluginName\Admin;

use Company\Plugins\PluginName\Core\Config;
use Company\Plugins\PluginName\Utilities\WP_Filesystem_Utility;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin_notifications class
 *
 * Defines the callbacks for:
 * - installation instructions notice
 *
 * Includes appropriate escaping.
 *
 * @since      1.0.0 Introduced on 2023-08-02 14:14
 * @package    Plugin_Name
 * @author     Your Name <your-name@site.tld>
 */
class Admin_Notifications {

	/**
	 * Requirements notice
	 *
	 * Public method to print requirements notice.
	 *
	 * phpcs: output safe, as coming directly from plugin file.
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 15:14
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public static function print_requirement_notice(): void {

		$notice = ( WP_Filesystem_Utility::get_filesystem() )
			->get_contents( Config::get( 'plugin_dir' ) . 'resources/admin-requirements-notice.php' );
		printf(
			$notice,
			esc_html( Config::get( 'human_name' ) ),
			esc_html__( ' activation failed! Please read', 'plugin-slug' ),
			esc_url( Config::get( 'doc' )['install'] ),
			esc_html__( 'the Installation instructions', 'plugin-slug' ),
			esc_html__( 'for list of requirements.', 'plugin-slug' )
		);
	}
}

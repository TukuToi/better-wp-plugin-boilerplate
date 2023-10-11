<?php
/**
 * The Plugin Lifecycle file
 *
 * This file registers the lifecycle class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Lifecycle Class Declaration
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
namespace Company\Plugins\PluginName\Core;

use Company\Plugins\PluginName\Core\Config;
use function current_user_can;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The lifecycle class
 *
 * Defines the callbacks for:
 * - activation
 * - deactivation
 * - uninstallation
 * - bootstrap
 * Includes appropriate safety and capabilities checks.
 *
 * @since      1.0.0 Introduced on 2023-08-02 14:14
 * @package    Plugin_Name
 * @author     Your Name <your-name@site.tld>
 */
class Lifecycle {

	/**
	 * The prepared $_REQUEST array
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var    array $request The prepared $_REQUEST array during plugin lifecycle.
	 */
	private static $request = array();

	/**
	 * Activate the plugin
	 *
	 * Checks if the plugin was (safely) activated.
	 * Place to add any custom action during plugin activation.
	 *
	 * phpcs: not a security issue.
	 * reviewers: phpcs:ignore is used deterministically because GitHub WPCS Workflow fails otherwise.
	 * The developer should however have remmoved this section, if unused, on release.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @access public
	 * @return void
	 */
	public static function activate(): void {

		// phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
		if ( self::is_request_valid( 'activate_plugins', 'activate-plugin_' ) ) {
			/**
			 * It is now safe to perform your custom activation actions here.
			 *
			 * Note:
			 * If you do not need an activation hook, you can remove the entire activate() method.
			 * In that case, also ensure to remove the call to it in register_activation_hook(), and the unit tests.
			 */
		}
	}

	/**
	 * Deactivate the plugin
	 *
	 * Checks if the plugin was (safely) deactivated.
	 * Place to add any custom action during plugin deactivation.
	 *
	 * phpcs: not a security issue.
	 * reviewers: phpcs:ignore is used deterministically because GitHub WPCS Workflow fails otherwise.
	 * The developer should however have remmoved this section, if unused, on release.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @access public
	 * @return void
	 */
	public static function deactivate(): void {

		// phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
		if ( self::is_request_valid( 'deactivate_plugins', 'deactivate-plugin_' ) ) {
			/**
			 * It is now safe to perform your custom deactivation actions here.
			 *
			 * Note:
			 * If you do not need an deactivation hook, you can remove the entire deactivate() method.
			 * In that case, also ensure to remove the call to register_deactivation_hook(), and the unit tests.
			 */
		}
	}

	/**
	 * Uninstall the plugin
	 *
	 * Checks if the plugin was (safely) uninstalled.
	 * Place to add any custom action during plugin uninstallation.
	 *
	 * phpcs: not a security issue.
	 * reviewers: phpcs:ignore is used deterministically because GitHub WPCS Workflow fails otherwise.
	 * The developer should however have remmoved this section, if unused, on release.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @access public
	 * @return void
	 */
	public static function uninstall(): void {

		// phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedIf
		if ( self::is_uninstall_request_valid( 'delete_plugins' ) ) {
			/**
			 * It is now safe to perform your custom uninstall actions here.
			 *
			 * Note:
			 * If you do not need an uninstall hook, you can remove the entire uninstall() method.
			 * In that case, also ensure to remove the call to register_uninstall_hook(), and the unit tests.
			 *
			 * @see https://developer.wordpress.org/plugins/plugin-basics/uninstall-methods/#method-1-register_uninstall_hook
			 */
		}
	}

	/**
	 * Boot the plugin
	 *
	 * Bootstraps the plugin functionality.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @access public
	 * @return void
	 */
	public static function boot() {

		/**
		 * If your plugin has single faceted functionality,
		 * it can make sense to check for access here.
		 *
		 * Otherwise use bootstrap.php to handle scope access, or each related  class/method.
		 */
		require_once plugin_dir_path( __DIR__ ) . 'bootstrap.php';
	}

	/**
	 * Get the request.
	 *
	 * Gets the $_REQUEST array and checks if necessary keys are set.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @return bool true|false
	 */
	private static function check_request(): bool {

		$is_valid_request = false;

		if ( ! empty( $_REQUEST ) || isset( $_REQUEST['action'] ) ) {

			if ( isset( $_REQUEST['plugin'] ) ) {

				if ( (
						isset( $_REQUEST['_wpnonce'] )
						&& (
							wp_verify_nonce(
								sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ),
								'activate-plugin_' . sanitize_text_field( wp_unslash( $_REQUEST['plugin'] ) )
							)
							|| wp_verify_nonce(
								sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ),
								'deactivate-plugin_' . sanitize_text_field( wp_unslash( $_REQUEST['plugin'] ) )
							)
						)
					) || (
						isset( $_REQUEST['_ajax_nonce'] ) &&
						check_ajax_referer( 'updates' )
					)
				) {

					$request = array(
						'action' => sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ),
						'plugin' => sanitize_text_field( wp_unslash( $_REQUEST['plugin'] ) ),
					);
					self::set_request( $request );

					$is_valid_request = true;

				}

				$is_valid_request = false;

			}
		} elseif ( isset( $_REQUEST['checked'] ) ) {

			if ( isset( $_REQUEST['_wpnonce'] )
				&& wp_verify_nonce(
					sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ),
					'bulk-plugins'
				)
			) {

				$request = array(
					'action' => sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ),
					'plugin' => array_map( 'sanitize_text_field', wp_unslash( $_REQUEST['checked'] ) ),
				);
				self::set_request( $request );

				$is_valid_request = true;

			}

			$is_valid_request = false;

		}

		return $is_valid_request;
	}

	/**
	 * Set the request.
	 *
	 * Populates self::request with necessary and sanitized values.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param array $request Array of sanitized and unslashed $_REQUEST values.
	 * @access private
	 * @return void
	 */
	private static function set_request( $request ): void {

		self::$request['action'] = $request['action'];
		self::$request['plugin'] = $request['plugin'];
	}

	/**
	 * Validate the Request data.
	 *
	 * Validates the $_REQUESTed data is matching this plugin and action.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param  string $plugin The Plugin folder/name.php.
	 * @return bool true|false if either plugin or action does not match
	 */
	private static function validate_request( $plugin ): bool {

		return (
			isset( self::$request['plugin'] )
			&& self::is_single_plugin_action( $plugin )
		)
		|| (
			isset( self::$request['plugins'] )
			&& self::is_bulk_plugin_action( $plugin )
		);
	}

	/**
	 * Check for single plugin action
	 *
	 * Checks if it a single plugin activate, deactivate or uninstall action.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param  string $plugin The Plugin folder/name.php.
	 * @return bool true|false if either plugin or action does not match
	 */
	private static function is_single_plugin_action( $plugin ): bool {
		return $plugin === self::$request['plugin']
			&& in_array( self::$request['action'], array( 'deactivate', 'activate', 'delete-plugin' ), true );
	}

	/**
	 * Check for bulk plugin action
	 *
	 * Checks if it a bulk plugins activate-selected, deactivate-selected or uninstall action.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param  string $plugin The Plugin folder/name.php.
	 * @return bool true|false if either plugin or action does not match
	 */
	private static function is_bulk_plugin_action( $plugin ): bool {

		return in_array( self::$request['action'], array( 'deactivate-selected', 'activate-selected' ), true )
			&& in_array( $plugin, self::$request['plugins'], true );
	}

	/**
	 * Check request, caps and validation
	 *
	 * Checks if the activate/deactivate request is validated, user has caps, and request is secure.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param  string $capability The cap to check on the current user.
	 * @param  string $nonce_action The nonce action to check.
	 * @return bool true if either plugin or action does not match. Exits code on failure.
	 */
	private static function is_request_valid( $capability, $nonce_action ): bool {

		if ( ! self::check_request()
			|| ! self::validate_request( Config::get( 'base_name' ) )
			|| ! current_user_can( $capability ) ) {
			return false;
		}

		$nonce = isset( self::$request['plugin'] )
			? $nonce_action . self::$request['plugin']
			: 'bulk-plugins';

		if ( ! check_admin_referer( $nonce ) ) {
			exit;
		}

		return true;
	}

	/**
	 * Check request, caps and validation
	 *
	 * Checks if the uninstasll request is validated, user has caps, and request is secure.
	 *
	 * @since  1.0.0 Introduced on 2023-08-01 15:30
	 * @author Your Name <your-name@site.tld>
	 * @param  string $capability The cap to check on the current user.
	 * @return bool true if either plugin or action does not match. Exits code on failure.
	 */
	private static function is_uninstall_request_valid( $capability ): bool {
		if ( ! self::check_request()
			|| ! self::validate_request( Config::get( 'base_name' ) )
			|| ! current_user_can( $capability )
			|| ! check_ajax_referer( 'updates', '_ajax_nonce' ) ) {
			return false;
		}

		return true;
	}
}

<?php
/**
 * The main plugin file
 *
 * This file is read by WordPress or ClassicPress to generate the plugin information in the plugin admin area.
 * This file includes:
 * - The "Plugin Header"
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Autoloader instantiation,
 * - Configuration,
 * - Requirements,
 * - Loads the plugin functionality
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName
 * @author  Your Name <your-name@site.tld>
 */

/**
 * The WordPress/Classicpress Plugin Header
 *
 * @see               https://developer.wordpress.org/plugins/plugin-basics/header-requirements/
 *
 * Plugin Name:       My Plugin Name
 * Plugin URI:        https://site.tld/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ideally, your WordPress forum username.
 * Requires at least: X.X
 * Requires PHP:      X.X
 * Tested up to:      X.X
 * Author URI:        https://site.tld/author-name-uri/
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /resources/languages
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
namespace Company\Plugins\PluginName;

use Company\Plugins\PluginName\Core\{Config, Requirements, Lifecycle};
use function add_action;
use function deactivate_plugins;
use function current_user_can;
use function plugin_basename;
use function register_activation_hook;
use function register_deactivation_hook;
use function register_uninstall_hook;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load (composer) autoloader
 *
 * @see https://getcomposer.org/
 */
require_once 'vendor/autoload.php';

/**
 * Define Configuration settings
 *
 * You can add any custom configuration key => value pair here.
 *
 * Note:
 * - Textdomain MUST NOT be defined as a $variable since it MUST be a string literal due to how gettext() works.
 * - Textdomain MUST be identical to the WordPress.org Slug, if this plugin is published on .org repo.
 *
 * @see https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#basic-strings
 * @see https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#text-domains
 *
 * @see https://developer.wordpress.org/reference/functions/plugin_basename/
 * @see https://developer.wordpress.org/reference/functions/plugin_dir_path/
 * @see Company\Plugins\PluginName\Core\Config::init()
 * @see Company\Plugins\PluginName\Core\Requirements
 */
Config::init(
	array(
		'version'          => '1.0.0',
		'requires_php'     => '7.4.0',
		'requires_os'      => array(
			'wp' => '6.0.0',
			'cp' => '1.0.0',
		),
		'multisite'        => false,
		'requires_plugins' => array(),
		'requires_theme'   => '',
		'file_path'        => __FILE__,
		'base_name'        => plugin_basename( __FILE__ ),
		'plugin_dir'       => plugin_dir_path( __FILE__ ),
		'slug'             => 'plugin-name',
		'human_name'       => 'My Plugin Name',
		'doc'              => array(
			'install' => 'https://doc-domain.tld/#installation',
		),
	)
);

/**
 * Check the requirements
 *
 * If the requirements are not met, we disable the plugin and produce an admin warning.
 *
 * @see Company\Plugins\PluginName\Core\Requirements
 * @see Company\Plugins\PluginName\Core\Config::get()
 */
$requirements = ( new Requirements() )
	->php( Config::get( 'requires_php' ) )
	->os( Config::get( 'requires_os' ) )
	->multisite( Config::get( 'multisite' ) )
	->plugins( Config::get( 'requires_plugins' ) )
	->theme( Config::get( 'requires_theme' ) );

if ( ! $requirements->met() ) {

	require_once \ABSPATH . 'wp-includes/capabilities.php';
	require_once \ABSPATH . 'wp-includes/pluggable.php';
	if ( current_user_can( 'deactivate_plugins' ) ) {

		unset( $_GET['activate'] );
		add_action(
			'admin_notices',
			array(
				__NAMESPACE__ . '\Admin\Admin_Notifications',
				'print_requirement_notice',
			)
		);

		require_once \ABSPATH . 'wp-admin/includes/plugin.php';
		deactivate_plugins( array( Config::get( 'base_name' ) ), true );

	}

	return;

}

/**
 * Register plugin lifetime hooks and main functionality
 *
 *  If all requirements pass, we register:
 * - actication hook,
 * - deactivation hook,
 * - uninstall hook,
 * - load the plugin functionality on `init` (we do this so a theme functions.php file can still use the plugin's hooks)
 *
 * @see https://developer.wordpress.org/reference/functions/register_activation_hook/
 * @see https://developer.wordpress.org/reference/functions/register_deactivation_hook/
 * @see https://developer.wordpress.org/reference/functions/register_uninstall_hook/
 * @see https://developer.wordpress.org/reference/hooks/init/
 * @see Company\Plugins\PluginName\Core\Lifecycle
 */
$lifecycle = __NAMESPACE__ . '\Core\Lifecycle';
register_activation_hook( __FILE__, array( $lifecycle, 'activate' ) );
register_deactivation_hook( __FILE__, array( $lifecycle, 'deactivate' ) );
register_uninstall_hook( __FILE__, array( $lifecycle, 'uninstall' ) );
add_action( 'init', array( $lifecycle, 'boot' ) );

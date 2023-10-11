<?php
/**
 * The PHPUnit Tests Bootstrap File
 *
 * This file bootstraps the PHPUnit Tests for WordPress.
 * This file includes:
 * - Strict Typing declaration,
 * - Definition of WP_TEST_DIR,
 * - Requires of necessary WP Test Files
 * - Loads plugin into testing env
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
 * The Tests Directory path
 *
 * Overwrite this in phpunit.xml WP_TESTS_DIR env directive.
 *
 * @since 1.0.0
 * @var   string $_tests_dir    The Testing Directory Path. Fallback to wordpress-develop/tests/phpunit if not set
 */
$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/temp/wordpress-develop/tests/phpunit';
}

/**
 * Load the WordPress Test Library Functions
 */
require_once $_tests_dir . '/includes/functions.php';

/**
 * The Plugin Slug
 *
 * Overwrite this in phpunit.xml WP_PLUGIN_SLUG env directive.
 *
 * @since 1.0.0
 * @var   string $_tests_dir The Plugin Slug. Fallback to plugin-name if not set
 */
$_plugin_slug = getenv( 'WP_PLUGIN_SLUG' );
if ( ! $_plugin_slug ) {
	$_plugin_slug = 'plugin-name';
}
tests_add_filter(
	'muplugins_loaded',
	function() use ( $_plugin_slug ) {
		require_once dirname( dirname( __FILE__ ) ) . '/src/' . $_plugin_slug . '.php';
	}
);

/**
 * Start up the WordPress testing environmet.
 */
require_once $_tests_dir . '/includes/bootstrap.php';

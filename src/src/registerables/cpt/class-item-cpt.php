<?php
/**
 * The Item CPT class file
 *
 * This file registers the Item CPT class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Item CPT Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\CPT
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
namespace Company\Plugins\PluginName\Registerables\CPT;

use Company\Plugins\PluginName\Registerables\CPT\Base_CPT;
use Company\Plugins\PluginName\Utilities\WP_Filesystem_Utility;
use Company\Plugins\PluginName\Core\Config;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Item CPT Class
 *
 * This specialised class registers a new custom "Item" Custom Post Type.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\CPT
 * @author  Your Name <your-name@site.tld>
 */
final class Item_CPT extends Base_CPT {

	/**
	 * Set specialised key
	 *
	 * Set the registerable's key to "item"
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	protected function set_key(): void {
		$this->key = Config::get( 'slug' ) . '-item';
	}

	/**
	 * Set Specialised Arguments
	 *
	 * Set the registerable's arguments to the particular needs of the "item" cpt
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_post_type/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_specific_args(): array {
		return array(
			'menu_position' => 1,
			'taxonomies'    => array( Config::get( 'slug' ) . '-collection' ),
			'menu_icon'     => 'data:image/svg+xml;base64,' . ( new WP_Filesystem_Utility() )
				->get_base64_encoded_contents( Config::get( 'plugin_dir' ) . 'public/icons/cpt-icon.svg' ),
		);
	}

	/**
	 * Set Specialised Labels
	 *
	 * Set the registerable's labels to the particular needs of the "item" cpt
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_post_type_labels/#description
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_specific_labels(): array {
		return array();
	}
}

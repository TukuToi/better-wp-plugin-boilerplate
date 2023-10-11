<?php
/**
 * The Collection Taxonomy class file
 *
 * This file registers the Collection Taxonomy class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Collection Taxonomy Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Registerables\Taxonomies
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
namespace Company\Plugins\PluginName\Registerables\Taxonomies;

use Company\Plugins\PluginName\Registerables\Taxonomies\Base_Taxonomy;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Collection Taxonomy Class
 *
 * This specialised class registers a new custom "Collection" Taxonomy.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Registerables\Taxonomies
 * @author  Your Name <your-name@site.tld>
 */
final class Collection_Taxonomy extends Base_Taxonomy {

	/**
	 * Set specialised key
	 *
	 * Set the registerable's key to "collection"
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	protected function set_key(): void {
		$this->key = 'collection';
	}

	/**
	 * Set Specialised Arguments
	 *
	 * Set the registerable's arguments to the particular needs of the "collection" taxonomy
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_specific_args(): array {
		return array(
			'hierarchical' => true,
		);
	}

	/**
	 * Set Specialised Labels
	 *
	 * Set the registerable's labels to the particular needs of the "collection" taxonomy
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/#return
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_specific_labels(): array {
		return array();
	}

	/**
	 * Asssign to Post Types
	 *
	 * Assign this particular taxonomy to the post type `item`
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/#return
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_object_types(): array {
		return array(
			'item',
		);
	}
}

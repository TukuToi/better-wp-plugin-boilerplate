<?php
/**
 * The Base Taxonomy class file
 *
 * This file registers the Base Taxonomy class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Base Taxonomy Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Taxonomies
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

use Company\Plugins\PluginName\Registerables\Base_WP_Registerable;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Base Taxonomy Class
 *
 * This class provides abstracts and methods for registering a new taxonomy.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Taxonomies
 * @author  Your Name <your-name@site.tld>
 */
abstract class Base_Taxonomy extends Base_WP_Registerable {

	/**
	 * Set Specialised Arguments
	 *
	 * Abstract to set the registerable's arguments to the particular needs of the new taxonomy.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	abstract protected function set_specific_args(): array;

	/**
	 * Set Specialised Labels
	 *
	 * Abstract to set the registerable's labels to the particular needs of the new taxonomy.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/#return
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	abstract protected function set_specific_labels(): array;

	/**
	 * Assign to Custom Post Types
	 *
	 * Abstract to assign the new taxonomy to Custom Post Types
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	abstract protected function set_object_types(): array;

	/**
	 * Validate the key
	 *
	 * Validate $key for get_key().
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @throws \LengthException If the key length validation fails.
	 * @return string The validated string.
	 */
	protected function validate_key(): string {
		if ( empty( $this->key ) ) {
			$this->set_key();
			$this->sanitize_key();
		}

		/**
		 * Taxonomy max length: 32 chars         *
		 *
		 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/#parameters
		 * @see https://developer.wordpress.org/reference/functions/sanitize_key/
		 */
		if ( strlen( $this->key ) > 32 ) {
			throw new \LengthException(
				esc_html( "The \"{$this->key}\" key exceeds 32 characters." )
			);
		}

		return $this->key;
	}

	/**
	 * Set Default Labels
	 *
	 * Set the registerable's default labels.
	 * You can overwrite ALL your taxonomy labels here.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/#return
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	private function set_default_labels(): array {
		return array(
			'name'                       => _x( 'Classifications', 'Taxonomy general name', 'plugin-name' ),
			'singular_name'              => _x( 'Classification', 'Taxonomy singular name', 'plugin-name' ),
			'search_items'               => __( 'Search Classifications', 'plugin-name' ),
			'popular_items'              => __( 'Popular Classifications', 'plugin-name' ),
			'all_items'                  => __( 'All Classifications', 'plugin-name' ),
			'parent_item'                => __( 'Parent Classification', 'plugin-name' ),
			'parent_item_colon'          => __( 'Parent Classification:', 'plugin-name' ),
			'edit_item'                  => __( 'Edit Classification', 'plugin-name' ),
			'view_item'                  => __( 'View Classification', 'plugin-name' ),
			'update_item'                => __( 'Update Classification', 'plugin-name' ),
			'add_new_item'               => __( 'Add New Classification', 'plugin-name' ),
			'new_item_name'              => __( 'New Classification Name', 'plugin-name' ),
			'separate_items_with_commas' => __( 'Separate classifications with commas', 'plugin-name' ),
			'add_or_remove_items'        => __( 'Add or remove classifications', 'plugin-name' ),
			'choose_from_most_used'      => __( 'Choose from the most used classifications', 'plugin-name' ),
			'not_found'                  => __( 'No classifications found.', 'plugin-name' ),
			'no_terms'                   => __( 'No classifications', 'plugin-name' ),
			'items_list_navigation'      => __( 'Classifications list navigation', 'plugin-name' ),
			'items_list'                 => __( 'Classifications list', 'plugin-name' ),
		);
	}

	/**
	 * Set Default Arguments
	 *
	 * Set the registerable's default arguments.
	 * You can overwrite ALL your taxonomy arguments here.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	private function set_default_args(): array {
		return array(
			'labels'            => $this->get_labels(),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => $this->get_key() ),
		);
	}

	/**
	 * Get the arguments
	 *
	 * Get the registerable's mergd specialised and default arguments.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function get_args(): array {
		return array_merge( $this->set_default_args(), $this->set_specific_args() );
	}

	/**
	 * Get the labels
	 *
	 * Get the registerable's mergd specialised and default labels.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function get_labels(): array {
		return array_merge( $this->set_default_labels(), $this->set_specific_labels() );
	}

	/**
	 * Register the taxonomy
	 *
	 * Register the taxonomy with WordPress.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_taxonomy
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function register(): void {
		register_taxonomy( $this->get_key(), $this->set_object_types(), $this->get_args() );
	}
}

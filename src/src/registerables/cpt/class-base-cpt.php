<?php
/**
 * The Base CPT class file
 *
 * This file registers the Base CPT class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Base CPT Class Declaration
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

use Company\Plugins\PluginName\Registerables\Base_WP_Registerable;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Base CPT Class
 *
 * Base CPT class provides abstracts and methods to register a new Custom Post Type.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\CPT
 * @author  Your Name <your-name@site.tld>
 */
abstract class Base_CPT extends Base_WP_Registerable {

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
	abstract protected function set_specific_labels(): array;

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
	abstract protected function set_specific_args(): array;

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
		 * CPT Max length: 20 chars
		 *
		 * @see https://developer.wordpress.org/reference/functions/register_post_type/#parameters
		 */
		if ( strlen( $this->key ) > 20 ) {
			throw new \LengthException(
				esc_html( "The \"{$this->key}\" key exceeds 20 characters." )
			);
		}

		return $this->key;
	}

	/**
	 * Set Default Labels
	 *
	 * Set the registerable's default labels.
	 * You can over write ALLLx your Custom Post Type labels here.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/get_post_type_labels/#description
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array string[]
	 */
	protected function set_default_labels(): array {
		return array(
			'name'                     => _x( 'Items', 'Post type general name', 'plugin-name' ),
			'singular_name'            => _x( 'Item', 'Post type singular name', 'plugin-name' ),
			'add_new'                  => __( 'Add New', 'plugin-name' ),
			'add_new_item'             => __( 'Add New item', 'plugin-name' ),
			'edit_item'                => __( 'Edit item', 'plugin-name' ),
			'new_item'                 => __( 'New item', 'plugin-name' ),
			'view_item'                => __( 'View item', 'plugin-name' ),
			'view_items'               => __( 'View items', 'plugin-name' ),
			'search_items'             => __( 'Search items', 'plugin-name' ),
			'not_found'                => __( 'No items found.', 'plugin-name' ),
			'not_found_in_trash'       => __( 'No items found in Trash.', 'plugin-name' ),
			'parent_item_colon'        => __( 'Parent items:', 'plugin-name' ),
			'all_items'                => __( 'All items', 'plugin-name' ),
			'archives'                 => __( 'Item Archives', 'plugin-name' ),
			'attributes'               => __( 'Dumy Attributes', 'plugin-name ' ),
			'insert_into_item'         => _x( 'Insert into item', 'Label for insert media button', 'plugin-name' ),
			'uploaded_to_this_item'    => _x( 'Uploaded to this item', 'Label for media frame filter', 'plugin-name' ),
			'featured_image'           => _x( 'Item Image', 'Label for Featured Image metabox title', 'plugin-name' ),
			'set_featured_image'       => _x( 'Set item image', 'Label for the "Set featured image" button', 'plugin-name' ),
			'remove_featured_image'    => _x(
				'Remove item image',
				'Label for the "Remove featured image" button',
				'plugin-name'
			),
			'use_featured_image'       => _x(
				'Use as item image',
				'Label in the media frame for using as featured image',
				'plugin-name'
			),
			'menu_name'                => _x( 'Items', 'Admin Menu text', 'plugin-name' ),
			'filter_items_list'        => _x(
				'Filter items list',
				'Screen reader text for the filter links heading on the post type listing screen.',
				'plugin-name'
			),
			'filter_by_date'           => __( 'Filter by date', 'plugin-name' ),
			'items_list_navigation'    => _x(
				'Items list navigation',
				'Screen reader text for the pagination heading on the post type listing screen.',
				'plugin-name'
			),
			'items_list'               => _x(
				'Items list',
				'Screen reader text for the items list heading on the post type listing screen.',
				'plugin-name'
			),
			'item_published'           => __( 'Item published', 'plugin-name' ),
			'item_published_privately' => __( 'Item published privately', 'plugin-name' ),
			'item_reverted_to_draft'   => __( 'Item reverted to draft', 'plugin-name' ),
			'item_trashed'             => __( 'Item trashed', 'plugin-name' ),
			'item_scheduled'           => __( 'Item trashed', 'plugin-name' ),
			'item_updated'             => __( 'Item updated', 'plugin-name' ),
			'item_link'                => _x( 'Item Link', 'Used in block editor as the post link', 'plugin-name' ),
			'item_link_description'    => _x(
				'A link to a item post',
				'Used in block editor as the post link description',
				'plugin-name'
			),
		);
	}

	/**
	 * Set Default Arguments
	 *
	 * Set the registerable's default arguments.
	 * You can overwrite ALL your Custom Post Type arguments here.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_post_type/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	protected function set_default_args(): array {
		return array(
			'labels'                => $this->get_labels(),
			'description'           => '',
			'public'                => true,
			'hierarchical'          => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'show_in_admin_bar'     => true,
			'show_in_rest'          => false,
			'rest_base'             => $this->get_key(),
			'rest_namespace'        => 'wp/v2',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'menu_position'         => null,
			'menu_icon'             => null,
			'capability_type'       => 'post',
			'capabilities'          => array(),
			'map_meta_cap'          => null,
			'supports'              => array( 'title', 'editor' ),
			'register_meta_box_cb'  => null,
			'taxonomies'            => array(),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'can_export'            => true,
			'delete_with_user'      => null,
			'template'              => array(),
			'template_lock'         => false,
		);
	}

	/**
	 * Get the arguments
	 *
	 * Get the registerable's merged specialised and default arguments.
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
	 * Register the Custom Post Type
	 *
	 * Register the cpt with WordPress.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/register_post_type
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function register(): void {
		register_post_type( $this->get_key(), $this->get_args() );
	}
}

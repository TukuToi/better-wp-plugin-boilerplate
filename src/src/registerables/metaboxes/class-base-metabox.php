<?php
/**
 * The Base Metabox class file
 *
 * This file registers the Base Metabox class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Base Metabox Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Registerables\Metaboxes
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
namespace Company\Plugins\PluginName\Registerables\Metaboxes;

use Company\Plugins\PluginName\Registerables\Base_WP_Registerable;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Base Metabox Class
 *
 * Base Metabox class provides abstracts and methods to register a new Metabox.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Registerables\Metaboxes
 * @author  Your Name <your-name@site.tld>
 */
abstract class Base_Metabox extends Base_WP_Registerable {

	/**
	 * Post types to assign metabox
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $post_types Array of the post types to assign the metabox to.
	 */
	protected array $post_types = array();

	/**
	 * User Roles to assign metabox
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $user_roles Array of the user roles to assign the metabox to.
	 */
	protected array $user_roles = array();

	/**
	 * Taxonomies to assign metabox
	 *
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $taxonomies Array of the taxonomies to assign the metabox to.
	 */
	protected array $taxonomies = array();

	/**
	 * Abstract method to render metabox
	 *
	 * Provides an abstract to render the metabox
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array
	 */
	abstract public function render(): void;

	/**
	 * Register Metabox
	 *
	 * Registers the metabox with WordPress
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function register(): void {

		/**
		 * Register for Post types if any
		 */
		if ( ! empty( $this->post_types ) ) {
			add_action( 'add_meta_boxes', array( $this, 'register_metaboxes_for_post_types' ) );
		}

		/**
		 * Register for User Roles if any
		 */
		if ( ! empty( $this->user_roles ) ) {
			add_action( 'show_user_profile', array( $this, 'render' ) );
			add_action( 'edit_user_profile', array( $this, 'render' ) );
		}

		/**
		 * Register for Taxonomies if any
		 */
		foreach ( $this->taxonomies as $taxonomy ) {
			add_action( "{$taxonomy}_add_form_fields", array( $this, 'render' ) );
			add_action( "{$taxonomy}_edit_form_fields", array( $this, 'render' ) );
		}
	}

	/**
	 * Callback for Post Types
	 *
	 * True metaboxes are only available on Post Types.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/#parameters
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function register_metaboxes_for_post_types(): void {
		foreach ( $this->post_types as $post_type ) {
			add_meta_box(
				$this->get_key() . '_' . $post_type,
				ucwords( str_replace( '_', ' ', $this->get_key() ) ),
				array( $this, 'render' ),
				$post_type,
				'side',
				'high',
				null
			);
		}
	}
}

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
 * @package Plugins\PluginName\Registerables\Metaboxes
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
use Company\Plugins\PluginName\Core\Config;

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
 * @package Plugins\PluginName\Registerables\Metaboxes
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
	 * Context to add metabox
	 *
	 * Possible values are 'normal', 'side', and 'advanced'
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $context Associativ array of the context to add the metabox to, keyed by post type, value the context.
	 */
	protected array $context = array();

	/**
	 * Priority to add metabox
	 *
	 * Possible values are 'high', 'core', 'default', or 'low'
	 *
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @since  1.0.0 Introduced on 2023-08-02 14:14
	 * @author Your Name <your-name@site.tld>
	 * @access private
	 * @var array $priority Associativ array of the context to add the metabox to, keyed by post type, value the context.
	 */
	protected array $priority = array();

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
	 * Abstract method to initialise properties.
	 *
	 * Provides an abstract method to initialise meta box properties.
	 *
	 * @since 1.0.0 Introduced 2024-05-28 17:37
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	abstract protected function initialize_properties(): void;

	/**
	 * Abstract method to sanitize the POSTed data.
	 *
	 * Provides an abstract method to sanitize the posted data before saving it.
	 *
	 * @since 1.0.0 Introduced 2024-05-28 17:37
	 * @author Your Name <your-name@site.tld>
	 * @param  int|string|array $data The POSTed data.
	 * @return int|array|string
	 */
	abstract protected function sanitize_meta_box_data( int|string|array $data ): int|array|string;

	/**
	 * Abstract method to set callback args.
	 *
	 * Provides an abstract method to set the add_meta_box() second argument data array.
	 *
	 * @since 1.0.0 Introduced 2024-05-28 17:37
	 * @author Your Name <your-name@site.tld>
	 * @return array
	 */
	abstract protected function set_args(): array;

	/**
	 * Abstract method to render metabox
	 *
	 * Provides an abstract to render the metabox
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/#parameters
	 * @author Your Name <your-name@site.tld>
	 * @param object $obj The Current object to which the metabox is added.
	 * @param array  $args The Arguments passed to the callback.
	 * @return array
	 */
	abstract public function render( object $obj = new \stdClass(), array $args = array() ): void;

	/**
	 * Validate the key
	 *
	 * Validate $key for get_key().
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Your Name <your-name@site.tld>
	 * @throws \LengthException If the key length validation fails.
	 * @throws \UnexpectedValueException If the key sanitization fails.
	 * @return string The validated string.
	 */
	protected function validate_key(): string {
		if ( empty( $this->key ) ) {
			$this->set_key();
			$this->sanitize_key();
		}

		return $this->key;
	}

	/**
	 * Register Metabox
	 *
	 * Registers the metabox with WordPress
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	public function register(): void {
		$this->initialize_properties();
		$this->register_metaboxes();
		$this->register_save_hooks();
	}

	/**
	 * Register the metaboxes with WordPress
	 *
	 * @since 1.0.0 Introduced 2024-05-29 14:54
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	protected function register_metaboxes(): void {
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
	 * Register the saving hooks with WordPress
	 *
	 * @since 1.0.0 Introduced 2024-05-29 14:55
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	protected function register_save_hooks(): void {
		/**
		 * Register for Post types if any
		 */
		if ( ! empty( $this->post_types ) ) {
			add_action( 'save_post', array( $this, 'save_custom_post_meta_box_data' ) );
		}
	}

	/**
	 * Callback for Post Types metabox add action
	 *
	 * True metaboxes are only available on Post Types.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_meta_box/#parameters
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	public function register_metaboxes_for_post_types(): void {
		foreach ( $this->post_types as $post_type ) {
			add_meta_box(
				$this->get_key() . '_' . $post_type,
				ucwords( str_replace( '-', ' ', str_replace( Config::get( 'slug' ), '', $this->get_key() ) ) ),
				array( $this, 'render' ),
				$post_type,
				array_key_exists( $post_type, $this->context ) ? $this->context[ $post_type ] : 'advanced',
				array_key_exists( $post_type, $this->priority ) ? $this->context[ $post_type ] : 'default',
				$this->set_args()
			);
		}
	}

	/**
	 * Callback for Post Types saving action
	 *
	 * Saves the post metabox value to the database.
	 *
	 * @since 1.0.0 Introduced 2024-05-28 17:14
	 * @author Your Name <your-name@site.tld>
	 * @param  int $post_id The Post ID being saved.
	 * @return void
	 */
	public function save_custom_post_meta_box_data( int $post_id = 0 ): void {

		foreach ( $this->post_types as $post_type ) {

			if ( ! isset( $_POST['_wpnonce'] )
				|| ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['_wpnonce'] ) ), 'update-post_' . $post_id )
				|| ( defined( 'DOING_AUTOSAVE' )
					&& DOING_AUTOSAVE
				)
				|| ! isset( $_POST['post_type'] )
				|| $post_type !== $_POST['post_type']
				|| ! current_user_can( 'edit_post', $post_id )
			) {
				continue;
			}

			if ( isset( $_POST[ $this->get_key() ] ) ) {
				// phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
				$sanitized_data = $this->sanitize_meta_box_data( wp_unslash( $_POST[ $this->get_key() ] ) );
				update_post_meta( $post_id, $this->get_key(), $sanitized_data );
			} else {
				delete_post_meta( $post_id, $this->get_key() );
			}
		}
	}
}

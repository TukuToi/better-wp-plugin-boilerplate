<?php
/**
 * An example Metabox class file
 *
 * This file registers an example metabox class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Example Metabox Class Declaration
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
namespace Company\Plugins\PluginName\Registerables\MetaBoxes;

use Company\Plugins\PluginName\Registerables\Metaboxes\Base_Metabox;
use Company\Plugins\PluginName\Core\Config;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Example Metabox Class
 *
 * Example Metabox class registers a Number metabox for:
 * - posts, pages, items,
 * - administrators, editors,
 * - categories, tags, collections.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Metaboxes
 * @author  Your Name <your-name@site.tld>
 */
class Example_Metabox extends Base_Metabox {


	/**
	 * Initiate class properties
	 *
	 * Defines object types to which the metebox will be assigned
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	protected function initialize_properties(): void {

		$this->post_types = array( 'post', 'page', Config::get( 'slug' ) . '-item' );
		$this->context    = array(
			'post' => 'side',
			'page' => 'normal',
			'item' => 'advanced',
		);
		$this->priority   = array(
			'post' => 'high',
			'page' => 'core',
			'item' => 'low',
		);
		$this->user_roles = array( 'administrator', 'editor' );
		$this->taxonomies = array( 'category', 'post_tag', 'collection' );
	}

	/**
	 * Set registerable key
	 *
	 * Sets the metabox unique key.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Your Name <your-name@site.tld>
	 * @return void
	 */
	protected function set_key(): void {

		$this->key = Config::get( 'slug' ) . '-example';
	}

	/**
	 * Sanitize the POSTed data.
	 *
	 * The parent class already unslashes the POSTed data.
	 *
	 * @since 1.0.0 Introduced 2024-05-28 17:38
	 * @author Your Name <your-name@site.tld>
	 * @param  int|string|array $data The POSTed data, unslashed.
	 * @return int|string|array $data The Sanized data.
	 */
	protected function sanitize_meta_box_data( int|string|array $data ): int|string|array {

		return absint( $data );
	}

	/**
	 * The array of data passed to the second argument of add_meta_box callback
	 *
	 * The add_meta_box callback takes a second argument, an array of data, that is made available to the callback.
	 *
	 * @since 1.0.0 Introduced 2024-05-29 14:39
	 * @author Your Name <your-name@site.tld>
	 * @return array
	 */
	protected function set_args(): array {

		return array();
	}

	/**
	 * Render the metabox
	 *
	 * A metabox needs to be rendered. This can be as simple or as complex as required.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Your Name <your-name@site.tld>
	 * @param object $post The Currently edited WordPress Post Object.
	 * @param array  $args The Arguments passed to the callback.
	 * @return void
	 */
	public function render( object $post = new \WP_Post(), array $args = array() ): void {

		$saved_value = get_post_meta( $post->ID, $this->key, true );
		$value       = $saved_value ? esc_attr( $saved_value ) : '';
		echo '<input type="number" id="' . esc_attr( $this->key ) . '" name="' . esc_attr( $this->key ) . '" min="0" value="' . esc_attr( $value ) . '">';
	}
}

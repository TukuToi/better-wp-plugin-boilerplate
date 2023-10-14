<?php
/**
 * The Specialised Image Upload Metabox class file
 *
 * This file registers the Image Upload Metabox class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Image Upload Metabox Class Declaration
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

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Image Upload Metabox Class
 *
 * Image Upload Metabox class registers a Media Upload metabox for:
 * - posts, pages, items,
 * - administrators, editors,
 * - categories, tags, collections.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Metaboxes
 * @author  Your Name <your-name@site.tld>
 */
class Image_Upload_Metabox extends Base_Metabox {


	/**
	 * Initiate class properties
	 *
	 * Defines object types to which the metebox will be assigned
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function __construct() {
		$this->post_types = array( 'post', 'page', 'item' );
		$this->user_roles = array( 'administrator', 'editor' );
		$this->taxonomies = array( 'category', 'post_tag', 'collection' );
	}

	/**
	 * Set registerable key
	 *
	 * Sets the metabox unique key.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	protected function set_key(): void {
		$this->key = 'my-box';
	}

	/**
	 * Render the metabox
	 *
	 * A metabox needs to be rendered. This can be as simple or as complex as required.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function render(): void {
		echo '<input type="file" name="custom_image_upload" />';
	}
}

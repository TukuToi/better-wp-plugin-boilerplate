<?php
/**
 * The Example Shortcode class file
 *
 * This file registers the Example Shortcode class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Example Shortcode Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Shortcodes
 * @author  Your Name <your-name@site.tld>
 */

declare( strict_types = 1 );

namespace Company\Plugins\PluginName\Registerables\Shortcodes;

use Company\Plugins\PluginName\Registerables\Shortcodes\Base_Shortcode;
use Company\Plugins\PluginName\Core\Config;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Example Shortcode Class
 *
 * Example Shortcode class provides abstracts and methods to register a new WordPress shortcode.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Shortcodes
 * @author  Your Name <your-name@site.tld>
 */
final class Example_Shortcode extends Base_Shortcode {

	/**
	 * Set ShortCode attributes
	 *
	 * Set the ShortCode attributes and sanitization function.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 16:30
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array Associative attribte => [value, sanitization_fn] array of ShortCode attributes.
	 */
	protected function set_shortcode_atts(): array {
		return array(
			'foo'     => array( 'bar', 'sanitize_text_field' ),
			'fighter' => array( 1, 'absint' ),
		);
	}

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
		$this->key = Config::get( 'slug' ) . '-example';
	}

	/**
	 * Shortcode callback function to be implemented by child classes
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @param array  $atts    User defined attributes in shortcode tag.
	 * @param string $content If the shortcode is used as an enclosing tag (eg: [foo]content[/foo]).
	 * @param string $shortcode_tag The shortcode name.
	 * @return string
	 */
	public function shortcode_callback( $atts = array(), string $content = null, string $shortcode_tag = '' ): string {
		$atts = $this->get_shortcode_atts( (array) $atts );

		return "Value of foo: {$atts['foo']}. Value of baz: {$atts['fighter']}. Value of content: {$content}";
	}
}

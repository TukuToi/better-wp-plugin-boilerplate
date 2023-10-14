<?php
/**
 * The Base Shortcode class file
 *
 * This file registers the Base Shortcode class.
 * This file includes:
 * - Strict Typing declaration,
 * - Namespace declaration,
 * - Use declarations,
 * - Check for direct access,
 * - Base Shortcode Class Declaration
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Shortcodes
 * @author  Your Name <your-name@site.tld>
 */

declare( strict_types = 1 );

namespace Company\Plugins\PluginName\Registerables\Shortcodes;

use Company\Plugins\PluginName\Registerables\Base_WP_Registerable;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The Base Shortcode Class
 *
 * Base Shortcode class provides abstracts and methods to register a new WordPress shortcode.
 *
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName\Registerables\Shortcodes
 * @author  Your Name <your-name@site.tld>
 */
abstract class Base_Shortcode extends Base_WP_Registerable {

	/**
	 * Shortcode callback function to be implemented by child classes
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @param array  $atts    User defined attributes in shortcode tag.
	 * @param string $content If the shortcode is used as an enclosing tag (eg: [foo]content[/foo]).
	 * @param string $shortcode_tag The shortcode name.
	 * @return string
	 */
	abstract protected function shortcode_callback( array $atts = array(), string $content = null, string $shortcode_tag = '' ): string;

	/**
	 * Shortcode attributes to be set by child classes
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @return array
	 */
	abstract protected function set_shortcode_atts(): array;

	/**
	 * Get sanitized ShortCode attributes
	 *
	 * Returns array of sanitized ShortCode attributes.
	 *
	 * @since 1.0.0 Implemented 2023-10-11 18:07
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  array $atts The array of attributes submitted by the user.
	 * @return array
	 */
	protected function get_shortcode_atts( array $atts = array() ): array {
		$atts = shortcode_atts( $this->shortcode_att_defaults(), $atts, $this->get_key() );
		$atts = $this->sanitize_shortcode_att_values( $atts );
		return $atts;
	}

	/**
	 * Sanitized ShortCode attributes
	 *
	 * Returns array of sanitized ShortCode attributes.
	 *
	 * @since 1.0.0 Implemented 2023-10-11 18:07
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @param  array $atts The array of attributes submitted by the user.
	 * @return array
	 */
	private function sanitize_shortcode_att_values( array $atts = array() ) {
		foreach ( $atts as $att => $value ) {
			if ( array_key_exists( $att, $this->set_shortcode_atts() )
				&& function_exists( $this->set_shortcode_atts()[ $att ][1] )
			) {
				$atts[ $att ] = $this->set_shortcode_atts()[ $att ][1]( $atts[ $att ] );
			} else {
				$atts[ $att ] = '';
			}
		}
		return $atts;
	}

	/**
	 * Return ShortCode default atts
	 *
	 * Returns the ShortCode default attributes and values.
	 *
	 * @since 1.0.0 Introduced 2023-10-11 18:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return array $atts The default ShortCode attributes.
	 */
	private function shortcode_att_defaults() {

		foreach ( $this->set_shortcode_atts() as $att => $value_sanitize_array ) {
			$atts[ $att ] = $value_sanitize_array[0];
		}
		return $atts;
	}

	/**
	 * Validate the shortcode tag
	 *
	 * Validates the shortcode tag (no lenght, but sanitize_key is applied).
	 *
	 * @since 1.0.0 Introduced 2023-10-11 18:09
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return string $key The ShortCode tag.
	 */
	protected function validate_key(): string {
		if ( empty( $this->key ) ) {
			$this->set_key();
			$this->sanitize_key();
		}

		return $this->key;
	}

	/**
	 * Register the Shortcode with WordPress.
	 *
	 * @since 1.0.0 Introduced on 2023-10-08 17:09
	 * @see https://developer.wordpress.org/reference/functions/add_shortcode
	 * @author Beda Schmid <beda@tukutoi.com>
	 * @return void
	 */
	public function register(): void {
		add_shortcode( $this->get_key(), array( $this, 'shortcode_callback' ) );
	}
}

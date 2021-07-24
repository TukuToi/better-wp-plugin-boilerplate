<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two hooks to
 * enqueue the public-facing stylesheet and JavaScript.
 * As you add hooks and methods, update this description.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The unique prefix of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_prefix    The string used to uniquely prefix technical functions of this plugin.
	 */
	private $plugin_prefix;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name      The name of the plugin.
	 * @param      string $plugin_prefix          The unique prefix of this plugin.
	 * @param      string $version          The version of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_prefix, $version ) {

		$this->plugin_name   = $plugin_name;
		$this->plugin_prefix = $plugin_prefix;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, true );

	}

	/**
	 * Example of Shortcode processing function.
	 *
	 * Shortcode can take attributes like [plugin-name-shortcode attribute='123']
	 * Shortcodes can be enclosing content [plugin-name-shortcode attribute='123']custom content[/plugin-name-shortcode].
	 *
	 * @see https://developer.wordpress.org/plugins/shortcodes/enclosing-shortcodes/
	 *
	 * @since    1.0.0
	 * @param    array  $atts    ShortCode Attributes.
	 * @param    mixed  $content ShortCode enclosed content.
	 * @param    string $tag    The Shortcode tag.
	 */
	public function plugin_name_shortcode_func( $atts, $content = null, $tag ) {

		/**
		 * Combine user attributes with known attributes.
		 *
		 * @see https://developer.wordpress.org/reference/functions/shortcode_atts/
		 *
		 * Pass third paramter $shortcode to enable ShortCode Attribute Filtering.
		 * @see https://developer.wordpress.org/reference/hooks/shortcode_atts_shortcode/
		 */
		$atts = shortcode_atts(
			array(
				'attribute' => 123,
			),
			$atts,
			$this->plugin_prefix . 'shortcode'
		);

		/**
		 * Build our ShortCode output.
		 * Remember to sanitize all user input.
		 * In this case, we expect a integer value to be passed to the ShortCode attribute.
		 *
		 * @see https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/
		 */
		$out = intval( $atts['attribute'] );

		/**
		 * If the shortcode is enclosing, we may want to do something with $content
		 */
		if ( ! is_null( $content ) && ! empty( $content ) ) {
			$out = do_shortcode( $content );// We can parse shortcodes inside $content.
			$out = intval( $atts['attribute'] ) . ' ' . sanitize_text_field( $out );// Remember to sanitize your user input.
		}

		// ShortCodes are filters and should always return, never echo.
		return $out;

	}

}

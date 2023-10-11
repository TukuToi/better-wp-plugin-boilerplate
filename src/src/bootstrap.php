<?php
/**
 * Bootstrap the Plugin functionalities.
 *
 * This file instantiates all classes of the Plugin.
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Company\Plugins\PluginName\Vendor
 * @author  Your Name <your-name@site.tld>
 */

/**
 * Declare strict typing
 *
 * @see https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict
 */
declare( strict_types = 1 );

/**
 * Declare the namespace and mport global functions
 *
 * @see https://www.php.net/manual/en/language.namespaces.php
 * @see https://www.php.net/manual/en/language.namespaces.importing.php
 */
namespace Company\Plugins\PluginName;

use Company\Plugins\PluginName\Registerables\CPT\Item_CPT;
use Company\Plugins\PluginName\Registerables\MetaBoxes\Image_Upload_Metabox;
use Company\Plugins\PluginName\Registerables\Taxonomies\Collection_Taxonomy;

/**
 * Exit the code if this file is accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initialise all services
 */
( new Item_CPT() )->register();
( new Image_Upload_Metabox() )->register();
( new Collection_Taxonomy() )->register();
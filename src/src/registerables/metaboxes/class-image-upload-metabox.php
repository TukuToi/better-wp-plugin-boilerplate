<?php

declare(strict_types=1);

namespace Company\Plugins\PluginName\Registerables\MetaBoxes;

use Company\Plugins\PluginName\Registerables\Metaboxes\Base_Metabox;

if (!defined('ABSPATH')) {
    exit;
}

class Image_Upload_Metabox extends Base_Metabox {


    public function __construct() {
        // Define the post types, user roles, and taxonomies where the metabox should be added
        $this->post_types = ['post', 'page', 'item'];
        $this->user_roles = ['administrator', 'editor'];
        $this->taxonomies = ['category', 'post_tag', 'collection'];
    }

	protected function set_key(): void {
        $this->key = 'my-box';
    }
	
    public function render(): void {
        echo '<input type="file" name="custom_image_upload" />';
    }
}

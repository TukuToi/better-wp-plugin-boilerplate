<?php

declare(strict_types=1);

namespace Company\Plugins\PluginName\Registerables\Metaboxes;

use Company\Plugins\PluginName\Registerables\Base_WP_Registerable;

if (!defined('ABSPATH')) {
    exit;
}

abstract class Base_Metabox extends Base_WP_Registerable {
    protected array $post_types = [];
    protected array $user_roles = [];
    protected array $taxonomies = [];

    abstract public function render(): void;

    public function register(): void {
        if (!empty($this->post_types)) {
			add_action('add_meta_boxes', [$this, 'register_metaboxes_for_post_types']);
		}

        // Register metabox for users
        if (!empty($this->user_roles)) {
            add_action('show_user_profile', [$this, 'render']);
            add_action('edit_user_profile', [$this, 'render']);
        }

        // Register metabox for taxonomies
        foreach ($this->taxonomies as $taxonomy) {
            add_action("{$taxonomy}_add_form_fields", [$this, 'render']);
            add_action("{$taxonomy}_edit_form_fields", [$this, 'render']);
        }
    }

	public function register_metaboxes_for_post_types(): void {
		foreach ($this->post_types as $post_type) {
			add_meta_box(
				$this->get_key() . '_' . $post_type,
				ucwords(str_replace('_', ' ', $this->get_key())),
				[$this, 'render'],
				$post_type, 
				'side', 
				'high', 
				null
			);
		}
	}

    // Additional methods to set the post types, user roles, and taxonomies can be added if needed
}

<?php
/**
 * Plugin manifest class.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use \Hrithik\Features\Inc\Traits\Singleton;

/**
 * Class Plugin
 */
class Plugin {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load plugin classes.
		Assets::get_instance();
		Post_Types::get_instance();
		Taxonomies::get_instance();
		Meta_Boxes::get_instance();
		Widgets::get_instance();
		Rewrite::get_instance();
		Plugin_Configs::get_instance();
		SEO::get_instance();
		Blocks::get_instance();
		Elementor_Widgets::get_instance();

	}

}

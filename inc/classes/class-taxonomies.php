<?php
/**
 * To load all classes that register taxonomy.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use \Hrithik\Features\Inc\Traits\Singleton;
use \Hrithik\Features\Inc\Taxonomies\Taxonomy_Example;

/**
 * Class Taxonomies
 */
class Taxonomies {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all taxonomies classes.
		Taxonomy_Example::get_instance();

	}

}

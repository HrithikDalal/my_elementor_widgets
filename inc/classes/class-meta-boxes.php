<?php
/**
 * To load all classes that register meta box.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use Hrithik\Features\Inc\Meta_Boxes\Metabox_Example_2;
use Hrithik\Features\Inc\Traits\Singleton;
use Hrithik\Features\Inc\Meta_Boxes\Metabox_Example;

/**
 * Class Meta_Boxes
 */
class Meta_Boxes {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all meta boxes classes.
		Metabox_Example::get_instance();
		Metabox_Example_2::get_instance();

	}

}

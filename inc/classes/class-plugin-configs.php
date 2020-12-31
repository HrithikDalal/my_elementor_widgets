<?php
/**
 * To load all classes of third party plugin configuration.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use Hrithik\Features\Inc\Traits\Singleton;
use Hrithik\Features\Inc\Plugin_Configs\Fieldmanager;

/**
 * Class Plugin_Configs
 */
class Plugin_Configs {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		// Load all plugin configs classes.
		Fieldmanager::get_instance();

	}

}

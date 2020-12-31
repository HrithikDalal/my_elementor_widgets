<?php
/**
 * Rewrite class.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use Hrithik\Features\Inc\Traits\Singleton;

/**
 * Class Rewrite
 */
class Rewrite {

	use Singleton;

	/**
	 * Construct method.
	 */
	protected function __construct() {

		$this->setup_hooks();

	}

	/**
	 * To setup action/filter.
	 *
	 * @return void
	 */
	protected function setup_hooks() {}

}

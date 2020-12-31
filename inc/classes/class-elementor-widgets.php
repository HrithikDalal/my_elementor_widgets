<?php
/**
 * To load all classes that register elementor widget.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc;

use \Elementor\Plugin;
use \Elementor\Element_Base;


use Hrithik\Features\Inc\Traits\Singleton;
use Hrithik\Features\Inc\Elementor_Widgets\Upcoming_Events;



/**
 * Class Elementor Widgets.
 */
class Elementor_Widgets {

	use Singleton;

	/**
	 * Construct method.
	 */
	public function __construct() {

		$this->setup_elementor();

	}

	/**
	 * Setup hooks.
	 *
	 * @return void
	 */
	public function setup_elementor() {

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'widgets_registered' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

	}

	/**
	 * Add Custom Hrithik Category.
	 *
	 * @param object $elements_manager Elements Manager Object.
	 *
	 * @action elementor/elements/categories_registered
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'hrithik',
			[
				'title' => __( 'Hrithik', 'hrithik-features' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}

	/**
	 * Register Widgets.
	 *
	 * Add custom registered Elementor widgets.
	 *
	 * @action elementor/widgets/widgets_registered
	 */
	public function widgets_registered() {

		Plugin::instance()->widgets_manager->register_widget_type( new Upcoming_Events() );

	}
}

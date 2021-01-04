/**
 * Upcoming Events Card Scripts.
 *
 * @package hrithik-features
 */

import '../../scss/elementor-widgets/_upcoming-events.scss';


class UpcomingEvents extends elementorModules.frontend.handlers.Base {

	/**
	 * This method is used to add any custom settings to be used in the widget’s JS handler.
	 *
	 * @return {{selectors: {testButton: string, container: string}}}
	 */
	getDefaultSettings() {
		return {
			selectors: {
				testButton: '.upcoming-events__button',
				container: '.upcoming-event'
			}
		};
	}

	/**
	 * This method is used to create jQuery objects of the HTML elements targeted by the JS handler.
	 *
	 * @return {{$testButton: *, $container: *}}
	 */
	getDefaultElements() {
		const selectors = this.getSettings( 'selectors' );

		return {
			$testButton: this.$element.find( selectors.testButton ),
			$container: this.$element.find( selectors.container )
		};
	}

	/**
	 * This method is used to add event listeners for widget-related events.
	 *
	 * @return {void}
	 */
	bindEvents() {

		this.elements.$testButton.on( 'click', this.handleClicks.bind( this ) );

	}

	/**
	 * Handle Click.
	 *
	 * @param {Object} event Event Object.
	 */
	handleClicks( event ) {

		event.preventDefault();
		this.elements.$container.toggleClass( 'js-test' );
	}

}

/**
 * Registering the Widget Handler with Elementor
 */
jQuery( window ).on(
	'elementor/frontend/init',
	() => {

		const UpcomingEventsHandler = ( $element ) => {

			elementorFrontend.elementsHandler.addHandler(
				UpcomingEvents,
				{
					$element
				}
			);

		};

		elementorFrontend.hooks.addAction(
			'frontend/element_ready/upcoming-events.default',
			UpcomingEventsHandler
		);
	}
);

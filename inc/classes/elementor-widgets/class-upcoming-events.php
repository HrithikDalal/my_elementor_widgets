<?php
/**
 * Register Custom Widget - Upcoming Events Card.
 *
 * Custom Widget has event type, event name, event date, event location, event description and register now button as custom fields.
 * Using on webinar and workshops elementor page.
 *
 * @package hrithik-features
 */

namespace Hrithik\Features\Inc\Elementor_Widgets;

use \Elementor\Controls_Manager;
/**
 * Class Upcoming_Events
 */
class Upcoming_Events extends Base {
	/**
	 * Construct method.
	 *
	 * @param array      $data Widget data. Default is an empty array.
	 * @param array|null $args Optional. Widget default arguments. Default is null.
	 *
	 * @throws \Exception If arguments are missing when initializing a full widget instance.
	 */
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'upcoming-events-css', sprintf( '%s/assets/build/css/elementor-widgets/upcoming-events.css', untrailingslashit( HRITHIK_FEATURES_URL ) ), [], HRITHIK_FEATURES_VERSION );

	}

	/**
	 * Default config for Upcoming Events.
	 *
	 * @return array
	 */
	public function set_default_config() {
		return [
			'name'            => 'upcoming-events',
			'title'           => _x( 'Upcoming Events', 'Widget Title', 'hrithik-features' ),
			'icon'            => 'eicon-info-box',
			'categories'      => [ 'hrithik' ],
			'keywords'        => [ 'event', 'webinar', 'workshop', 'upcoming' ],
			'depended_styles' => [ 'upcoming-events-css' ],
		];
	}

	/**
	 * Register Upcoming Events widget controls.
	 *
	 * @access protected
	 */
	protected function _register_controls() { // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore -- Code from Elementor.

		$this->start_controls_section(
			'content_setting',
			[
				'label' => __( 'Content', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'show_gradient_bar',
			[
				'label'   => __( 'Show Gradient Bar', 'hrithik-features' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'event_type',
			[
				'label'       => __( 'Event Type', 'hrithik-features' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Event Type', 'hrithik-features' ),
				'placeholder' => __( 'Enter event type', 'hrithik-features' ),
				'label_block' => true,
				'separator'   => 'before',
			]
		);

		$this->add_control(
			'event_name',
			[
				'label'       => __( 'Event Name', 'hrithik-features' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Name of the Event', 'hrithik-features' ),
				'placeholder' => __( 'Enter event name', 'hrithik-features' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'event_date',
			[
				'label'       => __( 'Event Date', 'hrithik-features' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Event Date', 'hrithik-features' ),
				'placeholder' => __( 'Enter event date and time', 'hrithik-features' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'event_location',
			[
				'label'       => __( 'Event Location', 'hrithik-features' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Event Location', 'hrithik-features' ),
				'placeholder' => __( 'Enter event location', 'hrithik-features' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'event_description',
			[
				'label'       => __( 'Event Description', 'hrithik-features' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'hrithik-features' ),
				'placeholder' => __( 'Enter event description', 'hrithik-features' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'button',
			[
				'label'     => __( 'Button Text', 'hrithik-features' ),
				'type'      => Controls_Manager::TEXT,
				'dynamic'   => [
					'active' => true,
				],
				'default'   => __( 'Register Now', 'hrithik-features' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => __( 'Link', 'hrithik-features' ),
				'type'        => Controls_Manager::URL,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'hrithik-features' ),

			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Upcoming Events widget output on the frontend.
	 *
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( empty( $settings['event_name'] ) ) {

			esc_html_e( 'Configure \'Upcoming Event\' Widget.', 'hrithik-features' );

			return false;

		}

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'link', $settings['link'], true );
		}

		$this->add_inline_editing_attributes( 'event_type' );
		$this->add_inline_editing_attributes( 'event_name' );
		$this->add_inline_editing_attributes( 'event_date' );
		$this->add_inline_editing_attributes( 'event_location' );
		$this->add_inline_editing_attributes( 'button' );

		$this->add_render_attribute(
			'event_type',
			'class',
			[
				'upcoming-event__type',
			]
		);

		$this->add_render_attribute(
			'event_name',
			'class',
			[
				'upcoming-event__name',
			]
		);

		$this->add_render_attribute(
			'event_date',
			'class',
			[
				'upcoming-event__date',
			]
		);

		$this->add_render_attribute(
			'event_location',
			'class',
			[
				'upcoming-event__location',
			]
		);

		$this->add_render_attribute(
			'event_description',
			'class',
			[
				'upcoming-event__description',
			]
		);

		$this->add_render_attribute(
			'button',
			'class',
			[
				'button__text',
			]
		);

		// phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped -- Code from elementor.
		?>
		<div class="upcoming-event">

			<?php if ( 'yes' === $settings['show_gradient_bar'] ) : ?>
				<div class="theme-gradient"></div>
			<?php endif; ?>

			<div class="upcoming-event__content">
				<?php if ( ! empty( $settings['event_type'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'event_type' ); ?>>
					<?php echo $settings['event_type']; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['event_name'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'event_name' ); ?>>
					<?php echo $settings['event_name']; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['event_date'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'event_date' ); ?>>
					<?php echo $settings['event_date']; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['event_location'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'event_location' ); ?>>
					<?php echo $settings['event_location']; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['event_description'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'event_description' ); ?>>
					<?php echo $settings['event_description']; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $settings['button'] ) ) : ?>
				<div class="upcoming-events__button">
					<a <?php echo $this->get_render_attribute_string( 'link' ); ?>>
						<span <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo $settings['button']; ?> <i class="fa fa-arrow-right"></i></span>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}
}

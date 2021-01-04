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
use Elementor\Core\Schemes;
use Elementor\Group_Control_Typography;
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

		$this->start_controls_section(
			'section_content_style',
			[
				'label'      => __( 'Content', 'hrithik-features' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'event_type',
							'operator' => '!==',
							'value'    => '',
						],
						[
							'name'     => 'event_name',
							'operator' => '!==',
							'value'    => '',
						],
						[
							'name'     => 'event_description',
							'operator' => '!==',
							'value'    => '',
						],
					],
				],
			]
		);

		$this->add_control(
			'event_type_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Event Type', 'hrithik-features' ),
				'condition' => [
					'event_type!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'event_type_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .elementor-cta__type',
				'condition' => [
					'event_type!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'event_type_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__type:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'type_color_tabs' );

		$this->start_controls_tab(
			'type_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_type_color',
			[
				'label'     => __( 'Type Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__type' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_type!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'event_type_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_type_color_hover',
			[
				'label'     => __( 'Type Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__type:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_type!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'event_name_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Event Name', 'hrithik-features' ),
				'condition' => [
					'event_name!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'event_name_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_1,
				'selector'  => '{{WRAPPER}} .elementor-cta__name',
				'condition' => [
					'event_name!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'event_name_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__name:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'event_name!' => '',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'name_color_tabs' );

		$this->start_controls_tab(
			'name_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_name_color',
			[
				'label'     => __( 'Name Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__name' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_name!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'event_name_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_name_color_hover',
			[
				'label'     => __( 'Name Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__name:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_name!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'event_date_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Event Date', 'hrithik-features' ),
				'condition' => [
					'event_date!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'event_date_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_2,
				'selector'  => '{{WRAPPER}} .elementor-cta__date',
				'condition' => [
					'event_date!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'event_date_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__date:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'event_date!' => '',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'date_color_tabs' );

		$this->start_controls_tab(
			'date_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_date_color',
			[
				'label'     => __( 'Date Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__date' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_date!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'event_date_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_date_color_hover',
			[
				'label'     => __( 'Date Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__date:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_date!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'event_location_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Event Location', 'hrithik-features' ),
				'condition' => [
					'event_location!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'event_location_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_2,
				'selector'  => '{{WRAPPER}} .elementor-cta__location',
				'condition' => [
					'event_location!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'event_location_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__location:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'event_location!' => '',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'location_color_tabs' );

		$this->start_controls_tab(
			'location_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_location_color',
			[
				'label'     => __( 'Location Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__location' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_location!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'event_location_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_location_color_hover',
			[
				'label'     => __( 'Location Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__location:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_location!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'event_description_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Event Description', 'hrithik-features' ),
				'condition' => [
					'event_description!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'event_description_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_3,
				'selector'  => '{{WRAPPER}} .elementor-cta__description',
				'condition' => [
					'event_description!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'event_description_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'event_description!' => '',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'description_color_tabs' );

		$this->start_controls_tab(
			'description_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_description_color',
			[
				'label'     => __( 'Description Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__description' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_description!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'event_description_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'event_description_color_hover',
			[
				'label'     => __( 'Description Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__description:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'event_description!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'button-text_style',
			[
				'type'      => Controls_Manager::HEADING,
				'label'     => __( 'Button Text', 'hrithik-features' ),
				'condition' => [
					'button!' => '',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'button-text_typography',
				'scheme'    => Schemes\Typography::TYPOGRAPHY_3,
				'selector'  => '{{WRAPPER}} .elementor-cta__button_text',
				'condition' => [
					'button!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'button_text_spacing',
			[
				'label'           => __( 'Spacing', 'hrithik-features' ),
				'type'            => Controls_Manager::SLIDER,
				'selectors'       => [
					'{{WRAPPER}} .elementor-cta__button_text:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition'       => [
					'button!' => '',
				],
				'condition'       => [
					'event_type!' => '',
				],
				'devices'         => [
					'desktop',
					'tablet',
					'mobile',
				],
				'desktop_default' => [
					'size' => 20,
					'unit' => 'px',
				],
				'tablet_default'  => [
					'size' => 15,
					'unit' => 'px',
				],
				'mobile_default'  => [
					'size' => 10,
					'unit' => 'px',
				],
			]
		);

		$this->start_controls_tabs( 'button_text_color_tabs' );

		$this->start_controls_tab(
			'button_colors_normal',
			[
				'label' => __( 'Normal', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__button_text' => 'color: {{VALUE}}',
				],
				'condition' => [
					'button!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'button_text_hover_color',
			[
				'label' => __( 'Hover', 'hrithik-features' ),
			]
		);

		$this->add_control(
			'button_text_color_hover',
			[
				'label'     => __( 'Text Color', 'hrithik-features' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-cta__button_text:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'button!' => '',
				],
			]
		);


		$this->end_controls_tab();

		$this->end_controls_tabs();



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
		$this->add_inline_editing_attributes( 'event_description' );
		$this->add_inline_editing_attributes( 'button' );

		$this->add_render_attribute(
			'event_type',
			'class',
			[
				'upcoming-event__type',
				'elementor-cta__type',
			]
		);

		$this->add_render_attribute(
			'event_name',
			'class',
			[
				'upcoming-event__name',
				'elementor-cta__name',
			]
		);

		$this->add_render_attribute(
			'event_date',
			'class',
			[
				'upcoming-event__date',
				'elementor-cta__date',
			]
		);

		$this->add_render_attribute(
			'event_location',
			'class',
			[
				'upcoming-event__location',
				'elementor-cta__location',
			]
		);

		$this->add_render_attribute(
			'event_description',
			'class',
			[
				'upcoming-event__description',
				'elementor-cta__description',
			]
		);

		$this->add_render_attribute(
			'button',
			'class',
			[
				'button__text',
				'elementor-cta__button_text',
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

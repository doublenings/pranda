<?php
/*
 * Elementor Events Addon for Elementor Testimonials Widget
 * Author & Copyright: NicheAddon
*/

namespace Elementor;

if ( !is_plugin_active( 'events-addon-for-elementor-pro/events-addon-for-elementor-pro.php' ) ) {

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	class Event_Elementor_Addon_Testimonials extends Widget_Base{

		/**
		 * Retrieve the widget name.
		*/
		public function get_name(){
			return 'naevents_basic_testimonials';
		}

		/**
		 * Retrieve the widget title.
		*/
		public function get_title(){
			return esc_html__( 'Testimonials', 'events-addon-for-elementor' );
		}

		/**
		 * Retrieve the widget icon.
		*/
		public function get_icon() {
			return 'eicon-testimonial';
		}

		/**
		 * Retrieve the list of categories the widget belongs to.
		*/
		public function get_categories() {
			return ['naevents-basic-category'];
		}

		/**
		 * Register Events Addon for Elementor Testimonials widget controls.
		 * Adds different input fields to allow the user to change and customize the widget settings.
		*/
		protected function _register_controls(){

			$this->start_controls_section(
				'section_testimonials',
				[
					'label' => __( 'Testimonials Item', 'events-addon-for-elementor' ),
				]
			);

			$this->add_control(
				'center_item',
				[
					'label' => esc_html__( 'Need All Center?', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'events-addon-for-elementor' ),
					'label_off' => esc_html__( 'No', 'events-addon-for-elementor' ),
					'return_value' => 'true',
				]
			);
			$this->add_responsive_control(
				'info_position',
				[
					'label' => esc_html__( 'Info Position', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'top' => [
							'title' => esc_html__( 'Top', 'events-addon-for-elementor' ),
							'icon' => 'fa fa-arrow-circle-up',
						],
						'bottom' => [
							'title' => esc_html__( 'Bottom', 'events-addon-for-elementor' ),
							'icon' => 'fa fa-arrow-circle-down',
						],
					],
					'default' => 'bottom',
				]
			);
			$this->add_control(
				'testimonials_icon',
				[
					'label' => esc_html__( 'Select Quote Icon', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::ICON,
					'options' => NAEEP_Controls_Helper_Output::get_include_icons(),
					'frontend_available' => true,
					'default' => 'fa fa-quote-left',
				]
			);
			$this->add_control(
				'testimonials_image',
				[
					'label' => esc_html__( 'Upload Image', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::MEDIA,
					'frontend_available' => true,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
					'description' => esc_html__( 'Set your image.', 'events-addon-for-elementor'),
				]
			);
			$this->add_control(
				'testimonials_title',
				[
					'label' => esc_html__( 'Name', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Cathrine Wagner', 'events-addon-for-elementor' ),
					'placeholder' => esc_html__( 'Type title text here', 'events-addon-for-elementor' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'testimonials_title_link',
				[
					'label' => esc_html__( 'Name Link', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'default' => [
						'url' => '',
					],
					'label_block' => true,
				]
			);
			$this->add_control(
				'testimonials_designation',
				[
					'label' => esc_html__( 'Designation Text', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'General Manager', 'events-addon-for-elementor' ),
					'placeholder' => esc_html__( 'Type title text here', 'events-addon-for-elementor' ),
					'label_block' => true,
				]
			);
			$this->add_control(
				'testimonials_content',
				[
					'label' => esc_html__( 'Content', 'events-addon-for-elementor' ),
					'default' => esc_html__( 'A man of means then along come to they got nothin but their jeans now were up in the big leagues.', 'events-addon-for-elementor' ),
					'placeholder' => esc_html__( 'Type your content here', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
				]
			);

			$this->add_responsive_control(
				'section_alignment',
				[
					'label' => esc_html__( 'Alignment', 'events-addon-for-elementor' ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', 'events-addon-for-elementor' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'events-addon-for-elementor' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'events-addon-for-elementor' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'left',
					'selectors' => [
						'{{WRAPPER}} .naeep-testimonial-item' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();// end: Section

			// Section
				$this->start_controls_section(
					'sectn_style',
					[
						'label' => esc_html__( 'Section', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
				$this->add_control(
					'section_margin',
					[
						'label' => __( 'Margin', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'section_padding',
					[
						'label' => __( 'Padding', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->start_controls_tabs( 'secn_style' );
					$this->start_controls_tab(
						'secn_normal',
						[
							'label' => esc_html__( 'Normal', 'events-addon-for-elementor' ),
						]
					);
					$this->add_control(
						'secn_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'events-addon-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .naeep-testimonial-item' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'secn_border',
							'label' => esc_html__( 'Border', 'events-addon-for-elementor' ),
							'selector' => '{{WRAPPER}} .naeep-testimonial-item',
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'secn_box_shadow',
							'label' => esc_html__( 'Section Box Shadow', 'events-addon-for-elementor' ),
							'selector' => '{{WRAPPER}} .naeep-testimonial-item',
						]
					);
					$this->end_controls_tab();  // end:Normal tab

					$this->start_controls_tab(
						'secn_hover',
						[
							'label' => esc_html__( 'Hover', 'events-addon-for-elementor' ),
						]
					);
					$this->add_control(
						'secn_bg_hover_color',
						[
							'label' => esc_html__( 'Background Color', 'events-addon-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .naeep-testimonial-item.naeep-hover' => 'background-color: {{VALUE}};',
							],
						]
					);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'secn_hover_border',
							'label' => esc_html__( 'Border', 'events-addon-for-elementor' ),
							'selector' => '{{WRAPPER}} .naeep-testimonial-item.naeep-hover',
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'secn_hover_box_shadow',
							'label' => esc_html__( 'Section Box Shadow', 'events-addon-for-elementor' ),
							'selector' => '{{WRAPPER}} .naeep-testimonial-item.naeep-hover',
						]
					);
					$this->end_controls_tab();  // end:Hover tab
				$this->end_controls_tabs(); // end tabs

				$this->end_controls_section();// end: Section

			// Quote Icon
				$this->start_controls_section(
					'section_icon_style',
					[
						'label' => esc_html__( 'Quote Icon', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
				$this->add_control(
					'icon_color',
					[
						'label' => esc_html__( 'Icon Color', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'scheme' => [
							'type' => Scheme_Color::get_type(),
							'value' => Scheme_Color::COLOR_2,
						],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon i' => 'color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'icon_bgcolor',
					[
						'label' => esc_html__( 'Background Color', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'background-color: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'icon_border_radius',
					[
						'label' => __( 'Border Radius', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'icon_size',
					[
						'label' => esc_html__( 'Icon Size', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'icon_lheight',
					[
						'label' => esc_html__( 'Icon width & Height', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon i' => 'line-height: {{SIZE}}{{UNIT}};',
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'icon_position',
					[
						'label' => esc_html__( 'Iocn Position', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'unset' => esc_html__( 'Default', 'events-addon-for-elementor' ),
							'absolute' => esc_html__( 'Absolute', 'events-addon-for-elementor' ),
						],
						'default' => 'unset',
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'position: {{VALUE}};',
						],
					]
				);
				$this->add_control(
					'icon_left',
					[
						'label' => esc_html__( 'Icon Left', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => -1000,
								'max' => 1000,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'left: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_position' => array('absolute'),
						],
					]
				);
				$this->add_control(
					'icon_right',
					[
						'label' => esc_html__( 'Icon Right', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => -1000,
								'max' => 1000,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'right: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_position' => array('absolute'),
						],
					]
				);
				$this->add_control(
					'icon_top',
					[
						'label' => esc_html__( 'Icon Top', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => -1000,
								'max' => 1000,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'top: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_position' => array('absolute'),
						],
					]
				);
				$this->add_control(
					'icon_bottom',
					[
						'label' => esc_html__( 'Icon Bottom', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => -1000,
								'max' => 1000,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-icon' => 'bottom: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'icon_position' => array('absolute'),
						],
					]
				);
				$this->end_controls_section();// end: Section

			// Image
				$this->start_controls_section(
					'section_image_style',
					[
						'label' => esc_html__( 'Image', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
				$this->add_control(
					'image_padding',
					[
						'label' => __( 'Padding', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_control(
					'image_border_radius',
					[
						'label' => __( 'Border Radius', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name' => 'image_border',
						'label' => esc_html__( 'Border', 'events-addon-for-elementor' ),
						'selector' => '{{WRAPPER}} .naeep-testimonial-item .naeep-image img',
					]
				);
				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name' => 'image_box_shadow',
						'label' => esc_html__( 'Section Box Shadow', 'events-addon-for-elementor' ),
						'selector' => '{{WRAPPER}} .naeep-testimonial-item .naeep-image img',
					]
				);
				$this->add_control(
					'image_width',
					[
						'label' => esc_html__( 'Image width', 'events-addon-for-elementor' ),
						'type' => Controls_Manager::SLIDER,
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 500,
								'step' => 1,
							],
						],
						'size_units' => [ 'px' ],
						'selectors' => [
							'{{WRAPPER}} .naeep-testimonial-item .naeep-image img' => 'max-width: {{SIZE}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_section();// end: Section

			// Title
				$this->start_controls_section(
					'section_title_style',
					[
						'label' => esc_html__( 'Title', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'label' => esc_html__( 'Typography', 'events-addon-for-elementor' ),
							'name' => 'sastestimonial_title_typography',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'selector' => '{{WRAPPER}} .naeep-testimonial-item h4',
						]
					);
					$this->start_controls_tabs( 'testimonials_title_style' );
						$this->start_controls_tab(
							'title_normal',
							[
								'label' => esc_html__( 'Normal', 'events-addon-for-elementor' ),
							]
						);
						$this->add_control(
							'title_color',
							[
								'label' => esc_html__( 'Color', 'events-addon-for-elementor' ),
								'type' => Controls_Manager::COLOR,
								'scheme' => [
									'type' => Scheme_Color::get_type(),
									'value' => Scheme_Color::COLOR_1,
								],
								'selectors' => [
									'{{WRAPPER}} .naeep-testimonial-item h4, {{WRAPPER}} .naeep-testimonial-item h4 a' => 'color: {{VALUE}};',
								],
							]
						);
						$this->end_controls_tab();  // end:Normal tab

						$this->start_controls_tab(
							'title_hover',
							[
								'label' => esc_html__( 'Hover', 'events-addon-for-elementor' ),
							]
						);
						$this->add_control(
							'title_hov_color',
							[
								'label' => esc_html__( 'Color', 'events-addon-for-elementor' ),
								'type' => Controls_Manager::COLOR,
								'scheme' => [
									'type' => Scheme_Color::get_type(),
									'value' => Scheme_Color::COLOR_2,
								],
								'selectors' => [
									'{{WRAPPER}} .naeep-testimonial-item h4 a:hover' => 'color: {{VALUE}};',
								],
							]
						);
						$this->end_controls_tab();  // end:Hover tab
					$this->end_controls_tabs(); // end tabs
				$this->end_controls_section();// end: Section

			// Designation
				$this->start_controls_section(
					'section_subtitle_style',
					[
						'label' => esc_html__( 'Designation', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'label' => esc_html__( 'Typography', 'events-addon-for-elementor' ),
							'name' => 'subtitle_typography',
							'scheme' => Scheme_Typography::TYPOGRAPHY_2,
							'selector' => '{{WRAPPER}} .naeep-testimonial-item h5',
						]
					);
					$this->add_control(
						'subtitle_color',
						[
							'label' => esc_html__( 'Color', 'events-addon-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'scheme' => [
								'type' => Scheme_Color::get_type(),
								'value' => Scheme_Color::COLOR_2,
							],
							'selectors' => [
								'{{WRAPPER}} .naeep-testimonial-item h5' => 'color: {{VALUE}};',
							],
						]
					);
				$this->end_controls_section();// end: Section

			// Content
				$this->start_controls_section(
					'section_content_style',
					[
						'label' => esc_html__( 'Content', 'events-addon-for-elementor' ),
						'tab' => Controls_Manager::TAB_STYLE,
					]
				);
					$this->add_group_control(
						Group_Control_Typography::get_type(),
						[
							'label' => esc_html__( 'Typography', 'events-addon-for-elementor' ),
							'name' => 'content_typography',
							'scheme' => Scheme_Typography::TYPOGRAPHY_3,
							'selector' => '{{WRAPPER}} .naeep-testimonial-item p',
						]
					);
					$this->add_control(
						'content_color',
						[
							'label' => esc_html__( 'Color', 'events-addon-for-elementor' ),
							'type' => Controls_Manager::COLOR,
							'scheme' => [
								'type' => Scheme_Color::get_type(),
								'value' => Scheme_Color::COLOR_3,
							],
							'selectors' => [
								'{{WRAPPER}} .naeep-testimonial-item p' => 'color: {{VALUE}};',
							],
						]
					);
				$this->end_controls_section();// end: Section

		}

		/**
		 * Render Testimonials widget output on the frontend.
		 * Written in PHP and used to generate the final HTML.
		*/
		protected function render() {
			// Testimonials query
			$settings = $this->get_settings_for_display();
			$center_item = !empty( $settings['center_item'] ) ? $settings['center_item'] : '';
			$info_position = !empty( $settings['info_position'] ) ? $settings['info_position'] : '';
			$testimonials_image = !empty( $settings['testimonials_image']['id'] ) ? $settings['testimonials_image']['id'] : '';
			$testimonials_icon = !empty( $settings['testimonials_icon'] ) ? $settings['testimonials_icon'] : '';
			$testimonials_title = !empty( $settings['testimonials_title'] ) ? $settings['testimonials_title'] : '';

			$testimonials_title_link = !empty( $settings['testimonials_title_link'] ) ? $settings['testimonials_title_link'] : '';
			$link_url = !empty( $testimonials_title_link['url'] ) ? esc_url($testimonials_title_link['url']) : '';
			$link_external = !empty( $testimonials_title_link['is_external'] ) ? 'target="_blank"' : '';
			$link_nofollow = !empty( $testimonials_title_link['nofollow'] ) ? 'rel="nofollow"' : '';
			$link_attr = !empty( $testimonials_title_link['url'] ) ?  $link_external.' '.$link_nofollow : '';

			$testimonials_designation = !empty( $settings['testimonials_designation'] ) ? $settings['testimonials_designation'] : '';
			$testimonials_content = !empty( $settings['testimonials_content'] ) ? $settings['testimonials_content'] : '';

			if ($info_position === 'top') {
			  $style_cls = ' info-top';
			} else {
			  $style_cls = '';
			}

			if ($center_item) {
			  $center_cls = ' center-item';
			} else {
			  $center_cls = '';
			}

		  $title_link = !empty( $link_url ) ? '<a href="'.esc_url($link_url).'" '.$link_attr.'>'.esc_html($testimonials_title).'</a>' : esc_html($testimonials_title);

			$title = $testimonials_title ? '<h4 class="customer-name">'.$title_link.'</h4>' : '';
			$designation = $testimonials_designation ? '<h5 class="customer-designation">'.esc_html($testimonials_designation).'</h5>' : '';
			$content = $testimonials_content ? '<p>'.esc_html($testimonials_content).'</p>' : '';

			if ($info_position === 'top') {
			  $top_content = '';
			  $bottom_content = $content;
			} else {
			  $top_content = $content;
			  $bottom_content = '';
			}

			$image_url = wp_get_attachment_url( $testimonials_image );
			$testimonials_image = $image_url ? '<div class="naeep-image"><img src="'.esc_url($image_url).'" alt="'.esc_attr($testimonials_title).'"></div>' : '';
			$testimonials_icon = $testimonials_icon ? '<div class="naeep-icon"><i class="'.esc_attr($testimonials_icon).'"></i></div>' : '';

			$output = '<div class="naeep-testimonial-item'.$style_cls.$center_cls.'">
			              '.$testimonials_icon.$top_content.'
			              <div class="customer-info">
			                '.$testimonials_image.'
			                <div class="customer-inner-info">
			                  '.$title.$designation.'
			                </div>
			              </div>
			              '.$bottom_content.'
			            </div>';

			echo $output;

		}

	}
	Plugin::instance()->widgets_manager->register_widget_type( new Event_Elementor_Addon_Testimonials() );
}
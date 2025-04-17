<?php
if (! defined('ABSPATH')) {
  exit;
}

class VerticalAccordion_Widget extends \Elementor\Widget_Base
{

  public function get_name()
  {
    return 'vertical_accordion';
  }

  public function get_title()
  {
    return 'Vertical Accordion';
  }

  public function get_icon()
  {
    return 'eicon-accordion';
  }

  public function get_categories()
  {
    return ['general'];
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    wp_register_style(
      'vertical-accordion-style',
      get_stylesheet_directory_uri() . '/elementor/widgets/vertical-accordion/css/style.css'
    );
    wp_register_script(
      'vertical-accordion-script',
      get_stylesheet_directory_uri() . '/elementor/widgets/vertical-accordion/js/script.js',
      ['jquery'],
      false,
      true
    );
  }

  public function get_style_depends()
  {
    return ['vertical-accordion-style'];
  }

  public function get_script_depends()
  {
    return ['vertical-accordion-script'];
  }

  protected function register_controls()
  {
    $this->start_controls_section(
      'content_section',
      [
        'label' => esc_html__('Accordion Items', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

    $this->add_control(
      'accordion_items',
      [
        'label'       => esc_html__('Accordion Items', 'text-domain'),
        'type'        => \Elementor\Controls_Manager::REPEATER,
        'fields'      => [
          [
            'name'    => 'title',
            'label'   => esc_html__('Title', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Accordion Item Title', 'text-domain'),
          ],
          [
            'name'    => 'icon',
            'label'   => esc_html__('Icon', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [
              'value'   => 'fas fa-star',
              'library' => 'solid',
            ],
          ],
          [
            'name'    => 'header',
            'label'   => esc_html__('Content Header', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Accordion Content Header', 'text-domain'),
          ],
          [
            'name'    => 'content',
            'label'   => esc_html__('Content', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Accordion item content', 'text-domain'),
          ],
          [
            'name'    => 'button_text',
            'label'   => esc_html__('Button Text', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('Learn More', 'text-domain'),
          ],
          [
            'name'    => 'button_link',
            'label'   => esc_html__('Button Link', 'text-domain'),
            'type'    => \Elementor\Controls_Manager::URL,
            'dynamic'     => ['active' => true],
            'placeholder' => 'https://example.com',
            'default' => [
              'url' => '',
            ],
          ],
        ],
        'title_field' => '{{{ title }}}',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'title_style',
      [
        'label' => esc_html__('Title', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'title_alignment',
      [
        'label'   => esc_html__('Alignment', 'text-domain'),
        'type'    => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
          'left'   => ['title' => esc_html__('Left', 'text-domain'), 'icon' => 'eicon-text-align-left'],
          'center' => ['title' => esc_html__('Center', 'text-domain'), 'icon' => 'eicon-text-align-center'],
          'right'  => ['title' => esc_html__('Right', 'text-domain'), 'icon' => 'eicon-text-align-right'],
        ],
        'default'   => 'left',
        'selectors' => ['{{WRAPPER}} .accordion-header' => 'text-align: {{VALUE}};'],
      ]
    );

    $this->add_control(
      'title_color',
      [
        'label'     => esc_html__('Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-header' => 'color: {{VALUE}};'],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'title_typography',
        'selector' => '{{WRAPPER}} .accordion-header',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'icon_style',
      [
        'label' => esc_html__('Icon', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'icon_color',
      [
        'label'     => esc_html__('Primary Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .accordion-icon' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'icon_hover_color',
      [
        'label'     => esc_html__('Hover Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .accordion-icon:hover' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'icon_size',
      [
        'label'     => esc_html__('Size', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::SLIDER,
        'default'   => [
          'size' => 24,
          'unit' => 'px',
        ],
        'range' => [
          'px' => [
            'min' => 10,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .accordion-icon' => 'font-size: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'header_style',
      [
        'label' => esc_html__('Content Header', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'header_color',
      [
        'label'     => esc_html__('Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-content h3' => 'color: {{VALUE}};'],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'header_typography',
        'selector' => '{{WRAPPER}} .accordion-content h3',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'content_style',
      [
        'label' => esc_html__('Content', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'content_color',
      [
        'label'     => esc_html__('Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-content' => 'color: {{VALUE}};'],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'content_typography',
        'selector' => '{{WRAPPER}} .accordion-content',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'button_style',
      [
        'label' => esc_html__('Button', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'button_color',
      [
        'label'     => esc_html__('Text Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-button' => 'color: {{VALUE}};'],
      ]
    );

    $this->add_control(
      'button_hover_color',
      [
        'label'     => esc_html__('Text hover Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-button:hover' => 'color: {{VALUE}};'],
      ]
    );

    $this->add_control(
      'button_background_color',
      [
        'label'     => esc_html__('Background Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-button' => 'background-color: {{VALUE}};'],
      ]
    );

    $this->add_control(
      'button_hover_background_color',
      [
        'label'     => esc_html__('Hover Background Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => ['{{WRAPPER}} .accordion-button:hover' => 'background-color: {{VALUE}};'],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'button_typography',
        'selector' => '{{WRAPPER}} .accordion-button',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'header_background_style',
      [
        'label' => esc_html__('Accordion Header Background', 'text-domain'),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'header_background_color',
      [
        'label'     => esc_html__('Background Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .accordion-header' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'header_hover_background_color',
      [
        'label'     => esc_html__('Hover/Active Background Color', 'text-domain'),
        'type'      => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
          '{{WRAPPER}} .accordion-header:hover' => 'background-color: {{VALUE}};',
          '{{WRAPPER}} .accordion-item.active .accordion-header' => 'background-color: {{VALUE}} !important;',
        ],
      ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();

    if (empty($settings['accordion_items'])) {
      return;
    }

    $hover_bg_color = !empty($settings['header_hover_background_color']) ? $settings['header_hover_background_color'] : '';

    echo '<div class="vertical-accordion-widget">';

    foreach ($settings['accordion_items'] as $index => $item) {

      $is_active = ($index === 0) ? ' active' : '';
      $active_style = ($is_active && $hover_bg_color) ? "background-color: {$hover_bg_color};" : '';

      $icon_html = '';
      if (!empty($item['icon']['value'])) {
        ob_start();
        \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']);
        $icon_html = '<div class="accordion-icon">' . ob_get_clean() . '</div>'; // Оборачиваем иконку в <div>
      }

      $button_html = '';
      if (!empty($item['button_text']) && !empty($item['button_link']['url'])) {
        $button_html = sprintf(
          '<a href="%s" class="accordion-button" %s>%s</a>',
          esc_url($item['button_link']['url']),
          $item['button_link']['is_external'] ? 'target="_blank" rel="noopener"' : '',
          esc_html($item['button_text'])
        );
      }

      echo '<div class="accordion-item' . esc_attr($is_active) . '">';
      echo '<div class="accordion-header" style="' . esc_attr($active_style) . '">' . esc_html($item['title']) . '</div>';
      echo '<div class="accordion-content">' . $icon_html . '<h3 class="accordion-content-header">' . esc_html($item['header']) . '</h3>' . '<div class="accordion-content-body">' . wp_kses_post($item['content']) . '</div>' . $button_html . '</div>';
      echo '</div>';
    }

    echo '</div>';
  }
}

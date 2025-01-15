<?php

namespace Drupal\base_layouts\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Base class of layouts with configurable class width - container.
 *
 * @internal
 *   Plugin classes are internal.
 */
abstract class LayoutFsfbBase extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $configuration = parent::defaultConfiguration();
    return $configuration + [
      'column_gap' => '',
      'row_gap' => '',
      'align_items' => '',
      'region_first_classes' => '',
      'region_second_classes' => '',
      'background_color' => '',
      'top_padding' => '',
      'bottom_padding' => '',
      'left_right_paddings' => '',
      'top_bottom_paddings' => '',
      'top_margin' => '',
      'bottom_margin' => '',
      'left_right_margins' => '',
      'top_bottom_margins' => '',
      'container' => '',
      'content_container' => 'content-container-default',
      'height' => '',
      'text_color' => 'text-title',
      'alignment' => '',
      'section_classes' => '',
      'section_id' => '',
      'two_column_widths' => $this->getDefaultColumnWidth(),
      'three_column_widths' => $this->getDefaultColumnWidth(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    if ($this->showGridProperties()) {
      $form['grid_properties'] = [
        '#type' => 'details',
        '#title' => $this->t('Propiedades del Grid'),
      ];
      if ($this->columns() == '2') {
        $form['grid_properties']['two_column_widths'] = [
          '#type' => 'select',
          '#title' => $this->t('Ancho de Columnas'),
          '#default_value' => $this->configuration['two_column_widths'],
          '#options' => $this->getColumnWidthOptions(),
        ];
        $form['grid_properties']['region_first_classes'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Classes Columna Izquierda'),
          '#default_value' => $this->configuration['region_first_classes'],
          '#description' => $this->t('Utilice clases utilitarias si desea personalizar esta columna.'),
        ];
        $form['grid_properties']['region_second_classes'] = [
          '#type' => 'textfield',
          '#title' => $this->t('Classes Columna Derecha'),
          '#default_value' => $this->configuration['region_second_classes'],
          '#description' => $this->t('Utilice clases utilitarias si desea personalizar esta columna.'),
        ];
      }
      if ($this->columns() == '3') {
        $form['grid_properties']['three_column_widths'] = [
          '#type' => 'select',
          '#title' => $this->t('Ancho de Columnas'),
          '#default_value' => $this->configuration['three_column_widths'],
          '#options' => $this->getColumnWidthOptions(),
        ];
      }
      $form['grid_properties']['column_gap'] = [
        '#type' => 'select',
        '#title' => $this->t('Espaciado entre Columnas'),
        '#default_value' => $this->configuration['column_gap'],
        '#options' => $this->getColumnGapOptions(),
      ];
      $form['grid_properties']['row_gap'] = [
        '#type' => 'select',
        '#title' => $this->t('Espaciado entre filas'),
        '#default_value' => $this->configuration['row_gap'],
        '#options' => $this->getRowGapOptions(),
      ];
      $form['grid_properties']['align_items'] = [
        '#type' => 'select',
        '#title' => $this->t('Alineación de items'),
        '#default_value' => $this->configuration['align_items'],
        '#options' => $this->getAlignItems(),
      ];
    }

    $form['background'] = [
      '#type' => 'details',
      '#title' => $this->t('Fondo'),
    ];
    $form['background']['background_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Color de fondo'),
      '#default_value' => $this->configuration['background_color'],
      '#options' => $this->columns() == 2 ? $this->getBackgroundColor(2) : $this->getBackgroundColor(),
    ];

    // Padding.
    $form['padding'] = [
      '#type' => 'details',
      '#title' => $this->t('Relleno'),
    ];
    $form['padding']['top_padding'] = [
      '#type' => 'select',
      '#title' => $this->t('Superior'),
      '#default_value' => $this->configuration['top_padding'],
      '#options' => $this->getTopPaddingOptions(),
    ];
    $form['padding']['bottom_padding'] = [
      '#type' => 'select',
      '#title' => $this->t('Inferior'),
      '#default_value' => $this->configuration['bottom_padding'],
      '#options' => $this->getBottomPaddingOptions(),
    ];
    $form['padding']['left_right_paddings'] = [
      '#type' => 'select',
      '#title' => $this->t('Izquierda - Derecha'),
      '#default_value' => $this->configuration['left_right_paddings'],
      '#options' => $this->getEqualLeftRightPaddingsOptions(),
    ];
    $form['padding']['top_bottom_paddings'] = [
      '#type' => 'select',
      '#title' => $this->t('Superior - Inferior'),
      '#default_value' => $this->configuration['top_bottom_paddings'],
      '#options' => $this->getEqualTopBottomPaddingsOptions(),
    ];

    // Margin.
    $form['margin'] = [
      '#type' => 'details',
      '#title' => $this->t('Margen'),
    ];
    $form['margin']['top_margin'] = [
      '#type' => 'select',
      '#title' => $this->t('Superior'),
      '#default_value' => $this->configuration['top_margin'],
      '#options' => $this->getTopMarginOptions(),
    ];
    $form['margin']['bottom_margin'] = [
      '#type' => 'select',
      '#title' => $this->t('Inferior'),
      '#default_value' => $this->configuration['bottom_margin'],
      '#options' => $this->getBottomMarginOptions(),
    ];
    $form['margin']['left_right_margins'] = [
      '#type' => 'select',
      '#title' => $this->t('Izquierda - Derecha'),
      '#default_value' => $this->configuration['left_right_margins'],
      '#options' => $this->getEqualLeftRightMarginsOptions(),
    ];
    $form['margin']['top_bottom_margins'] = [
      '#type' => 'select',
      '#title' => $this->t('Superior - Inferior'),
      '#default_value' => $this->configuration['top_bottom_margins'],
      '#options' => $this->getEqualTopBottomMarginsOptions(),
    ];

    // Container.
    $form['container_details'] = [
      '#type' => 'details',
      '#title' => $this->t('Contenedor'),
    ];
    $form['container_details']['height'] = [
      '#type' => 'select',
      '#title' => $this->t('Alto'),
      '#default_value' => $this->configuration['height'],
      '#options' => $this->getHeightOptions(),
      '#description' => $this->t('Elija la altura para este diseño. Cambiará la altura mínima de su diseño.'),
    ];
    $form['container_details']['container'] = [
      '#type' => 'select',
      '#title' => $this->t('Contenedor de sección'),
      '#default_value' => $this->configuration['container'],
      '#options' => $this->getContainerOptions(),
      '#description' => $this->t('Elija el tamaño del contenedor para este diseño. Cambiará el ancho máximo de su diseño.'),
    ];
    $form['container_details']['content_container'] = [
      '#type' => 'select',
      '#title' => $this->t('Contenedor de contenido'),
      '#default_value' => $this->configuration['content_container'],
      '#options' => $this->getContentContainerOptions(),
      '#description' => $this->t('Elija el tamaño del contenedor para el contenido de este diseño. Es bastante útil si desea un fondo de ancho completo y su contenido en el medio.'),
    ];

    // Text Styles.
    $form['styles'] = [
      '#type' => 'details',
      '#title' => $this->t('Estilos'),
    ];
    $form['styles']['text_color'] = [
      '#type' => 'select',
      '#title' => $this->t('Color texto'),
      '#default_value' => $this->configuration['text_color'],
      '#options' => $this->getTextColor(),
      '#description' => $this->t('Elija el color predeterminado para el texto de esta sección.'),
    ];

    $form['styles']['alignment'] = [
      '#type' => 'select',
      '#title' => $this->t('Alineación de texto'),
      '#default_value' => $this->configuration['alignment'],
      '#options' => $this->getAlignmentOptions(),
      '#description' => $this->t('Elija la alineación predeterminada para el texto de esta sección.'),
    ];
    $form['styles']['section_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Section classes'),
      '#default_value' => $this->configuration['section_classes'],
    ];
    $form['styles']['section_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Section ID'),
      '#default_value' => $this->configuration['section_id'],
    ];

    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(
        array &$form,
        FormStateInterface $form_state
    ) {
    parent::submitConfigurationForm($form, $form_state);

    $grid_properties = $form_state->getValue('grid_properties');
    $this->configuration['two_column_widths'] = $grid_properties['two_column_widths'] ?? NULL;
    $this->configuration['three_column_widths'] = $grid_properties['three_column_widths'] ?? NULL;
    $this->configuration['column_gap'] = $grid_properties['column_gap'] ?? NULL;
    $this->configuration['row_gap'] = $grid_properties['row_gap'] ?? NULL;
    $this->configuration['align_items'] = $grid_properties['align_items'] ?? NULL;
    $this->configuration['region_first_classes'] = $grid_properties['region_first_classes'] ?? NULL;
    $this->configuration['region_second_classes'] = $grid_properties['region_second_classes'] ?? NULL;

    $background = $form_state->getValue('background');
    $this->configuration['background_color'] = $background['background_color'];

    $padding = $form_state->getValue('padding');
    $this->configuration['top_padding'] = $padding['top_padding'];
    $this->configuration['bottom_padding'] = $padding['bottom_padding'];
    $this->configuration['left_right_paddings'] = $padding['left_right_paddings'];
    $this->configuration['top_bottom_paddings'] = $padding['top_bottom_paddings'];

    $margin = $form_state->getValue('margin');
    $this->configuration['top_margin'] = $margin['top_margin'];
    $this->configuration['bottom_margin'] = $margin['bottom_margin'];
    $this->configuration['left_right_margins'] = $margin['left_right_margins'];
    $this->configuration['top_bottom_margins'] = $margin['top_bottom_margins'];

    $container = $form_state->getValue('container_details');
    $this->configuration['container'] = $container['container'];
    $this->configuration['content_container'] = $container['content_container'];
    $this->configuration['height'] = $container['height'];

    $styles = $form_state->getValue('styles');
    $this->configuration['text_color'] = $styles['text_color'];
    $this->configuration['alignment'] = $styles['alignment'];
    $this->configuration['section_classes'] = $styles['section_classes'];
    $this->configuration['section_id'] = $styles['section_id'];
  }

  /**
   * Provides a default value for the gab options.
   *
   * @return array[stringstring]
   *   Return Options for getColumnGapOptions
   */
  protected function getColumnGapOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'gap-x-0' => $this->t('Ninguno'),
      'gap-x-1' => $this->t('S'),
      'gap-x-2' => $this->t('M'),
      'gap-x-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the gab options.
   *
   * @return array[stringstring]
   *   Return Options for getRowGapOptions
   */
  protected function getRowGapOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'gap-y-0' => $this->t('Ninguno'),
      'gap-y-1' => $this->t('S'),
      'gap-y-2' => $this->t('M'),
      'gap-y-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the padding options.
   *
   * @return array[stringstring]
   *   Return Options for getTopPaddingOptions
   */
  protected function getTopPaddingOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'pt-0' => $this->t('Ninguno'),
      'pt-1' => $this->t('S'),
      'pt-2' => $this->t('M'),
      'pt-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the padding options.
   *
   * @return array[stringstring]
   *   Return Options for getBottomPaddingOptions
   */
  protected function getBottomPaddingOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'pb-0' => $this->t('Ninguno'),
      'pb-1' => $this->t('S'),
      'pb-2' => $this->t('M'),
      'pb-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the padding options.
   *
   * @return array[stringstring]
   *   Return Options for getEqualLeftRightPaddingsOptions
   */
  protected function getEqualLeftRightPaddingsOptions() {

    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'py-0' => $this->t('Ninguno'),
      'px-1' => $this->t('S'),
      'px-2' => $this->t('M'),
      'px-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the padding options.
   *
   * @return array[stringstring]
   *   Return Options for getEqualTopBottomPaddingsOptions
   */
  protected function getEqualTopBottomPaddingsOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'py-0' => $this->t('Ninguno'),
      'py-1' => $this->t('S'),
      'py-2' => $this->t('M'),
      'py-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the margin options.
   *
   * @return array[stringstring]
   *   Return Options for getEqualTopBottomPaddingsOptions
   */
  protected function getTopMarginOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'mt-0' => $this->t('Ninguno'),
      'mt-1' => $this->t('S'),
      'mt-2' => $this->t('M'),
      'mt-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the margin options.
   *
   * @return array[stringstring]
   *   Return Options for getBottomMarginOptions
   */
  protected function getBottomMarginOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'mb-0' => $this->t('Ninguno'),
      'mb-1' => $this->t('S'),
      'mb-2' => $this->t('M'),
      'mb-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the margin options.
   *
   * @return array[stringstring]
   *   Return Options for getEqualLeftRightMarginsOptions
   */
  protected function getEqualLeftRightMarginsOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'mx-0' => $this->t('Ninguno'),
      'mx-1' => $this->t('S'),
      'mx-2' => $this->t('M'),
      'mx-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the margin options.
   *
   * @return array[stringstring]
   *   Return Options for getEqualTopBottomMarginsOptions
   */
  protected function getEqualTopBottomMarginsOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Seleccione'),
      'my-0' => $this->t('Ninguno'),
      'my-1' => $this->t('S'),
      'my-2' => $this->t('M'),
      'my-3' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the layout options.
   *
   * @return array[stringstring]
   *   Return Options for getDefaultContainerType
   */
  protected function getContainerOptions() {
    // Return the first available key from the list of options.
    $options = [
      'container-default' => $this->t('M'),
      '' => $this->t('Ninguno'),
      'container-sm' => $this->t('S'),
      'container-lg' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the layout options.
   *
   * @return array[stringstring]
   *   Return Options for getDefaultContainerType
   */
  protected function getContentContainerOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Ninguno'),
      'content-container-sm' => $this->t('S'),
      'content-container-default' => $this->t('M'),
      'content-container-lg' => $this->t('L'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the layout options.
   *
   * @return array[stringstring]
   *   Return Options for getDefaultContainerType
   */
  protected function getContainerRegionOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('No'),
      'container-region' => $this->t('Si'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the Background Color options.
   *
   * @return array[stringstring]
   *   Return Options for getContainerType
   */
  protected function getBackgroundColor($columns = 1) {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Ninguno'),
      'bg-blue' => $this->t('Azul'),
      'bg-blue-fundacion' => $this->t('Morado Fundación'),
      'bg-gray' => $this->t('Gris'),
      'bg-gray-purple' => $this->t('Gris Morado'),
      'bg-ivory' => $this->t('Ivori'),
      'bg-primary' => $this->t('Primario'),
      'bg-primary-dark' => $this->t('Primario Dark'),
      'bg-primary-light' => $this->t('Primario Light'),
      'bg-primary-ulight' => $this->t('Primario Ultra Light'),
      'bg-secondary' => $this->t('Secundario Azul'),
      'bg-secondary-dark' => $this->t('Secundario Azul Dark'),
      'bg-secondary-light' => $this->t('Secundario Azul Light'),
      'bg-secondary-ulight' => $this->t('Secundario Azul Ultra Light'),
      'bg-aqua' => $this->t('Secundario Aqua'),
      'bg-aqua-dark' => $this->t('Secundario Aqua Dark'),
      'bg-aqua-light' => $this->t('Secundario Aqua Light'),
      'bg-aqua-ulight' => $this->t('Secundario Aqua Ultra Light'),
      'bg-green' => $this->t('Secundario Verde'),
      'bg-green-dark' => $this->t('Secundario Verde Dark'),
      'bg-green-light' => $this->t('Secundario Verde Light'),
      'bg-green-ulight' => $this->t('Secundario Verde Ultra Light'),
      'bg-tertiary' => $this->t('Terciario'),
      'bg-tertiary-dark' => $this->t('Terciario Dark'),
      'bg-tertiary-light' => $this->t('Terciario Light'),
      'bg-tertiary-ulight' => $this->t('Terciario Ultra Light'),
      'bg-blue-gray' => $this->t('Azul/Gris - Vertical'),
      'bg-blue-white' => $this->t('Azul/Blanco - Vertical'),
      'bg-teal' => $this->t('Teal'),
      'bg-purple-gradient' => $this->t('Morado gradiente'),
      'bg-purple-lightest' => $this->t('Morado ita'),
    ];

    // Extra options for 2 columns layout.
    if ($columns == 2) {
      $options_2_columns = [
        'bg-2col-blue' => $this->t('Azul Fundación/Azul Fundación 80%'),
        'bg-2col-blue-white' => $this->t('Azul/Blanco'),
        'bg-2col-blue-gray' => $this->t('Azul/Gris'),
        'bg-2col-white-gray' => $this->t('Blanco/Gris'),
        'bg-2col-gray-white' => $this->t('Gris/Blanco'),
      ];

      $options = array_merge($options, $options_2_columns);
    }

    return $options;
  }

  /**
   * Provides a default value for the Background Color options.
   *
   * @return array[stringstring]
   *   Return Options for getContainerType
   */
  protected function getTextColor() {
    // Return the first available key from the list of options.
    $options = [
      'text-title' => $this->t('Gris Title (predeterminado)'),
      'text-body' => $this->t('Gris Body'),
      'text-component' => $this->t('Gris Component'),
      'text-white' => $this->t('Blanco'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the Height options.
   *
   * @return array[stringstring]
   *   Return Options for getContainerType
   */
  protected function getHeightOptions() {
    $options = [
      '' => $this->t('Predeterminado'),
      'h-100vh' => $this->t('100vh'),
      'h-80vh' => $this->t('80vh'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the align items options.
   *
   * @return array[stringstring]
   *   Return Options for getAlignItems
   */
  protected function getAlignItems() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Normal'),
      'items-start' => $this->t('Start'),
      'items-end' => $this->t('End'),
      'items-center' => $this->t('Center'),
      'items-baseline' => $this->t('Baseline'),
      'items-stretch' => $this->t('Stretch'),
    ];
    return $options;
  }

  /**
   * Provides a default value for the align items options.
   *
   * @return array[stringstring]
   *   Return Options for getAlignItems
   */
  protected function getAlignmentOptions() {
    // Return the first available key from the list of options.
    $options = [
      '' => $this->t('Ninguno'),
      'alignment-left' => $this->t('Izquierda'),
      'alignment-right' => $this->t('Derecha'),
      'alignment-center' => $this->t('Centrado'),
      'alignment-justify' => $this->t('Justificado'),
    ];
    return $options;
  }

  /**
   * Gets the width options for the configuration form.
   *
   * The first option will be used as the default 'column_widths' configuration
   * value.
   *
   * @return string
   *   The width options array where the keys are strings that will be added to
   *   the CSS classes and the values are the human readable labels.
   */
  abstract protected function getDefaultColumnWidth();

  /**
   * Gets the width options for the configuration form.
   *
   * The first option will be used as the default 'column_widths' configuration
   * value.
   *
   * @return string[]
   *   The width options array where the keys are strings that will be added to
   *   the CSS classes and the values are the human readable labels.
   */
  abstract protected function getColumnWidthOptions();

  /**
   * Gets the Show Grid Properties  for the configuration form.
   *
   * @return bool
   *   Show Grid Properties
   */
  abstract protected function showGridProperties();

  /**
   * Columns Properties for the configuration form.
   *
   * @return string
   *   We get the columns of layouts
   */
  abstract protected function columns();

}

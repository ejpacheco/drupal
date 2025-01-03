<?php

namespace Drupal\base_layouts\Plugin\Layout;

/**
 * Configurable one column layout plugin class.
 *
 * @internal
 *   Plugin classes are internal.
 */
class LayoutOneColumn extends LayoutFsfbBase {

  /**
   * {@inheritdoc}
   */
  protected function showGridProperties() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  protected function getColumnWidthOptions() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  protected function getDefaultColumnWidth() {
    return '';
  }

  /**
   * {@inheritdoc}
   */
  protected function columns() {
    return '1';
  }

}

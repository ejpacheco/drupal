<?php

namespace Drupal\base_layouts\Plugin\Layout;

/**
 * Configurable foFSFB column layout plugin class.
 *
 * @internal
 *   Plugin classes are internal.
 */
class LayoutFourColumn extends LayoutFsfbBase {

  /**
   * {@inheritdoc}
   */
  protected function showGridProperties() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  protected function isMultipleColumnsLayout() {
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
    return '4';
  }

}

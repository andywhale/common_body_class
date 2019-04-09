<?php

namespace Drupal\common_body_class\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining Body class entities.
 */
interface BodyClassInterface extends ConfigEntityInterface {

  /**
   * Check the status to see if this is enabled.
   *
   * @return bool
   */
  public function isEnabled();

  /**
   * Get the body class class.
   *
   * @return string
   */
  public function getClass();

  /**
   * Set the body class class.
   *
   * @param string $class  The body class class
   *
   * @return self
   */
  public function setClass(string $class);

}

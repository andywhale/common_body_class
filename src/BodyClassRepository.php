<?php

namespace Drupal\common_body_class;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use \Drupal\Component\Utility\Html;

/**
 * Provides a listing of Body class entities.
 */
class BodyClassRepository {

  /**
   * @var Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * Get an array of active body classes.
   *
   * @return array
   *   An array of body classes (strings).
   */
  public function getActiveClasses() {
    return array_map(function ($bodyClass) {
      return Html::cleanCssIdentifier($bodyClass->getClass());
    }, $this->entityTypeManager->getStorage('body_class')->loadByProperties(['status' => TRUE]));
  }

}

<?php

namespace Drupal\common_body_class;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;

/**
 * Provides a listing of Body class entities.
 */
class BodyClassListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Body class label');
    $header['id'] = $this->t('Machine name');
    $header['class'] = $this->t('Body class');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['label'] = $entity->label();
    $row['id'] = $entity->id();
    $row['class'] = $entity->getClass();
    $row['status'] = ($entity->isEnabled()) ? "Active" : "Inactive";
    return $row + parent::buildRow($entity);
  }

}

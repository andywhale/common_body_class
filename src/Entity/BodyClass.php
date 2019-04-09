<?php

namespace Drupal\common_body_class\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Body class entity.
 *
 * @ConfigEntityType(
 *   id = "body_class",
 *   label = @Translation("Body class"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\common_body_class\BodyClassListBuilder",
 *     "form" = {
 *       "add" = "Drupal\common_body_class\Form\BodyClassForm",
 *       "edit" = "Drupal\common_body_class\Form\BodyClassForm",
 *       "delete" = "Drupal\common_body_class\Form\BodyClassDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\common_body_class\BodyClassHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "body_class",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/body_class/{body_class}",
 *     "add-form" = "/admin/structure/body_class/add",
 *     "edit-form" = "/admin/structure/body_class/{body_class}/edit",
 *     "delete-form" = "/admin/structure/body_class/{body_class}/delete",
 *     "collection" = "/admin/structure/body_class"
 *   }
 * )
 */
class BodyClass extends ConfigEntityBase implements BodyClassInterface {

  /**
   * The Body class ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Body class label.
   *
   * @var string
   */
  protected $label;

  /**
   * The body class class
   *
   * @var string
   */
  protected $class;

  /**
   * Check the status to see if this is enabled.
   *
   * @return bool
   */
  public function isEnabled() {
    return ($this->status) ? TRUE : FALSE;
  }

  /**
   * Get the body class class
   *
   * @return string
   */ 
  public function getClass()
  {
    return $this->class;
  }

  /**
   * Set the body class class
   *
   * @param string $class  The body class class
   *
   * @return self
   */ 
  public function setClass(string $class)
  {
    $this->class = $class;

    return $this;
  }

}

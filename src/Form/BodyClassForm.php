<?php

namespace Drupal\common_body_class\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class BodyClassForm.
 */
class BodyClassForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $body_class = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $body_class->label(),
      '#description' => $this->t("Label for the Body class."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $body_class->id(),
      '#machine_name' => [
        'exists' => '\Drupal\common_body_class\Entity\BodyClass::load',
      ],
      '#disabled' => !$body_class->isNew(),
    ];

    $form['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Class'),
      '#maxlength' => 255,
      '#default_value' => $body_class->getClass(),
      '#description' => $this->t("The class to output."),
      '#required' => TRUE,
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#description' => $this->t('Enable the body class.'),
      '#default_value' => $body_class->isEnabled(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $body_class = $this->entity;
    $status = $body_class->save();

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Body class.', [
          '%label' => $body_class->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Body class.', [
          '%label' => $body_class->label(),
        ]));
    }
    $form_state->setRedirectUrl($body_class->toUrl('collection'));
  }

}

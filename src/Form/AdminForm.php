<?php

namespace Drupal\hello\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class AdminForm extends ConfigFormBase{

  public function getFormID(){
    return 'hello_admin_form';
  }

  protected function getEditableConfigNames(){
    return['hello.config'];
  }

  public function buildForm(array $form, FormStateInterface $form_state){
    $color = $this->config('hello.config')->get('color');
//    ksm($color);
    $form['color'] = [
      '#type' => 'select',
      '#title' => 'color',
      '#options' => [
        'red' => t('red'),
        'green' => t('green'),
        'orange' => t('orange'),
        'blue' => t('blue'),
        ],
      '#default_value' => $color,
    ];
    return parent::buildForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
    $selected = $form_state->getValue('color');
    $this->config('hello.config')->set('color', $selected )->save();

    

 //    $this->config('hello.config')->set('color', $form_state->getValues('color'))->save();
    parent::submitForm($form, $form_state);
  }
}

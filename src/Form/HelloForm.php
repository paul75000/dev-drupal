<?php

namespace Drupal\hello\form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloForm extends FormBase{
  public function getFormID(){
    return 'hello_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state){
  	
  	$form['number'] = [
      '#type' => 'select',
      '#options' => [
      	'10' => '10',
      	'100' => '100',
      	'1000' => '1000',
      ],
      '#default_value' => '10',
      '#attributes' => ['class'=> ['items-number']],
  	];

  	$form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Envoyez'),
  	];

  	return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
  }
} 
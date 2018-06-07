<?php

namespace Drupal\hello\form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class HelloForm extends FormBase{
  public function getFormID(){
    return 'hello_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state){
  	
  	// $form['number'] = [
   //    '#type' => 'select',
   //    '#options' => [
   //    	'10' => '10',
   //    	'100' => '100',
   //    	'1000' => '1000',
   //    ],
   //    '#default_value' => '100',
   //    '#attributes' => ['class'=> ['items-number']],
  	// ];

    $form['first_value'] = [
      '#type' => 'textfield',
      '#title' => t('First value'),
      '#required' => TRUE,
      '#description' => t('Enter first value'),
    ];

    $form['operation'] = [
      '#type' => 'radios', 
      '#title' => t('Operation'),
      '#default_value' => Addition,
      '#options' => [
        'Addition' => t('Addition'),
        'Soustraction' => t('Soustraction'),
        'Multiplication' => t('Multiplication'),
        'Division' => t('Division'),
      ],
      '#description' => t('Choose an operation'),
      'required' => TRUE,
    ];

    $form['second_value'] = [
      '#type' => 'textfield',
      '#title' => t('Second value'),
      '#required' => TRUE,
      '#description' => t('Enter second value'),
    ];

  	$form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Calculate'),
  	];

  	return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
  }
} 

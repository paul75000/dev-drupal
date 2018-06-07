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

  public function validateForm(array &$form, FormStateInterface $form_state){
    $first_value = $form_state->getValue('first_value');
    $operation = $form_state->getValue('operation');
    $second_value = $form_state->getValue('second_value');

    if(!is_numeric($first_value) || !is_numeric($second_value)){
      \Drupal::messenger()->addMessage('entrer une valeur numérique');
    }
    
    if($operation == 'Division' && $second_value === '0'){
      \Drupal::messenger()->addMessage('les divisions par zero sont impossible');
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
    $first_value = $form_state->getValue('first_value');
    $operation = $form_state->getValue('operation');
    $second_value = $form_state->getValue('second_value');
    $result = '';

    if($operation == 'Addition'){
      $result = $first_value + $second_value;
//      \Drupal::messenger()->addMessage('resultat :' . $result);
      $form_state->setRedirect('hello.formresult', ['result' => $result]);
    }
    if($operation == 'Soustraction'){
      $result = $first_value - $second_value;
//      \Drupal::messenger()->addMessage('resultat :' . $result);
     $form_state->setRedirect('hello.formresult', ['result' => $result]);
    }
    if($operation == 'Multiplication'){
      $result = $first_value * $second_value;
//      \Drupal::messenger()->addMessage('resultat :' . $result);
     $form_state->setRedirect('hello.formresult', ['result' => $result]);
    }
    if($operation == 'Division'){
      $result = $first_value / $second_value;
//      \Drupal::messenger()->addMessage('resultat :' . $result);
     $form_state->setRedirect('hello.formresult', ['result' => $result]);
    }

  }
} 

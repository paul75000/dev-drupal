<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase{
  public function content($param = NULL){
    //ksm($this->currentUser()); 
    return['#markup' => $this->t('hello %name et ceci est le param dans l\'url: %param',[
      '%name' => $this->currentUser()->getAccountName(),
      '%param' => $param
    ])];
  }
}

<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloController extends ControllerBase{
  public function content(){
  	$ip = \Drupal::request()->getClientIp();
    //ksm($this->currentUser()); 
    return['#markup' => $this->t('hello %name et ceci est le param dans l\'url: et l\'@ip', [
      '%name' => $this->currentUser()->getAccountName(),
      '@ip' => $ip,
    ])];
  }
}

<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class OngletController extends ControllerBase{
  public function content(){
    return['#markup' => $this->t('page avec onglet')];
  }
}
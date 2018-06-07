<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class ResultController extends ControllerBase{
  public function content($result){
    return ['#markup' => $this->t('le resultat est : @result', ['@result' => $result])];
  }
}

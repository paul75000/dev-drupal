<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 *Provides a hello block
 *
 *@Block(
 * id = "block_dev_bdd",
 * admin_label = @Translation("dev_bdd")
 *)
 */

class Block_dev_bdd extends BlockBase{
  /*
   *Implements Drupal\Core\Block\BlockBase::build().
   */
  public function build(){
    $number = \Drupal::database()->select('sessions')//j'utilise le service database, qui me permet de selectionner ma table session
      ->countQuery()//je demande aux service de compter les entrées
      ->execute()//il execute la requete
      ->fetchField();//il fait la somme des entrées

  	$build = [
  	  '#markup' => $this->t('le nombre de session ouverte est de @number',[
        '@number' => $number, 
        ]),
	  ];
  	return $build;
  }
}
  
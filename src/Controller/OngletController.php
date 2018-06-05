<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class OngletController extends ControllerBase{
  public function content($nodetype = NULL){
  	//on construit notre requete
    $query = $this->entityTypeManager()->getStorage('node')->getQuery();
    // on met une condition au cas ou quelqu'un mettrais un param danns l'url
    if($nodetype){
    	$query->condition('type', $nodetype);
    }
    // on souhaite avoir les 10 premier résultats
    $nids = $query->pager('10')->execute();

    //on charge le resultat de la query
    $nodes = $this->entityTypeManager()->getStorage('node')->loadMultiple($nids);

    //on construit un tableau de liens vers les noeuds
    $items = [];
    foreach ($nodes as $node){
    	$items[] = $node->toLink();
    }

    $list = [
      '#theme' => 'item_list',
      '#items' => $items,
      '#title' => $this->t('node list title'),
    ];

    //pour faire apparaitre uue pagination, on vient de créer un nouveau render
    $pager = ['#type' => 'pager'];
   


    return [
    	'list' => $list,
    	'pager' => $pager,
    	'cache' => [
    	  'keys' => ['hello:node_list'],
          'tags' => ['node_list'],// cela permet de reconstruire le cavche ou cas une node serait créer, ou bien delete ou modified
    	],
    //return['#markup' => /*$entities*/ $storage ];
    ];
  }
}
<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;

class HistoryController extends ControllerBase{
  public function content(NodeInterface $node){
    $database = \Drupal::database();

    $query = $database->select('hello_node_history', 'hnh')//hnh est un alias de table
             ->fields('hnh', ['uid', 'update_time'])
             ->condition('nid', $node->id());
    $result = $query->execute();

    $rows = [];
    $uids = [];
    foreach ($result as $record){
    	$rows [] = [
          $this->entityTypeManager()->getStorage('user')->load($record->uid)->toLink(),//rq: le link est fait sur le label de l'objet récupéré, de meme pour les exo avec cette methode
          \Drupal::service('date.formatter')->format($record->update_time),
    	];
    	$uids[] = 'user:' . $record->uid;
    }
    $table = [
      '#theme' => 'table',
      '#header' => [$this->t('author'), $this->t('Update time')],
      '#rows' => $rows,
    ];

    $count = count($rows);
    // ksm($count);
    $output = array(
      '#theme' => 'hello',
      '#count' => $count,
      '#node' => $node,
    );

    return [
      'output' => $output,
      'table' => $table,
      '#cache' => [
        'keys' => ['hello:node_history:' . $node->id()],
        'tags' => array_merge(['node:' . $node->id()], $uids),//array_merge-> fusion de 2 tableau ici ['node:' . $node->id()] et celui de $uids
      ],
    ]; 
  } 
}

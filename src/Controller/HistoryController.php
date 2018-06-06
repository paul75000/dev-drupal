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
          $this->entityTypeManager()->getStorage('user')->load($record->uid)->toLink(),
          \Drupal::service('date.formatter')->format($record->update_time),
    	];
    	$uids[] = 'user:' . $record->uid;
    }
    $table = [
      '#theme' => 'table',
      '#header' => [$this->t('author'), $this->t('Update time')],
      '#rows' => $rows,
    ];


    return $table; 
  }
}

<?php

namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
/**
 *Provides a hello block
 *
 *@Block(
 * id = "hello_block",
 * admin_label = @Translation("Hello!")
 *)
 */

class Hello extends BlockBase{
  /*
   *Implements Drupal\Core\Block\BlockBase::build().
   */
  public function build(){
  	$build = [
  	'#markup' => $this->t('welcome @name it\'s @time', [
      '@name' => \Drupal::currentUser()->getAccountName(),
      '@time' => \Drupal::service('date.formatter')
        ->format(\Drupal::service('datetime.time')->getCurrentTime(), 'custom', 'H:i s\s'),
       ]),
  	'#cache' => [
      'keys' =>['hello_cache_time'],
      'max-age' => '1000',
      'contexts' => ['user'],
  	],
	];
  	return $build;
  }

  protected function blockAccess(AccountInterface $account){
    return AccessResult::allowedIfHasPermission($account, 'permission perso');
  }
}
  
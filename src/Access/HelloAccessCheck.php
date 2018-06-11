<?php

namespace Drupal\hello\Access;

use Drupal\Core\Access\AccessCheckInterface;
use Drupal\Core\Session\AccountInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Access\AccessResult;

class HelloAccessCheck implements AccessCheckInterface{

	public function applies(Route $route){
		return NULL;
	}

	public function access(Route $route, Request $request=NULL, AccountInterface $account){
/*		$param = $route->getRequirement('access_hello');
    if( \Drupal::currentUser()->created() < \Drupal::service('datetime.time')->getCurrentTime() - $param * 3600);
*/
		return AccessResult::allowed();
	}
}
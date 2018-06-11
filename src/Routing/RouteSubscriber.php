<?php

namespace Drupal\hello\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase{
	protected function alterRoutes(RouteCollection $collection){
	  ksm($collection);
	  if($route = $collection->get('system.admin_structure')){
	  $route->setRequirement('_access', 'FALSE');
    }
  }
}
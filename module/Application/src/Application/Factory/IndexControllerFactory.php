<?php
namespace Application\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;
use Interop\Container\ContainerInterface;

class IndexControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{				
		$controller = new IndexController($container);
		return $controller;
	}
	
	public function createService(ServiceLocatorInterface $serviceLocator) {
		
	}
	
}
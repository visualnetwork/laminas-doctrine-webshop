<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
    	$application		 = $e->getApplication();
        $eventManager        = $application->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $serviceManager 	 = $application->getServiceManager(); 
        $sessionManager 	 = $serviceManager->get(SessionManager::class);
        
        $doctrineEntityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
        $doctrineEventManager = $doctrineEntityManager->getEventManager();
        $doctrineEventManager->addEventListener(
        		[
        				\Doctrine\ORM\Events::postPersist,
        				\Doctrine\ORM\Events::preUpdate,
        		],
        		new Service\DoctrineLogChangesService($serviceManager)
        );
        
        $sharedEventManager = $eventManager->getSharedManager();
        $sharedEventManager->attach(__NAMESPACE__, MvcEvent::EVENT_DISPATCH_ERROR,
        		[$this, 'onError'], 100);
        $sharedEventManager->attach(__NAMESPACE__, MvcEvent::EVENT_RENDER_ERROR,
        		[$this, 'onError'], 100);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                	'vnw' => __DIR__ . '/../../vendor/vnw',
                ),
            ),
        );
    }

    // hiba esetén e-mailt küld
    public function onError(MvcEvent $event) {
    	// Get the exception information.
    	$exception = $event->getParam('exception');
    	if ($exception!=null) {
    		$exceptionName = $exception->getMessage();
    		$file = $exception->getFile();
    		$line = $exception->getLine();
    		$stackTrace = $exception->getTraceAsString();
    	}
    	$errorMessage = $event->getError();
    	$controllerName = $event->getController();
    	
    	// Prepare email message.
    	$to = 'dev@visualnetwork.hu';
    	$subject = 'Doctrine Exception';
    	
    	$body = '';
    	if(isset($_SERVER['REQUEST_URI'])) {
    		$body .= "Request URI: " . $_SERVER['REQUEST_URI'] . "\n\n";
    	}
    	$body .= "Controller: $controllerName\n";
    	$body .= "Error message: $errorMessage\n";
    	if ($exception!=null) {
    		$body .= "Exception: $exceptionName\n";
    		$body .= "File: $file\n";
    		$body .= "Line: $line\n";
    		$body .= "Stack trace:\n\n" . $stackTrace;
    	}
    	
    	$body = str_replace("\n", "<br>", $body);
    	
    	// Send an email about the error.
    	mail($to, $subject, $body);
    }
}

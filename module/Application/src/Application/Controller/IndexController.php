<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Interop\Container\ContainerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use vnw\User\AdminUser;
use vnw\User\UsersType;

class IndexController extends AbstractActionController
{
	
	protected $serviceLocator;
	
	public function __construct(ContainerInterface $container)
	{
		$this->serviceLocator=$container;
	}
	
    public function indexAction()
    {
    	    	    	
    	if(isset($sessionContainer->myVar)) {
    		print('van '.$sessionContainer->myVar);
    	}
    	else {
    		print('nincs');
    	}
    	
    	$sessionContainer->myVar = 'Some data';
    	
        $entityManager = $this->serviceLocator->get('Doctrine\ORM\EntityManager');        
        
        // Így kell frissíteni a módosult táblát. Be lehet állítani, hogy DEV módban ezt megtegye
    	
        $tool = new SchemaTool($entityManager);
        $class=$entityManager->getMetadataFactory()->getAllMetadata();
        $a=$tool->updateSchema($class,true);

        
        $userstype = $entityManager->find("vnw\Entity\User\UsersType", 1);
                                     
        print($userstype->getName());
        
        $userstype->setName('SuperUsers');
        $entityManager->flush();
        
        /*
		$userType=new UsersType();
		$userType->setActive(1);
		$userType->setAdmin(1);
		$userType->setSn(2);
		$userType->setName('Users');		
		$userType->setCreator($user);
		$userType->setDeleted(0);
		$userType->setIsDeletable(1);
		
		$entityManager->persist($userType);
        */
        
		//$type=new UsersType();
		//$type->setName('Admin');
		//$type->setCreator($user);
        
        /*
        $user = new AdminUser();
        $user->setName('dddd');
        
        $entityManager->persist($user);
        $entityManager->flush();        
        
        
		$usertype=new UsersType();
		$usertype->setName('user6');
		$usertype->setActive(1);
		$usertype->setAdmin(0);
		$usertype->setSn(1);
		//$usertype->setLastModification(new \DateTime('now'));
		//$usertype->setCreation(new \DateTime('now'));
		$usertype->setDeleted(0);
		*/
		//$entityManager->persist($user);			
		
        
		//$entityManager->flush();
        
        return new ViewModel();
    }
}

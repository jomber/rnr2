<?php
namespace Review;

use Review\Model\Review;
use Review\Model\ReviewTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'Review\Model\ReviewTable' =>  function($sm) {
    						$tableGateway = $sm->get('ReviewTableGateway');
    						$table = new ReviewTable($tableGateway);
    						return $table;
    					},
    					'ReviewTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Review());
    						return new TableGateway('review', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}
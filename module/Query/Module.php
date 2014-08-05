<?php
namespace Query;

use Query\Model\Query;
use Query\Model\QueryTable;
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
    					'Query\Model\QueryTable' =>  function($sm) {
    						$tableGateway = $sm->get('QueryTableGateway');
    						$table = new QueryTable($tableGateway);
    						return $table;
    					},
    					'QueryTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new Query());
    						return new TableGateway('query', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
}
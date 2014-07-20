<?php
namespace Stadium;

use Stadium\Model\Stadium;
use Stadium\Model\StadiumTable;
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
                'Stadium\Model\StadiumTable' =>  function($sm) {
                    $tableGateway = $sm->get('StadiumTableGateway');
                    $table = new StadiumTable($tableGateway);
                    return $table;
                },
                'StadiumTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Stadium());
                    return new TableGateway('stadium', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }

}
<?php
namespace Todos;

use Todos\Model\TodosTable;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
         'Zend\Loader\StandardAutoloader' => array(
             'namespaces' => array(
                 // Autoload Listapp classes
                 __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 // Autoload ListappController classes
                 'TodosController' => __DIR__ . '/src/Todos',
                )
            )
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
    			'Todos\Model\TodosTable' => function($sm) {
    				$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new TodosTable($dbAdapter);
                    return $table;
    			},
    		),
    	);
    }
}
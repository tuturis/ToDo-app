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
use Zend\View\Model\JsonModel;
class IndexController extends AbstractActionController
{
    protected $_UsersTable;
    public function indexAction()
    {	
        return new ViewModel(array(
        	'users' => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',),
        	));
    }
    public function getUsersAction()
    {   
        return new JsonModel(array(
            'users' => $this->getUserTable()->fetchAll(),
            ));
    }
	public function getUserTable() {
		if (!$this->_UserTable) {
     	   $sm = $this->getServiceLocator();
       	 $this->_todosTable = $sm->get('Application\Model\UserTable');
    	}
    	return $this->_todosTable;
   }
}

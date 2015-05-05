<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController {
    protected $_UsersTable;
    

    public function indexAction() {
    
    return new ViewModel(array(
            'users' => $this->getUsersTable()->fetchAll(),
            ));
    }



    public function getUsersAction()
    {   
        return new JsonModel(array(
            'users' => $this->getUserTable()->fetchAll(),
            ));
    }
	public function getUsersTable() {
		if (!$this->_UsersTable) {
     	   $sm = $this->getServiceLocator();
       	 $this->_UsersTable = $sm->get('Application\Model\UsersTable');
    	}
    	return $this->_UsersTable;
   }
}

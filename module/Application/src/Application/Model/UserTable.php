<?php
namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use ZfcUser\Entity\User;

class UserTable extends AbstractTableGateway {
	protected $table = 'user';

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
	}
	public function fetchAll() {
    $resultSet = $this->select(function (Select $select) {
    });
    $entities = array();
    foreach ($resultSet as $row) {
        	$entity = new Entity\MyUser();
            $entity ->setId($row->id)
            		->setUsers($row->username);
        $entities[] = $entity;
    	}
    return $entities;
    }
    
	public function saveUser(Entity\User $user)
	{
		/* do smth */
	}
	public function removeUser($id)
	{
		return $this->delete(array('id' => (int) $id));
	}
}
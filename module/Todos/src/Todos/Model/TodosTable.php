<?php
namespace Todos\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;

class TodosTable extends AbstractTableGateway {
	protected $table = 'todos';

	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
	}
	public function fetchAll() {
    $resultSet = $this->select(function (Select $select) {
        $select->order('created ASC');
    });
    $entities = array();
    foreach ($resultSet as $row) {
        	$entity = new Entity\Todo();
            $entity ->setId($row->id)
            		->setTodo($row->todo)
					->setPriority($row->priority)
					->setCreated($row->created)
					->setDeadline($row->deadline)
					->setCreatedBy($row->createdBy)
					->setCompleted($row->completed);
         /*$entity = array(
            "id"       => $row->id,
            "todo"     => $row->todo,
			"priority" => $row->priority,
			"created"  => $row->created,
			"deadline" => $row->deadline,
			"createdBy"=> $row->createdBy,
			"completed"=> $row->completed
        ); // use with angular*/
        $entities[] = $entity;
    	}
    return $entities;
    } 

	public function getTodo($id)
	{
		$row = $this->select(array('id' => (int) $id))->current();
		if (!$row) {
			return false;
		}
		
		$todo = new Entity\Todo(array(
			'id' => $row->id,
			'todo' => $row->todo,
			'priority' => $row->priority,
			'created' => $row->created,
			'deadline' => $row->deadline,
			'createdBy' => $row->createdBy,
			'completed' => $row->completed,
			));
		return $todo;
	}
	public function saveTodo(Entity\Todo $todo)
	{
		$data = array(
			'todo' => $todo->getTodo(),
			'priority' => $todo->getPriority(),
			'created' => $todo->getCreated(),
			'deadline' => $todo->getDeadline(),
			'createdBy' => $todo->getCreatedBy(),
			'completed' => $todo->getCompleted(),
			);

		$id = (int) $todo->getId();

		if ($id == 0) {
			$data['created'] = date('Y-m-d H:i:s');
			if (!$this->insert($data)) {
				return false;
			} else {
				return $this->getLastInsertValue();
			}
		} elseif ($this->getTodo($id)) {
			if (!$this->update($data, array('id' => $id))) {
				return false;
			}
			return $id;
		} else {
			return false;
		}
	}
	public function removeTodo($id)
	{
		return $this->delete(array('id' => (int) $id));
	}
}
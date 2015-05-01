<?php

namespace Todos\Model\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class Todo {
	 /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
	protected $_id;
	/** @ORM\Column(type="varchar(255)") */
	protected $_todo;
	/** @ORM\Column(type="varchar(255)") */
	protected $_priority;
	/** @ORM\Column(type="TIMESTAMP") */
	protected $_created;
	/** @ORM\Column(type="TIMESTAMP") */
	protected $_deadline;
	/** @ORM\Column(type="varchar(255)") */
	protected $_createdBy;
	/** @ORM\Column(type="TINYINT") */
	protected $_completed = 0;


	public function __construct(array $options= null)
	{
		if (is_array($options)) {
			$this->setOptions($options);
		}	
	}

	public function __set($name, $value) 
	{
		 $method = 'set' . $name;
        if (!method_exists($this, $method)) {
            throw new Exception('Invalid Method');
        }
        $this->$method($value);
	}
	public function __get($name)
	{
		$method = 'get' . $name;
		if (!method_exists($this, $method)) {
			throw new Exception("Invalid Method");
		}
		$this->$method($value);
	}
	public function setOptions(array $options)
	{
		$methods = get_class_methods($this);
		foreach ($options as $key => $value) {
			$method = 'set' . ucfirst($key);
			if (in_array($method, $methods))
			{
				$this->$method($value);
			} 
		}
		return $this;
	}

	public function getId()
	{
		return $this->_id;
	}
	public function setId($id) {
        $this->_id = $id;
        return $this;
    }

	public function getTodo()
	{
		return $this->_todo;
	}
	public function setTodo($todo) {
		$this->_todo = $todo;
		return $this;
	}
	public function getPriority()
	{
		return $this->_priority;
	}
	public function setPriority($priority) {
		$this->_priority = $priority;
		return $this;
	}

	public function getDeadline()
	{
		return $this->_deadline;
	}
	public function setDeadline($deadline) {
		$this->_deadline = $deadline;
		return $this;
	}
	
	public function getCreated() {
        return $this->_created;
    }

    public function setCreated($created) {
        $this->_created = $created;
        return $this;
    }

    public function getCreatedBy() {
        return $this->_createdBy;
    }

    public function setCreatedBy($createdBy) {
        $this->_createdBy = $createdBy;
        return $this;
    }
    
    public function getCompleted() {
        return $this->_completed;
    }

    public function setCompleted($completed) {
        $this->_completed = $completed;
        return $this;
    }
}
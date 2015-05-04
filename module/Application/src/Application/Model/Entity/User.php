<?php 
namespace Todos\Model\Entity;


class User {

	protected $_id;

	protected $_user;




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

	public function getUser()
	{
		return $this->_todo;
	}
	
	public function setUser($todo) {
		$this->_todo = $todo;
		return $this;
	}
	


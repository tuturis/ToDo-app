<?php 
namespace Application\Model\Entity;


class Users  {

	protected $_user_id;
	protected $_username;

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

	public function getUser_id()
	{
		return $this->_id;
	}
	public function setUser_id($user_id) {
        $this->_user_id = $user_id;
        return $this;
    }

	public function getUsername()
	{
		return $this->_username;
	}
	
	public function setUsername($username) {
		$this->_username = $username;
		return $this;
	}
}	


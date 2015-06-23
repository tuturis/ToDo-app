<?php
namespace Todos\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class TodosController extends AbstractActionController {
	protected $_todosTable;
	
	public function indexAction() {
        $request = $this->getRequest();
        /*pagination */
        $limit = 1;
        $offset= 0;
        if ($request->isPost()) {
            $post_data = $request->getPost();
            $limit = $post_data['limit'];
            $offset = $post_data['offset'];
      
        }
		return new ViewModel(array(
			'todos' => $this->getTodosTable()->getTodos($limit, $offset),
            'PriorityTodos' => $this->getTodosTable()->fetchByPriority(),
			));
	}

    public function getTodosAction() {
        $request = $this->getRequest();
        $response = $this->getResponse();

         if ($request->isPost()) {
            $post_data = $request->getPost();
            $limit = $post_data['limit'];
            $offset = $post_data['offset'];
            $response = array(                        
                        'todos' => $this->getTodosTable()->getTodos($limit, $offset),
                        'PriorityTodos' => $this->getTodosTable()->fetchByPriority(),
                       );
        }
        return new ViewModel($response);
        // return new ViewModel(array(
        //     'todos' => $this->getTodosTable()->fetchAll(),
        //     'PriorityTodos' => $this->getTodosTable()->fetchByPriority(),
        //     ));
    }
    /* use to get json (for angular) */
    public function getAllAction() {
    $request = $this->getRequest();
    if ($request->isGet()) {
        $results = $this->getTodosTable()->fetchAll();
        $data = array();
        foreach($results as $result) {
         $data[] = $result;
        }
            $json = new JsonModel(array('data' => $data));
        } else {
            $json = new JsonModel('not a get');
        }
    return $json; 
    }



	public function addAction() {
	$request = $this->getRequest();
    $response = $this->getResponse();
	if ($request->isPost()) {
        $post_data = $request->getPost();
        $new_todo = new \Todos\Model\Entity\Todo();
        if (isset($post_data['content']) || !empty($post_data['content'])) {
            $todo_content = $post_data['content'];
            $new_todo->setTodo($todo_content);
        } 
        if (isset($post_data['deadline']) || !empty($post_data['deadline'])) {
            $todo_deadline = $post_data['deadline'];
            $new_todo->setDeadline($todo_deadline);
        }
   		if (isset($post_data['priority']) || !empty($post_data['priority'])) {
            $todo_priority = $post_data['priority'];
            $new_todo->setPriority($todo_priority);
        }

        if (!$todo_id = $this->getTodosTable()->saveTodo($new_todo)) {
           /* $json = new JsonModel(array('data' => false)); */
            $response->setContent(\Zend\Json\Json::encode(array('response' => false)));
        } else {
            $response->setContent(\Zend\Json\Json::encode(array('response' => true, 'new_todo_id' => $todo_id, '$todo_content' =>  $todo_content)));
           /* $json = new JsonModel(array('data' => true , 'new_todo_id' => $todo_id));*/
		}           
	} else {
        $response = new JsonModel('not a post');
    }
    return $response; 		
	}

	public function removeAction() {
		$request = $this->getRequest();
        $response = $this->getResponse();

         if ($request->isPost()) {
            $post_data = $request->getPost();
            $todo_id = $post_data['id'];
            if (!$this->getTodosTable()->removeTodo($todo_id))
                $response->setContent(\Zend\Json\Json::encode(array('response' => false, '$post_data' => json_encode(var_dump($post_data['id'])))));
            else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => true)));
            }
        }
        return $response;
	}

	public function updateAction() {
		$request = $this->getRequest();
        $response = $this->getResponse();
        if ($request->isPost()) {
            $post_data = $request->getPost();
            $todo_id = $post_data['id'];
            $todo = $this->getTodosTable()->getTodo($todo_id);
            if (isset($post_data['content']) || !empty($post_data['content'])) {
                $todo_content = $post_data['content'];
                $todo->setTodo($todo_content);
           } 
           if (isset($post_data['completed']) || !empty($post_data['completed'])) {
                $todo_completed = $post_data['completed'];
                $todo->setCompleted($todo_completed);
           }
           if (isset($post_data['deadline']) || !empty($post_data['deadline'])) {
                $todo_deadline = $post_data['deadline'];
                $todo->setDeadline($todo_deadline);
           }
            if (!$this->getTodosTable()->saveTodo($todo)) {
                $response->setContent(\Zend\Json\Json::encode(array('response' => false, '$post_data' => json_encode(var_dump($post_data)))));
            } else {
                $response->setContent(\Zend\Json\Json::encode(array('response' => true)));
            }
        }
        return $response;
	}

	public function getTodosTable() {
		if (!$this->_todosTable) {
            $sm = $this->getServiceLocator();
            $this->_todosTable = $sm->get('Todos\Model\TodosTable');
        }
        return $this->_todosTable;
    }
}
<?php
class AdminController extends AppController {

  public $uses = ['User', 'Department'];

	public function index()
	{
	}

  public function search()
  {
    if (!$this->request->is('POST'))  return;

    $users = $this->User->find('all',
                         ['conditions' => $this->request->data['User']['user_name'] === '' ? null : ['User.user_name LIKE' => '%' . $this->request->data['User']['user_name'] . '%'] 
                         ]);
    if (count($users) === 0) $this->Session->setFlash(str_replace("#01", 'ユーザ', MESSAGE_SEARCH_ALL_001));
    $this->set(['is_searched' => true, 'users' => $users]);

  }

  public function register()
  {
    
    $this->_setDepartmentSelectList();
    
    if (!$this->request->is('POST'))  return;
    $this->User->set($this->request->data);
    
    if (!$this->User->save($this->request->data)) return;
    
    $this->Session->setFlash(str_replace(["#01", "#02"], ['ユーザ', '登録'], MESSAGE_FINISH_ALL_001));
    $this->redirect(['controller' => $this->name, 'action' => $this->action]);
    
    ;
  }

  public function change()
  {
    $user = $this->User->find('first',
                         ['conditions' => ['User.id' => $this->request->query['id']]
                         ]);
  debug($user);
    $this->_setDepartmentSelectList();
    $this->set(['user' => $user]);
    
  }
  
  private function _setDepartmentSelectList()
  {
    $departments = $this->Department->find('list');
    $this->set(['departments' => $departments]);

  }

}

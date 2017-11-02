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
                         ['conditions' => ['User.login_name' => $this->request->data['User']['login_name']
                         ]]);
    if (count($users) === 0) $this->Session->setFlash('該当ユーザが見つかりませんでした');
    $this->set(['is_searched' => true, 'users' => $users]);

  }

  public function register()
  {
    $this->User->set($this->request->data);
    debug($this->User->validates());
    debug($this->User->validationErrors);
    $departments = $this->Department->find('list');
    $this->set(['departments' => $departments]);
    if (!$this->request->is('POST'))  return;
    
    
    // debug($this->User->save($this->request->data));
  }

  public function change()
  {

  }

  public function delete()
  {

  }
}

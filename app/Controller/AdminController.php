<?php
class AdminController extends AppController {

  public $uses = ['User'];

	public function index()
	{

	}

  public function search()
  {
    if (!$this->request->is('POST'))  return;

    debug($this->request->data['User']['name']);

    $users = $this->User->find('all',
                         ['conditions' => ['User.name' => $this->request->data['User']['name']
                         ]]);
    if (count($users) === 0) $this->Session->setFlash('該当ユーザが見つかりませんでした');
    $this->set(['is_searched' => true, 'users' => $users]);

  }

  public function register()
  {

  }

  public function change()
  {

  }

  public function delete()
  {

  }
}

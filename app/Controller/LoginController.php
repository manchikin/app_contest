<?php
class LoginController extends AppController {
  public $uses = ['User'];
  public function index()
  {
    if (!$this->request->is('POST')) return;

    $this->User->set($this->request->data);
    if (!$this->User->validates()) return;

      $user_account = $this->User->find('first',
                           ['conditions' => ['User.name' => $this->request->data['User']['name'],
                                            ['User.password' => $this->request->data['User']['password']
                           ]]]);
      if (empty($user_account)) {
        $this->Session->setFlash('ユーザ名あるいはパスワードに誤りがあります');
        return;
      }

      return $this->redirect(
        ['controller' => 'admin', 'action' => 'main']
    );
  }
}

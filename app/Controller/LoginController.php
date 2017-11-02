<?php
class LoginController extends AppController {
  public $uses = ['User'];

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index', 'logout');  
  }
  
  public function index()
  {
    debug(str_replace('#01', 5, MESSAGE_VL_ALL_002));
    $validator = $this->User->validator();
    unset($validator['login_name']['isUnique']);

    if (!$this->request->is('POST')) return;
    
    $this->User->set($this->request->data);
    if(!$this->User->validates()) return;
    
    if (!$this->Auth->login()) {
      $this->Session->setFlash(__('Invalid username or password, try again'));
      return;
    }
    
    $this->redirect($this->Auth->redirect());
    
  }
  public function logout()
  {
    $this->Auth->logout();
  }
  
}

<?php
class LoginController extends AppController {
  public $uses = ['User'];

  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('index', 'logout');  
  }
  
  public function index()
  {
    if (!$this->request->is('POST')) return;
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

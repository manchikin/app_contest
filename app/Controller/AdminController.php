<?php
class AdminController extends AppController {

  public $uses = ['User', 'Department'];

	public function index()
	{
	}

  public function search()
  {
    
    if (!$this->request->is('POST')) {
      $this->set('users', $this->User->find('all'));
      return;
    }

    $users = $this->User->find('all',
                         ['conditions' => $this->request->data['User']['user_name'] === '' ? null : ['User.user_name LIKE' => '%' . $this->request->data['User']['user_name'] . '%'] 
                         ]);
    if (count($users) === 0) $this->Session->setFlash(str_replace("#01", 'ユーザ', MESSAGE_SEARCH_ALL_001));
    $this->set(['users' => $users]);

  }

  public function register()
  {
    
    $this->set(['departments' => $this->_getDepartmentSelectList()]);
    
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
                         ['conditions' => ['User.id' => $this->request->query['id'],
                                           'User.is_deleted' => false
                                          ]
                         ]);

    if ($user === []) {
      // @TODO 存在しないIDがパラメータとして渡された場合
      $this->Session->setFlash(str_replace("#01", 'ユーザ', MESSAGE_ERROR_ALL_001));
      return;
    }
  
    $isChangeable = $this->_hasChangingRightOfOthers($user);
    if (!$isChangeable) {
      // 編集権限がない場合
      $this->Session->setFlash(MESSAGE_ERROR_ALL_002);
    }
    
    $this->set(['user'         => $user,
                'isChangeable' => $isChangeable,
                'departments'  => $this->_getDepartmentSelectList()
              ]);
    
    if ($this->request->data === []) return; // クエリパラメータも使用するため、is('POST')だとうまく動作しない
    
    if ($this->request->data['User']['is_deleting'] === '1') {
      $this->User->delete($this->request->data('User.id'));
      $this->redirect(['controller' => $this->name, 'action' => 'search']);
    }
    
    $this->User->set($this->request->data);
    if (!$this->User->validates(['fieldList' => $this->_getValidateFieldList($user)])) return;
    
    $updateResult = $this->User->updateAll($this->_getUpdateFieldList(),
                          [ //conditions
                            'User.id' => $this->request->data['User']['id']
                          ]);
    
  }
  
  /**
   * 該当ユーザの変更を行えるかどうか返却
   * 管理者権限がある場合：true, ない場合：自分の変更のみtrue
   * 
   * @param  array $user 編集対象のユーザフォーム情報
   * @return bool
   * 
   */
  private function _hasChangingRightOfOthers($user)
  {
    return $this->Auth->user('is_admin') || $this->Auth->user('id') === $user['User']['id'];
  }
  
  /**
   * バリデーション対象項目の配列を返却する
   * 
   * @return array
   * 
   */
  private function _getValidateFieldList()
  {
    return array_merge(['user_name', 'department_id'], $this->_isChangingPassword() === '1' ? ['password', 'confirm_password'] : []); 
  }
  
  
 /**
   * バリデーション対象項目の配列を返却する
   * 
   * @return array
   * 
   */
  private function _getUpdateFieldList()
  {
    return array_merge([
                            'User.user_name'     => "'".$this->request->data['User']['user_name']."'",
                            'User.department_id' => $this->request->data['User']['department_id'],
                            'User.is_admin'      => $this->request->data('User.is_admin')
                        ],
                        $this->_isChangingPassword() ? ['User.password' => "'".AuthComponent::password($this->request->data['User']['password'])."'"] : [] );
  }
  
 /**
   * パスワードの変更を要求されているかどうかを返却する
   * 
   * @return bool
   * 
   */
  private function _isChangingPassword()
  {
    return ($this->request->data['User']['change_password'] ?? 0 ) === '1';
  }
  
  /**
   * ユーザ情報に使用する部署情報セレクトボックスのための配列をビューに設定する
   * 
   * @return array
   * 
   */
  private function _getDepartmentSelectList()
  {
    return $this->Department->find('list');
  }

}

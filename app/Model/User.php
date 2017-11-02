<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
  public $validate = [
    'login_name' => [
          "loginRule-1" => [
            'rule' => 'notBlank',
            'message' => '入力値が空です'  
          ],
          "loginRule-2" => [
            'rule' => ['minLength', 5],
            'message' => '最低5文字必要です'
          ],
          "loginRule-3" => [
            'rule' => ['maxLength', 24],
            'message' => '最大24文字です'
          ],
          
    ],
    'password' => [
          "loginRule-1" => [
            'rule' => 'notBlank',
            'message' => '入力値が空です'  
          ],
          "loginRule-2" => [
            'rule' => ['minLength', 8],
            'message' => '最低8文字必要です'
          ],
          "loginRule-3" => [
            'rule' => ['maxLength', 24],
            'message' => '最大24文字です'
          ],
    ],
    'department_id' => [
        "loginRule-1" => [
            'rule' => 'notBlank',
            'message' => '入力値が空です'  
          ],
    ],
    'confirm_password' => [
        "loginRule-1" => [
            'rule' => 'notBlank',
            'message' => '入力値が空です'  
          ],
        "loginRule-2" => [
          'rule' => ['confirmPassword', 'password'],
          'message' => '前に入力したパスワードと異なります'
        ],
    ]
  ];
  
  public $belongsTo = [
        'Department'=>[
            'className' => 'Department',
        ],
  ];
  
  public function confirmPassword($check, $otherfield)
  {
		$fname = '';
		foreach ($check as $key => $value){
			$fname = $key;
			break;
		}
		debug($this->data[$this->name]);
		debug($this->data[$this->name][$otherfield]);
		debug($this->data[$this->name][$fname]);
		return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
	}
}

<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
  public $validate = [
    
    
    
  ];
  
  public $belongsTo = [
        'Department'=>[
            'className' => 'Department',
        ],
  ];
  
  public function __construct()
  {
    parent::__construct();
    $this->validator()
      ->add('login_name', [
        "notBlank" => [
            'rule'      => 'notBlank',
            'message'   => MESSAGE_VALIDATION_ALL_001  
          ],
          "minLength" => [
            'rule'      => ['minLength', 5],
            'message'   => str_replace('#01', 5, MESSAGE_VALIDATION_ALL_002)
          ],
          "maxLength" => [
            'rule'      => ['maxLength', 24],
            'message'   => str_replace('#01', 24, MESSAGE_VALIDATION_ALL_003)
          ],
          "isUnique" => [
            'rule'      => 'isUnique',
            'on'        => 'create',
            'message'   => str_replace('#01', 'ユーザID', MESSAGE_VALIDATION_ALL_004)
          ],
      ])
      ->add('password', [
        'required' => [
          'rule'    => 'notBlank',
          'message' => MESSAGE_VALIDATION_ALL_001
        ],
        'minLength' => [
          'rule'    => ['minLength', 5],
          'message' => str_replace('#01', 5, MESSAGE_VALIDATION_ALL_002)
        ],
      ])
      ->add('department_id', [
        "required" => [
            'rule' => 'notBlank',
            'message' => MESSAGE_VALIDATION_ALL_001 
          ],
      ])
      ->add('confirm_password', [
        "required" => [
            'rule' => 'notBlank',
            'message' => MESSAGE_VALIDATION_ALL_001 
          ],
        "same" => [
          'rule' => ['confirmPassword', 'password'],
          'message' => str_replace('#01', 'ユーザID', MESSAGE_VALIDATION_PWD_001)
        ],
      ])
      ->add('user_name', [
        "required" => [
            'rule' => 'notBlank',
            'message' => MESSAGE_VALIDATION_ALL_001
          ],
        
    ]);
  }
  
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
	
	public function beforeSave($options = array())
	{
    if (isset($this->data['User']['password'])) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }
    return true;
  }
}

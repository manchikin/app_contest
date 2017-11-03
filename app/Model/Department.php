<?php
App::uses('AppModel', 'Model');
class Department extends AppModel {
    
    public function __construct()
  {
    parent::__construct();
    $this->validator()
    ->add('name', [
        'require' => [
          'rule' => 'notBlank',
          'allowEmpty' => false,
          'message' => MESSAGE_VALIDATION_ALL_001
        ]
    ]);
  }
}

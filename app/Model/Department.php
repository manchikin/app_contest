<?php
App::uses('AppModel', 'Model');
class Department extends AppModel {
    public $validate = [
    'name' => [
        'loginRule-1' => [
          'rule' => 'alphaNumeric',
          'allowEmpty' => false,
          'message' => '入力値が空です'
        ]
    ]];
}

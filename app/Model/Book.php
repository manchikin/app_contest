<?php
App::uses('AppModel', 'Model');
class Book extends AppModel {

  public $useTable = false;
  public $_schema = [
      'book_name' => [
          'type' => 'string',
          'length' => '255',
      ],
  ];

  public $validate = [];


  public function __construct()
  {
    parent::__construct();
    $this->validator()
      ->add('name', [
        "notBlank" => [
            'rule'      => 'notBlank',
            'message'   => MESSAGE_VALIDATION_ALL_001
          ],
      ]);
  }

}

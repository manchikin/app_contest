<?php


class BookController extends AppController {

  public $components = ['Paginator'];
  // public $paginate = [
  //       'limit' => 5,
  //       'order' => [
  //           'User.name' => 'asc'
  //       ],
  //       'paramType' => 'querystring'
  //   ];

  public $uses = ['Book'];

  public function index()
  {
    $this->redirect('search');
  }

  public function search()
  {
    if (!$this->request->is('POST')) return;
    $this->Book->set($this->request->data);
    if (!$this->Book->validates()) return;
    $search_result = $this->getApiResponseByArray("ItemSearch", $this->request->data('Book.name'));
    debug($search_result);
    debug($search_result['ItemSearchResponse']['Items']['Item']);
    $this->set(["search_result" => $search_result['ItemSearchResponse']['Items']['Item']]);
  }
}

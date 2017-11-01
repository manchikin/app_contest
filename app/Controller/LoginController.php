<?php
class LoginController extends AppController {

	public function index()
	{
		debug($this->request->is('POST'));
		debug($this->request->data);
	}
}

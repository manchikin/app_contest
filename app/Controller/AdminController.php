<?php
class AdminController extends AppController {

	public function login()
	{
		debug($this->request->is('POST'));
		debug($this->request->data);
	}
}

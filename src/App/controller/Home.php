<?php
namespace App\Controller;
use Core\BaseController;
use Core\Bootstrap;

class Home extends BaseController
{
	public function index()
	{
		$this->view('index');
	}
}
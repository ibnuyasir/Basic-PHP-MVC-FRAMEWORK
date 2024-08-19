<?php
namespace App\Controllers;

use Core\BaseController;
use App\Models\User;

class UserController extends BaseController{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAll();
        $this->view('users/index', ['users' => $users]);
    }
}
<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        print_r($user->findAll());
    }
}
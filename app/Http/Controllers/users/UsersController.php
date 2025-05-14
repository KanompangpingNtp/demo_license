<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
     public function UsersIndex()
    {
        return view('users.index');
    }
}

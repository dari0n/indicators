<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    //


    public function index()
    {
        $currentToken = $this->getActiveToken();
        $users = User::all();

        return view('admin.index',['users'=>$users]);
    }

    public function getActiveToken()
    {
        return session()->get('_token');
    }

    public function editUser()
    {
        return view('admin.edituser');
    }
}

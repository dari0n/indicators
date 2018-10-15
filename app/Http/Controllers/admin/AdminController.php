<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{
    //


    public function index()
    {
        $currentToken = $this->getActiveToken();

        if(Auth::user()->group_id == 84235){
            $users = User::all();
            return view('admin.index',['users'=>$users]);
        }
        $users =  User::all()->where('group_id',1);
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

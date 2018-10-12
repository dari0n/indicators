<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class session extends Controller
{
    //
    protected $user;

    public function __construct(User $user)
    {

        $this->user = $user;
    }

    public function index()
    {
        if(Auth::user())
        {
            $this->user->startSession(Auth::user()->getAuthIdentifier());
        }

        return view('welcome');
    }
}

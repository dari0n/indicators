<?php

namespace App\Http\Controllers\Ban;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanController extends Controller
{
    //
    public function index()
    {
        return view('ban.index');
    }

    public function badSession()
    {
        return view('ban.badsession');
    }
}

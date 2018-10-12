<?php

namespace App\Http\Controllers\Json;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsonController extends Controller
{
    //
    public function index()
    {
        return view('JsonData.layout');
    }
}

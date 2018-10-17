<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redis;
use App\Http\Controllers\admin\RedisController;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        RedisController::getDataFromRedis($request->osn,$request->tf,$request->deltaTf);
        RedisController::getAllKeys();

    }



    public function returnView()
    {
        $tf = RedisController::tfInSelect();
        $keys = RedisController::getAllKeys();
        return view('home.redisView',['keys' => $keys,'tf' => $tf]);
    }



}

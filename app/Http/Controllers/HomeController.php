<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redis;

class HomeController extends Controller
{
    public $startTime;
    public $execTime;

    public function index(Request $request)
    {

        $this->startTime = microtime(true); //Start timer


        $this->getDataFromRedis($request->osn,$request->tf);

        $this->getAllKeys();

    }

    public function UnixTimeStamp($timestamp){
        return date('H:i:s d-m-Y',substr($timestamp,0,-3));
    }

    public function getDataFromRedis($osn,$tf)
    {
        //Redis::flushdb();
        $kk = "*:$osn:$tf";

        $i=0;
        $list = Redis::keys($kk);
        $data = [];
        foreach ($list as $key)
        {
            $a = 0;
            //Get Value of Key from Redis
            $value = Redis::get($key);
            list($osn, $alt, $open_time, $clouse_time, $clouse_price, $RSI, $ADX, $AO, $MACD, $STOCH_K,$STOCH_D,$STOH_RSI_K,$STOH_RSI_D,$TF,$BIR,$TIME) = explode(":", $value);
            $data['data'][$i][$a] = $osn;
            $a++;
            $data['data'][$i][$a] = $alt;
            $a++;
            $data['data'][$i][$a] = $TF;
            $a++;
            $data['data'][$i][$a] = $this->UnixTimeStamp($open_time);
            $a++;
            $data['data'][$i][$a] = $this->UnixTimeStamp($clouse_time);
            $a++;
            $data['data'][$i][$a] = $clouse_price;
            $a++;
            $data['data'][$i][$a] = $RSI;
            $a++;
            $data['data'][$i][$a] = $ADX;
            $a++;
            $data['data'][$i][$a] = $AO;
            $a++;
            $data['data'][$i][$a] = $MACD;
            $a++;
            $data['data'][$i][$a] = $STOCH_K;
            $a++;
            $data['data'][$i][$a] = $STOCH_D;
            $a++;
            $data['data'][$i][$a] = $STOH_RSI_K;
            $a++;
            $data['data'][$i][$a] = $STOH_RSI_D;
            $a++;
            $data['data'][$i][$a] = date('H:i:s d-m-Y',$TIME);



            $i++;
        }

        $this->execTime = round(microtime(true) - $this->startTime);

        print(json_encode($data));

    }
    public function getAllKeys()
    {

        $list = Redis::keys("*");
        $i=0;
        $keys = [];
        foreach ($list as $key => $val)
        {
            $osn = explode(":",$val);
            $keys[$i] = $osn[1];
            $i++;
        }

        return array_unique($keys);

    }

    function tfInSelect(){
        $tf = [
            0 => '5m',
            1 => '15m',
            2 => '30m',
            3 => '1h',
            4 => '2h',
            5 => '4h',
            6 => '6h',
            7 => '8h',
            8 => '12h',
            9 => '1d',
        ];

        return $tf;
    }

    public function returnView()
    {
        $tf = $this->tfInSelect();
        $keys = $this->getAllKeys();

        return view('home.redisView',['keys' => $keys,'tf' => $tf]);
    }






}

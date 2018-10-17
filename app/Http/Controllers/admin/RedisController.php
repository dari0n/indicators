<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redis;

class RedisController extends Controller
{


    public function index(Request $request)
    {
        self::getDataFromRedis($request->osn,$request->tf,$request->deltaTf);
        self::getAllKeys();

    }

    public static function UnixTimeStamp($timestamp){
        return date('H:i:s d-m-Y',substr($timestamp,0,-3));
    }

    public static function getDataFromRedis($osn = 'ETH',$tf = '5m',$dltTF = '1d')
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
           // $data['data'][$i][$a] = self::UnixTimeStamp($open_time);
           // $a++;
           // $data['data'][$i][$a] = self::UnixTimeStamp($clouse_time);
            //// $a++;
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

            $delta = self::getDelta($osn,$alt,$dltTF);

            $data['data'][$i][$a] = $delta['dlt'];
            $a++;
            $data['data'][$i][$a] = $delta['lastPrice'];
            $a++;
            $data['data'][$i][$a] = date('H:i:s d-m-Y',$TIME);



            $i++;
        }



        print(json_encode($data));

    }
    public static function getDelta($osn = 'ETH',$alt = 'ADA',$dltTF = '1d')
    {
        $dltkk = "$alt:$osn:$dltTF:dlt"; //фильтр

        $deltaList = Redis::get($dltkk); //получаем весь список дельта по отобранному фильтру
        if ($deltaList){
            list($dlt,$lastPrice) = explode(":", $deltaList);
            $result['dlt'] = $dlt;
            $result['lastPrice'] = $lastPrice;
        }else{
            $result['dlt'] = null;
            $result['lastPrice'] = null;
        }
        return $result;

    }

    public static function getAllKeys()
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

    public static function tfInSelect(){
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
        $tf = self::tfInSelect();
        $keys = self::getAllKeys();

        return view('admin.redisView',['keys'=>$keys,'tf'=>$tf]);
    }






}

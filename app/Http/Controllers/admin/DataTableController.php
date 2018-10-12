<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTable;
class DataTableController extends Controller
{
    //
    public $getData;
    private $pattern = '/^[A-Z]{1,}/';


    public function index()
    {
        $getData = dataTable::getEntries();

        $output = $this->returnResult($getData);

        return view('admin.dataTable',['entries'=>$output]);
    }

    //удалить с названия пары таймфрейм
    public function deleteTfFromName($data)
    {
        preg_match($this->pattern,$data,$return);
        return $return[0];
    }

    //преобразование времени Y-m-d\TH:i:s\Z
    public function UnixTimeStamp($timestamp){
        return date('H:i:s d-m-Y',substr($timestamp,0,-3));
    }
    //преобразование в строку для избежания 1.5E9
    public function floattostr( $val )
    {
        preg_match( "#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#", trim($val), $o );
        return $o[1].sprintf('%d',$o[2]).($o[3]!='.'?$o[3]:'');
    }

    private function returnResult($entries){
        foreach ($entries as $data)
        {
            $result[] =  array(
                'osn' => $data->OSN,
                'pair_name' => $this->deleteTfFromName($data->pairs_tf),
                'timeframe' => $data->TF,
                'close_price' => number_format($data->clouse_price, 8, '.',' '),
                'openTime' => $this->UnixTimeStamp($data->open_time),
                'clouseTime' => $this->UnixTimeStamp($data->clouse_time),
                'RSI' => round(floatval($data->RSI),3),
                'ADX' => round(floatval($data->ADX),3),
                'AO' => round(floatval($data->AO),3),
                'MACD' => round(floatval($data->MACD),3),
                'STOCH_K' => round(floatval($data->STOCH_K),3),
                'STOCH_D' => round(floatval($data->STOCH_D),3),
                'STOH_RSI_K' => round(floatval($data->STOH_RSI_K),3),
                'STOH_RSI_D' => round(floatval($data->STOH_RSI_D),3),
                'TIME' => $this->UnixTimeStamp($data->time));




        }

        return $result;
    }

}

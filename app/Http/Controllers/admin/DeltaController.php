<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Delta;
use App\Http\Controllers\admin\DataTableController;

class DeltaController extends Controller
{
    private $pattern = '/^[A-Z]{1,}/';
    public function index()
    {
        $getData = Delta::getEntries();
        $output = $this->returnResult($getData);
        return view('admin.delta',['entries'=>$output]);
    }

    public function deleteTfFromName($data)
    {
        preg_match($this->pattern,$data,$return);
        return $return[0];
    }

    public function UnixTimeStamp($timestamp){
        return date('H:i:s d-m-Y',substr($timestamp,0,-3));
    }

    private function returnResult($entries){

        foreach ($entries as $data)
        {

            $result[] =  array(
                'osn' => $data->osn,
                'pair_name' => $this->deleteTfFromName($data->pairs_tf),
                'dlt' => '',
                'timeframe' => $data->tf,
                'close_price' => number_format($data->lastpr, 8, '.',' '),
                );
        }

        return $result;
    }

}

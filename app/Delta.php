<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Delta extends Model
{
    public $table = "delta";

    public static function getEntries()
    {
        return DB::table('delta')->get()->toArray();

    }

    public static function getQueryEntries($osn,$tf)
    {
        return DB::table('delta')->get()->toArray();
    }


}

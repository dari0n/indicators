<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dataTable extends Model
{
    public $table = "pair";

    public static function getEntries()
    {
       return DB::table('pair')->get()->toArray();

    }

    public static function getQueryEntries($osn,$tf)
    {
        return DB::table('pair')->get()->toArray();
    }


}

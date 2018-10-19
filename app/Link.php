<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //protected $table = 'Links'; //Таблица с которой будем работать, в случае если название модели не соответствует названию таблицы

    protected $fillable = [
        'alt_name', 'bir_name', 'link'
    ];



}

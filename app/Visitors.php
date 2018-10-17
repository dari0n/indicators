<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Visitors extends Model
{
    //
  public function index()
  {

  }
  public static function getUserEntries()
  {
     return DB::table('visitors')->where('user_id',Auth::user()->getAuthIdentifier())->count();
  }

  public static function setUserViews()
  {
      //получаем количество просмотров из базы, где ID авторизованного пользователя
      $visits =  DB::table('visitors')->where('user_id',Auth::user()->getAuthIdentifier())->get('views');
      //Если просмотров авторизованным не было, то ставим 1
      if(!$visits){
          DB::table('visitors')->where('id',Auth::user()->getAuthIdentifier())->update(['views' => 1]);
      }
      //иначе увеличиваем количество просмотров на 1 и записываем в базу
      $visits++;
      DB::table('visitors')->where('id',Auth::user()->getAuthIdentifier())->update(['views' => $visits]);
  }

  public static function addNewEntry($data)
  {
      if($data['user_id']){
          DB::table('visitors')->where('id',Auth::user()->getAuthIdentifier())->update(['views' => $visits]);
      }
  }
}

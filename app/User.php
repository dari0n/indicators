<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //возвращает session_token
    public function getSessionToken($id)
    {
        return $this->find($id);
    }
    //дает права админа
    public function setAdmin()
    {
        $this->group_id = 99;
        $this->save();
    }
    //делает пользователя активным
    public function setActive()
    {
        $this->is_active = 1;
        $this->save();
    }
    //Бан пользователя
    public function setBan()
    {
        $this->is_active = 0;
        $this->save();
    }
    //Дает стандартную группу пользователю
    public function setUserGroup()
    {
        $this->group_id = 1;
        $this->save();
    }
    public function startSession($user)
    {
        DB::table('users')
            ->where('id', $user)
            ->update(['session_token' => session()->get('_token')]);


    }

    public function getAllUsers()
    {
        return User::all();
    }


    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->name  =   $request->get('name');
        $user->email =   $request->get('email');
        $user->group_id=   $request->get('group_id');
        $user->is_active=   $request->get('is_active');
        $user->save();
        return redirect('/admin');
    }


}

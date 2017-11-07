<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','password', 'email','facebook_id','phone_number','token','city_id','profile_pic','mobile_type','mobile_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','sender','mobile_token'
    ];

        //Add User
    public static function addUser($request){
      if(isset($request->profile_pic)){
        // Upload Image
        $file                           = $request->profile_pic;
        $profile_pic                    = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/users/';
        $file                           = $file->move($path, $profile_pic);
      }
      $user = new User();
      $user->token = preg_replace('/[^A-Za-z0-9\-\']/', '', bcrypt(mt_rand()));
      $user->first_name       = $request->first_name;
      $user->last_name        = $request->last_name;
      $user->email            = $request->email;
      $user->phone_number     = $request->phone_number;
      $user->password         = bcrypt($request->password);
      $user->city_id          = $request->city_id;
      $user->IBAN             = $request->IBAN;
      $user->bank_name        = $request->bank_name;
      if (!empty($user->profile_pic)) {
        $user->profile_pic = $profile_pic;
      }
      else{
        $user->profile_pic = 'default.png';
      }
      $user->save();
      return $user;
     }

       //Edit User
    public static function editUser($request,$id){
      if(isset($request->profile_pic)){
        // Upload Image
        $file                           = $request->profile_pic;
        $profile_pic                    = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/users/';
        $file                           = $file->move($path, $profile_pic);
      }
      $user = User::find($id);
      $user->first_name       = $request->first_name;
      $user->last_name        = $request->last_name;
      $user->email            = $request->email;
      $user->phone_number     = $request->phone_number;
      $user->IBAN             = $request->IBAN;
      $user->bank_name        = $request->bank_name;
      if(!empty($request->password)){
        $user->password = bcrypt($request->password);
      }
      if (!empty($request->profile_pic)) {
        $user->profile_pic = $profile_pic;
      }

      $user->city_id          = $request->city_id;
      $user->save();
      return $user;
     }



     // all favorites that belongs to this user
     public function favorites()
     {
       return $this->hasMany('App\Favorite');
     }



     // device token
     public function mobile_token()
     {
       return $this->hasMany('App\Mobile_Token');
     }
}

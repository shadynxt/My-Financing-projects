<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

       //Add Admin
    public static function addAdmin($request){
      $admin = new Admin(); 
      $admin->username = $request->username;
      $admin->email    = $request->email;
      $admin->password = bcrypt($request->password);
      $admin->save();
     }
     
       //Edit Admin
    public static function editAdmin($request,$id){
      $admin = Admin::find($id); 
      $admin->username = $request->username;
      $admin->email    = $request->email;
      if($request->password ==""){
        $admin->password =$admin->password;
      }
     else{
        $admin->password = bcrypt($request->password);
      }
      $admin->save();
     }
  
}



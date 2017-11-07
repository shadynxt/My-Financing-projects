<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Supported extends Model
{
    //
    protected $table = 'users_supported';
    protected $fillable = ['username' , 'email'];
}

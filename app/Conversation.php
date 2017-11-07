<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
   protected $table='conversations';
    protected $fillable=['user_one','user_two'];

      public function userOne()
     {
        return $this->belongsTo('App\User','user_one');
     }

       public function userTwo()
     {
        return $this->belongsTo('App\User','user_two');
     }

         public function message()
     {
         return $this->hasMany('App\Message','conversation_id');

     }

   
}

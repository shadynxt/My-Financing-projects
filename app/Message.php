<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
 protected $hidden = [
        'sender'
    ];
    protected $table = "messages";
    protected $fillable = ['user_from' , 'user_to' ,'conversation_id','message'];



    public function sender()
    {
      return $this->belongsTo('App\User','user_from');
    }

   public function conversation(){
       return $this->belongsTo('App\Conversation','conversation_id');

   }
      public function userFrom()
     {
        return $this->belongsTo('App\User','user_from');
     }

        public function userTo()
     {
        return $this->belongsTo('App\User','user_to');
     }
}

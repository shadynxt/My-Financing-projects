<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
   protected $table ="follow";
   protected $fillable = ['project_id' , 'user_id'];


    // Add New Favorite
	public static  function addFollow($request)
	{
		$favorite                   = new Follow();
		$favorite->project_id       =$request->project_id;
		$favorite->user_id          =$request->user_id;
		$favorite->save();
	}
	
	// Edit New Favorite
    public static function editFollow($request ,$id){
        $favorite                    =  Follow::find($id);
        $favorite->project_id       = $request->project_id;
        $favorite->user_id           =$request->user_id;
		$favorite->save();

    }
}

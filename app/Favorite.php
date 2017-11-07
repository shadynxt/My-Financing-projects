<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Favorite extends Model
{
    protected $table ='favorite';
    protected $fillable = ['idea_project_id' , 'user_id'];


    // Add New Favorite
	public static  function addFavorite($request,$id="")
	{
		$favorite                   = new Favorite();
	  if($id !=""){
      $favorite->idea_project_id  = $id;

      }
      else{
      $favorite->idea_project_id   = $request->idea_project_id;

      }
      if(Auth::id() !=""){
      $favorite->user_id   = Auth::id();

      }
      else{
      $favorite->user_id           = $request->user_id;

      }
		$favorite->save();
		return $favorite;
	}

	// Edit New Favorite
    public static function editFavorite($request ,$id){
        $favorite                    =  Favorite::find($id);
        $favorite->idea_project_id   =  $request->idea_project_id;
        $favorite->user_id           =  $request->user_id;
		$favorite->save();

    }

    public function project(){

    	return $this->belongsTo('App\Idea','idea_project_id');

    }
      public function user(){

    	return $this->belongsTo('App\User','user_id');

    }
}

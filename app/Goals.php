<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
	protected $table ='goals';
    
	public static function editGoal($request ,$id ){
	 if($request->img !=""){
        // Upload Image 
        $file                           = $request->img;
        $img                            = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'uploads/projects/';
        $file                           = $file->move($path, $img);
      }
      $goal           =   Goals::find($id);
      $goal->title    =   $request->title;
      $goal->body     =   $request->body;
      if($request->img !=""){
      $goal->img      =   $img;
      }
      $goal->save();
	}
}

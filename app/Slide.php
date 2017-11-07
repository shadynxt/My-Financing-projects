<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table ='slider';


	public static function editSlide($request ,$id){
    $slide = Slide::find($id);
	 if($request->img !=""){
        // Upload Image
        $file                           = $request->img;
        $img                            = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $img);
      }
      if($request->img !=""){
      $slide->img      =   $img;
      }
      $slide->save();
	}
}

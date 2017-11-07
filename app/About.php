<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
   protected $table ='about_us';

   public static function editAbout($request ,$id){
     // for Category Image
     if(!empty($request->img) ){
       // Upload Image
       $file                           = $request->img;
       $img                            = date('Y-m-d-H:i:s') . "-" .mt_rand();
       $path                           = 'public/uploads/projects/';
       $file                           = $file->move($path, $img);
     }
   	$about          = About::find($id);
   	$about->title   =$request->title ;
   	$about->body    =$request->body;
   if(!empty($request->img))  {
      $about->img     =$img;
    }
   	$about->save();

   }
}

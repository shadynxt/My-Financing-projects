<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_updates extends Model
{
    //
    protected $table = 'projects_updates';
    protected $fillable = ['project_id','img','description'];

     public static function addRecent($request,$id=" "){
         if($request->img !=""){
        // Upload Image 
        $file                           = $request->img;
        $img                            = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $img);
      }
      $recent = new Project_updates(); 
      $recent->description              = $request->description;
      if($id !=""){
      $recent->project_id  = $id;

      }
      $recent->project_id               = $request->project_id;
      if($request->img !=""){
        $recent->img                    =$img;
      }
      $recent->save();
     }

     public static function editRecent($request,$id){
      if($request->img !=""){
        // Upload Image 
        $file                           = $request->img;
        $img                            = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $img);
      }
      $recent =Project_updates::find($id);
      $recent->description       = $request->description;
      $recent->project_id        = $request->project_id;
      if($request->img != ""){
        $recent->img               = $img;
      }
      $recent->save();
     }
}

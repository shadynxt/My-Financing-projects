<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Recent extends Model
{
    protected $table="recent";
    //Add Recent
    public static function addRecent($request,$id=""){
      if(isset($request->image)){
        // Upload Image
        $file                           = $request->image;
        $image                    = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $image);
      }
      $recent = new Recent();
      $recent->body              = $request->body;
      $recent->img               = $image;
      if($id !=""){
      $recent->idea_project_id  = $id;

      }
      $recent->idea_project_id   = $request->idea_project_id;

      if(Auth::id() !=""){
      $recent->user_id   = Auth::id();

      }
      else{
      $recent->user_id           = $request->user_id;

      }
      $recent->save();
     }

     public static function editRecent($request,$id){
       if(isset($request->image)){
         // Upload Image
         $file                           = $request->image;
         $image                          = date('Y-m-d-H:i:s') . "-" .mt_rand();
         $path                           = 'public/uploads/projects/';
         $file                           = $file->move($path, $image);
       }
      $recent =Recent::find($id);
      $recent->body              = $request->body;
      $recent->img               = $image;
      $recent->idea_project_id   = $request->idea_project_id;
      $recent->user_id           = $request->user_id;
      $recent->save();
     }
}

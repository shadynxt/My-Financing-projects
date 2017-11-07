<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable = ['idea_project_id','user_id' , 'body'];
    protected $hidden = ['user','project'];

        //Add Comment
    public static function addComment($request,$id=""){
      $comment = new Comment();
      $comment->body              = $request->body;
      if(!empty($id)){
      $comment->idea_project_id  = $id;
      }
      else{
      $comment->idea_project_id   = $request->idea_project_id;
      }
      if(!empty(Auth::id())){
      $comment->user_id   = Auth::id();
      }
      else{
      $comment->user_id           = $request->user_id;
      }
      $comment->save();
      return $comment;

     }

       //Edit Comment
    public static function editComment($request,$id){
      $comment                      = Comment::find($id);
      $comment->body                = $request->body;
      $comment->idea_project_id     = $request->idea_project_id;
      $comment->user_id             = $request->user_id;
      $comment->update();

     }
     public function project(){
       return $this->belongsTo('App\Idea','idea_project_id');


     }

      public function user(){
       return $this->belongsTo('App\User','user_id');

     }
}

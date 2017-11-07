<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Notifications\CommentOnProject;
use App\Http\Controllers\API\NotificationsController;
use App\Comment;
use App\Idea;
use App\Mobile_Token;
use Auth;

class CommentsController extends Controller
{

    // add new comment
    public function addComment(Request $request)
    {


      $user = Auth::user();
      $comment = Comment::create($request->all() + ['user_id'=>$user->id]);
      $project = Idea::find($request->idea_project_id);
      if($user->id != $project->user_id)
      {
        // save notification on database
        $project->user->notify(new CommentOnProject($comment));

        // get mobile token of user who  owner project
        $tokens = $project->user->mobile_token;
        $title = 'قام '.$user->first_name.' '.$user->last_name . 'بأضافة تعليق على مشروعك ';


        foreach ($tokens as $tokn)
        {
          // push notification to mobile device
            NotificationsController::sendNotification($tokn->token,$request->idea_project_id,'comment',$title);
        }

      }

         // push comment on screan of userTo
        // if($user->id != $comment->user_id)
        // {
            foreach(Mobile_Token::all() as $tokn)
            {
                     if($tokn->user_id != $comment->user_id){
                       // return $tokn->token;
                       NotificationsController::pushComment($tokn->token,$project->id ,$comment->user->profile_pic,$comment->body,$comment->id,$comment->user->first_name.' '.$comment->user->last_name,time_string($comment->created_at));
                 }
            }

        // }


        $data['commnt_id'] = $comment->id;
        $data['body'] = $comment->body;
        $data['id'] = $comment->user->id;
        $data['first_name'] = $comment->user->first_name;
        $data['last_name'] = $comment->user->last_name;
        $data['profile_pic'] = $comment->user->profile_pic;
        $data['time'] = time_string($comment->created_at);

      return response($data,200);
    }


    //get all comments of project
    public function getComments($id)
    {

      $comments = Comment::join('ideas_projects','ideas_projects.id','=','comments.idea_project_id')
      ->join('users','users.id','=','comments.user_id')->where('ideas_projects.id',$id)->
       select('comments.id as commnt_id','comments.body','users.first_name','users.last_name','users.id','users.profile_pic','comments.created_at')->paginate(10);

      foreach($comments as $comment)
        $comment->time = time_string($comment->created_at);

      return $comments;
    }

}
